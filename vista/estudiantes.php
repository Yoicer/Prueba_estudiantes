<!DOCTYPE html>
<html lang="en" xmlns:th="http://www.thymeleaf.org">
<head>
	<title>Inicio</title>
	
	<!--JQUERY-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
	
	<!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
	<link rel="stylesheet"
		href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script
		src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script 
		src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script 
		src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	
	<!-- Los iconos tipo Solid de Fontawesome-->
	<link rel="stylesheet"
		href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
	<script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	
	<!-- DATA TABLE -->
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">	
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

	<script type="text/javascript">
	    $(document).ready(function() {
	        //Asegurate que el id que le diste a la tabla sea igual al texto despues del simbolo #
	        $('#userList').DataTable();
	    } );
	</script>
</head>
<body>
	<div class="container">
	<div class="mx-auto col-sm-8 main-section" id="myTab" role="tablist">
		<ul class="nav nav-tabs justify-content-end">
			<li class="nav-item">
			<a class="nav-link active" id="list-tab" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="false">Lista</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#form" role="tab" aria-controls="form" aria-selected="true">Agregar</a>				   	
            </li>
            <li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="true">Editar</a>				   	
			</li>
			<li class="nav-item">
			<a class="nav-link" id="form-tab" data-toggle="tab" href="#graficas" role="tab" aria-controls="graficas" aria-selected="true">Graficas</a>				   	
			</li>
		</ul>
		<div class="tab-content" id="myTabContent">
			<div class="tab-pane fade show active" id="list" role="tabpanel" aria-labelledby="list-tab">
				<div class="card">
					<div class="card-header">
						<h4>Estudiantes</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table id="userList" class="table table-bordered table-hover table-striped">
								<thead class="thead-light">	                                
									<tr>
                                        <th scope="col">codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Municipio</th>
                                        <th scope="col">Semestre</th>
                                        <th scope="col">Promedio</th>
                                        <th></th>
								    </tr>
								</thead>
								<tbody>
                                
                                <?php	  
                                foreach($estudiantes as $stud){
                                        echo "<tr>";
                                        echo "<th scope='col'>".$stud['codigo']."</th>";
                                        echo "<th scope='col'>".$stud['nombre']."</th>";
                                        echo "<th scope='col'>".$stud['apellido']."</th>";
                                        echo "<th scope='col'>".$stud['municipio']."</th>";
                                        echo "<th scope='col'>".$stud['semestre']."</th>";
                                        echo "<th scope='col'>".$stud['promedio']."</th>";
?>
									<td>
										<a href="index.php?id=<?php echo $stud['idestudiante']; ?>"><i class="fas fa-user-times"></i></a>
                                    </td>
<?php                             }
?>
								</tr>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="form" role="tabpanel" aria-labelledby="form-tab">
				<div class="card">
					<div class="card-header">
						<h4>Agregar estudiante</h4>
					</div>
					<div class="card-body">
						<form action="index.php" method="post" class="form" role="form" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nombre</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="nombre" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Apellido</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="apellido" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Codigo</label>
								<div class="col-lg-9">
									<input class="form-control" type="numbre" name="codigo" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Municipio</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="municipio" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Semestre</label>
								<div class="col-lg-9">
									<input class="form-control" type="number" name="semestre" required>
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Estrato</label>
								<div class="col-lg-9">
									<input class="form-control" type="number" name="estrato" required >
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Promedio</label>
								<div class="col-lg-9">
									<input class="form-control" type="number" name="promedio" required >
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</div>
						</form>
					</div>
                </div>
                
			</div>
			<div class="tab-pane fade" id="graficas" role="tabpanel" aria-labelledby="form-tab">
				<div class="card">
					<div class="card-header">
						<h4>Graficas</h4>
					</div>
					<div class="card-body">
						<div class="col-lg-6">
							<canvas id="myChart" width="400" height="400"></canvas>
						</div>
						<div class="col-lg-6">
							<canvas id="myChart2" width="400" height="400"></canvas>
						</div>
						<div class="col-lg-6">
							<canvas id="myChart3" width="400" height="400"></canvas>
						</div>

					</div>
                </div>
                
            </div>
            <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="form-tab">
				<div class="card">
					<div class="card-header">
						<h4>Editar estudainte</h4>
					</div>
					<div class="card-body">
						<form action="index.php" method="post" class="form" role="form" autocomplete="off">
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Codigo</label>
								<div class="col-lg-9">
								<select name="id" class="form-control" required>
									<option></option>
<?php
									foreach($estudiantes as $est){
										echo "<option value=".$est['idestudiante'].">".$est['codigo']."</option>";
									} 
?>
								</select>
								</div>
                            </div>
                            <div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Nombre</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="nombreEdit">
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Apellido</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="apellidoEdit" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Municipio</label>
								<div class="col-lg-9">
									<input class="form-control" type="text" name="municipioEdit" >
								</div>
							</div>
							<div class="form-group row">
								<label class="col-lg-3 col-form-label form-control-label">Semestre</label>
								<div class="col-lg-9">
									<input class="form-control" type="number" name="semestreEdit">
								</div>
							</div>
							<div class="form-group row">
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"></script>

<script>
	var ctx = document.getElementById('myChart');
	var myChart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [
				<?php  
					foreach($estudiantesSemestre as $estd){
						echo "'".$estd['semestre']."',";
					}
				?>
			],
			datasets: [{
				label: '# Estudiantes x Semestre',
				data: [
					<?php  
						foreach($estudiantesSemestre as $estd){
							echo "'".$estd['estudiantes']."',";
						}
					?>
				],
				backgroundColor: [
					<?php  
						foreach($estudiantesSemestre as $estd){
							echo "'rgba(255, 99, 132, 0.2)',";
						}
					?>
				],
				borderColor: [
					<?php  
						foreach($estudiantesSemestre as $estd){
							echo "'rgba(255, 99, 132, 1)',";
						}
					?>
				],
				borderWidth: 1
			}]
		},
		options: {
			scales: {
				yAxes: [{
					ticks: {
						beginAtZero: true
					}
				}]
			}
		}
	});
</script>
<script>
	var ctx = document.getElementById('myChart2');
	var scatterChart = new Chart(ctx, {
    type: 'scatter',
		data: {
			datasets: [{
				label: 'Promedio x Estrato',
				data: [
					<?php  
						foreach($estudiantes as $est){
							echo "{
								x:".$est['estrato'].",
								y:".$est['promedio']."
								},";
						}
					?>
				]
			}]
		},
		options: {
			scales: {
				xAxes: [{
					type: 'linear',
					position: 'bottom'
				}]
			}
		}
	});
</script>
<script>
	new Chart(document.getElementById("myChart3"), {
		type: 'pie',
		data: {
		labels: [
			<?php  
					foreach( $estudianteMunicipio as $estM){
						echo "'".$estM['municipio']."',";
					}
			?>
		],
		datasets: [{
			label: "Population (millions)",
			backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#f42370","#e28873"],
			data: [
				<?php  
					foreach( $estudianteMunicipio as $estM){
						echo "'".$estM['estudiantes']."',";
					}
			?>
			]
		}]
		},
		options: {
		title: {
			display: true,
			text: 'Estudiantes x Municipio'
		}
		}
	});
	
</script>