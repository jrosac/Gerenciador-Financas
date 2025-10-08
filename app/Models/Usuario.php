<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $guarded = [ 'id' ];

    function compras()
    {
        return $this->hasMany(Compra::class, 'usuario_id');
    }

    public function getAuthPassword()
    {
        return $this->senha;
    }
}
