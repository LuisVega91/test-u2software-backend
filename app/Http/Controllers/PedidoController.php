<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $listaPedidos= Pedido::all();
        return $this->successResponse($listaPedidos,200);
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
            'referencia'=>$request->referencia,
            'entrego' =>$request->entrego,
            'total' =>$request->total
        ]);
        return $this->successResponse('Pedido Creado Exitosamente', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
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
      $pedido->update([
          'referencia'=>$request->referencia,
          'entrego' =>$request->entrego,
          'total' =>$request->total
      ]);
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
