<?php 
include ("../../../bd.php");
include("../../../templates/header.php");


if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tareas_de_equipo WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}

$sentencia=$conexion ->prepare("SELECT * FROM `tareas_de_equipo`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="/css/groung.css">


<div class="card  border-dark">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button"
        >Agregar Registros</a>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">ID</th>
                        <th scope="col" style="text-align: center;">Responsable</th>
                        <th scope="col" style="text-align: center;">Trabajo</th>
                        <th scope="col" style="text-align: center;">Comentario</th>
                        <th scope="col "style="text-align: center;">Fecha</th>
                        <th scope="col" style="text-align: center;">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($lista_servicios as $registros){
                    ?>
                    <tr class=""  style="text-align: center;">
                        <td><?php echo $registros['ID']?></td>
                        <td><?php echo $registros['Responsable']?></td>
                        <td><?php echo $registros['Trabajo']?></td>
                        <td><?php echo $registros['Comentario']?></td>
                        <td><?php echo $registros['Fecha']?></td>

                    <td>
                        <a name="" id="" class="btn btn-success" href="editar.php?txtID=<?php echo $registros['ID']?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="ver.php?txtID=<?php echo $registros['ID']?>" role="button">Eliminar</a>
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