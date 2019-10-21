<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TgUsuario extends Pivot
{
    protected $table 	  = 'tg_usuario';
	protected $primaryKey = 'id_usuario';
	
	const 	  CREATED_AT  = 'fe_creado';
	const 	  UPDATED_AT  = 'fe_actualizado';

    protected $fillable   = [
                            'id_empleado',
	 	 	 	 	 	 	'id_tipo_usuario',
	 	 	 	 	 	 	'nb_usuario',
	 	 	 	 	 	 	'tx_password',
	 	 	 	 	 	 	'tx_correo',
	 	 	 	 	 	 	'id_status',
	 	 	 	 	 	 	'id_usuario_c'
                            ]; 
    
    protected $hidden     = [
                            'id_usuario',
	 	 	 	 	 	 	'fe_creado',
	 	 	 	 	 	 	'fe_actualizado'
                            ];

    public function tgEmpleado()
    {
        return $this->HasMany('App\Models\TgEmpleado', 'id_empleado');
    } 

    public function tgTipoUsuario()
    {
        return $this->HasMany('App\Models\TgTipoUsuario', 'id_tipo_usuario');
    } 
}
