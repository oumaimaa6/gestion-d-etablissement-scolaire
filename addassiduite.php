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
    <title>Add Assiduite</title>
    <link rel="stylesheet" href="css/cherche.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="css/new.css">
</head>
<body>
<div class="forme">
<a href="assiduite.php" class="back_btn">Retour</a>
 <form action="addassiduite.php" method="POST">
    <label>Code d'inscription</label>
        <input type="text" name="code_inscription" ><br>
        <label>Semestre</label>
        <select name="semestre">
        <option value="semestre_1">Semestre 1</option>
        <option value="semestre_2">Semestre 2</option>
        <option value="semestre_3">Semestre 3</option>
        <option value="semestre_4">Semestre 4</option>
        </select><br>
        <input type="submit" name="submit" value="NEXT"><br>



<?php if(isset($_POST['submit'])){ ?>
<label>Code d'inscription</label>
<select name="code">
<?php $cin=$_POST['code_inscription'];
$stm=$conn->query("SELECT n_apogee,nom,prenom from etudiant where n_apogee='$cin'"); 
$res=$stm->fetchAll();
$name=" "; $last=" ";
if($res!=0){
      foreach($res as $val){ 
    $name=$val['nom']; $last=$val['prenom'];
echo "<option value=".$val['n_apogee'].">".$val['n_apogee']."</option>";
} ?>

</select>
<h3>L'etudiant: <?php echo $name." ".$last; } ?></h3>


<label>Semestre</label>
        <select name="semestre">
<?php $se=$_POST['semestre'];
 echo "<option value=".$se.">".$se."</option>";?>
 </select><br>
        <label>Date</label>
        <input type="date" name="date" ><br>
        <label>Type</label>
        <select name="type">
        <option value="aucune">Aucune</option>
        <option value="avertissement">Avertissement</option>
        <option value="blame">Blame</option>
        <option value="conseil desciplinaire">Conseil desciplinaire</option>
        <option value="exclusion du cours">Exclusion du cours</option>
        </select><br>
        <label>Motif</label>
        <input type="text" name="motif"><br>
        <input type="submit" value="ajouter" name="submit2">
        </form>
        </div>
    <?php }
    if(isset($_POST['submit2'])){
    $code= $_POST['code'];
    $date='0000-00-00';
    if(!empty( $_POST['date']))
    {$date= $_POST['date'];}
    
    $type=$_POST['type'];
    $semestre= $_POST['semestre'];
    $motif= $_POST['motif'];
    $conn->query("INSERT INTO assiduite(code_etudiant,semestre,date,type,motif) 
        VALUES ('$code','$semestre','$date','$type','$motif')");
       echo "Bien Ajouter";
}
    ?>
</body>
</html>