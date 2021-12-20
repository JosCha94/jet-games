<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['productos'] = Productos::paginate(100);
        return view('AdminSite.Productos.products', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosProducto = $request->except('_token');
        if($request->hasFile('imagen')){          
            $datosProducto['imagen'] = $request->file('imagen')->store('uploads','public');
        }

        productos::insert($datosProducto);

        // return response()->json($datosProducto);
        return redirect()->route('listproducts')->with('mensajeinsert', 'Producto agregado con exito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos=Productos::findOrFail($id);
        return view('AdminSite.Productos.editproduct', compact('productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datosProducto = $request->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $productos=productos::findOrFail($id);
            Storage::delete('public/'.$productos->imagen);
            $datosProducto['imagen'] = $request->file('imagen')->store('uploads','public');
        }
        productos::where('id', $id)->update($datosProducto);

        $productos=productos::findOrFail($id);
        return redirect()->route('listproducts')->with('mensajeupdate', 'Producto actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productos=productos::findOrFail($id);
        if(Storage::delete('public/'.$productos->imagen)){
            productos::destroy($id);
        }
        return redirect()->route('listproducts')->with('mensajedelete', 'Producto borrado');
    }
}
