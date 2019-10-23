<?php

namespace App\Http\Controllers\CrudGenerate;

use Illuminate\Support\Str;

class ViewGenerator
{
    public $tables;

    //CONFIG

    private $controllerPath;

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

        $this->controllerPath = $paths['views'];

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

        $formFields  .= $this->foreingKeyField($table->foreignKeys);

        return $formFields;
    }

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

                return $this->fieldTemplate('ceckbox', $columnName, $fieldName);
                          
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

    public function getPrefix($columnName)
    {
        return substr($columnName, 0, 2);
    }

    protected function fieldName($columnName)
    {
        $fieldName =  str_replace(
                                $this->getPrefix($columnName) . '_',
                                null,
                                $columnName
                            );
        
        return ucwords(str_replace('_', ' ', $fieldName));
    }

    public function foreingKeyField($foreingnKeys)
    {
        $foreingKeyField = null;

        if($foreingnKeys!=[])
        {
            foreach ($foreingnKeys as $foreingnKey) {

                $foreingKeyField .=  $this->fieldTemplate(
                                        'select', 
                                        $foreingnKey->localColumn,
                                        $this->getFieldName($foreingnKey->localColumn),
                                        $this->getTableName($foreingnKey->foreignTable),
                                        $foreingnKey->foreignColumn
                                    );
            }
        }
        return $foreingKeyField;
    }

    public function compile($definition, $tableName, $table)
    {
        $this->createDirectory();

        return file_put_contents(
            resource_path("assets/js/vue/$tableName.vue"),
            $this->compileTemplates($definition, $tableName, $table)
        );
    }

    protected function compileTemplates($definition, $tableName, $table)
    {
        $tableColumns = $this->formatTableColumns($table->columns);
       
        return str_replace(
            ['{{table}}', '{{tableField}}', '{{formFields}}'],
            [$tableName,  $tableColumns, $definition],
            file_get_contents(app_path('../resources/templates/form.template'))
        );
    }

    protected function formatTableColumns($columns)
    {
       $formColums = null;

        foreach ($columns as $columnName => $column) 
        {
            if(in_array($columnName, $this->hiddenCols))
            {
                continue;
            }

            $formColums .= $columnName . ','. PHP_EOL ."\t \t \t \t";
        }
       
        return $formColums;
    }

    public function createDirectory()
    {
        if (! is_dir($directory = resource_path('assets/js/vue/'))) {
            mkdir($directory, 0755, true);
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

    public function getTableName($tableFullName)
    {
        return strtolower(
            substr($tableFullName, strpos($tableFullName, '.') + 1)
        );
    }

}