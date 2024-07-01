<?php 
include("../../../bd.php");
include("../../../templates/header.php");

if($_POST){
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";
    $rol=(isset($_POST['rol']))?$_POST['rol']:"";

    $sentencia=$conexion ->prepare("INSERT INTO `tbl_usuarios`(`id`, `usuario`, `password`, `rol`) 
    VALUES (NULL, :usuario, :password, :rol);");

$sentencia->bindParam(":usuario",$usuario);
$sentencia->bindParam(":password",$password);
$sentencia->bindParam(":rol",$rol);

$sentencia->execute();
}

?>
<link rel="stylesheet" href="/css/groung.css">

<div class="card  border-dark">
    <div class="card-header">
    USUARIO
    </div>
    <div class="card-body">
<form action="" method="post">
<div class="mb-3">
    <label for="" class="form-label">Nombre del Docente:</label>
    <input
        type="text"
        class="form-control"
        name="usuario"
        id="usuario"
        aria-describedby="helpId"
        placeholder="Nombre del Docente"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Password:</label>
    <input
        type="password"
        class="form-control"
        name="password"
        id="password"
        aria-describedby="helpId"
        placeholder="Password"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">ROL</label>
    <input
        type="text"
        class="form-control"
        name="rol"
        id="rol"
        aria-describedby="helpId"
        placeholder="ROL"
    />
</div>
<button type="submit" class="btn btn-success">AGREGAR</button>
<a name="" id="" class="btn btn-warning" href="docentes.php" role="button">Cancelar</a>



</form>
    </div>
    <div class="card-footer text-muted">


    </div>
</div>
<?php include("../../../templates/footer.php") ?>
