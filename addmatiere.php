<?php 
include_once('conbd.php');
include_once('baredemenu.php');
$msg="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <link rel="stylesheet" href="css/cherche.css">
    <link rel="stylesheet" href="body.css">
</head>
<body>
<div class="forme">
    <a href="matiere.php" class="back_btn">Retour</a>
    <h2>Ajouter une matiere</h2>
   <?php if(isset($_POST['submit'])){
    $code= $_POST['code_matiere'];
    $nom= $_POST['intitule_matiere'];
    $coef= $_POST['coef'];
    $horaire= $_POST['nb_heure'];
    $semestre= $_POST['semestre'];
    $stm=$conn->query("select * from matiere where code_matiere='$code'");
        $res=$stm->fetchAll();
          if($res==NULL)
        {
    $conn->query("INSERT INTO matiere(code_matiere,intitule_matiere,coef,nb_heure,semestre) 
    VALUES ('$code','$nom','$coef','$horaire','$semestre')");
    header('location:matiere.php');
    }		
    else
    {	
       $msg= "cette matiere est déjà ajoutée";
    } } ?>
    <?php echo $msg; ?><br>
    <form action="addmatiere.php" method="POST">
    <label>Code matiere</label>
        <input type="text" name="code_matiere"><br>
        <label>Intitule matiere</label>
        <input type="text" name="intitule_matiere"><br>
        <label>Coefficient</label>
        <input type="number" name="coef" value="0"><br>
        <label>Volume horaire</label>
        <input type="nember" name="nb_heure" value="0"><br>
        <label>Semestre</label>
        <select name="semestre">
            <option value="semestre_1">Semestre_1</option>
            <option value="semestre_2">Semestre_2</option>
            <option value="semestre_3">Semestre_3</option>
            <option value="semestre_4">Semestre_4</option>
            <option value="semestre_1/semestre_2">Semestre_1/Semestre_2</option>
            <option value="semestre_3/semestre_4">Semestre_3/Semestre_4</option>
        </select> <br>
        <input type="submit" value="ajouter" name="submit">
        </form>
    </div>
</body>
</html>