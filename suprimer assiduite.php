<?php 

if(isset($_GET["id"])){
   include_once('conbd.php');
    $id=htmlentities($conn->quote($_GET["id"]));
    $delete=$conn->query("DELETE FROM assiduite WHERE id_assiduite=$id ");
    if($delete){
        header('location:assiduite.php');
    }else { echo "erreur ";}
}

?>