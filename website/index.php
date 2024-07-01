<?php
include("templates/header.php");

if($logueado){
    if ($rol == 'docente') {                                          
       include_once('docente.php');                
    } else if ($rol == 'coordinador') {
       include_once('coordinador.php');
   }
}
?>
    <br/>    

<?php
include("templates/footer.php");
?>        