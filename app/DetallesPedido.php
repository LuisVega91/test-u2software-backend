<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetallesPedido extends Model
{
    use SoftDeletes;
    protected $table ='detalles_pedidos';


    protected $fillable =[
        'producto_id',
        'pedido_id',
        'cantidad'
    ];

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id','producto_id');
    }

    public function inventario()
    {
        return $this->hasOne(Inventario::class, 'producto_id','producto_id')->with('proveedor');
    }
}
