<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />

	<title>Dashboard Version 1.0</title>

    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/date-1.5.4/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/datatables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar collapsed">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="index.html">
          			<span class="align-middle">Dashboard</span>
        		</a>
				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Paginas
					</li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('detalles.index') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Detalle de Venta</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('detalles.vtaprdo') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Ventas Por Periodo</span>
                        </a>
                    </li>

                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="{{ route('detalles.stckmrca') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Detalle Por Marca</span>
                        </a>
                    </li>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle m-1">
          			<i class="hamburger align-self-center "></i>
        		</a>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                				 <span class="text-dark">username</span>
              				</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#" id="logoutButton">Log out</a>
							</div>

					</ul>
				</div>
			</nav>

			<main class="content">
            <div class="card flex-fill">
							<div class="card-header">
							<h2>Detalle de Venta Por Marca</h2>
							<h5 id="marcanom">Marca:</h5>
                                <label for="marca">Marca:</label>
                                <select name="marca" id="marca" class="border-2">
                                    <option value="" selected>Selecciona una marca</option>
                                </select>
							</div>
						</div>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								<!--pestaña 1-->
  								<li class="nav-item" role="presentation">
    								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Stock Detallado</button>
  								</li>
								<!--pestaña 2-->
  								<li class="nav-item" role="presentation">
    								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Notas De Ingreso</button>
  								</li>
							</ul>
						<div class="card flex-fill">
							<div class="card-header">
							<h2>Detalle Stock Por Marca</h2>
							<div class="row justify-content-start">
    						<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        						<h4 id="fecreport">Fecha de Reporte: </h4>
        						<h4>Stock Valorado: <input id="valoradostk" type="text" size="9" disabled/></h4>
        						<h4 id="variaciontotstk">Variacion: </h4>
    						</div>
    						<div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
        						<h4>Promedio Costo T2: <input id="promediot2stk" type="text" size="9" disabled/></h4>
    						</div>
    						<div class="col-12 col-sm-12 col-md-4 col-lg-6 col-xl-8">
        						<h4>Dias Stock: <input id="diastockmarc" type="text" size="9" disabled/></h4>
    						</div>
						</div>

							</div>
								<div class="card-body mx-1">
													<table id="myTable4"  class="table table-bordered table-hover table-striped m-3" style="width:100%">
    													<thead>
        													<tr>
                                                                <th>Marca codigo</th>
                                                                <th>Familia</th>
            													<th>Codigo de Producto</th>
																<th>Producto</th>
																<th>Unidad</th>
																<th>Cantidad</th>
																<th>Costo</th>
																<th>Costo Total</th>
        													</tr>
    													</thead>
    													<tbody>
    													</tbody>
													</table>
								</div>
						</div>
		</div>
	</div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/date-1.5.4/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.13.6/dataRender/percentageBars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script><script>
        var token = localStorage.getItem('auth_token');
        $.ajax({
            url: '/api/data',
            type: "GET",
            "paging": false,
            headers: {
                'Authorization': `Bearer ${token}`
            },
            dataType: "json",
            success: function(marcas) {
                $.each(marcas, function(index, marca) {
                    $('#marca').append(new Option(marca.marc_descl, marca.marc_codi));
                });
            },
            error: function() {
                alert("Error al cargar las marcas.");
            }
        });

        // Obtén el botón de logout y añade un evento de clic
        document.getElementById('logoutButton').addEventListener('click', function() {
            logout();
        });
        //logout codigo
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

        //
        $(document).ready(function() {
        var allData = [];
        var token = localStorage.getItem('auth_token');
        // Inicializar DataTable
        var table = $('#myTable4').DataTable({
            ajax: {
                headers: {
                    'Authorization': `Bearer ${token}`
                },
                url: "{{ route('api.getStock') }}",
                dataSrc: function(json) {
                    allData = json;  // Guardar los datos completos en la variable
                    return json;  // Usar los datos para mostrar en la tabla
                }
            },
            columns: [
                { data: 'marc_codi' },
                { data: 'familia.fami_descl'},
                { data: 'prod_codi' },
                { data: 'prod_desc' },
                { data: 'prod_unid' },
                { data: 'prod_cant' },
                { data: 'prod_costo'},
                { data: 'prod_stot'},
            ],columnDefs: [
                {
                    target: 0,
                    visible: false,
                    searchable: true
                }],dom: "Bfrtip",
            buttons: [
                { extend: 'excel',text: 'Exportar Excel<i class="fas fa-file-excel fa-lg"></i>',
                    className:'btn btn-success excel-exp'},
                { extend: 'copy',text: 'Copiar Datos<i class="fas fa-file-excel fa-lg"></i>',
                    className:'btn btn-success excel-exp'},
                { extend: 'csv',text: 'Exportar CSV<i class="fas fa-file-excel fa-lg"></i>',
                    className:'btn btn-success excel-exp'}
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            },
            select : true,
            responsive:true,
            paging: false,
            scrollCollapse: true,
            scrollY: '800px'
        });

        // Filtrar y comparar los datos en el cliente
        $('#marca').on('change', function() {

            // Obtener el texto de la opción seleccionada de 'marca'
            var selectedMarcaText = $('#marca option:selected').text();

            // Verificar si el valor es el del placeholder (vacío)
            var isMarcaPlaceholder = selectedMarcaText === "Selecciona una marca";

            console.log('Marca seleccionada:', selectedMarcaText);  // Verificar el texto seleccionado (nombre de la marca)

            // Filtrar los datos locales
            var filteredData = allData.filter(function(item) {
                var marcaMatch = isMarcaPlaceholder || item.marca.marc_descl === selectedMarcaText;  // Si es el placeholder, no filtrar por marca
                return marcaMatch;
            });

            // Mostrar los datos filtrados en la tabla
            if (filteredData.length > 0) {
                table.clear().rows.add(filteredData).draw();
            } else {
                table.clear().draw();  // Si no hay datos, limpiar la tabla
            }
        });
        });


	</script>
</body>
</html>
