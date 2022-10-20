<?php 
include_once('conbd.php');
include_once ('baredemenu.php');
include("fonction.php");
$annee_debut=2017;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bulletins</title>
    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
</head>
<body>
<div class="contrainer">
<a href="bulletins.php" class="btn_add">Retour</a>
    <!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Exporter des relevés semestriels</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" action="exporter bulletins.php">
    <label>Promotion: </label>
        <select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">promotion ".$i."</option>";   
}?>
 </select>
 <label>Semestre: </label>
        <select name="semestre" class="input">
        <option value="Semestre_1">Semestre_1</option>
        <option value="Semestre_2">Semestre_2</option>
        <option value="Semestre_3">Semestre_3</option>
        <option value="Semestre_4">Semestre_4</option>
        </select>
        <label>Code etudiant: </label>
       <input type="text" name="code" required="required">
       <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
</form> </div> </div>