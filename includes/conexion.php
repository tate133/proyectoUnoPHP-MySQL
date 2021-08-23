<?php
//CONEXION A LA BASE DE DATOS
$servidor = 'localhost';
$usuario = 'root';
$password = '';
$basededatos = 'blog_master';

$db = mysqli_connect($servidor, $usuario, $password, $basededatos);

mysqli_query($db, "SET NAMES 'utf8'");

//Iniciar la sesion
if(!isset($_SESSION)){
    session_start();
}





?>