<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Marcas</title>
    <!-- Incluir los estilos de DataTables y Chart.js -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
</head>
<body>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        var token = localStorage.getItem('token');

        $('#marcaTable').DataTable({
            ajax: {
                url: '/api/data',
                type: 'GET',
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                dataSrc: 'data',
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
                { data: 'marc_cuota', title: 'Cuota' },
                { data: 'marc_char2', title: 'Char2' },
                { data: 'marc_ucre', title: 'Creado Por' },
                { data: 'marc_fcre', title: 'Fecha de Creación' },
                { data: 'marc_umod', title: 'Modificado Por' },
                { data: 'marc_fmod', title: 'Fecha de Modificación' },
                { data: 'checked', title: 'Revisado' }
            ]
        });

    });


</script>
</body>
</html>
