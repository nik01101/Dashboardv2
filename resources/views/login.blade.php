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
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        // Datos del formulario
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Enviar la solicitud de login
        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ email: email, password: password })
        })
            .then(response => response.json())
            .then(data => {
                if (data.access_token) {
                    // Guardar el token en localStorage
                    localStorage.setItem('auth_token', data.access_token);

                    // Redirigir a la vista de marcas
                    window.location.href = '/marcas';
                } else {
                    alert('Credenciales incorrectas');
                }
            })
            .catch(error => console.error('Error:', error));
    });
</script>
</body>
</html>
