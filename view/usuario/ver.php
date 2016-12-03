<div class="contenedor">
    <div class="formulario ver">
        <div class="gravatar">
            <h3>Datos de usuario</h3>
            <img class="gravatar" src="<?php echo get_gravatar($dato->correo,120); ?>">
        </div>
        <table class="table table-bordered mia m">
            <tbody>
            <tr>
                    <td class="text-right"><strong>Codigo</strong></td>
                    <td><?php echo $dato->id ?></td>
            </tr>
            <tr>
                    <td class="text-right"><strong>Usuario</strong></td>
                    <td><?php echo $dato->usuario ?></td>
            </tr>
            <tr>
                    <td class="text-right"><strong>Correo</strong></td>
                    <td><?php echo $dato->correo ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>