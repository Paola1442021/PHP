<?php
session_start();
if($_POST){
    if(($_POST['usuario']=="Paola")&&($_POST['contrasenia']=="12345")){
        //redireccionamos al index
        $_SESSION['usuario']="Paola";
        header("location:index.php");
    }else{
        echo"<script>alert('Usuario o contraseña incorrecta');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    <link rel="stylesheet" href="estilos/login.css">

    </head>

    <body class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="card mt-5">
                    <div class="card-header ">
                        Iniciar sesion
                    </div>
                    <div class="card-body">
                        <form action="login.php" method="post">
            <label for="">Usuario:</label>
            <input type="text" name="usuario" id="">
            <label for="">Contrasenia:</label>
            <input type="password" name="contrasenia" id="">
            <button type="submit" class="btn btn-success">Entrar al portafolio</button>
        </form>
                    </div>
                    <div class="card-footer text-muted"></div>
                </div>
            
            </div>
        
        </div>
    
    </body>
</html>
