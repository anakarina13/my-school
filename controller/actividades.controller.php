<?php

if(!isset($_SESSION)){
    session_start();
}
$_SESSION['errores']=[];

require_once 'model/global_bd.php';

class ActividadesController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new global_bd("actividad");
    }
    
    public function Index(){

        /*$dato = $this->model->Listar();
        require_once 'view/header.php';
        
        if(isset($_SESSION['rol'])){
            require_once 'view/estudiante/listar.php';
        }else {
            require_once 'view/usuario/ingresar.php'; 
        }
        require_once 'view/footer.php';*/
    }

    
    public function Crud(){
        
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            $dato=null;
            if(isset($_REQUEST['id'])){
                $dato = $this->model->Obtener($_REQUEST['id']);
            }
            require_once 'view/header.php';
            require_once 'view/actividades/crear.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /usuario/');
        }
    }
    
    
    public function Guardar(){
        if(isset($_SESSION['rol']) && $_SESSION['rol']=='docente'){
            $directorio = 'assets/uploads/';
            //echo $_FILES['foto']['type'];
            if($_FILES['foto']['type']!="image/jpeg" && $_FILES['foto']['type']!="image/png"){
                array_push($_SESSION['errores'],"Formato de imagen no valido"); 
                require_once 'view/header.php';
                require_once 'view/observaciones/observaciones.php';
                require_once 'view/footer.php';
            }else{
                $imagen = explode(".",$_FILES['foto']['name']); 
                $imagen = $imagen[count($imagen)-1];
                $imagen = $directorio."imagen_".md5(time()).".".$imagen;
                if(move_uploaded_file($_FILES['foto']['tmp_name'],$imagen)) {
                    $datos = array(
                        'id_observacion' => $_REQUEST['id_observacion'], 
                        'descripcion' => $_REQUEST['descripcion'],
                        'foto' => $imagen       
                        );

                    $_REQUEST['id']>0?$this->model->Actualizar($datos,$_REQUEST['id']):$this->model->Registrar($datos);

                    header('Location: /observaciones/');
                }else{
                    array_push($_SESSION['errores'],"No se ha podido subir la imagen"); 
                    header('Location: /observaciones/');
                }
            }
        }
        
    }
    
    public function Eliminar(){
        /*if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $this->model->Eliminar($_REQUEST['id']);
        }
        header('Location: /estudiante/');*/
    }

    public function Buscar(){
        /*if(isset($_SESSION['rol']) && $_SESSION['rol']=='administrador'){
            $dato = $this->model->Buscar(['nombres','apellidos'],$_REQUEST['buscar']);

            require_once 'view/header.php';
            require_once 'view/estudiante/listar.php';
            require_once 'view/footer.php';
        }else{
            header('Location: /estudiante/');
        }*/
    }

}