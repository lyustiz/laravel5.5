<?php

namespace App\Http\Controllers;

use App\Models\TrBitacora;
use Illuminate\Http\Request;

class TrBitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trBitacora = TrBitacora::with([])
                    ->get();
        
        return $trBitacora;
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
                'co_accion'         => 	'required|alpha_num|max:3',
				'tx_tabla'          => 	'required|alpha_num|max:255',
				'in_id_tabla'       => 	'required|integer|max:10',
				'tx_old_valor'      => 	'required|alpha_num|max:4000',
				'tx_new_valor'      => 	'required|alpha_num|max:4000',
				'fe_accion'         => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $trBitacora = trBitacora::create($request->all());

        return [ 'msj' => 'Registro Agregado Correctamente', compact('trBitacora') ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrBitacora  $trBitacora
     * @return \Illuminate\Http\Response
     */
    public function show(TrBitacora $trBitacora)
    {
        return trBitacora;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrBitacora  $trBitacora
     * @return \Illuminate\Http\Response
     */
    public function edit(TrBitacora $trBitacora)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TrBitacora  $trBitacora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrBitacora $trBitacora)
    {
        $validate = request()->validate([
                'id_bitacora'       => 	'required|integer|max:10',
				'co_accion'         => 	'required|alpha_num|max:3',
				'tx_tabla'          => 	'required|alpha_num|max:255',
				'in_id_tabla'       => 	'required|integer|max:10',
				'tx_old_valor'      => 	'required|alpha_num|max:4000',
				'tx_new_valor'      => 	'required|alpha_num|max:4000',
				'fe_accion'         => 	'required|date',
				'id_usuario'        => 	'required|integer|max:10',
        ]);

        $trBitacora = $trBitacora->update($request->all());

        return [ 'msj' => 'Registro Editado' , compact('trBitacora')];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrBitacora  $trBitacora
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrBitacora $trBitacora)
    {
        $trBitacora = $trBitacora->delete();
 
        return [ 'msj' => 'Registro Eliminado' , compact('trBitacora')];
    }
}
