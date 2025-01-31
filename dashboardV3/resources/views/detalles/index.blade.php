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

    <!-- Enlace al archivo JS -->
    <script src="{{ asset('js/app.js')}}"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/date-1.5.4/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.13.6/dataRender/percentageBars.js"></script>
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
                    <li class="sidebar-item active">
                        <a class="sidebar-link" href="{{ route('detalles.index') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Detalle de Venta</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('detalles.vtaprdo') }}">
                            <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Ventas Por Periodo</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
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
							<a class="nav-link d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                                <span class="text-dark">username</span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"></path>
                                </svg>
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
                                    <label for="marca">Marca:</label>
                                    <select name="marca" id="marca" class="border-2">
                                        <option value="" selected>Selecciona una marca</option>
                                    </select>
                                    <label for="periodo">Periodo:</label>
										<select id="periodo" name="periodo" class="border-2">
											  <option value="" selected>Selcciona un Periodo</option>
											  <option  value="202401">ENERO</option>
											  <option value="202402">FEBRERO</option>
											  <option value="202403">MARZO</option>
											  <option value="202404">ABRIL</option>
											  <option value="202405">MAYO</option>
											  <option value="202406">JUNIO</option>
											  <option value="202407">JULIO</option>
											  <option value="202408">AGOSTO</option>
											  <option value="202409">SEPTIEMBRE</option>
											  <option value="202410">OCTUBRE</option>
											  <option value="202411">NOVIEMBRE</option>
											  <option value="202412">DICIEMBRE</option>
										</select>
							</div>
						</div>
				<!--pestañas para opciones de Venta por familias o por Vendedores-->
							<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
								<!--pestaña 1-->
  								<li class="nav-item" role="presentation">
    								<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Ventas Por Familias</button>
  								</li>
								<!--pestaña 2-->
  								<li class="nav-item" role="presentation">
    								<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Ventas Por Vendedores</button>
  								</li>
							</ul>
							<!--contenido de las pestañaas-->
								<div class="tab-content" id="pills-tabContent">
									<!--pestaña 1-->
  									<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
								  		<div class=" d-flex">
											<div class="card flex-fill ">
												<div class="card-header">
												<h5 class="card-title m-3">Tabla de Datos</h5>

												</div>
												<div class="card-body mx-1">
                                                    <table id="detallesTable" class="table table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Codigo</th>
                                                            <th>Periodo</th>
                                                            <th>Marca</th>
                                                            <th>Valor</th>
                                                            <th>Costo</th>
                                                            <th>Margen Soles</th>
                                                            <th>Fecha Procesada</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
												</div>
											</div>
										</div>
									</div>
								<!--pestaña 2-->
  								<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								  <div class=" d-flex">
											<div class="card flex-fill ">
												<div class="card-header">
												<h5 class="card-title m-3">Tabla de Datos</h5>
												<tbody class="m-5">

												</tbody>
												</div>
												<div class="card-body mx-1">
													<table id="myTable2"  class="table table-bordered table-hover table-striped m-3" style="width:100%">
    													<thead>
        													<tr>
                                                                <th>Codigo</th>
            													<th>Familia</th>
																<th>Valor</th>
																<th>Costo</th>
																<th>Margen</th>
																<th>Periodo</th>
																<th>Marca</th>
        													</tr>
    													</thead>
    													<tbody>
    													</tbody>
													</table>
												</div>
											</div>
										</div>
								</div>
							</div>
							<div class="row">
							<div class="col-12 col-lg-4 col-xxl-4 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Ventas Por Familia</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar1"></canvas>
									</div>
										</div>
									</div>
								</div>
							</div>
								<div class="col-12 col-lg-4 col-xxl-4 d-flex">
										<div class="card flex-fill">
											<div class="card-header">
												<h5 class="card-title mb-0">Ventas Por Periodo</h5>
											</div>
											<div class="card-body d-flex">
												<div class="align-self-center w-100">
												<div class="align-self-center chart chart-lg">
													<canvas id="chartjs-dashboard-bar2"></canvas>
												</div>
												</div>
											</div>
										</div>
									</div>

										<div class="col-12 col-lg-4 col-xxl-4 d-flex">
										<div class="card flex-fill">
											<div class="card-header">
												<h5 class="card-title mb-0">ULTIMAS VENTAS DIARIAS</h5>
											</div>
											<div class="card-body d-flex">
												<div class="align-self-center w-100">
												<div class="align-self-center chart chart-lg">
													<canvas id="chartjs-dashboard-bar3"></canvas>
												</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
		</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
	<script>
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
                    $('#marca').append(new Option(marca.marc_descc, marca.marc_codi));
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
        //tabla 1 god
        $(document).ready(function() {
            var allData = [];
            var token = localStorage.getItem('auth_token');
            // Inicializar DataTable
            var table = $('#detallesTable').DataTable({
                ajax: {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    },
                    url: "{{ route('api.detalles') }}",
                    dataSrc: function(json) {
                        allData = json;  // Guardar los datos completos en la variable
                        return json;  // Usar los datos para mostrar en la tabla
                    }
                },
                columns: [
                    {data: 'marc_codi'},
                    { data: 'periodo' },
                    { data: 'marca.marc_descc' }, // Mostrar el nombre de la marca
                    {
                        data: 'sum_valor',
                        render: function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                return compareWithPreviousPeriod(data, row.marca.marc_descc, row.periodo);
                            }
                            return data;
                        }
                    },
                    { data: 'sum_costo', render: $.fn.dataTable.render.number(',', '.', 2) },
                    {
                        data: null,
                        render: function(data, type, row) {
                            let valor = row.sum_valor || 0;
                            let costo = row.sum_costo || 0;
                            let margen = (valor - costo) / valor * 100;

                            if (!isFinite(margen) || margen < 0) {
                                margen = 0; // Ajusta valores inválidos a 0
                            }
                            return DataTable.render.percentBar(
                                'round', '#FFF', '#7abde6', '#2242b2', '#7abde6', 1, 'groove'
                            )(margen, type, row); // Renderiza la barra con el valor calculado
                        }
                    },
                    {
                        data: 'fecha_proc',
                        render: function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                if (data) {
                                    let date = new Date(data);
                                    let day = String(date.getDate()).padStart(2, '0');
                                    let month = String(date.getMonth() + 1).padStart(2, '0');
                                    let year = date.getFullYear();
                                    return `${day}/${month}/${year}`; // Formato DD/MM/YYYY
                                }
                                return ''; // Si el valor es nulo, devuelve una cadena vacía
                            }
                            return data;
                        }
                    }
                ],columnDefs: [ {
                    targets: 4, // Índice de la columna del margen
                    render: DataTable.render.percentBar(
                        'round',
                        '#FFF',
                        '#7abde6',
                        '#2242b2',
                        '#7abde6',
                        1,
                        'groove'
                    )
                } ],dom: "Bfrtip",
                buttons: [
                    { extend: 'excel',text: 'Exportar Excel<i class="fas fa-file-excel fa-lg"></i>',
                        className:'btn btn-success excel-exp'},
                    { extend: 'copy',text: 'Copiar Datos<i class="fas fa-file-excel fa-lg"></i>',
                        className:'btn btn-success excel-exp'},
                    { extend: 'csv',text: 'Exportar CSV<i class="fas fa-file-excel fa-lg"></i>',
                        className:'btn btn-success excel-exp'}
                ],

                select : true,
                responsive:true,
                paging: false,
                scrollCollapse: true,
                scrollY: '800px'
            });

            // Función para calcular el periodo anterior
            function calculatePreviousPeriod(currentPeriod) {
                let year = parseInt(currentPeriod.substring(0, 4));
                let month = parseInt(currentPeriod.substring(4, 6));
                if (month === 1) {
                    year -= 1;
                    month = 12;
                } else {
                    month -= 1;
                }
                return `${year}${String(month).padStart(2, '0')}`;
            }



            // Comparar el valor de `sum_valor` con el periodo anterior
            function compareWithPreviousPeriod(data, marca, periodo) {
                // Obtener el periodo anterior
                let previousPeriod = calculatePreviousPeriod(periodo);

                // Filtrar el dato de la marca para el periodo anterior
                let previousData = allData.filter(function(item) {
                    return item.marca.marc_descc === marca && item.periodo === previousPeriod;
                })[0];  // Obtener el primer elemento que coincide (suponiendo un valor por marca y periodo)

                if (previousData) {
                    let diff = data - previousData.sum_valor;
                    let percentage = previousData.sum_valor !== 0 ? ((diff / previousData.sum_valor) * 100).toFixed(2) : 0;
                    let arrow = diff > 0 ?
                        '<span style="color: green;">&#9650;</span>' :
                        diff < 0 ?
                            '<span style="color: red;">&#9660;</span>' :
                            '';
                    return `${$.fn.dataTable.render.number(',', '.', 2).display(data)}
                ${arrow} (${percentage}%)`;
                }
                return $.fn.dataTable.render.number(',', '.', 2).display(data);  // Si no hay datos anteriores
            }

            // Filtrar y comparar los datos en el cliente
            $('#periodo, #marca').on('change', function() {
                var selectedPeriodo = $('#periodo').val();

                // Obtener el texto de la opción seleccionada de 'marca'
                var selectedMarcaText = $('#marca option:selected').text();

                // Verificar si el valor es el del placeholder (vacío)
                var isPeriodoPlaceholder = selectedPeriodo === "";
                var isMarcaPlaceholder = selectedMarcaText === "Selecciona una marca";

                console.log('Periodo seleccionado:', selectedPeriodo);  // Verificar el valor seleccionado
                console.log('Marca seleccionada:', selectedMarcaText);  // Verificar el texto seleccionado (nombre de la marca)

                // Filtrar los datos locales
                var filteredData = allData.filter(function(item) {
                    var periodoMatch = isPeriodoPlaceholder || item.periodo === selectedPeriodo;  // Si es el placeholder, no filtrar por periodo
                    var marcaMatch = isMarcaPlaceholder || item.marca.marc_descc === selectedMarcaText;  // Si es el placeholder, no filtrar por marca
                    return periodoMatch && marcaMatch;
                });

                // Mostrar los datos filtrados en la tabla
                if (filteredData.length > 0) {
                    table.clear().rows.add(filteredData).draw();
                } else {
                    table.clear().draw();  // Si no hay datos, limpiar la tabla
                }
            });
        });


        document.addEventListener('DOMContentLoaded', () => {
            Chart.register(ChartDataLabels);
            fetch('{{ route('api.getEvolutivoDia') }}', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
        .then(response => response.json())
                .then(data => {
                    renderChart(data);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            fetch('{{ route('api.getEvolutivoPeriodo') }}', {
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            })
        .then(response => response.json())
                .then(data => {
                    renderChart2(data);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });

            function renderChart2(data) {
                const ctx = document.getElementById('chartjs-dashboard-bar2').getContext('2d');
                const labels = data.map(item => item.periodo);
                const values = data.map(item => parseFloat(item.total_ganancia));

                const presetColors = [
                    '#3498db',
                    '#2980b9',
                    '#90caf9',
                    '#7cb342',
                    '#4fc3f7',
                    '#607d8b',
                    '#00bcd4',
                    '#5e35b1',
                ];


                const backgroundColors = data.map((_, index) => {
                    return presetColors[index % presetColors.length];
                });

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Sales',
                            data: values,
                            backgroundColor: backgroundColors,
                        }]
                    },
                    plugins: [ChartDataLabels], // This is the correct place to declare the plugin.
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                color: 'black',
                                anchor: 'end',
                                align: 'top',
                                offset: 2,
                                font: {
                                    weight: 'bold',
                                    size: 11
                                },
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Ganancias (S/.)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Periodo'
                                }
                            }
                        }
                    }
                });
            }

            function renderChart(data) {
                const ctx = document.getElementById('chartjs-dashboard-bar3').getContext('2d');
                const labels = data.map(item => item.fecha_proc);
                const values = data.map(item => parseFloat(item.total_ganancia));

                const presetColors = [
                    '#3498db',
                    '#2980b9',
                    '#90caf9',
                    '#7cb342',
                    '#4fc3f7',
                    '#607d8b',
                    '#00bcd4',
                    '#5e35b1',
                ];


                const backgroundColors = data.map((_, index) => {
                    return presetColors[index % presetColors.length];
                });

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Total Sales',
                            data: values,
                            backgroundColor: backgroundColors,
                        }]
                    },
                    plugins: [ChartDataLabels], // This is the correct place to declare the plugin.
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                color: 'black',
                                anchor: 'end',
                                align: 'top',
                                offset: 2,
                                font: {
                                    weight: 'bold',
                                    size: 11
                                },
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                title: {
                                    display: true,
                                    text: 'Ganancias (S/.)'
                                }
                            },
                            x: {
                                title: {
                                    display: true,
                                    text: 'Fecha'
                                }
                            }
                        }
                    }
                });
            }
        });

	</script>
</body>
</html>
