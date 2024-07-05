<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Categoría</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1>Actualizar Categoría</h1>
        <form action="/categorias/actualizar" method="POST">
            @csrf
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const categoriaId = urlParams.get('id');
            
            if (categoriaId) {
                $.ajax({
                    url: `/categorias/obtener/${categoriaId}`,
                    method: 'GET',
                    success: function(categoria) {
                        $('#id').val(categoria.id);
                        $('#nombre').val(categoria.nombre);
                    },
                    error: function(error){
                        console.log(error)
                    }
                });
            }
        });
    </script>
</body>
</html>
