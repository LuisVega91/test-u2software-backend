<?php

namespace App\Http\Controllers;

use App\DetallesPedido;
use App\Pedido;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $listaPedidos = [];
        if ($request->estado == "pendientes") {
            $listaPedidos = Pedido::where('entrego', false)->with('detalle')->get();
        } else if ($request->estado == "entregados") {
            $listaPedidos = Pedido::where('entrego', true)->with('detalle')->get();
        } else {
            $listaPedidos = Pedido::with('detalle')->get();
        }
        return $this->successResponse($listaPedidos, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pedido::create([
            'referencia' => $request->referencia,
            'entrego' => $request->entrego,
            'total' => $request->total
        ]);
        return $this->successResponse('Pedido Creado Exitosamente', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($pedido)
    {
        $pedido = Pedido::where('id', $pedido)->with('detalle')->first();

        return $this->successResponse($pedido, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {

        $pedidoIn =[];
        $request->referencia ? $pedidoIn['referencia'] = $request->referencia: null;
        $request->entrego ? $pedidoIn['entrego'] = $request->entrego: null;
        $request->total ? $pedidoIn['total'] = $request->total: null;
        $pedido->update($pedidoIn);
        return $this->successResponse($pedido, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return $this->successResponse('Pedido Eliminado Exitosamente', 200);
    }
}
