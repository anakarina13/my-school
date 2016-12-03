<div class="contenedor">
    <div class="formulario">
        <h3>Usuarios</h3>
        <form action="/usuario/buscar/" method="post" class='buscar'>
            <input type="text" id="buscar" name="buscar" placeholder="Usuario o correo">
            <input type="submit" value="Buscar">
        </form>
        <table class="table table-bordered">
            <thead class="color">
                <tr>
                    <th class="sin-borde-abajo">Codigo</th>
                    <th class="sin-borde-abajo">Usuario</th>
                    <th class="sin-borde-abajo">Correo</th>
                    <th class="sin-borde-abajo"></th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($dato as $r): ?>
                    <tr>
                        <td><?php echo $r->id ?></td>
                        <td><?php echo $r->usuario ?></td>
                        <td><?php echo $r->correo ?></td>			            
                        <td>
                            <a style="margin-right: 1%" href="/usuario/ver/<?php echo $r->id ?>/" class="btn btnd" title="Ver usuario"><i class="glyphicon glyphicon-eye-open"></i></a>

                            <a style="margin-right: 1%" href="/usuario/crud/<?php echo $r->id ?>/" class="btn btn-info" title="Editar usuario"><i class="glyphicon glyphicon-pencil"></i></a>

                            <a data-toggle="modal" data-target="#modal-eliminar" codigoe="<?php echo $r->id ?>" class="btn btn-danger tip-top" title="Eliminar usuario"><i class="glyphicon glyphicon-remove"></i></a>  
                        </td>
                    </tr>
                <?php endforeach; ?>
                <?php
                    if($dato==null)
                    {
                        echo "<tr><td colspan='4'>No hay ningun usuario</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="modal-eliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form action="/usuario/eliminar/" role="form" method="post">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h5 id="myModalLabel">Eliminar usuario</h5>
        </div>
        <div class="modal-body">
            <input type="hidden" id="codigo" name="id" value="" />
            <h5 style="text-align: center">¿Desea realmente eliminar este usuario?</h5>
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