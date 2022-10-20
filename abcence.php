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
    <title>Absence</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
            <link rel="stylesheet" href="css/button.css">
</head>
<body>
<div class="contrainer">

    <a href="addabsence.php" class="btn_add">Ajouter</a>
    <a href="recherche absence.php" class="btn_btn">Rechercher</a> 
    <!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Rechecher les absences</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
        <label>Promotion</label>
        <select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">promotion ".$i."</option>";   
}?>
 </select>
        
        <label>Date</label>
        <input type="date" name="date" >
        <button name="submit" class="btn btn-primary" > 
							<span class="fa fa-search"></span>
						</button>
    </form>
    </div>
    </div>

    <!--********************fin de recherche********************* -->
    <a href="exporter absence.php" class="btn_btn">Exporter</a>
    <table>
        <tr id="items">
            <th>Code d'inscription</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date</th>
            <th>Matiere</th>
            <th>Semestre</th>
            <th>Justification</th>
            <th>Motif</th>
            <th>Modifier</th>
            <th>Suprimer</th>
            </tr> 
     <?php 
     if(isset($_POST['submit'])){
        if(isset($_POST['date']))
        $date=$_POST['date'];
    else
        $date="";
       if(isset($_POST['promotion']))
            $promotion=$_POST['promotion'];
    else
            $promotion="";
        
    
    $stm=$conn->query("SELECT * from absence where promotion='$promotion'  
      and date='$date'");
    $res=$stm->fetchAll(); 
    foreach($res as $value){
     $cin=$value['code']; ?>
     <tr>
        <td><?php echo($value['code'].'<br>'); ?>
        <?php $sql=$conn->query("SELECT nom,prenom from etudiant where n_apogee='$cin'");
        $re=$sql->fetchAll(); foreach($re as $val){ ?>
        <td><?php echo($val['nom'].'<br>');?>
        <td><?php echo($val['prenom'].'<br>');} ?>
        <td><?php echo($value['date'].'<br>');?>
        <td><?php echo($value['matiere'].'<br>');?>
        <td><?php echo($value['semestre'].'<br>');?>
        <td><?php echo($value['justification'].'<br>');?>
        <td><?php echo($value['motif'].'<br>');?>
        <td><a href="modifier absence.php?id=<?=$value['id_absence']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer absence.php?id=<?=$value['id_absence']?>" class="danger">suprimer</a></td>
        <?php } ?>
    </tr> 
    <?php } ?>
    </table> </div> 
     
</body>
</html>