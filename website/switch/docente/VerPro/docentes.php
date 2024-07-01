<?php 
include("../../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM proyectos_docentes WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}

$sentencia=$conexion ->prepare("SELECT * FROM `proyectos_docentes`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../../templates/header.php") 
?>
<link rel="stylesheet" href="/css/back.css">
<h1>Proyectos de los Docentes</h1>

<div class="card  border-dark"  >
<div style="margin-left: 370px;">

</div>
    <div class="card-body">

    <div class="table-responsive-sm">
    <table
        class="table">
        <thead>
            <tr>
                <th scope="col">Proyectos:</th>

                <th scope="col">Estado:</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($lista_servicios as $registros){
        ?>
            <tr class="">
                <td scope="row"><?php echo $registros['archivo'];?></td>
                <td scope="row"><?php echo $registros['estado'];?></td>
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