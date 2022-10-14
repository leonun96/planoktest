<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
	use HasFactory;
	protected $table = "usuario";
	protected $guarded = [];
	protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['nombre'].' '.$attributes['apellido'],
        );
    }
	public function perfil ()
	{
		return $this->belongsTo(Perfil::class, 'idPerfil', 'idPerfil');
	}
}
