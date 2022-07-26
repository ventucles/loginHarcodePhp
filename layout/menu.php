<?php 

?>
<nav>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="about.php">Sobre Nosotros</a></li>
        <li><a href="contact.php">Contactos</a></li>

            <?php //AQUI VALIDO EL ROL DEL USUARIO PARA DARLE PERMISO A ESTOS MENUS
                if(isset($_SESSION["rol"]))
                {
                    $permiso=$_SESSION["rol"];
                    if ($permiso==1)
                    {
			        ?>

                    <li><a href="configuracion.php">Configuración</a></li>
                    <li><a href="feq.php">Preguntas Frecuentes</a></li>
                    <li><a href="logout.php">cerrar sessión</a></li>
                   
                   <?php
                }
            }
        ?>

    </ul>
</nav>
