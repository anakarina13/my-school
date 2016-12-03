<div class="contenedor">
    <div class="formulario ver">
        <div class="head">
            <h3>Datos de usuario</h3>
        </div>
        <table class="table table-bordered mia m">
            <tbody>
            <tr>
                    <td class="text-right"><strong>Codigo</strong></td>
                    <td><?php echo $dato->id ?></td>
            </tr>
            <tr>
                    <td class="text-right"><strong>Nombre</strong></td>
                    <td><?php echo $dato->nombres ?></td>
            </tr>
            <tr>
                    <td class="text-right"><strong>Apellidos</strong></td>
                    <td><?php echo $dato->apellidos ?></td>
            </tr>
            <tr>
                    <td class="text-right"><strong>Curso</strong></td>
                    <td><?php echo $dato->curso ?></td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="formulario ver">
        <div class="head">
            <h3>Observaciones</h3>
        </div>
        <?php foreach ($dato2 as $d): ?>
            <table class="table table-bordered mia m">
                <tbody>
                <tr>
                        <td class="text-right"><strong>Codigo</strong></td>
                        <td><?php echo $d->id ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Docente que realizo la observacion</strong></td>
                        <td><?php echo $d->nombre." ".$d->apellido ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Observacion</strong></td>
                        <td><?php echo $d->observacion ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Compromiso</strong></td>
                        <td><?php echo $d->compromiso ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Fecha</strong></td>
                        <td><?php $date = date_create($d->fecha); echo date_format($date, 'Y-m-d'); ?></td>
                </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
        <?php
            if($dato2==null)
            {
                echo "<table class='table table-bordered mia m'>"
                        . "<tbody>"
                            . "<tr>"
                            . "<td colspan='2'>No hay ningun observacion</td>"
                            . "</tr>"
                        . "</tbody>"
                    . "</table>";
            }
        ?>
    </div>
</div>