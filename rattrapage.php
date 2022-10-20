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
    <title>rattrapage</title>
    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
</head>
<body>
<div class="contrainer">
<a href="etudiant rattrapage.php" class="btn_add">Les rattrapages</a>
    <!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Exporter les matieres du rattrapages</div>
    <div class="panel-body">
    <form method="POST" action="trier_matiere" class="form-inline" >
        <label>Semestre: </label>
        <select name="semestre" class="input">
        <option value="Semestre_1">Semestre_1</option>
        <option value="Semestre_2">Semestre_2</option>
        <option value="Semestre_3">Semestre_3</option>
        <option value="Semestre_4">Semestre_4</option>
    </select>
    <label>Exporter : </label>
    <input type="submit" name="sub1" value="exporter les matieres du rattrapages" class="btn btn-primary">
    
    </form> </div> </div>
    <!--********************fin de recherche********************* -->
    
    <!--********************fin de recherche********************* -->
   
     
</body>
</html