<?php 
include_once('conbd.php');
include_once ('baredemenu.php');
include("fonction.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche absence</title>
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
</head>
<body>
<a href="abcence.php" class="btn_add">Retour</a>
<div class="panel panel-primary">
    <div class="panel-heading">Rechecher les absences</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Code d'inscription: </label>
        <input class="form-control" type="text" name="code" >
        <label>Promotion: </label>
        <select name="promotion" class="input">
    <?php 
for($j=nombre_annee_scolaire() ; $j>=1 ; $j--){
    echo "<option value=".$j.">promotion ".$j."</option>";   
}?>
 </select>
        <label>Semestre: </label>
<select name="semestre">
    <option value="semestre_1">Semestre_1</option>
    <option value="semestre_2">Semestre_2</option>
    <option value="semestre_3">Semestre_3</option>
    <option value="semestre_4">Semestre_4</option>
</select>
        
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
    
    </form>
    </div>
    </div>
    <?php if(isset($_POST['submit'])){
    $code=$_POST['code'];
    $promotion=$_POST['promotion'];
    $semestre=$_POST['semestre']; 
    ?>
        <table>
        <tr id="items">
            <th>ID</th>
            <th>Code d'inscription</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Date</th>
            <th>Matiere</th>
            <th>Semestre</th>
            <th>Justification</th>
            <th>Motif</th>
            </tr> 
 <?php $i=1; 
  $sql=$conn->query("SELECT * from absence where code='$code' and promotion='$promotion' and 
  semestre='$semestre' ");
  $res=$sql->fetchAll();
  foreach($res as $row){ $cin=$row['code']; ?>
        <tr>
            <td><?php if($row['justification']=="non") {echo $i++;} ?></td>
            <td><?php echo($row['code'].'<br>'); ?></td>
            <?php  $s=$conn->query("SELECT nom,prenom from etudiant where n_apogee='$code'");
            $r=$s->fetchAll();
            foreach($r as $val){  ?>
                <td><?php echo($val['nom'].'<br>');?> </td>
                <td><?php echo($val['prenom'].'<br>');}?></td>
            <td><?php echo($row['date'].'<br>');?>
            <td><?php echo($row['matiere'].'<br>');?>
            <td><?php echo($row['semestre'].'<br>');?>
            <td><?php echo($row['justification'].'<br>');?>
            <td><?php echo($row['motif'].'<br>');?>
        </tr>
    <?php }
    $j=($i-1);
     echo "<h1>Le nombre des absences non justifier est :  ".$j."</h1>"; } ?>
        </table>
</body>
</html>