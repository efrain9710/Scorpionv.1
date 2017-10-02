<?php
    include('clases/Graficos.php');
    $obj_grafico = new Graficos();
    $actualizador=0;
    if(isset($_GET['actualizador']))$actualizador=$_GET['actualizador'];
    $id="";
    if(isset($_GET['id']))$id=$_GET['id'];
    /* Empezamos la sesión */
    session_start();
    /* Si no hay una sesión creada, redireccionar al index. */
    if(!isset($_SESSION['nom_usu']))
    { // Recuerda usar corchetes.
    header("location:index.php");
    } // Recuerda usar corchetes
    else
    {
    $direccion= "";
    $direccion.= "modificar.php";
    $nombre= "";
    $nombre.= "resultados";
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
<div class="container">
    <div class="row">
        <div class="col-md-12"  >
            <div class="well well-sm" >
                    <form id="formulario" action="validar.php?ti=8&num_doc=<?php echo $num_doc=$_GET['id'];?>" class="form-horizontal" method="post">
                        <fieldset>
                            <input type="hidden" value="<?=  $actualizador ?>" name="texto-actualizador"><!--Este texto puede tener o no un valor y esto permitira actualizar o insertar-->
                                <input type="hidden" value="<?php if($actualizador=="1"){echo $id;}else{echo "NULL";} ?>" name="var0">
                            <legend class="text-center header">Nuevo Personal</legend>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Nª Documento</span>
                                <div class="col-md-8">
                                    <input id="num_doc" name="var1" type="text" placeholder="Numero de documento" value="<?= $obj_grafico->traer_valor_campo("num_doc","tb_personal","num_doc",$id)?>" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Nombre</span>
                                <div class="col-md-8">
                                    <input id="nom_per" name="var2" type="text" placeholder="Nombre de la persona" value="<?= $obj_grafico->traer_valor_campo("nom_per","tb_personal","num_doc",$id)?>"  class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Apellidos</span>
                                <div class="col-md-8">
                                   <input id="apl_per" name="var3" type="text" placeholder="apellidos" class="form-control" value="<?= $obj_grafico->traer_valor_campo("apl_per","tb_personal","num_doc",$id)?>"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Correo</span>
                                <div class="col-md-8">
                                    <input id="correo" name="var4" type="email" placeholder="Correo" class="form-control" value="<?= $obj_grafico->traer_valor_campo("correo","tb_personal","num_doc",$id)?>"  required>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Cargo</span>
                                <div class="col-md-8">
                                    <select class="form-control" name="var5" required>
                                        <?php
                                        echo $obj_grafico->escribir_opcion("SELECT * FROM tb_tip_usuarios", "id_tip_usu", "tip_usu",$obj_grafico->traer_valor_campo("id_tip_usu","tb_usuarios","num_doc",$id));
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <span class="col-md-1 col-md-offset-2 text-center">Codigo de barras</span>
                                <div class="col-md-8">
                                    <input id="cod_barra" name="var6" type="text" placeholder="Codigo de barra" value="<?= $obj_grafico->traer_valor_campo("cod_barra","tb_personal","num_doc",$id)?>"  class="form-control" required>
                                </div>
                            </div>
                        <input type="hidden" name="total" value="num_doc,nom_per,apl_per,correo,id_tip_usu,cod_barra">
                            <input type="hidden" name="tabla" value="tb_personal">
                        <div class="form-group">
                            <div class="col-xs-offset-2 col-xs-10">
                                <button  class="btn btn-primary">Guardar Cambios</button>
                                <button class="btn btn-warning" type="reset" >Limpiar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>
            </div>
        </div>
   </body>
   <?php } ?>
</html>
