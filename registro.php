<?php
    session_start();
    /* Si no hay una sesión creada, redireccionar al index. */
    if(!isset($_SESSION['nom_usu']))
    { // Recuerda usar corchetes.
      header("location: index.php");
    } // Recuerda usar corchetes
    include('clases/Graficos.php');
    $obj_grafico = new Graficos();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="img/scorp.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="FOEN SOFT S.A.S">
	<title>Scorpion</title>
	<link rel="shortcut icon" href="img/scorp.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 
include("menu.php") ?>
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm" id="formulario">
            	<div class="row"">
					<center><H1>Registro</H1></center>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
					
				</div>
				<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10" >
				    <div class="table-responsive">
						<table class="table table-striped" >
							<tbody>
							<!-- Aplicadas en las celdas (<td> o <th>) -->
							<tr>
								<td id="table">
									Nº Registro
								</td>
								<td id="table">
									Nº Documento
								</td>
								<td id="table">
									Nombre
								</td>
								<td id="table">
									Apellidos
								</td>
								<td id="table">
									Fecha de Ingreso
								</td>
								<td id="table">
									Fecha de salida
								</td>
								<td id="table">
									Horas
								</td>
								<td id="table">
									Observaciòn
								</td>
							</tr>
							<tr>
								<?php echo $obj_grafico->escribir("SELECT id_registro, tb_personal.num_doc, tb_personal.nom_per, tb_personal.apl_per, fecha_ingreso, fecha_salida, horas, observacion  FROM tb_registro inner join tb_personal on tb_personal.num_doc = tb_registro.num_doc");?>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
			</div>
		</div>
            </div>
        </div>
    </div>
</div>
</body>
        <script src="css/jquery/jquery.min.js"></script>
        <script src="css/bootstrap/js/bootstrap.min.js"></script>
</html>
