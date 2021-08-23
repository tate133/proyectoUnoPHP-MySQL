<?php 
if(isset($_POST)){
    //CONEXION A LA BASE DE DATOS
    require_once 'includes/conexion.php';

    //Iniciamos sesion
    if(!isset($_SESSION)){
        session_start();
    }
    

    //RECOGEMOS LOS VALORES DEL FORMULARIO DE REGISTRO

    //OPERADOR TERNARIO PARA COMPROBAR SI LLEGA ALGO POR POST
    $nombre = isset ($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset ($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email  = isset ($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset ($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;
    
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

    //VALIDAR APELLIDOS
    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellidos'] = "Apellidos esta mal ingresado";
    }

    //VALIDAR EMAIL
    if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else{
        $email_validado = false;
        $errores['email'] = "Email esta mal ingresado";
    }

    //VALIDAR PASSWORD
    if(!empty($password)){
        $password_validado = true;
    }else{
        $password_validado = false;
        $errores['password'] = "Password esta mal ingresado";
    }

    $guardar_usuario = false;

    if(count($errores) == 0){
        $guardar_usuario =true;
        
        //CIFRAR LA PASSWORD -- de no hacero es ILEGAL
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 4]);
        

        //INSERTAR USUARIO EN LA TABLA USUARIOS DE LA BBDD
        $sql = "INSERT INTO usuarios VALUE(null, '$nombrne', '$apellidos', '$email', '$password_segura', CURDATE());";
        $guardar = mysqli_query($db, $sql);

    

        if($guardar){
            $_SESSION['completado'] = "El registro se completó correctamente";
        }else{
            $_SESSION['errores']['general'] = "Fallo al registrar el usuario !!";
        }

    }else{
        $_SESSION['errores'] = $errores;
    }
    
}
header('Location: index.php');



/* verificar password correcta
var_dump($password);
var_dump($password_segura);
var_dump(password_verify($password, $password_segura));*/
?>

