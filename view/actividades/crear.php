<?php 
    if(!isset($_REQUEST['id'])){
         header('Location: /observaciones/');
    }
?>

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
        <h3>Crear actividad</h3>  
        <form action="/actividades/guardar/" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo is_object($dato)?$dato->id:''?>">
            <input type="hidden" name="id_observacion" value="<?php echo $_REQUEST['id']; ?>">
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea rows="5" class="form-control" name="descripcion"></textarea>
            </div>
            <div class="form-group">
                <label for="foto" >Evidencia:</label>                
                <input class="form-control" type="file" name="foto">               
            </div>
            <button type="submit" class="btn btn-default">Guardar</button>
        </form>
    </div>    
    
</div>