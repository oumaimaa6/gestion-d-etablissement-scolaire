<?php 

if(isset($_GET["id"])){
   include_once('conbd.php');
    $id=htmlentities($conn->quote($_GET["id"]));
    $delete=$conn->query("DELETE FROM absence WHERE id_absence=$id ");
    if($delete){
        header('location:abcence.php');
    }else { echo "erreur ";}
}

?>