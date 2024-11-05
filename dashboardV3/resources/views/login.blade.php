<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">Iniciar Sesión</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="loginForm">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            <div id="error" class="alert alert-danger mt-3 d-none"></div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#loginForm').on('submit', function (e) {
            e.preventDefault();

            const email = $('#email').val();
            const password = $('#password').val();

            $.ajax({
                url: '/api/login', // Ruta a la API de autenticación
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ email, password }),
                success: function (response) {
                    // Almacena el token en el almacenamiento local
                    localStorage.setItem('token', response.token);
                    window.location.href = '/marcas'; // Redirige a la página de marcas o a donde prefieras
                },
                error: function (xhr) {
                    // Muestra el error en caso de que las credenciales no sean válidas
                    $('#error').removeClass('d-none').text(xhr.responseJSON.message || 'Error al iniciar sesión');
                }
            });
        });
    });
</script>
</body>
</html>
