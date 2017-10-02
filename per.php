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
//include("menu.php") ?>
<div class="container" >
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm" id="formulario">
            	<div class="row"">
					<center><H1>Personal</H1></center>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
				    <div class="table-responsive">
						<table class="table table-striped" >
							<tbody>
							<!-- Aplicadas en las celdas (<td> o <th>) -->
							<tr>
								<td id="table">
									Numero de Documento
								</td>
								<td id="table">
									Nombres
								</td>
								<td id="table">
									Apellidos
								</td>
								<td id="table">
									Correo
								</td>
								<td id="table">
									Cargo
								</td>
								<td id="table">
									Nª Ficha
								</td>
								<td id="table">
									Codigo de Barras
								</td>
								<td id="table">
									Opciones
								</td>
							</tr>
							<tr>
								<?php echo $obj_grafico->escribir_opciones("SELECT num_doc, nom_per, apl_per, correo,  tb_tip_usuarios.tip_usu, num_ficha, cod_barra FROM tb_personal inner join tb_tip_usuarios on tb_personal.id_tip_usu = tb_tip_usuarios.id_tip_usu");?>
							</tr>
							
							</tbody>
						</table>
					</div>
				</div>
				
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
