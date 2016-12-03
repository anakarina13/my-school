<div class="contenedor">
    <div class="formulario">
        <h3>Observaciones</h3>
        <form action="/observaciones/buscar/" method="post" class='buscar'>
            <div class="form-group">
                <select name="tipo" class="form-control">
                    <option value="">Todas</option>
                    <option value="academico">Aspecto academico</option>
                    <option value="presentacion">Presentacion personal</option>
                    <option value="convivencia">Conducta y convivencia</option>
                </select>
            </div>
            <input type="submit" value="Buscar">
        </form>
        <table class="table table-bordered">
            <thead class="color">
                <tr>
                    <th class="sin-borde-abajo">Codigo</th>
                    <th class="sin-borde-abajo">Docente</th>
                    <th class="sin-borde-abajo">Estudiante</th>
                    <th class="sin-borde-abajo">Tipo</th>
                    <th class="sin-borde-abajo">Fecha</th>
                    <th class="sin-borde-abajo"></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($dato as $r): ?>
                    <tr>
                        <td><?php echo $r->id ?></td>
                        <td><?php echo $r->nombre.' '.$r->apellido ?></td>
                        <td><?php echo $r->nombres.' '.$r->apellidos ?></td>
                        <td><?php echo $r->tipo ?></td>
                        <td><?php $date = date_create($r->fecha); echo date_format($date, 'Y-m-d'); ?></td>
                        <td>
                            <a style="margin-right: 1%" href="/observaciones/ver/<?php echo $r->id ?>/" class="btn btnd" title="Ver observacion"><i class="glyphicon glyphicon-eye-open"></i></a>

                            <a style="margin-right: 1%" href="/actividades/crud/<?php echo $r->id ?>/" class="btn btn-info" title="Crear actividad"><i class="glyphicon glyphicon-send"></i></a>

                            <a data-toggle="modal" data-target="#modal-eliminar" codigoe="<?php echo $r->id ?>" class="btn btn-danger tip-top" title="Eliminar observacion"><i class="glyphicon glyphicon-remove"></i></a>  
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php
                    if($dato==null)
                    {
                        echo "<tr><td colspan='6'>No hay ningun observacion</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="modal-eliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="/observaciones/eliminar/" role="form" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Eliminar observacion</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="codigo" name="id" value="" />
            <h5 style="text-align: center">¿Desea realmente eliminar esta observacion?</h5>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
            <button class="btn btn-danger">Eliminar</button>
        </div>      
    </form>
</div>

<script type="text/javascript">
    window.onload = function() {    
        $(document).on('click', 'a', function(event) {

            var codigo_id = $(this).attr('codigoe');
            $('#codigo').val(codigo_id);

        });
    }
</script>	