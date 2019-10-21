<?php

namespace App\Http\Controllers;

use App\Models\TgMotivo;
use Illuminate\Http\Request;

class TgMotivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tgMotivo = TgMotivo::with([])
                    ->get();
        
        return $tgMotivo;
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
                'nb_motivo'         => 	'required|alpha_num|max:255',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $tgMotivo = tgMotivo::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('tgMotivo') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TgMotivo  $tgMotivo
     * @return \Illuminate\Http\Response
     */
    public function show(TgMotivo $tgMotivo)
    {
        return tgMotivo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TgMotivo  $tgMotivo
     * @return \Illuminate\Http\Response
     */
    public function edit(TgMotivo $tgMotivo)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TgMotivo  $tgMotivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TgMotivo $tgMotivo)
    {
        $validate = request()->validate([
                'id_motivo'         => 	'required|integer|max:10',
				'nb_motivo'         => 	'required|alpha_num|max:255',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $tgMotivo = $tgMotivo->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('tgMotivo')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TgMotivo  $tgMotivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(TgMotivo $tgMotivo)
    {
        $tgMotivo = $tgMotivo->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('tgMotivo')];
    }
}
