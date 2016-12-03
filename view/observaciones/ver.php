<div class="contenedor">
    <div class="formulario ver">
        <div class="head">
            <h3>Observacion</h3>
        </div>
        <table class="table table-bordered mia m">
            <tbody>
                <tr>
                        <td class="text-right"><strong>Codigo</strong></td>
                        <td><?php echo $dato->id ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Docente que realizo la observacion</strong></td>
                        <td><?php echo $dato->nombre." ".$d->apellido ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Observacion</strong></td>
                        <td><?php echo $dato->observacion ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Compromiso</strong></td>
                        <td><?php echo $dato->compromiso ?></td>
                </tr>
                <tr>
                        <td class="text-right"><strong>Fecha</strong></td>
                        <td><?php $date = date_create($dato->fecha); echo date_format($date, 'Y-m-d'); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="formulario ver">
        <div class="head">
            <h3>Actividades</h3>
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
                            <td><?php echo $d->descripcion ?></td>
                    </tr>
                    <tr>
                            <td class="text-right"><strong>Fecha</strong></td>
                            <td><?php $date = date_create($d->fecha); echo date_format($date, 'Y-m-d'); ?></td>
                    </tr>
                    <tr>
                            <td class="text-right"><strong>Evidencia</strong></td>
                            <td><img src="/<?php echo $d->foto ?>"></td>
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
                            . "<td colspan='2'>No hay ningun actividad</td>"
                            . "</tr>"
                        . "</tbody>"
                    . "</table>";
            }
        ?>
    </div>
</div>