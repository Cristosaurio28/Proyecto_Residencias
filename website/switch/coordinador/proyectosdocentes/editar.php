<?php
include ("../../../bd.php");
if(isset($_GET['txtID'])){
//RECUPERAR INFORMACION Y DATOS DEL ID CORRESPONDIENTE
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM tareas_de_equipo WHERE  ID=:ID ");
    $sentencia->bindParam(":ID",$txtID);

    $sentencia->execute();
    
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $Trabajo=$registro['Trabajo'];
    $Comentario=$registro['Comentario'];
    $Responsable=$registro['Responsable'];
    $Prioridad=$registro['Prioridad'];
    $Fecha=$registro['Fecha'];
    $Estado=$registro['Estado'];
}

if($_POST){
    print_r($_POST);

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $Trabajo=(isset($_POST['Trabajo']))?$_POST['Trabajo']:"";
    $Comentario=(isset($_POST['Comentario']))?$_POST['Comentario']:"";
    $Responsable=(isset($_POST['Responsable']))?$_POST['Responsable']:"";
    $Prioridad=(isset($_POST['Prioridad']))?$_POST['Prioridad']:"";
    $Fecha=(isset($_POST['Fecha']))?$_POST['Fecha']:"";
    $Estado=(isset($_POST['Estado']))?$_POST['Estado']:"";
    $Archivo=(isset($_FILES['Archivo']['name']))?$_FILES['Archivo']['name']:"";
    $URL=(isset($_POST['URL']))?$_POST['URL']:"";

    $sentencia=$conexion ->prepare("UPDATE tareas_de_equipo 
    SET Trabajo=:Trabajo, Comentario=:Comentario,Responsable=:Responsable,Prioridad=:Prioridad,Fecha=:Fecha,Estado=:Estado,Archivo=:Archivo,
    URL=:URL 
    WHERE id =:id ");

$sentencia->bindParam(":Trabajo",$Trabajo);
$sentencia->bindParam(":Comentario",$Comentario);
$sentencia->bindParam(":Responsable",$Responsable);
$sentencia->bindParam(":Prioridad",$Prioridad);
$sentencia->bindParam(":Fecha",$Fecha);
$sentencia->bindParam(":Estado",$Estado);
$sentencia->bindParam(":Archivo",$Archivo);
$sentencia->bindParam(":URL",$URL);
$sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
$mensaje="Registro modificado";
    header("Location:ver.php?mensaje.$mensaje");
}
include("../../../templates/header.php");
?>
<link rel="stylesheet" href="/css/groung.css">

<br/>
<div class="card  border-dark">
    <div class="card-header">Editar la Informacion de Servicios</div>
    <br/>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    
    <div class="mb-3">
        <label for="txtID" class="form-label">ID:</label>
        <input readonly type="text" value="<?php echo $txtID;?>" class="form-control" 
        name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID"/>
    
    </div>
    <div class="mb-3">
        <label for="Responsable" class="form-label">Responsable</label>
        <input
            type="text"
            value="<?php echo $Responsable;?>"
            class="form-control"
            name="Responsable"
            id="Responsable"
            aria-describedby="helpId"
            placeholder="Responsable"/>
    </div>
    <div class="mb-3">
        <label for="Trabajo" class="form-label">Trabajo</label>
        <input
            type="text"
            value="<?php echo $Trabajo;?>"
            class="form-control"
            name="Trabajo"
            id="Trabajo"
            aria-describedby="helpId"
            placeholder="Trabajo"/>
    </div>
    <div class="mb-3">
        <label for="Comentario" class="form-label">Comentario</label>
        <input
            type="text"
            value="<?php echo $Comentario;?>"
            class="form-control"
            name="Comentario"
            id="Comentario"
            aria-describedby="helpId"
            placeholder="Comentario"/>
    </div>
    <div class="mb-3">
        <label for="Fecha" class="form-label">Fecha</label>
        <input
            type="date"
            value="<?php echo $Fecha;?>"
            class="form-control"
            name="Fecha"
            id="Fecha"
            aria-describedby="helpId"
            placeholder="Fecha"/>
    </div>
    <button type="submit" class="btn btn-success" href="ver.php">
        Actualizar
    </button>

<a name="" id="" class="btn btn-warning" href="ver.php" role="button">Regresar</a>

 </form> 

    </div>

    <div class="card-footer text-muted">
    </div>
</div>
<?php
include("../../../templates/footer.php");
?>