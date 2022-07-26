<?php
  session_start(); // INICIAR LA VARIABLE SESSION
    include("layout/head.php"); // LIBRERIAS    
   
    if(!empty($_POST)) // VALIDO SI EXISTE EL POST ESTA VACIO O ES DIFERENTE
    {
       $user = $_POST['usuario']; // CAPTURO EL CAMPO DEL FORMULARIO USUARIO
       $password = $_POST['pass']; // LA CLAVE
    
       if (($user == "admin") AND ($password == "123456")) {
          $_SESSION['usuario'] = $user;
          $_SESSION['rol'] = 1;
          header("location: configuracion.php");
       } else {
          header("location: index.php");
       }
    }
    ?>

    <main class="mainclass">
      <section class="form-signin">
      <form action="index.php" method="post">

    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" name="usuario" class="form-control" id="floatingInput" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="pass" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

 
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">© programación web 2022-07</p>
  </form>
    </main>
   </body>
</html>