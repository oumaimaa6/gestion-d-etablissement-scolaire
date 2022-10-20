<?php 
include_once('baredemenu.php');
include_once('verification.php');
include_once('conbd.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>matiere</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
</head>
<body>
<div class="contrainer">
    <a href="addmatiere.php" class="btn_add">Ajouter</a>
    <h2>Liste des matieres</h2>
    <table>
        <tr id="items">
        
            <th>Code matiere</th>
            <th>Intitule matiere</th>
            <th>Coefficient</th>
            <th>Horaire</th>
            <th>Volume horaire</th>
            <th>Modifier</th>
            <th>Suprimer</th>
            </tr>
            <?php 
        
        $sql=$conn->query('SELECT * FROM matiere');
        $row=$sql->fetchAll();
        foreach($row as $val){
        ?>
        <tr>
        <td><?php echo($val['code_matiere'].'<br>');?>
        <td><?php echo($val["intitule_matiere"].'<br>');?>
        <td><?php echo($val['coef'].'<br>');?>
        <td><?php echo($val['nb_heure'].'<br>');?>
        <td><?php echo($val['semestre'].'<br>');?>
        <td><a href="modifier matiere.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer matiere.php?id=<?=$val['id']?>" class="danger">suprimer</a></td>
       
    </tr>
  
 <?php } ?>
 </table>
 
  </div>
  <a href="export matiere.php" class="btn_add">exporter</a>
  <a href="imprimer matiere.php" class="btn1">imprimer</a>
 
</body>
</html>