<div class="contenedor">
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
    <div class="formulario">
        <h3>Iniciar sesión</h3>  
        <form action="/usuario/iniciar_sesion/" method="post">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label for="clave">Clave:</label>
                <input type="password" class="form-control" name="clave" id="clave">
            </div>
           
            <!--div class="form-group">
                <label>¿No tienes cuenta? <a href="/usuario/crud/">Registrate</a></label>
            </div-->
            <button type="submit" class="btn btn-default">Iniciar</button>
        </form>
    </div>    
    
</div>
