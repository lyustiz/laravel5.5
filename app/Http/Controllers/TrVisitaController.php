<?php

namespace App\Http\Controllers;

use App\Models\TrVisita;
use Illuminate\Http\Request;

class TrVisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trVisita = TrVisita::with(['TgVisitante'])
                    ->get();
        
        return $trVisita;
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
				'id_ced_empleado'   => 	'required|integer|max:10',
				'id_empresa'        => 	'required|integer|max:10',
				'id_tipo_visitante' => 	'required|integer|max:10',
				'tx_cargo'          => 	'required|alpha_num|max:',
				'id_motivo'         => 	'required|integer|max:10',
				'tx_observaciones'  => 	'required|alpha_num|max:2000',
				'nu_carnet'         => 	'required|numeric|max:5',
				'fe_entrada'        => 	'required|date',
				'fe_salida'         => 	'required|date',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $trVisita = trVisita::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('trVisita') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrVisita  $trVisita
     * @return \Illuminate\Http\Response
     */
    public function show(TrVisita $trVisita)
    {
        return trVisita;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrVisita  $trVisita
     * @return \Illuminate\Http\Response
     */
    public function edit(TrVisita $trVisita)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrVisita  $trVisita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrVisita $trVisita)
    {
        $validate = request()->validate([
                'id_visita'         => 	'required|integer|max:10',
				'id_visitante'      => 	'required|integer|max:10',
				'id_ced_empleado'   => 	'required|integer|max:10',
				'id_empresa'        => 	'required|integer|max:10',
				'id_tipo_visitante' => 	'required|integer|max:10',
				'tx_cargo'          => 	'required|alpha_num|max:',
				'id_motivo'         => 	'required|integer|max:10',
				'tx_observaciones'  => 	'required|alpha_num|max:2000',
				'nu_carnet'         => 	'required|numeric|max:5',
				'fe_entrada'        => 	'required|date',
				'fe_salida'         => 	'required|date',
				'id_status'         => 	'required|integer|max:10',
				'fe_creado'         => 	'required|date',
				'fe_actualizado'    => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $trVisita = $trVisita->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('trVisita')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrVisita  $trVisita
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrVisita $trVisita)
    {
        $trVisita = $trVisita->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('trVisita')];
    }
}
