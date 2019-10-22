<?php

namespace App\Http\Controllers\CrudGenerate;

use App\Http\Controllers\CrudGenerate\Connection;
use App\Http\Controllers\CrudGenerate\Meta;
use App\Http\Controllers\CrudGenerate\ModelGenerator;

class CrudGenerate
{
    private $connector;
    
    public $connection;

    public $meta;

    public $tables;
    
    public function __construct(Connection $conection)
    {
        $this->connector = $conection;
        
        $this->connection = $this->connector->connect();

        $this->meta  = new Meta($this->connection);
    }

    public function generate()
    {
        $this->tables = json_decode(json_encode($this->tables), FALSE);

        $this->modelGenerate();

        //$this->controllerGenerate();

        //$this->viewGenerate();
    }

    

    public function modelGenerate()
    {
        $modelGenerator = new ModelGenerator($this->tables);

        $modelGenerator->generate();
    }

    public function setConnection($ConnectionName)
    {
        $this->connection = $this->connector->connect($ConnectionName);

        $this->meta  = new Meta($this->connection);

        return $this;
    }

    public function getDatabases()
    {
        return $this->meta->getDatabases();
    }

    public function getSchemas()
    {
        return $this->meta->getSchemas();
    }

    public function setSchema($schema)
    {
        $this->meta->setSchema($schema);

        return $this;
    }

    public function getTableMetadata()
    {
        return $this->tables = $this->meta->getTableMetadata();
    }










    
}