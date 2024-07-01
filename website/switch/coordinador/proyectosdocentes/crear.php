<?php
include ("../../../bd.php");
include("../../../templates/header.php");
if($_POST){
    
    $Trabajo=(isset($_POST['Trabajo']))?$_POST['Trabajo']:"";
    $Comentario=(isset($_POST['Comentario']))?$_POST['Comentario']:"";
    $Responsable=(isset($_POST['Responsable']))?$_POST['Responsable']:"";
    $Prioridad=(isset($_POST['Prioridad']))?$_POST['Prioridad']:"";
    $Estado=(isset($_POST['Estado']))?$_POST['Estado']:"";
    $Fecha=(isset($_POST['Fecha']))?$_POST['Fecha']:"";
  
    $sentencia=$conexion ->prepare("INSERT INTO `tareas_de_equipo` (`ID`, `Trabajo`, `Comentario`,`Responsable`,
     `Prioridad`,`Estado`,`Fecha`) 
    VALUES (NULL, :Trabajo, :Comentario, :Responsable , :Prioridad,:Estado,:Fecha);");

$sentencia->bindParam(":Trabajo",$Trabajo);
$sentencia->bindParam(":Comentario",$Comentario);
$sentencia->bindParam(":Responsable",$Responsable);
$sentencia->bindParam(":Prioridad",$Prioridad);
$sentencia->bindParam(":Estado",$Estado);
$sentencia->bindParam(":Fecha",$Fecha);

    $sentencia->execute();

    $mensaje="Registro agregado con Exito";
    header("Location:ver.php?mensaje.$mensaje");
}
?>
<link rel="stylesheet" href="/css/groung.css">

<br/> 
<div class="card  border-dark">

    <div class="card-header">Crear Servicios</div>
    <br/>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
      
    <div class="mb-3">
        <label for="Responsable" class="form-label">Responsable:</label>
        <input type="text"
         class="form-control" 
         name="Responsable" id="Responsable" 
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
        <label for="Comentario" class="form-label">Comentario:</label>
        <input type="text"
         class="form-control" 
         name="Comentario" id="Comentario" 
         aria-describedby="helpId" 
         placeholder="Comentario"/>
    </div>
    <div class="mb-3">
        <label for="Fecha" class="form-label">Fecha</label>
        <input
            type="date"
            class="form-control"
            name="Fecha"
            id="Fecha"
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