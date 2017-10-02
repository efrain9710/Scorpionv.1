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
    include( "menu.php" ); 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12"  >
            <div class="well well-sm" >
                    <form id="formulario" class="form-horizontal" action="validar.php?ti=4" method="post">
                        <fieldset>
                            <legend class="text-center header">Nuevo Personal</legend>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Documento</span>
                                <div class="col-md-8">
                                    <input id="num_doc" name="var1" type="text" placeholder="Numero de documento" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Nombre</span>
                                <div class="col-md-8">
                                    <input id="nom_per" name="var2" type="text" placeholder="Nombre de la persona" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Apellidos</span>
                                <div class="col-md-8">
                                   <input id="apl_per" name="var3" type="text" placeholder="apellidos" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Correo</span>
                                <div class="col-md-8">
                                    <input id="correo" name="var4" type="email" placeholder="Correo" class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Cargo</span>
                                <div class="col-md-8">
                                    <select class="form-control" name="var5" required>
                                        <?php
                                        echo $obj_grafico->escribir_opcion("SELECT * FROM tb_tip_usuarios", "id_tip_usu", "tip_usu",$obj_grafico->traer_valor_campo("id_tip_usu","tb_usuarios"));
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Formaciòn</span>
                                <div class="col-md-8">
                                    <select class="form-control" name="var6" required>
                                        <?php
                                        echo $obj_grafico->escribir_opcion("SELECT * FROM tb_nom_formacion", "num_ficha", "nom_formacion", $obj_grafico->traer_valor_campo("num_ficha","tb_personal"));
                                        ?>

                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Codigo de barras</span>
                                <div class="col-md-8">
                                    <input id="cod_barra" name="var7" type="text" placeholder="Codigo de barra" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">GUARDAR</button>
                                </div>
                            <div class="col-md-6 text-center">
                                <a >
                                    <button href="admin.php" type="submit" class="btn btn-warning btn-lg">CANCELAR</button></a>
                            </div>
                            </div>
                            <input type="hidden" name="total" value="num_doc,nom_per,apl_per,correo,id_tip_usu,num_ficha,cod_barra">
                            <input type="hidden" name="tabla" value="tb_personal">
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
