<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;

class CrudGenerate extends Controller
{
    private $connection;

    private $schema;

    private $metadata;

    private $tables;

    //models

    private $modelPath;

    private $createdAt;

    private $updatedAt;

    private $hiddenCols;


    public function __construct($schema = 'corpovex_visitas', $conection = null)
    {
        $this->schema = $schema;

        $this->setConection($conection);

        $this->setMetadata();

        $this->setTables();

    }

    

    public function generate()
    {
        foreach ($this->tables as $table) 
        {
            if( $table->getNamespaceName() == $this->schema )
            {
                $tableName    = $this->getTableName( $table->getName() );

                $columns      = $table->getColumns();
    
                $primaryKey   = $table->getPrimaryKey();

                $foreingnKeys = $table->getForeignKeys();

                $this->viewGenerate( $tableName, $columns, $foreingnKeys );

                $this->modelGenerate( $table, $columns, $foreingnKeys );

                $this->controllerGenerate( $table, $columns, $foreingnKeys );
            }
        }
    }


    //MODEL
    public function modelGenerate( $table, $columns, $foreingnKeys )
    {
        $this->modelPath = 'Models/';

        $this->createdAt = 'fe_creado';

        $this->updatedAt = 'fe_actualizado';

        $this->hiddenCols = [ 'id_usuario', $this->createdAt, $this->updatedAt ];

        $tableName = $this->getTableName( $table->getName() );

        $force     = true;

        $options   = [
                        'name'              => $this->modelPath.Str::studly($tableName),
                        '--controller'      => true, 
                        '--factory'         => true,
                        '--resource'        => true,
                        '--no-interaction'  => true,
                    ];
        
        if($force)
        {
            $options['--force']  = true;
        }

        $exitCode = \Artisan::call('make:model', $options);

        if($exitCode == 0)
        {
            dump('Modelo, controlador y vista creada, tabla ' . $tableName);
        }else
        {
            dump('Error al crar modelo de la tabla '. $tableName . '');
        }

        $modelCompiled =  str_replace(
                                        [ '//' ],
                                        [ $this->modelDefinition($table, $columns) ],
                                        file_get_contents(app_path($this->modelPath.Str::studly($tableName).'.php'))
                                    );

        file_put_contents(
            app_path($this->modelPath.Str::studly($tableName).'.php'),
            $modelCompiled
        );

        $this->controllerGenerate( $table, $columns, $foreingnKeys );

    }

    public function controllerGenerate($table, $columns, $foreingnKeys)
    {
        $crudActions = [ 'index', 'show', 'store', 'edit', 'update', 'destroy' ];
        
        $modelInstance   = Str::camel( $this->getTableName( $table->getName() ));

        $modelName       = Str::studly( $this->getTableName( $table->getName() ));

        $foreingnsTables = $this->foreingnsTables($foreingnKeys);

        $primaryKey = $this->getPrimaryKey($table);

        foreach ($crudActions as $crudAction) 
        {
            $validateFields  = $this->getValidateFields($crudAction, $columns, $primaryKey);
            
            $crudTemplates[$crudAction] = $this->compileCrudAction($crudAction, $modelInstance, $modelName, $foreingnsTables, $validateFields);
        }
        
        $this->ControllerCompiler($crudTemplates, $modelName);
    }

    public function ControllerCompiler($cruds, $modelName)
    {
        $ControllerCompiled =  str_replace(
            [ '//index', '//show', '//store', '//edit', '//update', '//destroy'],
            [ $cruds['index'], $cruds['show'], $cruds['store'], $cruds['edit'], $cruds['update'], $cruds['destroy'] ],
            file_get_contents(app_path('Http/Controllers/'.Str::studly($modelName).'Controller.php'))
        );
        
        file_put_contents(
            app_path('Http/Controllers/'.Str::studly($modelName).'Controller.php'),
            $ControllerCompiled
        );
        
    }


    public function foreingnsTables($foreingnKeys)
    {
        $foreignTable = null;

        if(count($foreingnKeys)>0)
        {
            foreach ($foreingnKeys as $foreingnKey) 
            {
                $foreignTable[]  = Str::studly(
                                        $this->getTableName( $foreingnKey->getForeignTableName() )
                                    );
            }
        }
        return ($foreignTable == null ) ? null : implode(', ', $foreignTable);
    }

    public function getValidateFields($crudAction, $columns, $primaryKey)
    {
        $validateFields = [];

        $validators     = null;
        
        foreach ($columns as $column) {

            $columnsAttributes = $this->getColumnsAttributes($column);

            $columnType        = $columnsAttributes['type'];

            if($crudAction == 'store' && $columnsAttributes['name'] == $primaryKey)
            {
                continue;
            }

            switch ( true ) 
            {
                case in_array( $columnType, [ 'string', 'text' ] ):

                    $validators = [ 'required', 'alpha_num', 'max:'.$columnsAttributes['length']];
                    break;

                case $columnType == 'datetime':

                    $validators = [ 'required', 'date'];
                    break;
        
                case $columnType == 'integer':

                    $validators = [ 'required', 'integer', 'max:'.$columnsAttributes['precision']];
                    break;
            
                case $columnType == 'decimal':

                    $validators = [ 'required', 'numeric', 'max:'.$columnsAttributes['precision']];
                    break;

                case 'boolean':

                    $validators = [ 'required', 'boolean'];
                    break; 
                            
                default:

                    $validators = ['required', 'alpha_num', 'max:'.$columnsAttributes['length']];
                    break;
            }

            $validateFields[] = "'" . $columnsAttributes['name'] . "'" . "\t => \t" . 
                                "'" . implode("|",$validators) . "'" . "," ;

        }
        
        return  implode( PHP_EOL ."\t\t\t\t" , $validateFields );
    }

    public function compileCrudAction( $crudAction, $modelInstance, $modelName, $foreingnsTables, $validateFields )
    {
        return str_replace(
                [ '{{modelInstance}}', '{{modelName}}', '{{foreingnsTables}}', '{{validateFields}}'],
                [ $modelInstance, $modelName, $foreingnsTables, $validateFields ],
                file_get_contents(app_path("../resources/templates/controller/crud/controller.$crudAction.template"))
        );
    }

    public function modelDefinition($table, $columns)
    {
        $path       = app_path($this->modelPath);

        $tableName  = $this->getTableName( $table->getName() );

        $pkColumn   = $this->getPrimaryKey($table);

        $showCols   = $this->getShowCols($columns);

        $hiddenCols = $this->getHiddenCols();

        $constraints = $this->getConstraints($table);
               
        return str_replace(
            [ '{{tableName}}', '{{pkColumn}}', '{{createdAt}}', '{{updatedAt}}', '{{showCols}}', '{{hiddenCols}}', '{{Constraints}}' ],
            [ $tableName, $pkColumn, $this->createdAt, $this->updatedAt,  $showCols,  $hiddenCols, $constraints],
            file_get_contents(app_path("../resources/templates/model/define.template"))
        );
    }

    public function getConstraints($table)
    {
        $foreingnKeys = $table->getForeignKeys();

        $fkStr = [];
        
        if(count($foreingnKeys) > 0)
        {
            foreach ($foreingnKeys as $foreingnKey) 
            {
                $foreignTable       = $foreingnKey->getForeignTableName();
                
                $modelTableName     = Str::studly($this->getTableName( $foreignTable ));

                $functionTableName  = Str::camel($this->getTableName( $foreignTable ));

                $foreingColumn      = $foreingnKey->getForeignColumns()[0];

                $fkStr[] = str_replace(
                    [ '{{modelTableName}}', '{{functionTableName}}', '{{foreingColumn}}' ],
                    [ $modelTableName, $functionTableName, $foreingColumn ],
                    file_get_contents(app_path("../resources/templates/model/constraints.template"))
                );
            }
        }
        return implode( PHP_EOL . PHP_EOL, $fkStr );
    }

    public function getPrimaryKey($table)
    {
        return  $this->metadata
                ->listTableIndexes($table->getName())['primary']
                ->getColumns()[0];
    }

    public function getShowCols($columns)
    {
        foreach ($columns as $column) 
        {
            $columnAttributes = $this->getColumnsAttributes($column);

            if(in_array($columnAttributes['name'], $this->hiddenCols))
            {
                continue;
            }
            $tableColumns[]   = $columnAttributes['name'];
        }
        return "'" . implode( "',". PHP_EOL ."\t \t \t \t \t \t \t'" , $tableColumns ) . "'";
    }

    public function getHiddenCols()
    {
        return "'" . implode( "',". PHP_EOL ."\t \t \t \t \t \t \t'" , $this->hiddenCols ) . "'";
    }


    //VIEW
    public function viewGenerate( $tableName, $columns, $foreingnKeys )
    {
        $Formfields   = null;

        $tableColumns = null;
        
        foreach ($columns as $column) 
        {
            $columnAttributes = $this->getColumnsAttributes($column);

            $Formfields      .= $this->getFieldTemplates($columnAttributes);
    
            $tableColumns[]   = $columnAttributes['name'];
        }

        if( count($foreingnKeys) > 0 )
        {
            foreach( $foreingnKeys as $foreingnKey ) 
            {
                $Formfields  .= $this->foreingKeyField($foreingnKey);
            }
        }

        $this->fileSave($tableName, $tableColumns, $Formfields);
    }

    public function setConection($connectionName)
    {
        $this->connection = \DB::connection($connectionName);
    }

    public function setMetadata()
    {
        $this->metadata = $this->connection->getDoctrineSchemaManager();
    }

    public function setTables()
    {
        $this->tables = $this->metadata->listTables();
    }

    public function getDatabases()
    {
        return $this->metadata->listDatabases();
    }

    public function getSchemas()
    {
        return $this->metadata->getSchemaNames();
    }

    public function foreingKeyField($foreingnKey)
    {
        $foreignColumns = $foreingnKey->getForeignColumns();

        $localColumns = $foreingnKey->getLocalColumns();

        return $this->fieldTemplate(
                                        'select', 
                                        $localColumns[0],
                                        $this->getFieldName($localColumns[0]),
                                        $this->getTableName($foreingnKey->getForeignTableName()),
                                        $foreignColumns[0]
                                    );
    }

    public function getFieldTemplates($column)
    {
        $columnPrefix = $this->getPrefix($column['name']);

        $columnType = $column['type'];

        $columName  = $column['name'];

        $fieldName  = $this->getFieldName($column['name']);
       
        switch (true) 
        {
            case in_array( $columnType, [ 'string', 'text' ] ):

                return $this->fieldTemplate('text', $columName, $fieldName);

            case $columnType == 'datetime':

                return $this->fieldTemplate('date', $columName, $fieldName);
      
            case $columnType == 'integer':

                return $this->fieldTemplate('text', $columName, $fieldName);
           
            case $columnType == 'decimal':

                return $this->fieldTemplate('text', $columName, $fieldName);

            case 'boolean':

                return $this->fieldTemplate('ceckbox', $columName, $fieldName);
                          
           default:

                return $this->fieldTemplate('text', $columName, $fieldName);
       }
    }

    protected function getFieldName($columnName)
    {
        $fieldName =  str_replace(
                                $this->getPrefix($columnName) . '_',
                                null,
                                $columnName
                            );
        
        return ucwords( str_replace( '_', ' ', $fieldName ) );
    }

    protected function fieldTemplate( $type, $columName, $fieldName , $fkTableName = null, $fkColTableName = null)
    {
        $fkColTableName = str_replace( 'id_', 'nb_', $fkColTableName );
        
        return str_replace(
            [ '{{columnName}}', '{{fieldName}}', '{{fkTableName}}', '{{fkColTableName}}' ],
            [ $columName, $fieldName, $fkTableName, $fkColTableName ],
            file_get_contents(app_path("../resources/templates/form/$type.template"))
        );
    }

    public function getPrefix($columnName)
    {
        return substr($columnName, 0, 2);
    }

    public function getColumnsAttributes($column)
    {
        $attributes = $column->toArray();

        $attributes['type'] = $attributes['type']->getName();

        return $attributes;
    }

    public function getTableName($tableFullName)
    {
        return strtolower(
            substr($tableFullName, strpos($tableFullName, '.') + 1)
        );
    }

    public function fileSave($tableName, $tableColumns, $Formfields)
    {
        $this->createDirectories($tableName, $tableColumns, $Formfields);
    }

     /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories($tableName, $tableColumns, $Formfields)
    {
        if (! is_dir($directory = resource_path('assets/js/vue/'))) {
            mkdir($directory, 0755, true);
        }

        return file_put_contents(
            base_path("/resources/assets/js/vue/$tableName.vue"),
            $this->compileTemplates($tableName, $tableColumns, $Formfields)
        );
    }

    /**
     * Compiles the .
     *
     * @return string
     */
    protected function compileTemplates($tableName, $tableColumns, $Formfields)
    {
        $tableColumns = $this->formatTableColumns($tableColumns);
       
        return str_replace(
            ['{{table}}', '{{tableField}}', '{{formFields}}'],
            [$tableName,  $tableColumns, $Formfields],
            file_get_contents(app_path('../resources/templates/form.template'))
        );
    }

    protected function formatTableColumns($tableColumns)
    {
       $formColums = null;

        foreach ($tableColumns as $tableColumn) {
           $formColums .= $tableColumn . ','. PHP_EOL ."\t \t \t \t";
        }
       return $formColums;
       
    }


}
