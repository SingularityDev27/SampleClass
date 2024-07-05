<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Categorías</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="categorias-table-body">
                
            </tbody>
        </table>
        <a href="/categorias/insertar/vista" class="btn btn-primary">Insertar Categoría</a>
    </div>

    <script>
    function eliminarCategoria(id) {
        $.ajax({
            url: `/categorias/eliminar/${id}`,
            method: 'GET',
            success: function() {
                alert("Categoria eliminada con Exito")
                cargarCategorias();
            },
            error: function(error){
                alert("No se pudo borrar la Categoria")
                console.log(error)
            }
        });
    }

    function cargarCategorias() {
        $.ajax({
            url: '/categorias/obtener',
            method: 'GET',
            success: function(data) {
                const tableBody = $('#categorias-table-body');
                tableBody.empty();
                data.forEach(categoria => {
                    const row = `<tr>
                        <td>${categoria.id}</td>
                        <td>${categoria.nombre}</td>
                        <td>
                            <a href="/categorias/actualizar/vista?id=${categoria.id}" class="btn btn-warning">Actualizar</a>
                            <button type="button" class="btn btn-danger" onclick="eliminarCategoria(${categoria.id});">Eliminar</button>
                        </td>
                    </tr>`;
                    tableBody.append(row);
                });
            },
            error: function(error){
                console.log(error)
            }
        });
    }

        $(document).ready(function() {
            cargarCategorias();
        });
    </script>
</body>
</html>
