<?php

namespace App\Http\Controllers;

use App\Models\TrVisitanteAlerta;
use Illuminate\Http\Request;

class TrVisitanteAlertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trVisitanteAlerta = TrVisitanteAlerta::with([])
                    ->get();
        
        return $trVisitanteAlerta;
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
                'id_visitante'      => 	'required|integer|max:10',
				'id_tipo_alerta'    => 	'required|integer|max:10',
				'id_visita'         => 	'required|integer|max:10',
				'tx_motivo_alerta'  => 	'required|alpha_num|max:255',
				'tx_anulacion'      => 	'required|alpha_num|max:255',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $trVisitanteAlerta = trVisitanteAlerta::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('trVisitanteAlerta') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrVisitanteAlerta  $trVisitanteAlerta
     * @return \Illuminate\Http\Response
     */
    public function show(TrVisitanteAlerta $trVisitanteAlerta)
    {
        return trVisitanteAlerta;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrVisitanteAlerta  $trVisitanteAlerta
     * @return \Illuminate\Http\Response
     */
    public function edit(TrVisitanteAlerta $trVisitanteAlerta)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrVisitanteAlerta  $trVisitanteAlerta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrVisitanteAlerta $trVisitanteAlerta)
    {
        $validate = request()->validate([
                'id_visitante_alerta'=> 	'required|integer|max:10',
				'id_visitante'      => 	'required|integer|max:10',
				'id_tipo_alerta'    => 	'required|integer|max:10',
				'id_visita'         => 	'required|integer|max:10',
				'tx_motivo_alerta'  => 	'required|alpha_num|max:255',
				'tx_anulacion'      => 	'required|alpha_num|max:255',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $trVisitanteAlerta = $trVisitanteAlerta->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('trVisitanteAlerta')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrVisitanteAlerta  $trVisitanteAlerta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrVisitanteAlerta $trVisitanteAlerta)
    {
        $trVisitanteAlerta = $trVisitanteAlerta->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('trVisitanteAlerta')];
    }
}
