<?php 
include_once('conbd.php');
include_once('baredemenu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>recherche de matieres</title>
    <link rel="stylesheet" href="css/cherche.css">
</head>
<body>
<div class="forme">
   <form action="recherche de matiere.php" method="POST">
   <a href="vacation.php" class="back_btn">Retour</a><br>
    <label>Matieres</label>
    <select name="matiere">
    <?php $stm=$conn->query("select code_matiere, intitule_matiere from matiere "); 
        while($val=$stm->fetch()){ 
        echo "<option value=".$val['code_matiere'].">".$val['intitule_matiere']."</option>";
        }?>
    </select><br>
    <label>Date de debut</label>
    <input type="date" name="date1" ><br>
    <label>Date de fin</label>
    <input type="date" name="date2" ><br>
    <input type="submit" name="submit" value="recherche"><br>
    <?php 

if(isset($_POST['submit'])){
$code=$_POST['matiere'];
$resultat=$conn->query("SELECT nom ,prenom from vacataire where  code_matiere1='$code' or code_matiere2='$code' or code_matiere3='$code' or code_matiere4='$code' ");
$nom="" ; $prenom=""; 
while($val=$resultat->fetch()){
$nom=$val['nom']; $prenom=$val['prenom']; }
$date1=strtotime($_POST['date1']);
$date2=strtotime($_POST['date2']);
$stm=$conn->query("SELECT duree,date from vacation where  id_matiere='$code'");
$n=0;
    while($val=$stm->fetch()){
    $date=strtotime($val['date']);
    if($date<=$date2 && $date>=$date1){
        $n+=$val['duree'];}
    } ?>
    <input type="button" value="<?php echo " le professeur:  
    ".$nom." ".$prenom."
     les heures effectives sont:  ".$n."h"; ?>">
   <?php } ?>
    </form> 
  
   </div>
</body>
</html>