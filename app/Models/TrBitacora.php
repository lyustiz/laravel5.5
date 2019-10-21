<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TrBitacora extends Pivot
{
    protected $table 	  = 'tr_bitacora';
	protected $primaryKey = 'id_bitacora';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_bitacora',
	 	 	 	 	 	 	'co_accion',
	 	 	 	 	 	 	'tx_tabla',
	 	 	 	 	 	 	'in_id_tabla',
	 	 	 	 	 	 	'tx_old_valor',
	 	 	 	 	 	 	'tx_new_valor',
	 	 	 	 	 	 	'fe_accion'
                            ]; 
    
    protected $hidden     = [
                            'id_usuario',
	 	 	 	 	 	 	'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];


}
