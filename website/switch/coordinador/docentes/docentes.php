<?php 
include("../../../bd.php");

if(isset($_GET['txtID'])){

    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE ID=:ID ");
    $sentencia->bindParam(":ID",$txtID);
    $sentencia->execute();
}


$sentencia=$conexion ->prepare("SELECT * FROM `tbl_usuarios`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../../templates/header.php") 
?>
<link rel="stylesheet" href="/css/groung.css">

<div class="card  border-dark">
    <a name="" id="" class="btn btn-primary" href="crear.php" role="button"
        >Agregar Docentes</a>
    <div class="card-body">

    <div class="table-responsive-sm">
    <table
        class="table">
        <thead>
            <tr>
                <th scope="col" style="text-align: center;">Docentes:</th>
                <th scope="col" style="text-align: center;">ROL</th>
                <th scope="col" style="text-align: center;">ACCION</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($lista_servicios as $registros){
        ?>
            <tr class="" style="text-align: center;">
                <td scope="row"><?php echo $registros['usuario'];?></td>
                <td><?php echo $registros['rol'];?></td>
                <td>
                        <a name="" id="" class="btn btn-success" href="editar.php?txtID=<?php echo $registros['ID']?>" role="button">Editar</a>
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