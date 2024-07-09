<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function obtenerProductosVista(){
        return view('productos.tabla_productos');
    }

    public function obtenerProductos()
    {
        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select('productos.*', 'categorias.nombre as nombre_categoria')
            ->get();
        return response()->json($productos);
    }

    public function obtenerProducto($id)
    {
        $producto = DB::table('productos')->where('id', $id)->first();
        return response()->json($producto);
    }

    public function actualizarProductoVista(Request $request)
    {
        return view('productos.update_producto', ['id' => $request->id]);
    }

    public function actualizarProducto(Request $request)
    {
        $data = $request->except(['_token', 'imagen']);
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $path;
        }
        $data['active'] = $request->has('active') ? true : false;

        DB::table('productos')
            ->where('id', $request->id)
            ->update($data);

        return redirect('/productos/vista');
    }

    public function insertarProductoVista()
    {
        return view('productos.insert_producto');
    }

    public function insertarProducto(Request $request)
    {
        $data = $request->except(['_token']);
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('images', 'public');
            $data['imagen'] = $path;

        }

        $data['active'] = $request->has('active') ? true : false;
        DB::table('productos')->insert($data);

        // DB::table('productos')->insert([
        //     'nombre' => $request->name,
        //     'detalle' => $request->detalle,
        //     'precio' => $request->precio,
        //     'categoria_id' => $request->categoria_id,
        //     'imagen' => $path,
        //     'active' => $request->has('active') ? true : false,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

    return redirect('/productos/vista');
}

    public function eliminarProducto($id)
    {
        DB::table('productos')
            ->where('id', $id)
            ->update(['active' => false]);

        return response()->json(['success' => true]);
    }
}
