<?php
    //include_once('baredemenu.php');
    include_once('verification.php');
    include_once('conbd.php');
if(isset($_GET["id"])){
    
    $cin=$_GET["id"];
    $tab=$conn->query("select * FROM etudiant WHERE id='$cin'");
    $res=$tab->fetchAll();
    print_r($res);
    $photo=$res[0]['photo'];
   if($res[0]['photo']!="default.png") unlink('./upload/'.$photo);
   if($conn->query("DELETE FROM etudiant WHERE id='$cin'")){
       header('location:etudiant.php');
    }else { echo "erreur ";}
}

?>
