<div class="contenedor">
    <div class="formulario">
         <?php if(!empty($_SESSION['errores'])): ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                <?php
                    foreach ($_SESSION['errores'] as $error){
                        echo "<li>".$error. "</li>";
                    }
                ?>
                </ul>
            </div>
        <?php endif; ?>
        <h3>Iniciar sesión</h3>  
        <form action="/usuario/guardar/" method="post">
            <input type="hidden" name="id" value="<?php echo is_object($dato)?$dato->id:''?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?php echo is_object($dato)?$dato->nombre:'' ?>">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" class="form-control" name="apellido" id="apellido" value="<?php echo is_object($dato)?$dato->apellido:'' ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="text" class="form-control" name="correo" id="correo" value="<?php echo is_object($dato)?$dato->correo:'' ?>">
            </div>
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" id="usuario" onblur="validarUsuario(usuario.value)" value="<?php echo is_object($dato)?$dato->usuario:'' ?>">
            </div>
            <div class="form-group">
                <label for="clave">Clave:</label>
                <input type="password" class="form-control" name="clave" id="clave">
            </div>
            <button type="submit" class="btn btn-default">Guardar</button>
        </form>
    </div>    
    
</div>


<script type="text/javascript">
    function validarUsuario(usuario){
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                if(this.responseText=="bad"){
                    document.getElementById('usuario').setAttribute('class','form-control rojo');
                }else{
                    document.getElementById('usuario').setAttribute('class','form-control');
                }
            }
        };
        xhttp.open("POST", "/usuario/verificar_usuario/", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("usuario="+usuario);
    }
</script>	