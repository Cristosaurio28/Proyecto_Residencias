<?php 
include("../../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tareas_de_equipo WHERE ID=:ID ");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
}

$sentencia=$conexion ->prepare("SELECT * FROM `tareas_de_equipo`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../../templates/header.php") 
?>
<link rel="stylesheet" href="/css/back.css">
<h1>Avances de Proyectos</h1>

<div class="card border-dark">
    <div style="margin-left: 360px;">
    
</div>
<br>
    <div class="card-body">

    <div class="table-responsive-sm">
    <table
        class="table">
        <thead>
            <tr>
                <th scope="col">Archivo:</th>
                <th scope="col">Estado:</th>
                <th scope="col">Fecha:</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($lista_servicios as $registros){
        ?>
            <tr class="">
                <td scope="row"><?php echo $registros['Archivo'];?></td>
                <td><?php echo $registros['Estado'];?></td>
                <td><?php echo $registros['Fecha'];?></td>
                <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $registros['ID']?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="docentes.php?txtID=<?php echo $registros['ID']?>" role="button">Eliminar</a>
                </td>
            </tr>
            <?php
        }
            ?>
        </tbody>
    </table>
</div>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include("../../../templates/footer.php") ?>