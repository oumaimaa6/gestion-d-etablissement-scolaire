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
    <title>EXPORTER</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
    <style> 
    body {font-size: 17px} 
    label {font-size: 17px} 
    td {font-size: 17px} 
    th {font-size: 17px} 
.ligne_horizontal { 
display: flex; 
flex-direction: row; 
font-size: medium;
} 

.ligne_horizontal:before, 
.ligne_horizontal:after { 
content: ""; 
flex: 1 1; 
border-bottom: 2px solid #000; 
margin: auto; 
} 
</style>

</head>
<body>
    <div style="margin-top: 150px;">
    <a href="etudiant.php" class="btn1">Retour</a>
<form method="post" action="exportetudiant2.php">
      <h3>Choisissez un ou plusieurs champs a exporter :</h3>
       <table>
      <div class="ligne_horizontal"><b>DONNEES ETUDIANTS</b></div>
  
   <tr> 
 
   <td>
      <input type="checkbox" name="champs[]" value="CIN" checked >CIN<br> 
      <input type="checkbox" name="champs[]" value="nom" checked>Nom<br> 
      <input type="checkbox" name="champs[]" value="prenom" checked>Prénom<br> 
      <input type="checkbox" name="champs[]" value="code_massar">Code MASSAR<br> 
   </td><td>
      <input type="checkbox" name="champs[]" value="email">Email<br>
       <input type="checkbox" name="champs[]" value="tele">Numéro de téléphone<br>
      <input type="checkbox" name="champs[]" value="adresse">Adresse<br>
      <input type="checkbox" name="champs[]" value="date_naissance">Date de naissance<br>
    </td><td>
       <input type="checkbox" name="champs[]" value="lieu_naissance">Lieu de naissance<br>
      <input type="checkbox" name="champs[]" value="sexe">Sexe<br> 
      <input type="checkbox" name="champs[]" value="RIB">RIB<br>
      <input type="checkbox" name="champs[]" value="type_bac">Type de Bac<br> 
  </td><td> 
   <input type="checkbox" name="champs[]" value="moyenne_bac">Moyenne de Bac<br>  
      <input type="checkbox" name="champs[]" value="nationalite">Nationalite<br>
       <input type="checkbox" name="champs[]" value="nom_tuteur">Nom du tuteur<br> 
</td><td>  
      
      <input type="checkbox" name="champs[]" value="tele_tuteur">Numéro téléphone du tuteur<br> 
      <input type="checkbox" name="champs[]" value="n_sejour">Numéro séjour<br> 
      <input type="checkbox" name="champs[]" value="tele_urgence">Numéro téléphone d'urgence<br>
</td>
</tr></table>
<table>
<div class="ligne_horizontal"><b>DONNEES D'INSCRIPTION</b></div>
<tr>
  
<td>
   <input type="checkbox" name="champs[]" value="n_apogee" checked>Code d'inscription<br>
   <input type="checkbox" name="champs[]" value="promotion">Promotion<br>
   <input type="checkbox" name="champs[]" value="annee" >Niveau d'études<br> 
   <input type="checkbox" name="champs[]" value="anne acad_1" >Annee academique 1<br> 
   </td>
   <td>  
   <input type="checkbox" name="champs[]" value="anne acad_2" >Annee academique 2<br> 
   <input type="checkbox" name="champs[]" value="semestre">Semestre<br>
   <input type="checkbox" name="champs[]" value="etat">Statut d'étudiant<br> 
   <input type="checkbox" name="champs[]" value="date_d'inscription">Date d'inscription<br>
   <input type="checkbox" name="champs[]" value="datefin">Date de sortie<br>
</td>
</tr>
</table>
<input type="submit" class="btn1" value="EXPORTER" style="margin-left:650px;">

   </form>
    </div>
</body>
</html>