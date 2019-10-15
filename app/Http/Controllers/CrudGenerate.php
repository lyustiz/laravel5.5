<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CrudGenerate extends Controller
{
    

     public function init()
    {
        $schema = 'corpovex_visitas';

        $connection = \DB::connection()->getDoctrineSchemaManager();

        $databases = $connection->listDatabases();

        $schemas = $connection->getSchemaNames();
        
        $tables = $connection->listTables();
  
        foreach ($tables as $table) {

            if($table->getNamespaceName() == $schema)
            {
                   
                $tableName = $this->getTableName($table->getName(), $schema);

                $columns = $table->getColumns();
    
                $primaryKey = $table->getPrimaryKey();

                $fields = null;
        
                foreach ($columns as $column) {
        
                    $columnAttributes = $this->getColumnsAttributes($column);

                    $fields .= $this->getFieldTemplates($columnAttributes);
            
                    //dump( $columnAttributes, $fields);
                }

                $this->fileSave($tableName, $fields);

            }
            $foreingnKeys = $table->getForeignKeys();

            dump($table->getName(), $foreingnKeys);
            
        }
        dd(1);
     
    }

    public function getFieldTemplates($column)
    {
        $columnPrefix = $this->getPrefix($column['name']);

        $columnType = $column['type'];

        $columName = $column['name'];

        $fieldName = $this->getFieldName($column['name']);


        switch (true) {
           
            case in_array( $columnType, [ 'string', 'text' ] ):

                return $this->fieldTemplate('text', $columName, $fieldName);

                break;

            case $columnType == 'datetime':

                return $this->fieldTemplate('date', $columName, $fieldName);

                break;
           
            case $columnType == 'integer':

                return $this->fieldTemplate('text', $columName, $fieldName);

                break;
           
            case $columnType == 'decimal':

                return $this->fieldTemplate('text', $columName, $fieldName);

                break;

            case 'boolean':

                return $this->fieldTemplate('ceckbox', $columName, $fieldName);
               
                break;
           
           default:

                return $this->fieldTemplate('text', $columName, $fieldName);
                break;
       }
    }

    protected function getFieldName($columnName)
    {
        $fieldName =  str_replace(
                                $this->getPrefix($columnName),
                                null,
                                $columnName
                            );
        
        return  str_replace( '_', ' ', $fieldName );
    }

    protected function fieldTemplate( $type, $columName, $fieldName )
    {
        return str_replace(
            ['{{columnName}}', '{{fieldName}}'],
            [$columName, $fieldName],
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

    public function getTableName($tableFullName, $schema)
    {
       
        return strtolower(
            str_replace(
                "$schema.",
                null,
                $tableFullName
            )
        );
    }

    public function fileSave($tableName, $fields)
    {
        $this->createDirectories($tableName, $fields);
   
    }

     /**
     * Create the directories for the files.
     *
     * @return void
     */
    protected function createDirectories($tableName, $fields)
    {
        if (! is_dir($directory = resource_path('assets/js/vue/'))) {
            mkdir($directory, 0755, true);
        }


        return file_put_contents(
            base_path("/resources/assets/js/vue/$tableName.vue"),
            $this->compileTemplates($tableName, $fields)
        );
    }

    /**
     * Compiles the .
     *
     * @return string
     */
    protected function compileTemplates($tableName, $fields)
    {
        return str_replace(
            ['{{table}}', '{{formFields}}'],
            [$tableName, $fields],
            file_get_contents(app_path('../resources/templates/form.template'))
        );
    }


}
