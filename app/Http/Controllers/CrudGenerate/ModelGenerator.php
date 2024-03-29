<?php

namespace App\Http\Controllers\CrudGenerate;

use Illuminate\Support\Str;

class ModelGenerator
{
    public $tables;

    //CONFIG

    private $modelPath;

    private $templatePath;

    private $createdAt;

    private $updatedAt;

    private $hiddenCols;


    public function __construct($tables)
    {
        $this->tables = $tables;

        $this->config();
    }

    public function config()
    {
        $conf  = \Config::get('crudgenerate');

        $paths = $conf['paths'];

        $cols  = $conf['cols'];

        $this->modelPath    = $paths['models'];

        $this->templatePath = $paths['templates'] . 'model/';

        $this->createdAt    = $cols['createdAt'];

        $this->updatedAt    = $cols['updatedAt'];

        $this->hiddenCols   = $cols['hiddenCols'];
    }

    public function generate()
    {
        foreach ($this->tables as $tableName => $table) 
        {
            $exitCode = $this->callMakeModel($table);
            
            if( $exitCode != 0 )
            {
                dd('error al crear modelo de la tabla' . $tableName . 'cod'. $exitCode);
            }
            
            $definition = $this->definition($tableName, $table);
            
            $this->compile($table, $definition);
        }
    }

    public function callMakeModel($table)
    {
        $force     = true;

        $options   = [
                        'name'              => $this->modelPath.$table->className,
                        '--controller'      => true, 
                        '--factory'         => true,
                        '--resource'        => true,
                        '--no-interaction'  => true,
                        '--force'           => $force,
                    ];

        return \Artisan::call('make:model', $options);
    }

    public function definition($tableName, $table)
    {
        $primaryKey  = $table->primaryKey;

        $showCols    = $this->getShowCols($table);

        $hiddenCols  = $this->getHiddenCols();

        $constraints = $this->getConstraints($table);

        return str_replace(
            [ '{{tableName}}', '{{pkColumn}}', '{{createdAt}}', '{{updatedAt}}', '{{showCols}}', '{{hiddenCols}}', '{{Constraints}}' ],
            [ $tableName, $primaryKey, $this->createdAt, $this->updatedAt, $showCols, $hiddenCols, $constraints ],
            file_get_contents(base_path( $this->templatePath . "define.template" ))
        );
    }
    
    public function getShowCols($table)
    {
        $showColumns = [];

        foreach ($table->columns as $columnName => $column) 
        {
            if(in_array($columnName, $this->hiddenCols))
            {
                continue;
            }

            $showColumns[] = $columnName;
        }

        return "'" . implode( "',". PHP_EOL ."\t \t \t \t \t \t \t'" , $showColumns ) . "'";
    }

    public function getHiddenCols()
    {
        return "'" . implode( "',". PHP_EOL ."\t \t \t \t \t \t \t'" , $this->hiddenCols ) . "'";
    }

    public function getConstraints($table)
    {
        $foreignKeys = $table->foreignKeys;

        $fkString = [];
        
        if( $foreignKeys != [] )
        {
            foreach ($foreignKeys as $foreignKey) 
            {
                $foreignTable  = $foreignKey->foreignTable;
                
                $className     = Str::studly($foreignKey->foreignTable);

                $instanceName  = Str::camel($foreignKey->foreignTable);

                $foreignColumn = $foreignKey->foreignColumn;

                $fkString[] = str_replace(
                    [ '{{modelTableName}}', '{{functionTableName}}', '{{foreingColumn}}' ],
                    [ $className, $instanceName, $foreignColumn ],
                    file_get_contents(base_path( $this->templatePath . 'constraints.template' ))
                );
            }
        }
        return implode( PHP_EOL . PHP_EOL, $fkString );
    }

    public function compile($table, $definition)
    {
        $compiled =  str_replace(
            [ '//' ],
            [ $definition ],
            file_get_contents(app_path($this->modelPath . $table->className . '.php'))
        );

        file_put_contents(
            app_path($this->modelPath . $table->className . '.php'),
            $compiled
        );
    }
}