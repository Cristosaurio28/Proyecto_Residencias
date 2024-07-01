<?php
include ("../../../bd.php");
include("../../../templates/header.php");
if(isset($_GET['txtID'])){

$txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
$sentencia=$conexion->prepare("DELETE FROM proyectos_docentes WHERE id=:id ");
$sentencia->bindParam(":id",$txtID);
$sentencia->execute();
}

$sentencia=$conexion ->prepare("SELECT * FROM `proyectos_docentes`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<link rel="stylesheet" href="/css/back.css">
<br>
<div>
    <h1> Trabajo Asignado</h1>
</div>
<div class="card border-dark">
    <div class="card-body table-primary ">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">ID</th>
                        <th scope="col" style="text-align: center;">Titulo</th>
                        <th scope="col" style="text-align: center;">Estado</th>
                        <th scope="col" style="text-align: center;">Prioridad</th>
                        <th scope="col" style="text-align: center;">Archivo</th>
                        <th scope="col" style="text-align: center;">URL</th>
                        <th scope="col" style="text-align: center;">Fecha</th>
                        <th scope="col" style="text-align: center;">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($lista_servicios as $registros){
                    ?>
                    <tr class=""  style="text-align: center;">
                        <td><?php echo $registros['id']?></td>
                        <td><?php echo $registros['titulo']?></td>
                        <td><?php echo $registros['estado']?></td>
                        <td><?php echo $registros['prioridad']?></td>
                        <td><?php echo $registros['archivo']?></td>
                        <td><?php echo $registros['url']?></td>
                        <td><?php echo $registros['fecha']?></td>
                        <td>
                           <a name="" id="" class="btn btn-success" href="editar.php?txtID=<?php echo $registros['id']?>" role="button">Editar</a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    
    </div>
</div>

<?php
include("../../../templates/footer.php");
?>