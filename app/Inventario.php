<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'producto_id',
        'proveedor_id',
        'cantidad'
    ];

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id','producto_id');
    }

    public function proveedor()
    {
        return $this->hasOne(Proveedore::class, 'id','proveedor_id');
    }
}
