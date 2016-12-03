<?php

if(!isset($_SESSION)){
    session_start();
}
$_SESSION['errores']=[];

require_once 'model/global_bd.php';

class ObservacionesController{
    
    private $model;
    //public $errores=array();
    
    public function __CONSTRUCT(){
        $this->model = new global_bd("observaciones");
    }
    
    public function Index(){

        $dato = $this->model->Otros("select o.*,e.nombres,e.apellidos,e.curso,u.nombre,u.apellido from observaciones o,estudiante e,usuario u where o.id_estudiante=e.id and o.id_docente=u.id");
        require_once 'view/header.php';
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            require_once 'view/observaciones/listar.php';
        }else {
            require_once 'view/usuario/ingresar.php'; 
        }
        require_once 'view/footer.php';
    }

    public function ver(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Otro("select o.*,u.nombre,u.apellido from observaciones o,usuario u where o.id_docente=u.id and o.id='".$_REQUEST['id']."'");
                $dato2 = $this->model->Otros("SELECT a.* FROM observaciones o,actividad a where o.id=a.id_observacion and o.id='".$_REQUEST['id']."'");
            }

            require_once 'view/header.php';
            require_once 'view/observaciones/ver.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario/');
        }
    }

    public function Crud(){
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            $dato=null;
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Obtener($_REQUEST['id']);
            }
            require_once 'view/header.php';
            require_once 'view/observaciones/observaciones.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario/');
        }
    }
    
    
    public function Guardar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){

            $datos = array(
                'id_estudiante' => $_REQUEST['estudiante'], 
                'id_docente' => $_SESSION['id'],
                'tipo' => $_REQUEST['tipo'],
                'observacion' => $_REQUEST['observacion'], 
                'compromiso' => $_REQUEST['compromiso'],      
                );
            
            $_REQUEST['id']>0?$this->model->Actualizar($datos,$_REQUEST['id']):$this->model->Registrar($datos);
                    
            header('Location: /observaciones/');
        }else{
            header('Location: /usuario/');
        }
        
    }
    
    public function Eliminar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            $this->model->Eliminar($_REQUEST['id']);
        }
        header('Location: /observaciones/');
    }

    public function Buscar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            $dato = $this->model->Otros("select o.*,e.nombres,e.apellidos,u.nombre,u.apellido,e.curso from observaciones o,estudiante e,usuario u where o.id_estudiante=e.id and o.id_docente=u.id and o.tipo LIKE'%".$_REQUEST['tipo']."%'");

            require_once 'view/header.php';
            require_once 'view/observaciones/listar.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario/');
        }
    }
}