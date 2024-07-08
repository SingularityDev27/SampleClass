<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-container {
            margin-top: 50px;
        }
    </style>
</head>
<body>
<div class="container profile-container">
    <h1>Perfil</h1>
    <form>
        @csrf
        <div class="form-group">
            <label for="name">ID:</label>
            <input type="text" name="id" class="form-control" value="{{ Auth::user()->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
        </div>
        <div class="form-group">
            <label for="created_at">Fecha de Registro:</label>
            <input type="text" name="created_at" class="form-control" value="{{ Auth::user()->created_at }}" readonly>
        </div>
    </form>
    <div class="d-grid gap-2">
        <a class="btn btn-primary" type="button" href="/logout">Logout</a>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>