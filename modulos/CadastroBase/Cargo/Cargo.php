<?php

namespace Modulos\CadastroBase\Cargo;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model{

    protected $table      = "tb_cadastro_base_cargo";
    protected $primaryKey = 'CO_CADASTRO_BASE_CARGO';
	public $timestamps    = false;    	
	protected $fillable   = [
        'NO_CARGO',
		'DS_CARGO'
    ];
    
}