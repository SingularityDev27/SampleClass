<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel as ExcelFormat;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExcelController extends Controller
{
    public function exportarProductos()
    {
        // $productos = Producto::all(['id', 'nombre', 'detalle', 'precio', 'categoria_id', 'active', 'imagen', 'created_at', 'updated_at']);
        // $productosArray = $productos->toArray();

        $productos = DB::table('productos')
            ->join('categorias', 'productos.categoria_id', '=', 'categorias.id')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.detalle',
                'productos.precio',
                'productos.categoria_id',
                'categorias.nombre as categoria',
                'productos.active',
                'productos.imagen',
                'productos.created_at',
                'productos.updated_at'
            )
            ->get();

            $productosArray = $productos->map(function ($producto) {
                return [
                    'ID Prod' => $producto->id,
                    'Nombre' => $producto->nombre,
                    'Detalle' => $producto->detalle,
                    'Precio' => $producto->precio,
                    'ID Cat' => $producto->categoria_id,
                    'Categoría' => $producto->categoria,
                    'Activo' => $producto->active ? 'Sí' : 'No', //Condicion Ternaria, como si fuera un if pero simplificado
                    'Imagen' => $producto->imagen,
                    'Creado' => $producto->created_at,
                    'Actualizado' => $producto->updated_at,
                ];
            })->toArray();

        return Excel::download(new class($productosArray) implements FromArray, WithHeadings {
            protected $data;

            public function __construct(array $data)
            {
                $this->data = $data;
            }

            public function array(): array
            {
                return $this->data;
            }

            public function headings(): array
            {
                return [
                    'ID Prod',
                    'Nombre',
                    'Detalle',
                    'Precio',
                    'ID Cat',
                    'Categoría ID',
                    'Activo',
                    'Imagen',
                    'Creado',
                    'Actualizado',
                ];
            }
        }, 'productos.xlsx', ExcelFormat::XLSX);
    }
}
