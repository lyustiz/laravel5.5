<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | an array of paths that should be checked for your views. Of course
    | the usual Laravel view path has already been registered for you.
    |
    */

    'paths' => [
        'models'    => 'Models/',
        'views'     => 'resources/assets/js/vue/',
        'templates' => 'resources/templates/'
    ],

    'cols' => [
        'createdAt' => 'fe_creado',
        'updatedAt' => 'fe_actualizado',
        'hiddenCols'=> ['id_usuario' , 'fe_creado', 'fe_actualizado']
    ]
];