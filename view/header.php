<?php
    if(!isset($_SESSION)){
        session_start();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>My-School</title>
    
    <script src="/assets/chart.js/chart.min.js"></script>
	
	<!-- core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/animate.min.css" rel="stylesheet">
    <link href="/assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="/assets/css/main.css" rel="stylesheet">
    <link href="/assets/css/responsive.css" rel="stylesheet">
    <link href="/assets/css/estilo.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <header id="header">
        
        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><img src="/assets/images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Inicio</a></li>
                        <?php
                            if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
                                echo '<li class="dropdown">'
                                        .'<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <i class="fa fa-angle-down"></i></a>'
                                        .'<ul class="dropdown-menu">'
                                            .'<li><a href="/usuario/">Ver</a></li>'
                                            .'<li><a href="/usuario/crud/">Crear</a></li>'
                                        .'</ul>'
                                    .'</li>';
                                echo '<li class="dropdown">'
                                        .'<a href="#" class="dropdown-toggle" data-toggle="dropdown">Estudiantes <i class="fa fa-angle-down"></i></a>'
                                        .'<ul class="dropdown-menu">'
                                            .'<li><a href="/estudiante/">Ver</a></li>'
                                            .'<li><a href="/estudiante/crud/">Crear</a></li>'
                                        .'</ul>'
                                    .'</li>';
                            }
                            if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
                                echo '<li class="dropdown">'
                                        .'<a href="#" class="dropdown-toggle" data-toggle="dropdown">Observaciones <i class="fa fa-angle-down"></i></a>'
                                        .'<ul class="dropdown-menu">'
                                            .'<li><a href="/observaciones/">Ver</a></li>'
                                            .'<li><a href="/observaciones/crud/">Crear</a></li>'
                                        .'</ul>'
                                    .'</li>';
                                echo '<li><a href="/estudiante/">Estudiantes</a></li>';
                            }
                            if(isset($_SESSION['rol'])){
                                echo '<li><a href="/usuario/cerrar_sesion/">Cerrar sesion</a></li>'; 
                            }else{
                                echo '<li><a href="/usuario/">Iniciar</a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->
    <div id="contenedor">
