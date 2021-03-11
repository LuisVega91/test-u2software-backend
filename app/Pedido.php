<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'referencia',
        'entrego',
        'total'
    ];

    public function detalle()
    {
        return $this->hasMany(DetallesPedido::class)->with(['producto', 'inventario']);
    }
}
