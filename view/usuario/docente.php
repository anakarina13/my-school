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
        <h3>Observador</h3> 
        <div class="element-separator">
            <hr>
            <h3 class="section-break-title">Datos de observacion</h3>
	</div>
        <form action="/usuario/docente/" method="post">
            
            <div class="form-group">
              <label for="exampleSelect1">Selecione un salon</label>
                
                </select>  
            </div>
            
            <div class="form-group">
              <label for="exampleSelect1">Seleccione un Docente</label>
                <select class="form-control" id="docente">
                    <option value="Soltero">Ana banda</option>
                </select>  
            </div>
            
             <div class="form-group">
              <label for="exampleSelect1">Seleccione un alumno</label>
                <select class="form-control" id="alumno">
                    <option value="Soltero">anita</option>
                </select>  
            </div>
            
            <div class="form-group">
              <label for="exampleSelect1">Docente</label>
                <select class="form-control" id="tip_obs">
                  <option value="">Seleccione un Docente</option>
                  <option value="Soltero">Ana banda</option>
                </select>  
            </div>
            
            <div class="form-group">
                <label for="exampleTextarea">Anotacion</label>
                <textarea class="form-control" id="comentario" rows="3"></textarea>				  
            </div>
            <div class="form-group">
                <label for="exampleTextarea">Compromiso del alumno y padre de familia</label>
                <textarea class="form-control" id="comentario" rows="3"></textarea>				  
            </div>
           
            
            <button type="submit" class="btn btn-default">Enviar</button>
        </form>
    </div>    
    
</div>

