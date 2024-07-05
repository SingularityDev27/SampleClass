<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Productos</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Detalle</th>
                    <th>Precio</th>
                    <th>Imagen</th>
                    <th>Categoría</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="productos-table-body">
                
            </tbody>
        </table>
        <a href="/productos/insertar/vista" class="btn btn-primary">Insertar Producto</a>
    </div>

    <script>
        $(document).ready(function() {
            function cargarProductos() {
                $.ajax({
                    url: '/productos/obtener',
                    method: 'GET',
                    success: function(data) {
                        const tableBody = $('#productos-table-body');
                        tableBody.empty();
                        data.forEach(producto => {
                            const row = `<tr>
                                <td>${producto.nombre}</td>
                                <td>${producto.detalle}</td>
                                <td>${producto.precio}</td>
                                <td><img src="/storage/${producto.imagen}" alt="${producto.nombre}" width="50"></td>
                                <td>${producto.nombre_categoria}</td>
                                <td>${producto.active ? 'Sí' : 'No'}</td>
                                <td>
                                    <a href="/productos/actualizar/vista?id=${producto.id}" class="btn btn-warning">Actualizar</a>
                                    <button class="btn btn-danger" onclick="eliminarProducto(${producto.id})">Eliminar</button>
                                </td>
                            </tr>`;
                            tableBody.append(row);
                        });
                    }
                });
            }

            function eliminarProducto(id) {
                $.ajax({
                    url: `/productos/eliminar/${id}`,
                    method: 'GET',
                    success: function() {
                        cargarProductos();
                    },
                    error: function(error){
                        console.log(error)
                    }
                });
            }

            cargarProductos();
        });
    </script>
</body>
</html>
