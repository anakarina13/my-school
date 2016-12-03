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
        <h3>Crear observacion</h3>  
        <form action="/observaciones/guardar/" method="post">
            <input type="hidden" name="id" value="<?php echo is_object($dato)?$dato->id:''?>">
            <div class="form-group">
                <label for="curso">Curso:</label>
                <select name="curso" class="form-control" onchange="obtenerEstudiantes(curso.value)">
                    <option value="">Escoja una opcion...</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="primero"?"selected='selected'":"":''?> value="primero">Primero</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="segundo"?"selected='selected'":"":''?>value="segundo">Segundo</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="tercero"?"selected='selected'":"":''?>value="tercero">Tercero</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="cuarto"?"selected='selected'":"":''?>value="cuarto">Cuarto</option>
                    <option <?php  echo is_object($dato)?$dato->curso=="quinto"?"selected='selected'":"":''?>value="quinto">Quinto</option>
                </select>
            </div>
            <div class="form-group">
                <label for="estudiante">Estudiante:</label>
                <select name="estudiante" id="estudiante" class="form-control">
                    <option value="">Escoja una opcion...</option>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de observacion:</label>
                <select name="tipo" class="form-control">
                    <option value="">Escoja una opcion...</option>
                    <option value="academico">Aspecto academico</option>
                    <option value="presentacion">Presentacion personal</option>
                    <option value="convivencia">Conducta y convivencia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="observacion">Observacion:</label>
                <textarea rows="5" class="form-control" name="observacion"></textarea>
            </div>
            <div class="form-group">
                <label for="compromiso">Compromiso:</label>
                <textarea rows="5" class="form-control" name="compromiso"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Guardar</button>
        </form>
    </div>    
    
</div>

<script type="text/javascript">
    function obtenerEstudiantes(curso){
        estudiantes=document.getElementById('estudiante');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                array=JSON.parse(this.responseText);
                estudiantes.innerHTML='<option value="">Escoja una opcion...</option>';
                 for(i=0;i<array.length;i++){
                     estudiantes.innerHTML+='<option value="'+array[i]['id']+'">'+array[i]['nombres']+' '+array[i]['apellidos']+'</option>';
                 }
            }
        };
        xhttp.open("POST", "/estudiante/obtener_estudiante/", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("curso="+curso);
    }
</script>

