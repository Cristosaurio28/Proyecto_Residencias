<?php 

include("../../../bd.php");

if(isset($_GET['txtID'])){
    //RECUPERAR INFORMACION Y DATOS DEL ID CORRESPONDIENTE
        $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

        $sentencia=$conexion->prepare("SELECT * FROM tareas_de_equipo WHERE  ID=:ID ");
        $sentencia->bindParam(":ID",$txtID);
        $sentencia->execute();
        $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
        $archivo=$registro['Archivo'];
        $estado=$registro['Estado'];
        $fecha=$registro['Fecha'];

}
if($_POST){
    print_r($_POST);
    
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $Archivo=(isset($_POST['Archivo']))?$_POST['Archivo']:"";
    $Estado=(isset($_POST['Estado']))?$_POST['Estado']:"";
    $Fecha=(isset($_POST['Fecha']))?$_POST['Fecha']:"";

    $sentencia=$conexion->prepare("UPDATE tareas_de_equipo 
    SET Archivo=:Archivo, Estado=:Estado, Fecha=:Fecha
    WHERE ID =:ID ");

    $sentencia->bindParam(":Archivo",$Archivo);
    $sentencia->bindParam(":Estado",$Estado);
    $sentencia->bindParam(":Fecha",$Fecha);
    $sentencia->bindParam(":ID",$txtID);

    $sentencia->execute();

    $mensaje="Registro modificado";
    header("Location:docentes.php?mensaje=".$mensaje);
}
include("../../../templates/header.php");
?>
<link rel="stylesheet" href="/css/back.css">

<div class="card border-dark">
    <div class="card-header">
    USUARIO
    </div>
    <div class="card-body">
<form action="" method="post">

<div class="mb-3">
    <label for="" class="form-label">ID:</label>
    <input readonly
        type="text"
        class="form-control"
        value="<?php echo $txtID;?>"
        name="ID"
        id="ID"
        aria-describedby="helpId"
        placeholder=""
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
    <label for="archivo" class="form-label">Archivo de Trabajo</label>
    <input
        type="file"
        class="form-control"
        value="<?php echo $Archivo;?>"
        name="Archivo"
        id="Archivo"
        aria-describedby="helpId"
        placeholder="Archivo del Trabajo"
    />
</div>

<div class="mb-3">
    <label for="Estado" class="form-label">Estado del Proyecto:</label>
    <input
        type="text"
        class="form-control"
        name="Estado"
        id="Estado"
        aria-describedby="helpId"
        placeholder="Estado del Proyecto:"
    />
</div>

<div class="mb-3">
    <label for="" class="form-label">Fecha:</label>
    <input
        type="date"
        class="form-control"
        value="<?php echo $Fecha;?>"
        name="Fecha"
        id="Fecha"
        aria-describedby="helpId"
        placeholder="Fecha"
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
<?php include("../../../templates/footer.php")?>