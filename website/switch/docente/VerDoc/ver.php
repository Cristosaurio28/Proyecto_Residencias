<?php 
include ("../../../bd.php");
include("../../../templates/header.php");


if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tareas_de_equipo WHERE ID=:ID ");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
}

$sentencia=$conexion ->prepare("SELECT * FROM `tareas_de_equipo`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>


<link rel="stylesheet" href="/css/back.css">

<br>
<div>
    <h1> Proyectos Asignados </h1>
</div>
<br>
<div class="card border-dark">
    <div class="card-body table-primary ">
        <div class="table-responsive-sm">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col" style="text-align: center;">ID</th>
                        <th scope="col" style="text-align: center;">Responsable</th>
                        <th scope="col" style="text-align: center;">Trabajo</th>
                        <th scope="col" style="text-align: center;">Comentario</th>
                        <th scope="col" style="text-align: center;">Fecha</th>
                        <th scope="col" style="text-align: center;">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($lista_servicios as $registros){
                    ?>
                    <tr class="" >
                        <td style="text-align: center;"><?php echo $registros['ID']?></td>
                        <td style="text-align: center;"><?php echo $registros['Responsable']?></td>
                        <td style="text-align: center;"><?php echo $registros['Trabajo']?></td>
                        <td style="text-align: center;"><?php echo $registros['Comentario']?></td>
                        <td style="text-align: center;"><?php echo $registros['Fecha']?></td>
                        <td style="text-align: center;">
                           <a name="" id="" class="btn btn-info" href="asignatura.php?txtID=<?php echo $registros['ID']?>" role="button" >(O)</a>
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