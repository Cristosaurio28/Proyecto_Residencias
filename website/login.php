<?php

session_start();
if($_POST){
    include("bd.php"); 
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";


    $sentencia=$conexion ->prepare("SELECT *, count(*) as n_usuario 
    FROM `tbl_usuarios`
    WHERE usuario=:usuario
    AND password=:password
    ");
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->execute();

    $lista_servicios=$sentencia->fetch(PDO::FETCH_LAZY);
    if($lista_servicios['n_usuario']>0){
    
        $_SESSION['usuario']=$lista_servicios['usuario'];
        $_SESSION['rol']=$lista_servicios['rol'];
        $_SESSION['logueado']=true;
        header("Location:  index.php");

    }else{
        $mensaje = "Error: El usuario o constraseña son incorrectos";

    }
}

?>

<!doctype html>
<html lang="en">
    <head>
        <title>Log_In</title>
        <!-- Required meta tags -->
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    <link rel="shortcut icon" href="/imagenes/itess.jpg" />
    <link rel="stylesheet" href="/css/fondo.css">
    </head>

    <body background="url">
        <header>
            <!-- place navbar here -->
        </header>
        
        <main>

        <div class="container">

            <div class="row">
                <div
                    class="col-4">
                </div>
                <div class="col-4">
                    <br/><br/><br/><br/><br/>  
                    <?php if(isset($mensaje)){ ?>
                    <div class="alert alert-danger alert-dismissible fade show"
                        role="alert">
                        <button type="button"  class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                        ></button>
                        <strong><?php echo $mensaje;?></strong>
                    </div>
                    <?php }?>

                    <script>
                        var alertList = document.querySelectorAll(".alert");
                        alertList.forEach(function (alert) {
                            new bootstrap.Alert(alert);
                        });
                    </script>
                    
                    <div class="card border-dark">
                        <div class="card-header bg-dark text-white fw-bold">Log_In</div>
                        <div class="card-body" style="background-color: #5578b0;">
                          
                            
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="usuario" class="form-label fw-bold">Usuario:</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder=""/> 
                                </div>

                                <div class="mb-3">
                                        <label for="constrasenia" class="form-label fw-bold">Constraseña:</label>
                                        <input type="password" class="form-control"  name="password" id="password" placeholder=""/>
                                
                                </div>
                                    <input
                                    name=""
                                    style="margin-left: 110px;"
                                    id="boton"
                                    class="btn btn- fw-bold btn-outline-dark btn-lg"
                                    type="submit"
                                    value="Entrar"
                                    />
                                <div>

                                </div>
                               
                                
                            </form>
                        </div>
                        <div class="card-footer text-muted bg-dark">

                        </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
        
        </main>
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

