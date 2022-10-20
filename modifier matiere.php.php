<?php 
include('conbd.php');
//include_once('baredemenu.php');
$id=$_GET['id'];
$sql=$conn->query("SELECT * from matiere WHERE id='$id'");
while($res=$sql->fetch()){
    $id=$res['id'];
    $code1=$res['code_matiere'];
    $nom=$res['intitule_matiere'];
    $coef=$res['coef'];
    $horaire=$res['nb_heure'];
    $semestre=$res['semestre'];
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $code=$_POST['code'];
    $nom=$_POST['nom'];
    $coef=$_POST['coef'];
    $horaire=$_POST['horaire'];
    $semestre=$_POST['semestre'];
    $conn->query("UPDATE matiere SET code_matiere='$code',intitule_matiere='$nom',coef='$coef',nb_heure='$horaire',semestre='$semestre' where id='$id'");
    header('location:matiere.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="css/cherche.css">
    
</head>
<body>
<div class="forme">
     <a href="matiere.php" class="back_btn">Retour</a>
     <h2>Modifier une matiere</h2>
     <form action="modifier matiere.php" method="POST">
     <input type="hidden" name="id" value="<?php echo $id;?>">
	<label>Code matiere</label>
     
        <input type="text" name="code" value="<?php echo $code1;?>"><br>
        <label>Intitule matiere</label>
        <input type="text" name="nom" value="<?php echo $nom;?>"><br>
        <label>Coefficient</label>
        <input type="number" name="coef" value="<?php echo $coef;?>"><br>
        <label>Volume horaire</label>
        <input type="nember" name="horaire" value="<?php echo $horaire;?>"><br>
        <label>Semestre</label>
        <select name="semestre">
            <option value="<?php echo $semestre;?>"><?php echo $semestre;?></option>
        <option value="semestre_1">Semestre_1</option>
        <option value="semestre_2">Semestre_2</option>
        <option value="semestre_3">Semestre_3</option>
        <option value="semestre_4">Semestre_4</option>
        <option value="semestre_1/semestre_2">Semestre_1/Semestre_2</option>
        <option value="semestre_3/semestre_4">Semestre_3/Semestre_4</option>
        </select><br>
 <input type="submit" value="modifier" name="submit">
     </form>
    </div>
    
</body>
</html>