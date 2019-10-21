<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrVisitanteAlerta extends Pivot
{
    protected $table 	  = 'tr_visitante_alerta';
	protected $primaryKey = 'id_visitante_alerta';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_visitante_alerta',
	 	 	 	 	 	 	'id_visitante',
	 	 	 	 	 	 	'id_tipo_alerta',
	 	 	 	 	 	 	'id_visita',
	 	 	 	 	 	 	'tx_motivo_alerta',
	 	 	 	 	 	 	'tx_anulacion',
	 	 	 	 	 	 	'id_status'
                            ]; 
    
    protected $hidden     = [
                            'id_usuario',
	 	 	 	 	 	 	'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];


}
