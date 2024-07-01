<?php 

include("../../../bd.php");

if(isset($_GET['txtID'])){
    //RECUPERAR INFORMACION Y DATOS DEL ID CORRESPONDIENTE
        $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

        $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE  ID=:ID ");
        $sentencia->bindParam(":ID",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
        $usuario=$registro['usuario'];
        $password=$registro['password'];
        $rol=$registro['rol'];

}
if($_POST){
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $password=(isset($_POST['password']))?$_POST['password']:"";
    $rol=(isset($_POST['rol']))?$_POST['rol']:"";

    $sentencia=$conexion->prepare("UPDATE tbl_usuarios 
    SET usuario=:usuario, password=:password , rol=:rol
    WHERE id =:id ");

    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":password",$password);
    $sentencia->bindParam(":rol",$rol);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Registro modificado";
    header("Location:docentes.php?mensaje=".$mensaje);
}
include("../../../templates/header.php");
?>
<link rel="stylesheet" href="/css/groung.css">


<div class="card  border-dark">
    <div class="card-header">
    USUARIO
    </div>
    <div class="card-body">
<form action="" method="post">

<div class="mb-3">
    <label for="txtID" class="form-label">ID:</label>
    <input readonly
        type="text"
        class="form-control"
        value="<?php echo $txtID;?>"
        name="txtID"
        id="txtID"
        aria-describedby="helpId"
        placeholder=""
    />
</div>


<div class="mb-3">
    <label for="" class="form-label">Usuario:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $usuario;?>"
        name="usuario"
        id="usuario"
        aria-describedby="helpId"
        placeholder="Usuario o Docente"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">Constraseña:</label>
    <input
        type="password"
        class="form-control"
        value="<?php echo $password;?>"
        name="password"
        id="password"
        aria-describedby="helpId"
        placeholder="password"
    />
</div>
<div class="mb-3">
    <label for="" class="form-label">ROL:</label>
    <input
        type="text"
        class="form-control"
        value="<?php echo $rol;?>"
        name="rol"
        id="rol"
        aria-describedby="helpId"
        placeholder="ROL"
    />
</div>
<button type="submit" class="btn btn-success">
        Actualizar
    </button>
<a name="" id="" class="btn btn-warning" href="docentes.php" role="button">Cancelar</a>



</form>
    </div>
    <div class="card-footer text-muted">


    </div>
</div>


<?php include("../../../templates/footer.php")?>