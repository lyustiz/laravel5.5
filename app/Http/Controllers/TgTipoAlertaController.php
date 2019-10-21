<?php

namespace App\Http\Controllers;

use App\Models\TgTipoAlerta;
use Illuminate\Http\Request;

class TgTipoAlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tgTipoAlerta = TgTipoAlerta::with([])
                    ->get();
        
        return $tgTipoAlerta;
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
                'nb_tipo_alerta'    => 	'required|alpha_num|max:50',
				'nu_nivel_alerta'   => 	'required|numeric|max:1',
				'tx_imagen'         => 	'required|alpha_num|max:255',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
				'tx_accion'         => 	'required|alpha_num|max:200',
        ]);

        $tgTipoAlerta = tgTipoAlerta::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('tgTipoAlerta') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TgTipoAlerta  $tgTipoAlerta
     * @return \Illuminate\Http\Response
     */
    public function show(TgTipoAlerta $tgTipoAlerta)
    {
        return tgTipoAlerta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TgTipoAlerta  $tgTipoAlerta
     * @return \Illuminate\Http\Response
     */
    public function edit(TgTipoAlerta $tgTipoAlerta)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TgTipoAlerta  $tgTipoAlerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TgTipoAlerta $tgTipoAlerta)
    {
        $validate = request()->validate([
                'id_tipo_alerta'    => 	'required|integer|max:10',
				'nb_tipo_alerta'    => 	'required|alpha_num|max:50',
				'nu_nivel_alerta'   => 	'required|numeric|max:1',
				'tx_imagen'         => 	'required|alpha_num|max:255',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
				'tx_accion'         => 	'required|alpha_num|max:200',
        ]);

        $tgTipoAlerta = $tgTipoAlerta->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('tgTipoAlerta')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TgTipoAlerta  $tgTipoAlerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TgTipoAlerta $tgTipoAlerta)
    {
        $tgTipoAlerta = $tgTipoAlerta->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('tgTipoAlerta')];
    }
}
