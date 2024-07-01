<?php

include ("../../../bd.php");
include("../../../templates/header.php");
if($_POST){
    
    $Trabajo=(isset($_POST['Trabajo']))?$_POST['Trabajo']:"";
    $Comentario=(isset($_POST['Comentario']))?$_POST['Comentario']:"";
    $Responsable=(isset($_POST['Responsable']))?$_POST['Responsable']:"";
    $Estado=(isset($_POST['Estado']))?$_POST['Estado']:"";
    $Prioridad=(isset($_POST['Prioridad']))?$_POST['Prioridad']:"";
    $Fecha=(isset($_POST['Fecha']))?$_POST['Fecha']:"";
    $Archivo=(isset($_FILES['Archivo']['name']))?$_FILES['Archivo']['name']:"";
    $URL=(isset($_POST['URL']))?$_POST['URL']:"";
  
    $sentencia=$conexion ->prepare("INSERT INTO `tareas_de_equipo`(`ID`, `Trabajo`, `Comentario`, `Responsable`, `Estado`,
     `Prioridad`, `Fecha`, `Archivo`, `URL`) 
    VALUES (NULL, :titulo, :estado, :prioridad, :archivo, :url, :fecha);");

$sentencia->bindParam(":Trabajo",$Trabajo);
$sentencia->bindParam(":Comentario",$Comentario);
$sentencia->bindParam(":Responsable",$Responsable);
$sentencia->bindParam(":Estado",$Estado);
$sentencia->bindParam(":Prioridad",$Prioridad);
$sentencia->bindParam(":Fecha",$Fecha);
$sentencia->bindParam(":Archivo",$Archivo);
$sentencia->bindParam(":URL",$URL);

    $sentencia->execute();

    $mensaje="Registro agregado con Exito";
    header("Location:ver.php?mensaje.$mensaje");
}
?>
<link rel="stylesheet" href="/css/back.css">

<br/>
<div class="card border-dark">

    <div class="card-header">Crear Servicios</div>
    <br/>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    
    <div class="mb-3">
        <label for="Trabajo" class="form-label">Trabajo:</label>
        <input type="text"
         class="form-control" 
         name="Trabajo" id="Trabajo" 
         aria-describedby="helpId" 
         placeholder="Trabajo"/>
    </div>
    
    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text"
         class="form-control" 
         name="estado" id="estado" 
         aria-describedby="helpId" 
         placeholder="Estado"/>
    </div>

    <div class="mb-3">
        <label for="prioridad" class="form-label">Prioridad:</label>
        <input type="text"
         class="form-control" 
         name="prioridad" id="prioridad" 
         aria-describedby="helpId" 
         placeholder="Prioridad"/>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Archivo</label>
        <input type="file" class="custom-file-input" 
        onchange="return validarExt()" id="Archivo">
        <div id="visorArchivo">

        </div>
    </div>
    <div class="mb-3">
        <label for="url" class="form-label">URL:</label>
        <input
            type="text"
            class="form-control"
            name="url"
            id="url"
            aria-describedby="helpId"
            placeholder="URL"/>
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha:</label>
        <input
            type="date"
            class="form-control"
            name="fecha"
            id="fecha"
            aria-describedby="helpId"
            placeholder="Fecha"/>
    </div>
    
    <button type="submit" class="btn btn-success">
        AGREGAR
    </button>
<a name="" id="" class="btn btn-warning" href="ver.php" role="button">Cancelar</a>
 </form> 

    </div>

    <div class="card-footer text-muted">

    </div>
  
</div>
<script type="text/javascript">

function validarExt(){
var Archivo = document.getElementById('Archivo');
var Archivoruta = Archivo.value;
var extPermitadas = /(.pdf|.PNG|.docx|.jpg)$/i;

if(!extPermitadas.exec(Archivoruta)){
    alert('Seguro que es tu Archivo');
    Archivo.value='';
    return false;
}
else{
    if (Archivo.files && Archivo.files[0]) {
        var visor = new FileReader();
        visor.onload = function(e){
            document.getElementById('visorArchivo').innerHTML =
             '<embed src="'+e.target.result+'" width="200" height="200" >';
        }
        visor.readAsDataURL(Archivo.files[0]);
    }
}
}
</script>
<?php
include("../../../templates/footer.php");
?>