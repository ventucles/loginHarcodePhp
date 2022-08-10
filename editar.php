<?php 
require_once("layout/head.php");
include("config/conexion.php");
$mensaje="";

//AQUI ESTAMOS EVALUENDO EL BOTON ACTUALIZAR PARA INSERTAR LOS DATOS
if($_POST)
{
  // var_dump($_POST);
    $id=$_POST["idUsuario"];
    $nombre=$_POST["nombre"];
    $usuario=$_POST["usuario"];
    $clave=$_POST["clave"];
    $sql="UPDATE usuarios SET nombreCompleto = '{$nombre}',
                                     username = '{$usuario}',
                                     pass = '{$clave}'
                     WHERE user_id = {$id}";
					 $actualizar=mysqli_query($mysqli,$sql);
				//	header("Location:registrar.php");

/*
    $sql="UPDATE usuarios SET nombre='{$nombre}',usuario='{$usuario}',clave='{$clave}'
        WHERE idUsuario={$id}";
    $actualizar=mysqli_query($mysqli,$sql);
    echo "pase por aqui";*/
    if($actualizar){
        $mensaje="Registro Actualizado";
        header("Location:registrar.php");//DIRECCIONA AL FORMULARIO DE REGISTRO
    }
   
}

//AQUI ESTA CARGANDO AL FORMULARIO EL USUARIO  
if($_GET)
{
    if($_GET['editar'])
    {
        $cargarUsuario = "SELECT user_id,username,nombreCompleto,pass 
                          FROM usuarios WHERE user_id = ".$_GET['editar']."";
        $resultadosId = mysqli_query($mysqli, $cargarUsuario); 
        $datosCampos = mysqli_fetch_array($resultadosId);
    }
   
  
}

//AQUI ESTA CARGANDO LA INFORMACION DE LOS USUARIOS 
  $sql2="SELECT * FROM usuarios";
  $consulta=mysqli_query($mysqli,$sql2);
 


?>

<main>
    <form method="post" action="editar.php">
        <input type="hidden" name="idUsuario" value='<?php echo $datosCampos['user_id'];?>'>
        <label for="txt_nombre">Nombre</label>
        <input type="text" name="nombre" value='<?php echo $datosCampos['nombreCompleto'];?>' id="txt_nombre"><br/>
        <label for="idUsuario">Usuario</label>
        <input type="text" name="usuario"  value='<?php echo $datosCampos['username'];?>' id="idUsuario"><br/>
        <label for="passWord">Password</label>
        <input type="passWord" name="clave"  value='<?php echo $datosCampos['pass'];?>' id="passWord"><br/>
        <button type="submit" name="actualizar">Actualizar Usuario</button>

        <hr/>
         <?php
            echo $mensaje;
         ?>   
    </main>
</form>
<hr>
<table>
    <thead>
        <tr>
            <td>Nombre</td>
            <td>Usuario</td>
            <td>Acciones</td>
        </tr>
    </thead>
    <tbody>
        
         <!--AQUI ESTAMOS RECORRIENDO UN ARREGLO Y  MOSTRANDO LA INFORMACION CARGADA -->
             <?php
             while ($row=mysqli_fetch_array($consulta))
             {
                echo "<tr>  <td>".$row['user_id']."</td>
                            <td>".$row['nombreCompleto']."</td>
                            <td><a href='editar.php?editar={$row['user_id']}'>editar</a></td>
                            <td><a href='registrar.php?eliminar={$row['user_id']}'>Eliminar</a></td>
                      </tr>";
            
             }
             //ESTA FUNCION CIERRA LA CONEXION
             $mysqli->close();
           
           ?>     
    </tbody>

</table>

<?php 
require_once("layout/footer.php");

?>