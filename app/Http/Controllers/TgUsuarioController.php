<?php

namespace App\Http\Controllers;

use App\Models\TgUsuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TgUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tgUsuario = TgUsuario::with(['TgEmpleado', 'TgTipoUsuario'])
                    ->get();
        
        return $tgUsuario;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'id_empleado'       => 	'required|integer|max:10',
			'id_tipo_usuario'   => 	'required|integer|max:10',
			'nb_usuario'        => 	'required|alpha_num|max:50',
			'tx_password'       => 	'required|alpha_num|max:32',
			'tx_correo'         => 	'required|alpha_num|max:50',
			'id_status'         => 	'required|integer|max:10',
			'id_usuario_c'      => 	'required|integer|max:10',
        ]);

        $tgUsuario = tgUsuario::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('tgUsuario') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TgUsuario  $tgUsuario
     * @return \Illuminate\Http\Response
     */
    public function show(TgUsuario $tgUsuario)
    {
        return $tgUsuario;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TgUsuario  $tgUsuario
     * @return \Illuminate\Http\Response
     */
    public function edit(TgUsuario $tgUsuario)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TgUsuario  $tgUsuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TgUsuario $tgUsuario)
    {
        $validate = request()->validate([
            'id_usuario'        => 	'required|integer|max:10',
			'id_empleado'       => 	'required|integer|max:10',
			'id_tipo_usuario'   => 	'required|integer|max:10',
			'nb_usuario'        => 	'required|alpha_num|max:50',
			'tx_password'       => 	'required|alpha_num|max:32',
			'tx_correo'         => 	'required|alpha_num|max:50',
			'id_status'         => 	'required|integer|max:10',
			'id_usuario_c'      => 	'required|integer|max:10',
        ]);

        $tgUsuario = $tgUsuario->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('tgUsuario')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TgUsuario  $tgUsuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(TgUsuario $tgUsuario)
    {
        $tgUsuario = $tgUsuario->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('tgUsuario')];
    }
}
