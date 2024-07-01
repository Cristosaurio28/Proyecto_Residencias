<?php
session_start();
$url_base = "/";
if(!isset($_SESSION['usuario'])){
    header("Location:".$url_base."login.php");
}

$usuario = $_SESSION['usuario'];
$rol     = $_SESSION['rol'];
$logueado = $_SESSION['logueado'];
?>

<!doctype html>
<html lang="en">
    <head>
        <title>Residencias de Cristo</title>
        <!-- Required meta tags -->
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
                    rel="stylesheet"
                    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
                    crossorigin="anonymous"/>
        <script
                    src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                    crossorigin="anonymous">
        </script>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
        
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="shortcut icon" href="/imagenes/itess.jpg" />
    </head>

    <body>
        <header>
            <!-- place navbar here -->

            <nav class="navbar navbar-expand navbar-light bg-dark justify-content-end">
                <div class="nav navbar-nav">
                    <a class="nav-item nav-link text-white" href="<?php echo $url_base;?>index.php" aria-current="page">ITESS</a>
                    <a class="nav-item nav-link text-white " href="<?php echo $url_base;?>cerrar.php" aria-current="page">Cerrar Sesion</a>

                </div>
            </nav>
            
        </header>
        <main class="container">
            <br/>
            <script>
                <?php if(isset($_GET['mensaje'])){?>
                Swal.fire({icon:"success", title:"<?php echo $_GET['mensaje']; ?>"});
            
            <?php
                }
            ?>
            </script>
        