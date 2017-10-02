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
    <link rel="stylesheet" type="text/css" href="css/style1.css">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
  
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="panel panel-scaner">
                <div class="panel-body" >
                <?php 
                    if(isset($_GET['ti']))
                    {
                        //Escrinir observacion de la persona
                        if($_GET['ti']==1)
                        {
                            $num_documento = $_GET['num_doc'];
                ?>
                            <form class="form-horizontal" role="form" method="POST" action="validar.php?ti=7">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="hidden" class="form-control" name="num_doc" value="<?php  echo $num_documento; ?>" placeholder="example: lleva un equipo portatil">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                     <span>Observación</span>
                                        <input type="text" class="form-control" name="observacion" placeholder="example: lleva un equipo portatil">
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Continuar
                                        </button>
                                        <button class="btn btn-default btn-sm">
                                            Cancelar
                                        </button>
                                    </div>
                                </div>
                            </form>
                <?php  
                        }
                        //Mensaje de la persona
                        if($_GET['ti']==2)
                        {
                            //sleep(5);
                            //header('Location: index.php');
                            $nom_per = $_GET['nom_per'];
                ?>
                            <form id="scaner" class="form-horizontal" role="form" method="POST" action="validar.php?ti=1">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <span>Codigo de barras</span>
                                        <input type="number" class="form-control" name="cod_barra" placeholder="1220580717002" required>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Registrar
                                        </button>
                                        <button type="reset" class="btn btn-default btn-sm">
                                            Restaurar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="mensaje">
                                        <div class="panel panel-default">
                                            Bienvenido <?php echo $nom_per; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <?php  
                        include ("login.php");             
                        }
                        if($_GET['ti']==3)
                        {
                            $nom_per = $_GET['nom_per'];
                ?>
                    
                            <form class="form-horizontal" role="form" method="POST" action="validar.php?ti=1">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <span>Codigo de barras</span>
                                        <input type="number" class="form-control" name="cod_barra" placeholder="1220580717002" required>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Registrar
                                        </button>
                                        <button type="reset" class="btn btn-default btn-sm">
                                            Restaurar
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="mensaje">
                                        <div class="panel panel-default">
                                            Hasta pronto <?php echo $nom_per; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                            include ("login.php");
                        }
                    }
                    if(!isset($_GET['ti']))
                    {
                        
                    
                ?>
                            <form class="form-horizontal" role="form" method="POST" action="validar.php?ti=1">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <span>Codigo de barras</span>
                                        <input type="number" class="form-control" name="cod_barra" placeholder="1220580717002" required>
                                    </div>
                                </div>
                                <div class="form-group last">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            Registrar
                                        </button>
                                        <button type="reset" class="btn btn-default btn-sm">
                                            Restaurar
                                        </button>
                                    </div>
                                </div>
                               
                                  
                            </form>
                <?php 

                    include ("login.php");
                        if(isset($_GET['error']))
                        {
                ?>
                <div class="alert alert-danger">Erro: Usuario o Contraseña incorrecta</div>
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
    <script type="text/javascript" src="css/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="css/jquery/jquery.min.js"></script>
</html>