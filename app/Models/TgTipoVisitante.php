<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TgTipoVisitante extends Pivot
{
    protected $table 	  = 'tg_tipo_visitante';
	protected $primaryKey = 'id_tipo_visitante';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_tipo_visitante',
	 	 	 	 	 	 	'nb_tipo_visitante',
	 	 	 	 	 	 	'id_status'
                            ]; 
    
    protected $hidden     = [
                            'id_usuario',
	 	 	 	 	 	 	'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];

    public function tgUsuario()
    {
        return $this->HasMany('App\Models\TgUsuario', 'id_usuario');
    } 
}
