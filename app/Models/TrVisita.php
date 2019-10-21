<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrVisita extends Pivot
{
    protected $table 	  = 'tr_visita';
	protected $primaryKey = 'id_visita';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_visita',
	 	 	 	 	 	 	'id_visitante',
	 	 	 	 	 	 	'id_ced_empleado',
	 	 	 	 	 	 	'id_empresa',
	 	 	 	 	 	 	'id_tipo_visitante',
	 	 	 	 	 	 	'tx_cargo',
	 	 	 	 	 	 	'id_motivo',
	 	 	 	 	 	 	'tx_observaciones',
	 	 	 	 	 	 	'nu_carnet',
	 	 	 	 	 	 	'fe_entrada',
	 	 	 	 	 	 	'fe_salida',
	 	 	 	 	 	 	'id_status'
                            ]; 
    
    protected $hidden     = [
                            'id_usuario',
	 	 	 	 	 	 	'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];

    public function tgVisitante()
    {
        return $this->HasMany('App\Models\TgVisitante', 'id_visitante');
    } 
}
