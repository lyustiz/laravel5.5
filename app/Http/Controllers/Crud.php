<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CrudGenerate\CrudGenerate;

class Crud extends Controller
{
    public $crudGenerate;

    public function __construct(CrudGenerate $crudGenerate)
    {
        $this->crudGenerate = $crudGenerate;

        
    }
    
    public function generate()
    {
        dd($this->crudGenerate);
       // $conection->connect();
    
    }
}
