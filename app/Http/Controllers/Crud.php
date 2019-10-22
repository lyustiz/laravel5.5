<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudGenerate\CrudGenerate;

class Crud extends Controller
{
    public $crud;

    public function __construct(CrudGenerate $crudGenerate)
    {
        $this->crud = $crudGenerate;
    }
    
    public function generate()
    {
        $databases = $this->crud->getDatabases();
        
        $schemas = $this->crud->getSchemas();

        $schema = 'corpovex_visitas';

        $tables = $this->crud->setSchema($schema)->getTableMetadata();
        
        $this->crud->generate();

        //$object = json_decode(json_encode($array), FALSE);

    }
}
