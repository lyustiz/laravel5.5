<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TgTipoAlerta extends Pivot
{
    protected $table 	  = 'tg_tipo_alerta';
	protected $primaryKey = 'id_tipo_alerta';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_tipo_alerta',
	 	 	 	 	 	 	'nb_tipo_alerta',
	 	 	 	 	 	 	'nu_nivel_alerta',
	 	 	 	 	 	 	'tx_imagen',
	 	 	 	 	 	 	'id_status',
	 	 	 	 	 	 	'tx_accion'
                            ]; 
    
    protected $hidden     = [
                            'id_usuario',
	 	 	 	 	 	 	'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];


}
