<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriasController extends Controller
{
    public function obtenerCategoriasVista(){
        return view('categorias.tabla_categorias');
    }

    public function obtenerCategorias()
    {
        $categorias = DB::table('categorias')->get();
        return response()->json($categorias);
    }

    public function obtenerCategoria($id)
    {
        $categoria = DB::table('categorias')->where('id', $id)->first();
        return response()->json($categoria);
    }

    public function actualizarCategoriaVista(Request $request)
    {
        return view('categorias.update_categoria', ['id' => $request->id]);
    }

    public function actualizarCategoria(Request $request)
    {
        $data = $request->except(['_token']);

        DB::table('categorias')
            ->where('id', $request->id)
            ->update($data);

        return redirect('/categorias/vista');
    }

    public function insertarCategoriaVista()
    {
        return view('categorias.insert_categoria');
    }

    public function insertarCategoria(Request $request)
    {
        $data = $request->except(['_token']);

        DB::table('categorias')->insert($data);

        return redirect('/categorias/vista');
    }

    public function eliminarCategoria($id)
    {
        DB::table('categorias')
            ->where('id', $id)
            ->delete();

        return response()->json(['success' => true]);
    }
}
