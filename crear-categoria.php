<?php require_once 'includes/redireccion.php'; ?>
<!-- REQUIERE DE ENCABEZADO -->
<?php require_once 'includes/cabecera.php'; ?>         
<!-- REQUIERE DE BARRA LATERAL -->
<?php require_once 'includes/lateral.php';?>

<!-- CAJA PRINCIPAL -->
<div id="principal">
        <h1>Crear categorias</h1>
        <p>
            Añade nuevas categorias para que los usuarios puedan usarlas al crear sus entradas.
        </p>
        <br>
        <form action="guardar-categoria.php" method= "POST">
            <label for="nombre">Nombre de la categoria</label>
            <input type="text" name="nombre">

            <input type="submit" value="Guardar">
        </form>
        
        
    </div>          
    <!--FIN PRINCIPAL -->
                
            
<!--REQUIRE DE PIE -->
<?php require_once 'includes/pie.php'; ?>