<?php

namespace App\Http\Controllers\CrudGenerate;

use Illuminate\Support\Str;

class ViewGenerator
{
    public $tables;

    public $foreignTables;

    //CONFIG

    private $viewPath;

    private $templatePath;

    private $hiddenCols;

    public function __construct($tables)
    {
        $this->tables  = $tables;

        $this->config();
    }

    public function config()
    {
        $conf  = \Config::get('crudgenerate');

        $paths = $conf['paths'];

        $cols  = $conf['cols'];

        $this->viewPath       = $paths['views'];

        $this->templatePath   = $paths['templates'] . 'view/';

        $this->hiddenCols     = $cols['hiddenCols'];
    }

    public function generate()
    {
        foreach ($this->tables as $tableName => $table) 
        {
            $definition = $this->definition($tableName, $table);

            $this->compile($definition, $tableName, $table);
        }
    }

    public function definition($tableName, $table)
    {
        $formFields = null;
        
        foreach ($table->columns as $columnName => $column) 
        {
            $formFields      .= $this->fieldTemplates($columnName, $column);
            
            $tableColumns[]   = $columnName;
        }

        $formFields  .= $this->selectFields($table->foreignKeys);

        return $formFields;
    }

    public function compile($definition, $tableName, $table)
    {
        $this->createDirectory();

        //list
        return file_put_contents(
            base_path( $this->viewPath .'list/'. $tableName . ".vue"),
            $this->compileList($definition, $tableName, $table)
        );
        //form
        return file_put_contents(
            base_path( $this->viewPath .'form/'. $tableName . ".vue"),
            $this->compileForm($definition, $tableName, $table)
        );
    }

    protected function compileList($definition, $tableName, $table)
    {
        $headers     = $this->compileHeaders($tableName, $table);
        
        $listColumns = $this->compileListColumns($tableName, $table);

        $formName    = Str::studly($tableName) . '_form';
       
        return str_replace(
            ['{{primaryKey}}', '{{className}}', '{{instanceName}}', '{{formName}}', '{{headers}}', '{{listColumns}}',],
            [$table->primaryKey, $table->className, $table->instanceName, $formName, $headers, $listColumns ],
            file_get_contents(base_path( $this->templatePath . "/form.template" ))
        );
    }
    
    protected function compileForm($definition, $tableName, $table)
    {
        $tableColumns = $this->formatTableColumns($table->columns);

        $foreignTables = $this->formatForeingTables(); 
       
        return str_replace(
            ['{{table}}', '{{tableField}}', '{{formFields}}', '{{foreignTables}}'],
            [$tableName,  $tableColumns, $definition, $foreignTables],
            file_get_contents(base_path( $this->templatePath . "/form.template" ))
        );
    }

    //list
    public function compileHeaders($tableName, $table)
    {
        $headers = [];

        foreach ($table->columns as $columnName => $column) 
        {
            $headers[$tableName] = $this->defineHeaders($columnName);
        }

        return implode(  PHP_EOL ."\t\t\t'" , $headers );
    }

    public function compileListColumns($tableName, $table)
    {
        $listColumns = [];

        foreach ($table->columns as $columnName => $column) 
        {
            $listColumns[$tableName] = $this->defineHeaders($columnName);
        }

        return implode(  PHP_EOL ."\t\t\t\t\t'" , $listColumns );
    }

    public function defineHeaders($columnName)
    {
        $headerName = $this->fieldName($columnName);

        return str_replace(
            [ '{{headerName}}', '{{columnName}}' ],
            [ $headerName,  $columnName ],
            file_get_contents(base_path( $this->templatePath . "/list/header.template" ))
        );
    } 

    public function defineListColumns($columnName)
    {
        return str_replace(
            [ '{{columnName}}' ],
            [ $columnName ],
            file_get_contents(base_path( $this->templatePath . "/list/column.template" ))
        );
    } 

    //forms

    public function fieldTemplates($columnName, $column)
    {
        $columnPrefix = $this->getPrefix($columnName);

        $fieldName  = $this->fieldName($columnName);
       
        switch (true) 
        {
            case in_array( $column->type, [ 'string', 'text' ] ):

                return $this->fieldTemplate('text', $columnName, $fieldName);

            case $column->type == 'datetime':

                return $this->fieldTemplate('date', $columnName, $fieldName);
    
            case $column->type == 'integer':

                return $this->fieldTemplate('text', $columnName, $fieldName);
        
            case $column->type == 'decimal':

                return $this->fieldTemplate('text', $columnName, $fieldName);

            case $column->type == 'boolean':

                return $this->fieldTemplate('checkbox', $columnName, $fieldName);
            
            default:

                return $this->fieldTemplate('text', $columnName, $fieldName);
       }
    }

    protected function fieldTemplate( $type, $columnName, $fieldName, $fkTableName = null, $fkColTableName = null)
    {
        $fkColTableName = str_replace( 'id_', 'nb_', $fkColTableName );
        
        return str_replace(
            [ '{{columnName}}', '{{fieldName}}', '{{fkTableName}}', '{{fkColTableName}}' ],
            [ $columnName, $fieldName, $fkTableName, $fkColTableName ],
            file_get_contents(base_path($this->templatePath . "form/$type.template"))
        );
    }

    public function selectFields($foreingnKeys)
    {
        $selectFields = null;

        if($foreingnKeys != [])
        {
            foreach ($foreingnKeys as $foreingnKey) {

                $selectFields .=    $this->fieldTemplate(
                                        'select', 
                                        $foreingnKey->localColumn,
                                        $this->fieldName($foreingnKey->localColumn),
                                        Str::camel($foreingnKey->foreignTable),
                                        $foreingnKey->foreignColumn
                                    );

                $this->foreignTables[] = Str::camel($foreingnKey->foreignTable);
            }
        }
        return $selectFields;
    }

    public function formatTableColumns($columns)
    {
        $formColumns = null;

        foreach ($columns as $columnName => $column) 
        {
            $formColumns .= $columnName . ','. PHP_EOL ."\t \t \t \t";
        }

        return $formColumns;
    }

    public function formatForeingTables()
    {
        $formatTable = [];

        if($this->foreignTables != [])
        {
            foreach ($this->foreignTables as $foreignTable) {
                $formatTable[] = Str::camel($foreignTable) . ": \t [],";
            }
        }

        return implode(  PHP_EOL ."\t \t \t \t \t \t \t'" , $formatTable ) ;
          
    }

    public function getPrefix($columnName)
    {
        return substr($columnName, 0, 2);
    }

    protected function fieldName($columnName)
    {
        $fieldName =  str_replace($this->getPrefix($columnName) . '_', null, $columnName);
       
        return ucwords(str_replace('_', ' ', $fieldName));
    }

    //global
    public function createDirectory()
    {
        if (! is_dir($directory = base_path( $this->viewPath . 'list/' ))) {
            mkdir($directory, 0755, true);
        }

        if (! is_dir($directory = base_path( $this->viewPath . 'form/' ))) {
            mkdir($directory, 0755, true);
        }
    }

}