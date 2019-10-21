<?php

namespace App\Http\Controllers\CrudGenerate;

use App\Http\Controllers\CrudGenerate\Connection;

class CrudGenerate
{
    public function __construct(Connection $conection)
    {
        $conn = $conection->connect();

        dd($conection, $conn);
    }


    
}