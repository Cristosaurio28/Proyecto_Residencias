<?php
include ("../../../bd.php");
if(isset($_GET['txtID'])){
//RECUPERAR INFORMACION Y DATOS DEL ID CORRESPONDIENTE
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("SELECT * FROM proyectos_docentes WHERE  id=:id ");

    $sentencia->bindParam(":id",$txtID);
    
    $sentencia->execute();

    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $titulo=$registro['titulo'];
    $estado=$registro['estado'];
    $prioridad=$registro['prioridad'];
    $Archivo=$registro['Archivo'];
    $url=$registro['url'];
    $fecha=$registro['fecha'];
}
if($_POST){
    print_r($_POST);

    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $estado=(isset($_POST['estado']))?$_POST['estado']:"";
    $prioridad=(isset($_POST['prioridad']))?$_POST['prioridad']:"";
    $Archivo=(isset($_FILES['Archivo']['name']))?$_FILES['Archivo']['name']:"";
    $url=(isset($_POST['url']))?$_POST['url']:"";
    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";


    $sentencia=$conexion ->prepare("UPDATE proyectos_docentes 
    SET titulo=:titulo,estado=:estado ,prioridad=:prioridad,Archivo=:Archivo, url=:url,
    fecha=:fecha
    WHERE id =:id");

$sentencia->bindParam(":titulo",$titulo);
$sentencia->bindParam(":estado",$estado);
$sentencia->bindParam(":prioridad",$prioridad);
$sentencia->bindParam(":Archivo",$Archivo);
$sentencia->bindParam(":url",$url);
$sentencia->bindParam(":fecha",$fecha);
$sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
$mensaje="Registro modificado";
    header("Location:ver.php?mensaje.$mensaje");
}
include("../../../templates/header.php");
?>
<link rel="stylesheet" href="/css/back.css">

<br/>
<div class="card border-dark">
    <div class="card-header">Editar la Informacion de Servicios</div>
    <br/>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
    
    <div class="mb-5">
        <label for="txtID" class="form-label">ID:</label>
        <input readonly type="text" value="<?php echo $txtID;?>" 
        class="form-control" name="txtID" id="txtID" 
        aria-describedby="helpId" placeholder="ID"/>
    </div>

    <div class="mb-3">
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text"
        value="<?php echo $titulo;?>"
         class="form-control" 
         name="titulo" id="titulo" 
         aria-describedby="helpId" 
         placeholder="titulo"/>
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <input type="text"
        value="<?php echo $estado;?>"
         class="form-control" 
         name="estado" id="estado" 
         aria-describedby="helpId" 
         placeholder="estado"/>
    </div>
    <div class="mb-3">
        <label for="prioridad" class="form-label">Prioridad:</label>
        <input type="text"
        value="<?php echo $prioridad;?>"
         class="form-control" 
         name="prioridad" id="prioridad" 
         aria-describedby="helpId" 
         placeholder="prioridad"/>
    </div>
<!--
    <div class="mb-3">
        <label for="Estado" class="form-label">Estado:</label>
        <input type="text"
        value="<?php echo $Estado;?>"
         class="form-control" 
         name="Estado" id="Estado" 
         aria-describedby="helpId" 
         placeholder="Estado"/>
    </div>
-->
    <div class="mb-3">
        <label for="url" class="form-label">URL:</label>
        <input
            type="text"
            value="<?php echo $url;?>"
            class="form-control"
            name="url"
            id="url"
            aria-describedby="helpId"
            placeholder="url"/>
    </div>

    <div class="mb-3">
        <label for="Archivo" class="form-label">Archivo</label>
        <input type="file" class="custom-file-input"  aria-describedby="helpId" 
        onchange="return validarExt()" id="Archivo" name="Archivo" placeholder="Archivo">

        <div id="visorArchivo">

        </div>
    </div>

    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input
            type="date"
            value="<?php echo $fecha;?>"
            class="form-control"
            name="fecha"
            id="fecha"
            aria-describedby="helpId"
            placeholder="fecha"/>
    </div>

    
    
    <button type="submit" class="btn btn-success" href="asignatura.php">
        Actualizar
    </button>

<a name="" id="" class="btn btn-warning" href="asignatura.php" role="button">Regresar</a>

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