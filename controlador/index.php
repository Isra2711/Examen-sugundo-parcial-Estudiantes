<?php
require_once("modelo/index.php");
class modeloController{
    private $model;
    public function __construct(){
        $this->model = new Modelo();
    }
    // MOSTRAR
    static function index(){
        $producto   = new Modelo();
        $dato       =   $producto->mostrar("productos","1");
        require_once("vista/index.php");
    }
    //NUEVO
    static function nuevo(){        
        require_once("vista/nuevo.php");
    }
    //GUARDAR
    static function guardar(){
        $nombre= $_REQUEST['nombre'];
        $calificacion= $_REQUEST['calificacion'];
        $data = "'".$nombre."',".$calificacion;
        $producto = new Modelo();
        $dato = $producto->insertar("productos",$data);
        header("location:".urlsite);
    }



    //EDITAR
    static function editar(){    
        $id = $_REQUEST['id'];
        $producto = new Modelo();
        $dato = $producto->mostrar("productos","id=".$id);        
        require_once("vista/editar.php");
    }
    //ACTUALIZAR
    static function actualizar(){
        $id = $_REQUEST['id'];
        $nombre= $_REQUEST['nombre'];
        $calificacion= $_REQUEST['calificacion'];
        $data = "nombre='".$nombre."',calificacion=".$calificacion;
        $producto = new Modelo();
        $dato = $producto->actualizar("productos",$data,"id=".$id);
        header("location:".urlsite);
    }


    //ELIMINAR
    static function eliminar(){    
        $id = $_REQUEST['id'];
        $producto = new Modelo();
        $dato = $producto->eliminar("productos","id=".$id);
        header("location:".urlsite);
    }


}