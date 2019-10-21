<?php

namespace App\Http\Controllers;

use App\Models\TgVisitante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TgVisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $tgVisitante = TgVisitante::with([])
                        ->get();
        
    return $tgVisitante;
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
'tx_nombres'	 => 	'required|alpha_num|max:50',
				'tx_apellidos'	 => 	'required|alpha_num|max:50',
				'nu_cedula'	 => 	'required|alpha_num|max:10',
				'tx_nacionalidad'	 => 	'required|alpha_num|max:1',
				'tx_foto'	 => 	'required|alpha_num|max:255',
				'tx_cod_pais'	 => 	'required|alpha_num|max:',
				'tx_telefono'	 => 	'required|alpha_num|max:20',
				'id_status'	 => 	'required|integer|max:10',
				'fe_creado'	 => 	'required|date',
				'fe_actualizado'	 => 	'required|date',
				'id_usuario'	 => 	'required|integer|max:10',
]);

$tgVisitante = tgVisitante::create($request->all());

return [ 'msj' => 'Registro Agregado Correctamente', compact('tgVisitante') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TgVisitante  $tgVisitante
     * @return \Illuminate\Http\Response
     */
    public function show(TgVisitante $tgVisitante)
    {
        return tgVisitante;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TgVisitante  $tgVisitante
     * @return \Illuminate\Http\Response
     */
    public function edit(TgVisitante $tgVisitante)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TgVisitante  $tgVisitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TgVisitante $tgVisitante)
    {
        $validate = request()->validate([
'id_visitante'	 => 	'required|integer|max:10',
				'tx_nombres'	 => 	'required|alpha_num|max:50',
				'tx_apellidos'	 => 	'required|alpha_num|max:50',
				'nu_cedula'	 => 	'required|alpha_num|max:10',
				'tx_nacionalidad'	 => 	'required|alpha_num|max:1',
				'tx_foto'	 => 	'required|alpha_num|max:255',
				'tx_cod_pais'	 => 	'required|alpha_num|max:',
				'tx_telefono'	 => 	'required|alpha_num|max:20',
				'id_status'	 => 	'required|integer|max:10',
				'fe_creado'	 => 	'required|date',
				'fe_actualizado'	 => 	'required|date',
				'id_usuario'	 => 	'required|integer|max:10',
]);

$tgVisitante = $tgVisitante->update($request->all());

return [ 'msj' => 'Registro Editado' , compact('tgVisitante')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TgVisitante  $tgVisitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(TgVisitante $tgVisitante)
    {
        $tgVisitante = $tgVisitante->delete();
 
return [ 'msj' => 'Registro Eliminado' , compact('tgVisitante')];
    }
}
