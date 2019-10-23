<?php

namespace App\Http\Controllers;

use App\Models\TgTipoVisitante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TgTipoVisitanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tgTipoVisitante = TgTipoVisitante::with(['TgUsuario'])
                    ->get();
        
        return $tgTipoVisitante;
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
            'id_usuario'        => 	'required|integer|max:10',
			'nb_tipo_visitante' => 	'required|alpha_num|max:255',
			'id_status'         => 	'required|integer|max:10',
        ]);

        $tgTipoVisitante = tgTipoVisitante::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('tgTipoVisitante') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TgTipoVisitante  $tgTipoVisitante
     * @return \Illuminate\Http\Response
     */
    public function show(TgTipoVisitante $tgTipoVisitante)
    {
        return $tgTipoVisitante;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TgTipoVisitante  $tgTipoVisitante
     * @return \Illuminate\Http\Response
     */
    public function edit(TgTipoVisitante $tgTipoVisitante)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TgTipoVisitante  $tgTipoVisitante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TgTipoVisitante $tgTipoVisitante)
    {
        $validate = request()->validate([
            'id_tipo_visitante' => 	'required|integer|max:10',
			'id_usuario'        => 	'required|integer|max:10',
			'nb_tipo_visitante' => 	'required|alpha_num|max:255',
			'id_status'         => 	'required|integer|max:10',
        ]);

        $tgTipoVisitante = $tgTipoVisitante->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('tgTipoVisitante')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TgTipoVisitante  $tgTipoVisitante
     * @return \Illuminate\Http\Response
     */
    public function destroy(TgTipoVisitante $tgTipoVisitante)
    {
        $tgTipoVisitante = $tgTipoVisitante->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('tgTipoVisitante')];
    }
}
