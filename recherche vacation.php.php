<?php 
include_once('conbd.php');
include_once ('baredemenu.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recherche</title>
    <link rel="stylesheet" href="css/cherche.css">
</head>
<body>
<div class="forme">
   <form action="recherche vacation.php" method="POST">
   <a href="vacation.php" class="back_btn">Retour</a><br>
    <label>Vacataire</label>
    <select name="cin">
        <?php $stm=$conn->query("select nom,prenom,CIN_vacataire from vacataire "); 
        while($val=$stm->fetch()){ 
        echo "<option value=".$val['CIN_vacataire'].">".$val['nom']." ".$val['prenom']."</option>";
        }?>
        </select>
<input type="submit" name="recherche" value="choisi plus"><br>
       <?php if(isset($_POST['recherche'])){ $id=$_POST['cin'];?>
        <label>Le professeur:</label>
        <select name="prof">
        <?php $stm=$conn->query("select nom,prenom,CIN_vacataire from vacataire where CIN_vacataire='$id'"); 
        while($val=$stm->fetch()){ 
        echo "<option value=".$val['CIN_vacataire'].">".$val['nom']." ".$val['prenom']."</option>";
        }?>
        </select><br>
<label>matiere</label>
<select name="code">
<?php 

$resultat=$conn->query("SELECT intitule_matiere,code_matiere FROM matiere JOIN vacataire ON matiere.code_matiere=vacataire.code_matiere1
OR matiere.code_matiere=vacataire.code_matiere2 OR matiere.code_matiere=vacataire.code_matiere3 OR matiere.code_matiere=vacataire.code_matiere4
OR matiere.code_matiere=vacataire.code_matiere5 OR matiere.code_matiere=vacataire.code_matiere6 where CIN_vacataire='$id'");
while($val=$resultat->fetch()){ 
    echo "<option value=".$val['code_matiere'].">".$val['intitule_matiere']."</option>";
    $nom=$val['intitule_matiere'];
}
?>
</select><br>
    <label>Date de debut</label>
    <input type="date" name="date1" ><br>
    <label>Date de fin</label>
    <input type="date" name="date2" ><br>
    <input type="submit" name="submit" value="recherche"><br>
    <?php 
}
if(isset($_POST['submit'])){
$cin=$_POST['cin'];
$matiere=$_POST['code'];
$resultat=$conn->query("SELECT intitule_matiere from matiere where  code_matiere='$matiere'");
while($val=$resultat->fetch()){
$nom=$val['intitule_matiere'];
}
$date1=strtotime($_POST['date1']);
$date2=strtotime($_POST['date2']);
$stm=$conn->query("SELECT duree,date from vacation where id_vacataire='$cin' and id_matiere='$matiere'");
$n=0;
    while($val=$stm->fetch()){
    $date=strtotime($val['date']);
    if($date<=$date2 && $date>=$date1){
        $n+=$val['duree'];
    }
    }?>
    <input type="button" value="<?php echo "le nombre des heures effectives 
    du matiere: ".$nom."
     est:  ".$n."h"; ?>">
   <?php } ?>
    </form> 
  
   </div>
</body>
</html>