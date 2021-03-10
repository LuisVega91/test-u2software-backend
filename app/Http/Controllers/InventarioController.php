<?php

namespace App\Http\Controllers;

use App\Inventario;
use App\Proveedore;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    use ApiResponser;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intentario = Inventario::with(['producto','proveedor'])->get();
        return $this->successResponse($intentario,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inventarios = Inventario::create([
            "producto_id" => $request->producto_id,
            "proveedor_id" => $request->proveedor_id,
            "cantidad" => $request->cantidad
        ]);
        return $this->successResponse($inventarios, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function show(Inventario $inventario)
    {
        return $this->successResponse($inventario, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $inventario->update([
            "producto_id" => $request->producto_id,
            "proveedor_id" => $request->proveedor_id,
            "cantidad" => $request->cantidad
        ]);
        return $this->successResponse($inventario, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return $this->successResponse('Inventario Eliminado Exitosamente', 200);
    }
}
