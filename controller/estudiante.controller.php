<?php

if(!isset($_SESSION)){
    session_start();
}
$_SESSION['errores']=[];

require_once 'model/global_bd.php';

class EstudianteController{
    
    private $model;
    //public $errores=array();
    
    public function __CONSTRUCT(){
        $this->model = new global_bd("estudiante");
    }
    
    public function Index(){

        $dato = $this->model->Listar();
        require_once 'view/header.php';
        
        if(isset($_SESSION['rol'])){
            require_once 'view/estudiante/listar.php';
        }else {
            require_once 'view/usuario/ingresar.php'; 
        }
        require_once 'view/footer.php';
    }

    
    public function Crud(){
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $dato=null;
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Obtener($_REQUEST['id']);
            }
            require_once 'view/header.php';
            require_once 'view/estudiante/registrar.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /estudiante/');
        }
    }
    
    
    public function Guardar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            
            $datos = array(
                'nombres' => $_REQUEST['nombres'], 
                'apellidos' => $_REQUEST['apellidos'],
                'curso' => $_REQUEST['curso']       
                );
            
            $_REQUEST['id']>0?$this->model->Actualizar($datos,$_REQUEST['id']):$this->model->Registrar($datos);
                    
            header('Location: /estudiante/');
        }
        
    }
    
    public function Eliminar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $this->model->Eliminar($_REQUEST['id']);
        }
        header('Location: /estudiante/');
    }

    public function Buscar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $dato = $this->model->Buscar(['nombres','apellidos'],$_REQUEST['buscar']);

            require_once 'view/header.php';
            require_once 'view/estudiante/listar.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /estudiante/');
        }
    }
    
    public function obtener_estudiante(){
        echo json_encode($this->model->Buscar(['curso'],$_REQUEST['curso']));
    }
    
    public function Ver(){
        
        if(isset($_SESSION['rol'])){
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Obtener($_REQUEST['id']);
                $dato2 = $this->model->Otros("SELECT o.*,u.nombre,u.apellido FROM observaciones o,usuario u WHERE id_estudiante = '$dato->id' and u.id=o.id_docente ORDER BY id ASC");
            }

            require_once 'view/header.php';
            require_once 'view/estudiante/ver.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario/');
        }
    }
    
    public function Json(){
        $obj = $this->model->Listar();
        $dato=[];
        foreach ($_GET as $key => $value) {
            if($key=="controlador" || $key=="accion"){ //ignorar gets
                continue;
            }  else {
                foreach ($obj as $value_) {
                    if($value_->$key==$value){
                        array_push($dato, $value_);
                    }
                }
                $obj=$dato;
                $dato=[];
            }
        }
        //echo "Hola ".$_GET['hola'];
        header('Content-type: application/json');
        echo $dato = json_encode($obj);
    }
}