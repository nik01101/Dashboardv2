<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="preconnect" href="https://fonts.gstatic.com">

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

                    <li class="sidebar-item active">
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
			<!--Tarjeta flotante para la tabla de familias cuando se seleccione marca-->
			<div class="card fixed-top mx-auto d-none" style="max-height: 90%; max-width: 90%; top: 50%; transform: translateY(-50%);" id="floatingCard">
    			<div class="card-header">
        			DataTable
        			<button type="button" class="btn-close float-end" aria-label="Close" id="closeDataTableBtn"></button>
    			</div>
    			<div class="card-body" style="overflow-y: auto;">
        			<div class="table-responsive">
            			<table id="xd" class="table table-striped" style="width:100%;">
                			<thead>
                    			<tr>
                        			<th>Codigo</th>
                        			<th>familia</th>
                        			<th>Familia Desc.</th>
                        			<th>Valor</th>
                        			<th>Margen</th>
                    			</tr>
                			</thead>
                			<tbody>
                			</tbody>
            			</table>
        			</div>
    			</div>
			</div>


			<main class="content">

						<div class="card flex-fill">
							<div class="card-header">
							<h2>Ventas Por Periodo</h2>
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
							<div class="card-body mx-1">
								<table id="tablaporperiodo"   class="table table-striped" style="width:100%">
    								<thead>
        								<tr>
            								<th>Codigo</th>
            								<th>Marca</th>
											<th>Familia.</th>
											<th>Valor</th>
											<th>Costo</th>
											<th>Margen</th>
        								</tr>
    								</thead>
    								<tbody>
    								</tbody>
								</table>
							</div>
						</div>
						<div class="row justify-content-center">
    <div class="col-12 col-lg-4 col-xxl-4 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">COMPOSICION DE VENTAS</h5>
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
                <h5 class="card-title mb-0">EVOLUCION DE VENTAS</h5>
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
</div>

							<div class="row">
							<div class="col-12">
										<div class="card flex-fill">
											<div class="card-header">
												<h5 class="card-title mb-0">ULTIMAS VENTAS DIARIAS</h5>
												<h3 class="card-title mb-0">Por Periodo</h3>
                                                <select id="periodoch" class="border-2">
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
										<h3 class="card-title mb-0">Por Rango</h3>
										<div class="row">
                                            <div>
                                                <label for="startDate" >Por Rango</label>
                                                <input type="text" id="startDate" placeholder="Start Date" class="border-2"/>
                                                <input type="text" id="endDate" placeholder="End Date" class="border-2"/>
                                            </div>

                                            <button id="filterBtn">Filter</button>
    								</div>
											</div>
											<div class="card-body d-flex">
												<div class="align-self-center w-100">
												<div class="align-self-center chart chart-lg">
													<canvas id="graficoDiario"></canvas>
												</div>
												</div>
											</div>
										</div>
									</div>
							</div>
						</div>
			</main>
		</div>
	</div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-html5-3.2.0/date-1.5.4/r-3.0.3/sc-2.4.3/sb-1.8.1/sp-2.3.3/sl-2.1.0/datatables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.13.6/dataRender/percentageBars.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



    <script>
        Chart.register(ChartDataLabels);
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
            var table = $('#tablaporperiodo').DataTable({
                ajax: {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    },
                    url: "{{ route('api.vtaprdo') }}",
                    dataSrc: function(json) {
                        allData = json;  // Guardar los datos completos en la variable
                        return json;  // Usar los datos para mostrar en la tabla
                    }
                },
                columns: [
                    {data: 'periodo'},
                    { data: 'marca.marc_descl' },
                    { data: 'familia.fami_descl' },
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
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                },
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
            $('#periodo').on('change', function() {
                var selectedPeriodo = $('#periodo').val();

                // Obtener el texto de la opción seleccionada de 'marca'

                // Verificar si el valor es el del placeholder (vacío)
                var isPeriodoPlaceholder = selectedPeriodo === "";

                console.log('Periodo seleccionado:', selectedPeriodo);  // Verificar el valor seleccionado

                // Filtrar los datos locales
                var filteredData = allData.filter(function(item) {
                    var periodoMatch = isPeriodoPlaceholder || item.periodo === selectedPeriodo;  // Si es el placeholder, no filtrar por periodo// Si es el placeholder, no filtrar por marca
                    return periodoMatch;
                });

                // Mostrar los datos filtrados en la tabla
                if (filteredData.length > 0) {
                    table.clear().rows.add(filteredData).draw();
                } else {
                    table.clear().draw();  // Si no hay datos, limpiar la tabla
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            // Inicialización de Flatpickr para startDate y endDate
            const startDatePicker = flatpickr("#startDate", {
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    // Configura el mínimo para el endDatePicker basado en el startDate seleccionado
                    endDatePicker.set("minDate", dateStr);
                },
            });

            const endDatePicker = flatpickr("#endDate", {
                dateFormat: "Y-m-d",
            });

            // Variable global para almacenar la instancia del gráfico
            let chartInstance = null;
            var token = localStorage.getItem('auth_token');

            // Función para renderizar el gráfico
            function renderChart(data, labels) {
                const ctx = document.getElementById('graficoDiario').getContext('2d');

                const colors = data.map(() => {
                    const r = Math.floor(Math.random() * 255);
                    const g = Math.floor(Math.random() * 255);
                    const b = Math.floor(Math.random() * 255);
                    return `rgba(${r}, ${g}, ${b}, 0.6)`; // Color de fondo con opacidad
                });
                // Si ya existe un gráfico, destrúyelo antes de crear uno nuevo
                if (chartInstance) {
                    chartInstance.destroy();
                }



                // Crear un nuevo gráfico
                chartInstance = new Chart(ctx, {
                    type: 'bar', // Tipo de gráfico
                    data: {
                        labels: labels, // Etiquetas (fechas)
                        datasets: [{
                            label: 'Ventas Diarias',
                            data: data, // Datos (sum_valor)
                            backgroundColor: colors, // Color de fondo
                            borderColor: colors.map(color => color.replace('0.6', '1')), // Color del borde
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            // Función para obtener datos filtrados desde la API
            async function fetchFilteredData(startDate, endDate) {
                try {
                    const response = await fetch(`/api/graficoventasdiarias?fecha_inicio=${startDate}&fecha_fin=${endDate}`, {
                        headers: {
                            Authorization: `Bearer ${token}` // Reemplaza con tu token de autenticación
                        }
                    });

                    if (!response.ok) {
                        throw new Error('Error en la solicitud');
                    }

                    const data = await response.json();

                    // Procesar los datos para Chart.js
                    const labels = data.map(item => item.fecha_em); // Fechas
                    const values = data.map(item => item.total_valor); // Ventas

                    // Renderizar el gráfico con los datos procesados
                    renderChart(values, labels);
                } catch (error) {
                    console.error('Error al obtener datos:', error);
                    alert('Hubo un error al cargar los datos. Por favor, inténtalo de nuevo.');
                }
            }

            // Función para calcular los últimos 15 días
            function getLast15DaysRange() {
                const today = new Date();
                const startDate = new Date();
                startDate.setDate(today.getDate() - 15); // Restar 15 días

                // Convertir las fechas a formato "YYYY-MM-DD" para la API
                const formatDate = (date) => date.toISOString().split('T')[0];
                return {
                    startDate: formatDate(startDate),
                    endDate: formatDate(today)
                };
            }

            // Cargar datos al inicio (últimos 15 días)
            document.addEventListener('DOMContentLoaded', () => {
                const { startDate, endDate } = getLast15DaysRange();
                document.getElementById('startDate').value = startDate; // Mostrar en el picker
                document.getElementById('endDate').value = endDate; // Mostrar en el picker
                console.log(startDate,endDate);
                // Llamar a la API con el rango de los últimos 15 días
                fetchFilteredData(startDate, endDate);
            });

            // Configurar el botón de filtro
            document.getElementById('filterBtn').addEventListener('click', () => {
                const startDate = document.getElementById('startDate').value; // Fecha inicial
                const endDate = document.getElementById('endDate').value; // Fecha final

                if (!startDate || !endDate) {
                    alert('Por favor selecciona ambas fechas para filtrar.');
                    return;
                }

                // Llamar a la función para obtener los datos y renderizar el gráfico
                fetchFilteredData(startDate, endDate);
            });

            // Evento para el combobox "Por Periodo"
            document.getElementById('periodoch').addEventListener('change', function () {
                const periodo = this.value;


                if (periodo) {
                    // Obtener el año y mes del período seleccionado
                    const year = parseInt(periodo.substring(0, 4)); // Ejemplo: 2024
                    const month = parseInt(periodo.substring(4, 6)) - 1; // Meses empiezan en 0

                    // Calcular el primer y último día del mes seleccionado
                    const firstDay = new Date(year, month, 1); // Primer día del mes
                    const lastDay = new Date(year, month + 1, 0); // Último día del mes

                    // Establecer los límites del datepicker
                    startDatePicker.setDate(firstDay, true); // Actualiza el valor del datepicker de inicio
                    startDatePicker.set("minDate", firstDay);
                    startDatePicker.set("maxDate", lastDay);

                    endDatePicker.setDate(lastDay, true); // Actualiza el valor del datepicker de fin
                    endDatePicker.set("minDate", firstDay);
                    endDatePicker.set("maxDate", lastDay);
                } else {
                    // Restablece los valores si no hay período seleccionado
                    startDatePicker.clear();
                    startDatePicker.set("minDate", null);
                    startDatePicker.set("maxDate", null);

                    endDatePicker.clear();
                    endDatePicker.set("minDate", null);
                    endDatePicker.set("maxDate", null);
                }
            });


        });












    </script>


</body>
</html>
