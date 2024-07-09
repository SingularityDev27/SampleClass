<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Producto</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Insertar Producto</h1>
        <form action="/productos/insertar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="detalle">Detalle</label>
                <input type="text" id="detalle" name="detalle" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" step="0.01" id="precio" name="precio" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" class="form-control-file" required accept=".png,.jpg,.jpeg">
            </div>
            <div class="form-group">
                <label for="categoria_id">Categoría</label>
                <select id="categoria_id" name="categoria_id" class="form-control" required>
                    
                </select>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" id="active" name="active" class="form-check-input">
                <label for="active" class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary">Insertar Producto</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            function cargarCategorias() {
                $.ajax({
                    url: '/categorias/obtener',
                    method: 'GET',
                    success: function(data) {
                        console.log(data)
                        const categorySelect = $('#categoria_id');
                        data.forEach(categoria => {
                            const option = `<option value="${categoria.id}">${categoria.nombre}</option>`;
                            categorySelect.append(option);
                        });
                    },
                    error: function(error){
                        console.log(error)
                    }
                });
            }

            cargarCategorias();
        });
    </script>
</body>
</html>
