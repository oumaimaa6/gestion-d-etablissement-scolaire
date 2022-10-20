<?php 
include_once('conbd.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vacation</title>
    <link rel="stylesheet" href="css/imprimer.css">
    
</head>
<body>
    <div class="com">
<h2>Liste des Vacataires</h2>
<table>
        <tr id="items">
            <th>Date</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Matiere</th>
            <th>Séance</th>
            <th>type Séance</th>
            <th>Action</th>
            <th>Durée</th>
            
            </tr>
            <?php 
            $sql=$conn->query('SELECT id_matiere, id_vacataire FROM vacation');
        
            while($val=$sql->fetch()){ $cin=$val['id_vacataire'];
            $id=$val['id_matiere'];}
    $result=$conn->query("SELECT date, nom, prenom, intitule_matiere, seance,type_seance,action,duree
     FROM vacation JOIN vacataire on id_vacataire=CIN_vacataire JOIN matiere on id_matiere=code_matiere where id_vacataire='$cin' and id_matiere='$id' ");
     $resultat=$result->fetchAll();
            foreach($resultat as $val){ ?>
            <tr>
        <td><?php echo($val['date'].'<br>');?>
        <td> <?php echo ($val['nom']);?>
        <td> <?php echo($val['prenom']); ?>
        <td><?php echo ($val['intitule_matiere']);?>
        <td><?php echo($val['seance']);?>
        <td><?php echo($val['type_seance']);?>
        <td><?php echo($val['action']);?>
        <td><?php echo($val['duree']);?>
            </tr>
        <?php }?>
</table><br>
    </div>
        <button onclick="window.print()" class="btn-primary">print</button>
    
</body>
</html>