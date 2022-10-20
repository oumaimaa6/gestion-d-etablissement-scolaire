<?php 
include_once('conbd.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="assets/css/imprimer2.css">
    <style>
        th{
            font-size:  11px;
        }
    </style>
    
    
</head>
<body>
    <div class="com">
<h2>Liste des Etudiants</h2>
<table>
        <tr id="items">
        <th>Code d'inscription</th>
   <th>CIN</th>                                                                      
   <th>Nom</th>
   <th>Prénom</th>
   <th>Code MASSAR</th>
   <th>Email</th>
   <th>Numéro de téléphone</th>
   <th>Adresse</th>
   <th>Date de naissance</th>
   <th>Lieu de naissance</th>
   <th>Sexe</th>
   <th>RIB</th>
   <th>Type de Bac</th>
   <th>Moyenne de Bac</th>
   <th>Statut d'étudiant</th>
   <th>Promotion</th>
   <th>Niveau d'études</th>
   <th>Semestre</th>
   <th>Date d'inscription</th>
   <th>Date de sortie</th>
   <th>Nationalite</th>
   <th>Nom du tuteur</th>
   <th>Numéro téléphone du tuteur</th>
   <th>Numéro séjour</th>
   <th>Numéro téléphone d'urgence</th>
   </tr>
   <?php 

$sql=$conn->query('SELECT * FROM etudiant order BY promotion DESC');
$row=$sql->fetchAll();
foreach($row as $val){
?>
<tr>
<td><?php echo($val['n_apogee'].'<br>');?>
<td><?php echo($val['CIN'].'<br>');?>
<td><?php echo($val['nom'].'<br>');?>
<td><?php echo($val['prenom'].'<br>');?>
<td><?php echo($val['code_massar'].'<br>');?>
<td><?php echo($val['email'].'<br>');?>
<td><?php echo($val['tele'].'<br>');?>
<td><?php echo($val['adresse'].'<br>');?></td>
<td><?php echo($val['date_naissance'].'<br>');?></td>
<td><?php echo($val['lieu_naissance'].'<br>');?>
<td><?php echo($val['sexe'].'<br>');?>
<td><?php echo($val['RIB'].'<br>');?>
<td><?php echo($val['type_bac'].'<br>');?>
<td><?php echo($val['moyenne_bac'].'<br>');?>
<td><?php echo($val['etat'].'<br>');?>
<td><?php echo($val['promotion'].'<br>');?>
<td><?php echo($val['annee'].'<br>');?>
<td><?php echo($val['semestre'].'<br>');?>
<td><?php echo($val["date_d'inscription"].'<br>');?></td>
<td><?php echo($val['datefin'].'<br>');?></td>
<td><?php echo($val['nationalite'].'<br>');?>
<td><?php echo($val['nom_tuteur'].'<br>');?>
<td><?php echo($val['tele_tuteur'].'<br>');?>
<td><?php echo($val['n_sejour'].'<br>');?>
<td><?php echo($val['tele_urgence'].'<br>');?>
        <?php }?>
</table><br>
    </div>
        <button onclick="window.print()" class="btn-primary">print</button>
</body>
</html>
