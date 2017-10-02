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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form id="formulario" class="form-horizontal" action="validar.php?ti=4" method="post">
                    <fieldset>
                        <legend class="text-center header">Registra tu Empresa</legend>

                        <div class="form-group">
                        <input type="hidden" value="<?php echo "NULL"?>" name="var1">
                            <span class="col-md-1 col-md-offset-2 text-center">Nombre</span>
                            <div class="col-md-8">
                                <input id="nom_empresa" name="var2" type="text" placeholder="Nombre de la Empresa" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Direcciòn</span>
                            <div class="col-md-8">
                                <input id="direccion" name="var4" type="text" placeholder="Direcciòn" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Correo</span>
                            <div class="col-md-8">
                                <input id="correo" name="var5" type="email" placeholder="Correo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Telefono</span>
                            <div class="col-md-8">
                                <input id="telefono" name="var6" type="tel" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Logo</span>
                            <div class="col-md-8">
                               <input id="url_logo_empresa" name="var7" type="file" placeholder="Logo de la Empresa" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Descripciòn</span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="descripcion" name="var3" placeholder="Descripciòn de la Empresa" rows="4"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">GUARDAR</button>
                            </div>
                            <input type="hidden" name="total" value="id_empresa, nom_empresa, descripcion, direccion, correo, telefono, url_logo_empresa">
                        </div>
                        <input type="hidden" name="tabla" value="tb_empresa">
                        </div>
                    </fieldset>
                </form>
                
        </div>
    </div>
</div>
</body>
        <script src="css/jquery/jquery.min.js"></script>
        <script src="css/bootstrap/js/bootstrap.min.js"></script>
</html>
