<?php
    function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
        $url = 'https://www.gravatar.com/avatar/';
        $url .= md5( strtolower( trim( $email ) ) );
        $url .= "?s=$s&d=$d&r=$r";
        if ( $img ) {
            $url = '<img src="' . $url . '"';
            foreach ( $atts as $key => $val )
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
    
    function correo_confirmacion($para,$codigo){
        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Cabeceras adicionales
        //$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $cabeceras .= 'From: My School <noreply@my-school.hol.es>' . "\r\n";
        $cabeceras .= 'Cc: noreply@my-school.hol.es' . "\r\n";
        $cabeceras .= 'Bcc: noreply@my-school.hol.es' . "\r\n";
        
        //Datos
        $título="Correo de confirmacion - My School";
        $link="http://my-school.hol.es/usuario/confirmar/".$codigo;
        $mensaje="<h3>Gracias por registrarte</h3><br>";
        $mensaje.="<p>Solo te falta un paso, da click en el siguiente enlace</p><br><br>";
        $mensaje.="<a href='".$link."'>Confirmar correo</a>";
        
        // Enviarlo
        mail($para, $título, $mensaje, $cabeceras);
    }
?>