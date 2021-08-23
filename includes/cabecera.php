<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>

<!DOCTYPE html>
<html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
            <title>Blog de vieojuegos</title>
        </head>
        <body>
            <!-- CABECERA -->
            <header id="cabecera">
                <!-- LOGO -->
                <div id="logo">
                    <a href="index.php">
                        Blog del GAMER-Campero
                    </a>
                </div>

                <!-- MENU -->
                <nav id="menu">
                    <ul>
                        <li>
                            <a href="index.php">Inicio</a>
                        </li>
                        <!--OBTENEMOS LAS CATEGORIAS DE BD -->
                        <?php 
                            $categorias = conseguirCategorias($db);
                            if(!empty($categorias)):
                                while($categoria = mysqli_fetch_assoc($categorias)) : 
                        ?>
                                    <li>
                                        <a href="categoria.php?id=<?=$categoria['id']?>"><?= $categoria['nombre'] ?></a>
                                    </li>
                        <?php 
                                endwhile; 
                            endif;
                        ?>    
                    
                        <li>
                            <a href="index.php">Sobre mi</a>
                        </li>
                        <li>
                            <a href="https://www.linkedin.com/in/exequiel-ramirez">Contáctame</a>
                        </li>
                    </ul>
                </nav>
                <div class="clearfix"></div>  <!--no poermite borrar los flotados-->
            </header>
     <div id="contenedor">
<?php ?>
