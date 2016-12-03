<?php

if(!isset($_SESSION)){
    session_start();
}
$_SESSION['errores']=[];

require_once 'model/global_bd.php';

class UsuarioController{
    
    private $model;
    //public $errores=array();
    
    public function __CONSTRUCT(){
        $this->model = new global_bd("usuario");
    }
    
    public function Index(){

        $dato = $this->model->Listar();
        require_once 'view/header.php';
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            require_once 'view/usuario/listar.php';
        }else if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            header('Location: /observaciones/');
        }else {
            require_once 'view/usuario/ingresar.php'; 
        }
        require_once 'view/footer.php';
    }

    public function Ver(){
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Obtener($_REQUEST['id']);
            }

            require_once 'view/header.php';
            require_once 'include/util.php';
            require_once 'view/usuario/ver.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario/');
        }
    }
    
    public function Crud(){
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $dato=null;
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Obtener($_REQUEST['id']);
            }
            require_once 'view/header.php';
            require_once 'view/usuario/registrar.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario');
        }
    }
    
    
    public function Guardar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $codigo = md5(time());
            $datos = array(
                'nombre' => $_REQUEST['nombre'], 
                'apellido' => $_REQUEST['apellido'],
                'usuario' => $_REQUEST['usuario'], 
                'correo' => $_REQUEST['correo'],
                'codigo' => $codigo,
                'clave' => password_hash($_REQUEST['clave'], PASSWORD_BCRYPT)            
                );
            $resultado=$this->model->Buscar(['correo'],$_REQUEST['correo']);
            if(!$resultado){
                //array_push($datos,['codigo' => $codigo]);
                require_once 'include/util.php';
                correo_confirmacion($_REQUEST['correo'],$codigo);
            }

            if($_REQUEST['id']>0){
                if($this->model->Buscar(['correo'],$_REQUEST['correo'],true,$_REQUEST['id'])){
                    array_push($_SESSION['errores'],"Este correo ya esta en uso");  
                    $this->Crud();
                }else if($this->model->Buscar(['usuario'],$_REQUEST['usuario'],true,$_REQUEST['id'])){
                    array_push($_SESSION['errores'],"Este usuario ya esta en uso");  
                    $this->Crud();
                }else{
                    $this->model->Actualizar($datos,$_REQUEST['id']);
                    header('Location: /usuario');
                }
            }else{
                if($this->model->Buscar(['correo'],$_REQUEST['correo'])){
                    array_push($_SESSION['errores'],"Este correo ya esta en uso");  
                    $this->Crud();
                }else if($this->model->Buscar(['usuario'],$_REQUEST['usuario'])){
                    array_push($_SESSION['errores'],"Este usuario ya esta en uso");  
                    $this->Crud();
                }else{
                    $this->model->Registrar($datos);
                    header('Location: /usuario');
                }
            }
        }else{
            header('Location: /usuario');
        }
        
    }
    
    public function Eliminar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $this->model->Eliminar($_REQUEST['id']);
        }
        header('Location: /usuario');
    }

    public function Buscar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $dato = $this->model->Buscar(['usuario','correo'],$_REQUEST['buscar']);

            require_once 'view/header.php';
            require_once 'view/usuario/listar.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario');
        }
    }

    public function Verificar_usuario(){
        $resultado=$this->model->Buscar(['usuario'],$_REQUEST['usuario']);
        if(!$resultado){
            echo 'ok';
        }else{
            echo 'bad';
        }
    }
    
    public function Confirmar() {
        $dato = $this->model->Obtener($_REQUEST['id'],'codigo');
        if($dato!=null){
            $datetime1 = strtotime(date('Y-m-d H:i:s'));
            $datetime2 = strtotime($dato->fecha_lim);
            $interval  = abs($datetime2 - $datetime1);
            $minutes   = round($interval / 60);

            if($dato->estado!="activo"){
                if($minutes>60){
                    array_push($_SESSION['errores'],"El tiempo para confirmar el correo ha pasado");
                }else{
                    $this->model->Actualizar(['estado'=>true],$_REQUEST['id'],'codigo');
                    echo "Correo confirmado";
                }
            }else{
                array_push($_SESSION['errores'],"El correo ya ha sido confirmado antes");
            }
        }
        $this->Index();
    }
    
    public function Iniciar_sesion(){
        $dato = $this->model->Obtener($_REQUEST['usuario'],'usuario');
        if(password_verify($_REQUEST['clave'],$dato->clave)){
            if($dato->estado=="activo"){
                $_SESSION['id']=$dato->id;
                $_SESSION['rol']=$dato->rol;
                header('Location: /usuario/');
            }else{
                array_push($_SESSION['errores'],"El usuario no ha confirmado el correo");
            }
        }else{
            array_push($_SESSION['errores'],"La combinacion de usuario y contraseña no son correctas");  
        }
        $this->Index();
    }
    
    public function Cerrar_sesion(){
        unset($_SESSION['id']);
        unset($_SESSION['rol']);
        header('Location: /usuario/');
    }
    
    public function docente(){
         
            require_once 'view/header.php';
            require_once 'view/usuario/docente.php';
            require_once 'view/footer.php'; 
        
    }
}	