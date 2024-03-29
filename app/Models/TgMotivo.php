<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TgMotivo extends Pivot
{
    protected $table 	  = 'tg_motivo';
	protected $primaryKey = 'id_motivo';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_motivo',
	 	 	 	 	 	 	'nb_motivo',
	 	 	 	 	 	 	'id_status',
	 	 	 	 	 	 	'id_usuario'
                            ]; 
    
    protected $hidden     = [
                            'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];


}
