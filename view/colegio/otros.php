<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="contenedor">
    <div class="formulario">
        <h3>Colegios de Cordoba</h3>
        <h4>Comparación de mejoramiento mínimo anual de los colegios en Córdoba:</h4>
        <form action="/colegio/comparar/" method="post" class='buscar'>
                <select name="colegio1">
                    <option value="">Colegio...</option>
                    <?php foreach($dato as $r): ?>
                        <option value="<?php echo $r->institucioneducativa ?>"><?php echo $r->institucioneducativa ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="colegio2">
                    <option value="">Colegio...</option>
                    <?php foreach($dato as $r): ?>
                        <option value="<?php echo $r->institucioneducativa ?>"><?php echo $r->institucioneducativa ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="submit" value="Buscar">
        </form>
        <table class="table table-bordered">
            <thead class="color">
                <tr>
                    <th class="sin-borde-abajo">Colegio</th>
                    <th class="sin-borde-abajo">mmaprimaria2016</th>
                    <th class="sin-borde-abajo">mmasecundaria2016</th>
                    <th class="sin-borde-abajo">mmamedia2016</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($dato as $r): ?>
                    <tr>
                        <td><?php echo $r->institucioneducativa ?></td>
                        <td><?php echo $r->mmaprimaria2016 ?></td>			            
                        <td><?php echo $r->mmasecundaria_2016 ?></td>
                        <td><?php echo $r->mmamedia2016 ?></td>
                    </tr>
                <?php endforeach; ?>
                <?php
                    if($dato==null)
                    {
                        echo "<tr><td colspan='4'>No hay ningun colegio</td></tr>";
                    }
                ?>
            </tbody>
        </table>
        <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
    </div>
</div>