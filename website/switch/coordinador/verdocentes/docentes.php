<?php 
include("../../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM docentes WHERE id=:id ");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}

$sentencia=$conexion ->prepare("SELECT * FROM `docentes`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../../templates/header.php") 
?>
<link rel="stylesheet" href="/css/back.css">
<h1>Nombres de los Docentes</h2>
<div class="card border-dark">

    <div class="card-body">

    <div class="table-responsive-sm">
    <table
        class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">Docentes:</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($lista_servicios as $registros){
        ?>
            <tr class="" style="text-align: center;">
                <td scope="row"><?php echo $registros['docente'];?></td>
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