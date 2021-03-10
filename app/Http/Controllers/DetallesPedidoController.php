<?php

namespace App\Http\Controllers;

use App\DetallesPedido;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class DetallesPedidoController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detallesPedido =DetallesPedido::with(['producto','pedido'])->get();
        return $this->successResponse($detallesPedido,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DetallesPedido::create([
            "producto_id" => $request->producto_id,
            "pedido_id" => $request->pedido_id,
            "cantidad" => $request->cantidad
        ]);
        return $this->successResponse('Detalle Pedido Creado Exitosamente', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetallesPedido  $detallesPedido
     * @return \Illuminate\Http\Response
     */
    public function show(DetallesPedido $detallesPedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetallesPedido  $detallesPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetallesPedido $detallePedido)
    {
        $detallePedido->update([
            "producto_id" => $request->producto_id,
            "pedido_id" => $request->pedido_id,
            "cantidad" => $request->cantidad
        ]);
        return $this->successResponse($detallePedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetallesPedido  $detallesPedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetallesPedido $detallePedido)
    {
        $detallePedido->delete();
        return $this->successResponse('Detalle Pedido Eliminado Exitosamente', 200);
    }
}
