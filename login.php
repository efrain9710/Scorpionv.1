
<div class="panel-heading">
    <span class="glyphicon glyphicon-lock"></span> Login
</div>
<div class="panel-body">
    <form class="form-horizontal" role="form" method="POST" action="validar.php?ti=2">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">
                Correo
            </label>
            <div class="col-sm-9">
                <input type="email" class="form-control" name="correo" placeholder="Email" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-3 control-label">
                Clave
            </label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="clave" placeholder="Password" required>
            </div>
        </div>
        <div class="form-group last">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary btn-sm">
                    Iniciar sesiòn
                </button>
                <button type="reset" class="btn btn-default btn-sm">
                    Restaurar
                </button>
            </div>
        </div>
    </form>
</div>