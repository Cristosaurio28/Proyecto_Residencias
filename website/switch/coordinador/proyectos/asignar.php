<?php 
include("../../../bd.php");
include("../../../templates/header.php");

if($_POST){
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $estado=(isset($_POST['estado']))?$_POST['estado']:"";
    $prioridad=(isset($_POST['prioridad']))?$_POST['prioridad']:"";
    $archivo=(isset($_POST['archivo']))?$_POST['archivo']:"";
    $url=(isset($_POST['url']))?$_POST['url']:"";
    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";
  
    $sentencia=$conexion ->prepare("INSERT INTO `proyectos_docentes` (`id`, `titulo`, `estado`,`prioridad`,
     `archivo`,`url`,`fecha`) 
    VALUES (NULL, :titulo, :estado, :prioridad , :archivo,:url,:fecha);");

$sentencia->bindParam(":titulo",$titulo);
$sentencia->bindParam(":estado",$estado);
$sentencia->bindParam(":prioridad",$prioridad);
$sentencia->bindParam(":archivo",$archivo);
$sentencia->bindParam(":url",$url);
$sentencia->bindParam(":fecha",$fecha);

    $sentencia->execute();

    $mensaje="Registro agregado con Exito";
    header("Location:../../docente/VerDoc/asignatura.php?mensaje.$mensaje");
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
        <label for="titulo" class="form-label">Titulo:</label>
        <input type="text"
         class="form-control" 
         name="titulo" id="titulo" 
         aria-describedby="helpId" 
         placeholder="titulo"/>
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
            placeholder="fecha"/>
    </div>
    
    <button type="submit" class="btn btn-success">
        AGREGAR
    </button>

<a name="" id="" class="btn btn-warning" href="<?php echo $url_base;?>index.php" role="button">Cancelar</a>
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