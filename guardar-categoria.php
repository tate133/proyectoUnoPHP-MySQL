<?php
if(isset($_POST)){

    //CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

    //Creamos una Array de errores
    $errores = array();

    //Validamos los datos antes de guardarlos en la Base de Datos
    //VALIDAR NOMBRE
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "Nombre esta mal ingresado";
    }

    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES(NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
}

header('Location: index.php');

?>