<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Marcas</title>

    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Enlace al archivo JS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-html5-3.1.2/date-1.5.4/r-3.0.3/sc-2.4.3/sl-2.1.0/datatables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/v/dt/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-html5-3.1.2/date-1.5.4/r-3.0.3/sc-2.4.3/sl-2.1.0/datatables.min.js"></script>




</head>
<body>
<button id="logoutButton">Cerrar sesión</button>

<h1>Listado de Marcas</h1>

<!-- Tabla de Marcas -->
<table id="marcaTable" class="display">
    <thead>
    <tr>
        <th>Código</th>
        <th>Descripción Corta</th>
        <th>Descripción Larga</th>
        <th>Estado</th>
        <th>Cuota</th>
    </tr>
    </thead>
    <tbody>
    <!-- Se llenará automáticamente con JavaScript -->
    </tbody>
</table>

<!-- Gráfico de Marcas -->
<canvas id="marcaChart"></canvas>

<!-- Scripts -->


<script>
    $(document).ready(function() {
        var token = localStorage.getItem('auth_token');

        $('#marcaTable').DataTable({
            ajax: {
                url: '/api/data',
                type: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                "paging": true,
                "pageLength": 10,
                buttons: [
                    { extend: 'excel',text: 'Exportar Excel<i class="fas fa-file-excel fa-lg"></i>',
                        className:'btn btn-success excel-exp'},
                    { extend: 'copy',text: 'Copiar Datos<i class="fas fa-file-excel fa-lg"></i>',
                        className:'btn btn-success excel-exp'},
                    { extend: 'csv',text: 'Exportar CSV<i class="fas fa-file-excel fa-lg"></i>',
                        className:'btn btn-success excel-exp'}
                ],
                dataSrc: '',
                error: function(xhr) {
                    if (xhr.status === 401) {
                        alert('No autorizado. Por favor, inicie sesión nuevamente.');
                    }
                }
            },
            columns: [
                { data: 'marc_codi', title: 'Código' },
                { data: 'marc_descl', title: 'Descripción Larga' },
                { data: 'marc_descc', title: 'Descripción Corta' },
                { data: 'estado', title: 'Estado' },
                { data: 'marc_cuota', title: 'Cuota' }
            ]
        });


    });
</script>
<script>
    // Obtén el botón de logout y añade un evento de clic
    document.getElementById('logoutButton').addEventListener('click', function() {
        logout();
    });

    function logout() {
        fetch('/api/logout', {
            method: 'POST',
            headers: {
                'Authorization': 'Bearer ' + localStorage.getItem('auth_token'), // Token almacenado en localStorage
                'Content-Type': 'application/json'
            }
        })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Sesión cerrada exitosamente') {
                    alert(data.message);
                    localStorage.removeItem('auth_token'); // Eliminar el token del almacenamiento
                    window.location.href = '/login'; // Redireccionar a la página de login
                } else {
                    alert('Error al cerrar sesión');
                }
            })
            .catch(error => console.error('Error:', error));
    }
</script>
</body>
</html>
