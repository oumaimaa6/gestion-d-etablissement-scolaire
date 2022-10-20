<?php 
include_once('conbd.php');
include_once ('baredemenu.php');
include("fonction.php");
$annee_debut=2017; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exporter</title>
    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
            <link rel="stylesheet" href="css/button.css">
</head>
<body>
<div class="contrainer"  >
<a href="abcence.php" class="btn_add">Retour</a>
<div class="panel panel-primary">
    <div class="panel-heading"  >Rechecher les absences</div>
    <div class="panel-body">
    <form method="POST"  action="exporter absence final.php" class="form-inline">
        <label>Promotion</label>
        <select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">promotion ".$i."</option>";   
}?>
 </select>
        
        <label>Semestre</label>
        <select name="semestre">
        <option value="semestre_1">Semestre 1</option>
        <option value="semestre_2">Semestre 2</option>
        <option value="semestre_3">Semestre 3</option>
        <option value="semestre_4">Semestre 4</option>
        </select>
        <input type="submit" name="submit" class="btn btn-primary" value="exporter"> 
							
    </form></div></div> 
</body>
</html>