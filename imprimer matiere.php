<?php 
include_once('conbd.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matieres</title>
    <link rel="stylesheet" href="css/imprimer.css">
    
</head>
<body>
    <div class="com">
<h2>Liste des Matieres</h2>
<table>
<tr id="items">
        
        <th>code matiere</th>
        <th>intitule matiere</th>
        <th>coefficient</th>
        <th>horaire</th>
        <th>niveau</th>
       
        </tr>
        <?php 
    
    $sql=$conn->query('SELECT * FROM matiere');
    $row=$sql->fetchAll();
    foreach($row as $val){
    ?>
    <tr>
    <td><?php echo($val['code_matiere'].'<br>');?>
    <td><?php echo($val['intitule_matiere'].'<br>');?>
    <td><?php echo($val['coef'].'<br>');?>
    <td><?php echo($val['nb_heure'].'<br>');?>
    <td><?php echo($val['semestre'].'<br>');?>
</tr>

<?php }?>
</table>
</div>
<button onclick="window.print()" class="btn-primary">print</button>
</body>
</html>