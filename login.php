<?php
//INCIAR SESION Y CONEXION A BASE DE DATOS
require_once 'includes/conexion.php';   

//RECOGER DATOS DEL FORMULARIO
if(isset($_POST)){

    //recoger datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Consulta para comprobar credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email';";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        $usuario = mysqli_fetch_assoc($login);
        
        //COMPROBAR PASSWORD 
        $veryfy = password_verify($password, $usuario['password']);
        
        if($veryfy){
            //UTILIZAR UNA SESION PARA GUARDAR LOS DATOS DEL USUARIO LOGUEADO
            $_SESSION['usuario'] = $usuario;

            if(isset($_SESSION['error_login'])){
                unset($_SESSION['error_login']);
            }

        }else{
            //SI ALGO FALLA ENVIAR UNA SESION CON EL FALLO
            $_SESSION['error_login'] = "Login INCORRECTO";
        }
    }else{
        // mensaje de error
        $_SESSION['error_login'] = "Login INCORRECTO";
    }

    
    

}

//REDIRIGIR AL index.php
header('Location:index.php');
?>