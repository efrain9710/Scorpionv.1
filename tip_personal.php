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
<html>
<head>
    <link rel="shortcut icon" href="img/scorp.ico">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Scorpion</title>
    <link rel="shortcut icon" href="img/scorp.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php 
    include( "menu.php" ); 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12"  >
            <div class="well well-sm" >
                    <form id="formulario" class="form-horizontal" action="validar.php?ti=4" method="post">
                        <fieldset>
                            <legend class="text-center header">Nuevo Cargos</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Cargo</span>
                                <div class="col-md-8">
                                    <input id="nom_per" name="var2" type="text" placeholder="Example: subdirector" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">GUARDAR</button>
                                </div>
                            <div class="col-md-6 text-center">
                                <a href="admin.php">
                                    <button href="admin.php" type="" class="btn btn-warning btn-lg">CANCELAR</button></a>
                            </div>
                            </div>
                            <input type="hidden" name="total" value="id_tip_usu, tip_usu">
                            <input type="hidden" name="tabla" value="tb_tip_usuarios">
                        </fieldset>
                    </form>
            </div>
        </div>
    </div>
</div>
</body>
        <script src="css/jquery/jquery.min.js"></script>
        <script src="css/bootstrap/js/bootstrap.min.js"></script>
</html>