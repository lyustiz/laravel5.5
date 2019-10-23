<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TgVisitante extends Pivot
{
    protected $table 	  = 'tg_visitante';
	protected $primaryKey = 'id_visitante';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_visitante',
	 	 	 	 	 	 	'tx_nombres',
	 	 	 	 	 	 	'tx_apellidos',
	 	 	 	 	 	 	'nu_cedula',
	 	 	 	 	 	 	'tx_nacionalidad',
	 	 	 	 	 	 	'tx_foto',
	 	 	 	 	 	 	'tx_cod_pais',
	 	 	 	 	 	 	'tx_telefono',
	 	 	 	 	 	 	'id_status',
	 	 	 	 	 	 	'id_usuario'
                            ]; 
    
    protected $hidden     = [
                            'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];


}
