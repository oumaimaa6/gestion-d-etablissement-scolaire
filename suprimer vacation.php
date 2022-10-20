<?php
if(isset($_GET["id"])){
    include_once('baredemenu.php');
    include_once('verification.php');
    include_once('conbd.php');
    $id=htmlentities($conn->quote($_GET["id"]));
    $delete=$conn->query("DELETE FROM vacation WHERE id=$id ");
    if($delete){
        header('location:vacation.php');
    }else { echo "erreur ";}
}

?>