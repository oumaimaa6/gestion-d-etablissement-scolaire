<?php
include_once('baredemenu.php');
include_once('verification.php');
include_once('conbd.php');
include_once('fonction.php');
if(!isset($_SESSION['annee_presedent']))
{
    $_SESSION['annee_presedent']=array();
}
if(!in_array(annee_scolaire_actuelle(),$_SESSION['annee_presedent']))
{
$_SESSION['annee_presedent'][]=annee_scolaire_actuelle();
}
if(!isset($_POST['submit']) || isset($_POST['button'])){
if($_POST)
{ $tab = array();
   $tab2 = array();   
$_SESSION["champs"]=$_POST["champs"];

if(!in_array('all',$_SESSION["champs"])){
if(in_array('photo',$_SESSION["champs"]))
{
$tab[]="Photo";
}
if(in_array('CIN',$_SESSION["champs"]))
{
$tab[]="CIN";
}
if(in_array('nom',$_SESSION["champs"]))
{
$tab[]="Nom";
}
if(in_array('prenom',$_SESSION["champs"]))
{
$tab[]="Prénom";
}
if(in_array('code_massar',$_SESSION["champs"]))
{
$tab[]="Code MASSAR";
}
if(in_array('email',$_SESSION["champs"]))
{
$tab[]="Email";
}
if(in_array('tele',$_SESSION["champs"]))
{
$tab[]="Numéro de téléphone";
}
if(in_array('adresse',$_SESSION["champs"]))
{
$tab[]="Adresse";
}
if(in_array('date_naissance',$_SESSION["champs"]))
{
$tab[]="Date de naissance";
}
if(in_array('lieu_naissance',$_SESSION["champs"]))
{
$tab[]="Lieu de naissance";
}
if(in_array('sexe',$_SESSION["champs"]))
{
$tab[]="Sexe";
}
if(in_array('RIB',$_SESSION["champs"]))
{
$tab[]="RIB";
}
if(in_array('type_bac',$_SESSION["champs"]))
{
$tab[]="Type de Bac";
}
if(in_array('moyenne_bac',$_SESSION["champs"]))
{
$tab[]="Moyenne de Bac";
}
if(in_array('nationalite',$_SESSION["champs"]))
{
$tab[]="Nationalite";
}
if(in_array('nom_tuteur',$_SESSION["champs"]))
{
$tab[]="Nom du tuteur";
}
if(in_array('tele_tuteur',$_SESSION["champs"]))
{
$tab[]="Numéro téléphone du tuteur";
}
if(in_array('n_sejour',$_SESSION["champs"]))
{
$tab[]="Numéro séjour";
}
if(in_array('tele_urgence',$_SESSION["champs"]))
{
$tab[]="Numéro téléphone d'urgence";
}
if(in_array('n_apogee',$_SESSION["champs"]))
{
$tab[]="Code d'inscription";
}
if(in_array('promotion',$_SESSION["champs"]))
{
$tab[]="Promotion";
}
if(in_array('annee',$_SESSION["champs"]))
{
$tab[]="Niveau d'études";
}
if(in_array('anne acad_1',$_SESSION["champs"]))
{
$tab[]="Annee academique 1";
}
if(in_array('anne acad_2',$_SESSION["champs"]))
{
$tab[]="Annee academique 2";
}
if(in_array('semestre',$_SESSION["champs"]))
{
$tab[]="Semestre";
}
if(in_array('etat',$_SESSION["champs"]))
{
$tab[]="Statu d'étudiant";
}
if(in_array("date_d'inscription",$_SESSION["champs"]))
{
$tab[]="Date d'inscription";
}
if(in_array('datefin',$_SESSION["champs"]))
{
$tab[]="Date de sortie";
}
if(isset($_POST["champs2"]))
{
if(in_array('Modifier',$_POST["champs2"]))
{
$tab2[]="Modifier";
}
if(in_array('Suprimer',$_POST["champs2"]))
{
$tab2[]="Suprimer";
}}
}
$_SESSION["tab"]=$tab;
$_SESSION["tab2"]=$tab2;
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
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
<style>
        .zoom {
         
            transition: transform ease-in-out 0.3s;
        }
        .zoom:hover {
            width: 200px;
            height: 200px;
            transform: scale(1.2);
        }
    </style> 
    <style>
      .larg{
         width: 100px;
      }
    </style>  
</head>
<body>
<div class="contrainer">
   <a href="addetudiant.php" class="btn_add">+ NOUVEAU ETUDIANT</a>
   <a href="exporteetudiant.php" class="btn1">EXPORTER ALL</a>
   <a href="exportechampsetudiant.php" class="btn1">EXPORTER</a> 
   <a href="imprimeretudiant.php" class="btn1" style="position:absolute ;top:150px ; left:1360px">IMPRIMER ALL</a>
   <form action="imprimerpromoetudiant.php" style="position:absolute ;top:185px ; left:1368px" method="POST">
   <label>Promotion</label>
    <select name="promotion">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1; $i--){
    echo "<option value=".$i.">".$i."</option>";   
}?>
 </select>
      <input type="submit" class="btn1"  value="IMPRIMER">
  </form>
   
    <!--  *************   debut rechercher les vacataires     ***************************-->

    <div class="panel panel-primary">
    <div class="panel-heading">Rechecher les étudiants</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" action="recherche.php" >
    <label>Nom: </label>
        <input class="form-control" type="text" name="name" placeholder="Nom">
        <label>Code d'inscription : </label>
        <input class="form-control" type="text" name="n_apogee" placeholder="Code">
        <label>CIN : </label>
        <input class="form-control" type="text" name="code" placeholder="CIN">
       <label>Promotion :</label>
       <select name=promotion>
       <option value="">--choisie une option--</option>
       <?php for($i=1 ; $i<=nombre_annee_scolaire() ; $i++){
    echo "<option value=".$i.">".$i."</option>"; }?>  

</select>
        <!--<input type="submit" name="submit" value="recherche" class="btn1" >-->
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
    </form>
    </div>
    </div>
  
   <form method="post" action="etudiant.php">
      <h3>Choisissez un ou plusieurs champs a afficher :</h3>
      <table>
        <td><input type="checkbox" name="champs[]" value="all">ALL<br>  </td>
      </table>
  
       <table>
         
      
      <div class="ligne_horizontal"><b>DONNEES ETUDIANTS</b></div>
  
   <tr> 
   <td><input type="checkbox" name="champs[]" value="photo">Photo<br></td>
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
<td> <input type="checkbox" name="champs2[]" value="Modifier">Modifier<br>
<input type="checkbox" name="champs2[]" value="Suprimer">Suprimer<br>
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
<input type="submit" class="btn1" value="AFFICHER">

   </form>
    <h2>Liste des Etudiants</h2>
    <table>
        <tr id="items">
            <?php
            if(!empty($_SESSION['champs']))
            {
if(in_array('all',$_SESSION["champs"]))
{?>
   <th>Photo</th>
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
   <th>Annee academique 1</th>
   <th>Annee academique 2</th>
   <th>Semestre</th>
   <th>Date d'inscription</th>
   <th>Date de sortie</th>
   <th>Nationalite</th>
   <th>Nom du tuteur</th>
   <th>Numéro téléphone du tuteur</th>
   <th>Numéro séjour</th>
   <th>Numéro téléphone d'urgence</th>
   <th>modifier</th>
   <th>suprimer</th>
   </tr>
   <?php 

$sql=$conn->query('SELECT * FROM etudiant order BY promotion DESC');
$row=$sql->fetchAll();
foreach($row as $val){
?>
<tr>
<td><?php echo "<img class='zoom' src='./upload/".$val['photo']."' width='100px' height='70px' ><br>";?></td>
<td><?php echo($val['n_apogee'].'<br>');?>
<td><?php echo($val['CIN'].'<br>');?>
<td><?php echo($val['nom'].'<br>');?>
<td><?php echo($val['prenom'].'<br>');?>
<td><?php echo($val['code_massar'].'<br>');?>
<td><?php echo($val['email'].'<br>');?>
<td><?php echo($val['tele'].'<br>');?>
<td><?php echo($val['adresse'].'<br>');?></td>
<td><div class="larg">
<?php echo($val['date_naissance'].'<br>');?></td></div>
<td><?php echo($val['lieu_naissance'].'<br>');?>
<td><?php echo($val['sexe'].'<br>');?>
<td><?php echo($val['RIB'].'<br>');?>
<td><?php echo($val['type_bac'].'<br>');?>
<td><?php echo($val['moyenne_bac'].'<br>');?>
<td><?php echo($val['etat'].'<br>');?>
<td><?php echo($val['promotion'].'<br>');?>
<td><?php echo($val['annee'].'<br>');?>
<td><?php echo($val['anne acad_1'].'<br>');?>
<td><?php echo($val['anne acad_2'].'<br>');?>
<td><?php echo($val['semestre'].'<br>');?>
<td><div class="larg"><?php echo($val["date_d'inscription"].'<br>');?></div></td>
<td><div class="larg"><?php echo($val['datefin'].'<br>');?></div></td>
<td><?php echo($val['nationalite'].'<br>');?>
<td><?php echo($val['nom_tuteur'].'<br>');?>
<td><?php echo($val['tele_tuteur'].'<br>');?>
<td><?php echo($val['n_sejour'].'<br>');?>
<td><?php echo($val['tele_urgence'].'<br>');?>
<td><a href="modifierutidiant.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
<td><a href="suprimerutidiant.php?id=<?=$val['id']?>" class="danger">suprimer</a></td></tr>
<?php }} 
else {          
if(isset($_SESSION["tab"]))
{
foreach($_SESSION["tab"] as $valeur)
{?>
<th><?php echo $valeur ."<br>";?></th>
<?php
}
}
?>
<?php
if(isset($_SESSION["tab2"]))
{
foreach($_SESSION["tab2"] as $valeur)
{?>
<th><?php echo $valeur ."<br>";?></th>
<?php
}
}
?>
</tr>

        <?php 
        $sql=$conn->query('SELECT * FROM etudiant order BY promotion DESC');
        $row=$sql->fetchAll();
        foreach($row as $val){?><tr>
        <?php foreach($_SESSION["champs"] as $chp)
         {
        ?>
       <td><?php if($chp=="photo") {
              echo "<img class='zoom' src='./upload/".$val['photo']."' width='100px' height='70px' ><br>";
       } else echo($val[$chp].'<br>');?></td><?php } ?>
       <?php foreach($_SESSION["tab2"] as $chp2){ ?>
         <?php
         if($chp2=="Modifier"){?>
        <td><a href="modifierutidiant.php?id=<?=$val['id'];?>" class="btn1">modifier</a><?php }?></td>
        <?php if($chp2=="Suprimer"){?>
        <td><a href="suprimerutidiant.php?id=<?=$val['id'];?>" class="danger">suprimer</a><?php }?></td>

   
  
 <?php }} ?> </tr>
 <?php
 }}}
 ?>
    </table>
  </div>  
  
</body>
</html>