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
        <form action="/estudiante/guardar/" method="post">
            <input type="hidden" name="id" value="<?php echo is_object($dato)?$dato->id:''?>">
            <div class="form-group">
                <label for="nombres">Nombres:</label>
                <input type="text" class="form-control" name="nombres" id="nombre" value="<?php echo is_object($dato)?$dato->nombres:'' ?>">
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" class="form-control" name="apellidos" id="apellidos" value="<?php echo is_object($dato)?$dato->apellidos:'' ?>">
            </div>
            <div class="form-group">
                <label for="curso">Curso:</label>
                <select name="curso" class="form-control">
                    <option value="">Escoja una opcion...</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="primero"?"selected='selected'":"":''?> value="primero">Primero</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="segundo"?"selected='selected'":"":''?>value="segundo">Segundo</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="tercero"?"selected='selected'":"":''?>value="tercero">Tercero</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="cuarto"?"selected='selected'":"":''?>value="cuarto">Cuarto</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="quinto"?"selected='selected'":"":''?>value="quinto">Quinto</option>
                </select>
            </div>
            <button type="submit" class="btn btn-default">Guardar</button>
        </form>
    </div>    
    
</div>

