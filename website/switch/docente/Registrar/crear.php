<?php 
include("../../../bd.php");
include("../../../templates/header.php");

if($_POST){
    $archivo=(isset($_POST['archivo']))?$_POST['archivo']:"";
    $estado=(isset($_POST['estado']))?$_POST['estado']:"";
    $fecha=(isset($_POST['fecha']))?$_POST['fecha']:"";

    $sentencia=$conexion ->prepare("INSERT INTO proyectos_docentes (id, archivo , estado, fecha) 
    VALUES (NULL, :archivo, :estado, :fecha);");

$sentencia->bindParam(":archivo",$archivo);
$sentencia->bindParam(":estado",$estado);
$sentencia->bindParam(":fecha",$fecha);

$sentencia->execute();
$mensaje="Registro agregado con Exito";
header("Location:docentes.php?mensaje.$mensaje");
}


?>
<link rel="stylesheet" href="/css/back.css">

<br>
<div class="card border-dark">
    
    <div class="card-header">
    Avances de Proyectos
    </div>
    <div class="card-body">
<form action="" method="post">
<div class="mb-3">
    <label for="archivo" class="form-label">Archivo de Trabajo</label>
    <input
        type="file"
        class="form-control"
        name="archivo"
        id="archivo"
        aria-describedby="helpId"
        placeholder="Archivo del Trabajo"
    />
</div>
<div class="mb-3">
        <label for="" class="form-label">Archivo</label>
        <input type="file" class="custom-file-input" 
        onchange="return validarExt()" id="archivo">
        <div id="visorArchivo">

        </div>
    </div>
<div class="mb-3">
    <label for="estado" class="form-label">Estado del Trabajo</label>
    <input
        type="text"
        class="form-control"
        name="estado"
        id="estado"
        aria-describedby="helpId"
        placeholder="Estado del Trabajo"
    />
</div>
<div class="mb-3">
    <label for="fecha" class="form-label">FECHA</label>
    <input
        type="date"
        class="form-control"
        name="fecha"
        id="fecha"
        aria-describedby="helpId"
        placeholder="Fecha"
    />
</div>
<button type="submit" class="btn btn-success">AGREGAR</button>
<a name="" id="" class="btn btn-warning" href="docentes.php" role="button">Cancelar</a>



</form>
    </div>
    <div class="card-footer text-muted">


    </div>
</div>
<script type="text/javascript">

function validarExt(){
var archivo = document.getElementById('archivo');
var Archivoruta = archivo.value;
var extPermitadas = /(.pdf|.PNG|.docx|.jpg)$/i;

if(!extPermitadas.exec(Archivoruta)){
    alert('Seguro que es tu Archivo');
    archivo.value='';
    return false;
}
else{
    if (archivo.files && archivo.files[0]) {
        var visor = new FileReader();
        visor.onload = function(e){
            document.getElementById('visorArchivo').innerHTML =
             '<embed src="'+e.target.result+'" width="200" height="200" >';
        }
        visor.readAsDataURL(archivo.files[0]);
    }
}
}
</script>
<?php include("../../../templates/footer.php") ?>
