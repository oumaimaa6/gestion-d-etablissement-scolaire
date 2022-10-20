<?php
include_once('baredemenu.php');
include_once('verification.php');
include_once('conbd.php');
    if(isset($_POST['submit'])){
        if(isset($_POST['name']))
        $nom=$_POST['name'];
    else
        $nom="";
      
        if(isset($_POST['code']))
            $cin=$_POST['code'];
    else
            $cin="";

    $stm=$conn->query("SELECT * from vacataire where nom='$nom' or CIN_vacataire='$cin'");
    $res=$stm->fetchAll();
    if($res!=0){
     ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
        </head>
        <body>
        <div class="contrainer">
    <a href="addvacataire.php" class="btn_add">Ajouter</a>

    <!--********************debut de recherche********************* -->

    <div class="panel panel-primary">
    <div class="panel-heading">Rechecher les vacataires</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Nom: </label>
        <input class="form-control" type="text" name="name" placeholder="Nom">
        
        <label>CIN: </label>
        <input class="form-control" type="text" name="code" placeholder="CIN">
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span></button>
        
    </form>
    </div>
    </div>
    <!--********************fin de recherche********************* -->
    <a href="vacataire.php" class="btn_add">retour</a>
    <table>
        <tr id="items">
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Fonction</th>
            <th>Grade professionnel</th>
            <th>Matiere 1</th>
            <th>Matiere 2</th>
            <th>Matiere 3</th>
            <th>Matiere 4</th>
            <th>Matiere 5</th>
            <th>Matiere 6</th>
            <th>Etat</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>R.I.B</th>
            <th>Modifier</th>
            <th>Muprimer</th>
            </tr> 
            <?php  
            foreach($res as $val){ ?>
            <tr>
        <td><?php echo($val['CIN_vacataire'].'<br>');?>
        <td><?php echo($val['nom'].'<br>');?>
        <td><?php echo($val['prenom'].'<br>');?>
        <td><?php echo($val['email'].'<br>');?>
        <td><?php echo($val['tele'].'<br>');?>
        <td><?php echo($val['fonction'].'<br>');?>
        <td><?php echo($val['grade_professionnel'].'<br>');?>
        <?php $matiere1=$val['code_matiere1']; $matiere2=$val['code_matiere2'];  $matiere3=$val['code_matiere3'];  $matiere4=$val['code_matiere4'];  $matiere5=$val['code_matiere5'];  $matiere6=$val['code_matiere6'];  ?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere1' ");
        $res=$c->fetchAll(); ?>
        <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere2'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere3'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere4'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere5'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere6'");
        $res=$c->fetchAll();  ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <td><?php echo($val['etat'].'<br>');?>
        <td><?php echo($val['periode_debut'].'<br>');?>
        <td><?php echo($val['periode_fin'].'<br>');?>
        <td><?php echo($val['RIB'].'<br>');?>
        <td><a href="modifier vacataire.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer vacataire.php?id=<?=$val['id']?>" class="danger">suprimer</a></td>
        <?php } ?>
    </tr> 
    </table>
  </div> 
  </body>
</html>
  <?php } } 
 
  if(!isset($_POST['submit']) || isset($_POST['button'])){
    if($_POST){ 
        $tab = array();
        $tab2 = array();   
        $_SESSION["champs"]=$_POST["champs"];
        if(!in_array('all',$_SESSION["champs"])){
        if(in_array('CIN_vacataire',$_SESSION["champs"]))
        {
        $tab[]="CIN";
        }
        if(in_array('nom',$_SESSION["champs"]))
        {
        $tab[]="Nom";
        }
        if(in_array('prenom',$_SESSION["champs"]))
        {
        $tab[]="Prenom";
        }
        if(in_array('email',$_SESSION["champs"]))
        {
        $tab[]="Email";
        }
        if(in_array('tele',$_SESSION["champs"]))
        {
        $tab[]="Mobile";
        }
        if(in_array('RIB',$_SESSION["champs"]))
        {
        $tab[]="R.I.B";
        }
        if(in_array('fonction',$_SESSION["champs"]))
        {
        $tab[]="Fonction";
        }
        if(in_array('grade_professionnel',$_SESSION["champs"]))
        {
        $tab[]="Grade Professionnel";
        }
        if(in_array('code_matiere1',$_SESSION["champs"]))
        {
        $tab[]="Matiere 1";
        }
        if(in_array('code_matiere2',$_SESSION["champs"]))
        {
        $tab[]="Matiere 2";
        }
        if(in_array('code_matiere3',$_SESSION["champs"]))
        {
        $tab[]="Matiere 3";
        }
        if(in_array('code_matiere4',$_SESSION["champs"]))
        {
        $tab[]="Matiere 4";
        }
        if(in_array('code_matiere5',$_SESSION["champs"]))
        {
        $tab[]="Matiere 5";
        }
        if(in_array('code_matiere6',$_SESSION["champs"]))
        {
        $tab[]="Matiere 6";
        }
        if(in_array('periode_debut',$_SESSION["champs"]))
        {
        $tab[]="Date debut";
        }
        if(in_array('periode_fin',$_SESSION["champs"]))
        {
        $tab[]="Date fin";
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
    }}}
    $_SESSION["tab"]=$tab;
    $_SESSION["tab2"]=$tab2;
    } 
  ?>
             
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vacataire</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="addcss.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/c.css">
</head>
<body>
<div class="contrainer">
    <a href="addvacataire.php" class="btn_add">Ajouter</a>
    <!--  *************   debut rechercher les vacataires     ***************************-->

    <div class="panel panel-primary">
    <div class="panel-heading">Rechecher les vacataires</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Nom: </label>
        <input class="form-control" type="text" name="name" placeholder="Nom">
        <label>CIN: </label>
        <input class="form-control" type="text" name="code" placeholder="CIN">
        <!--<input type="submit" name="submit" value="recherche" class="btn1" >-->
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
    </form>
    </div>
    </div>

    <!--********************fin de recherche********************* -->
    <!--********************champs********************* -->

    <form method="post" action="vacataire.php">
      <h3>Choisissez un ou plusieurs champs a afficher :</h3>
      
   <table>
        <tr>
        <th>AFFICHER TOUT</th>
            <th>DONNEES PERSONNELLES</th>
            <th>DONNEES PROFESSIONNELLES</th>
            <th>ACTION</th>
        </tr>
  <tr>
  <td><input type="checkbox" name="champs[]" value="all">ALL<br>  </td> 
   <td>
      <input type="checkbox" name="champs[]" value="CIN_vacataire" checked >CIN<br> 
      <input type="checkbox" name="champs[]" value="nom" checked>Nom<br> 
      <input type="checkbox" name="champs[]" value="prenom" checked>Prénom<br> 
      <input type="checkbox" name="champs[]" value="email" checked>Email<br> 
      <input type="checkbox" name="champs[]" value="tele" checked>Mobile<br> 
      <input type="checkbox" name="champs[]" value="RIB" checked>R.I.B<br> 
   </td>
   <td>
   <input type="checkbox" name="champs[]" value="fonction" >Fonction<br>
   <input type="checkbox" name="champs[]" value="grade_professionnel">Grade Professionnel<br>
   <input type="checkbox" name="champs[]" value="code_matiere1" >Matiere 1<br> 
   <input type="checkbox" name="champs[]" value="code_matiere2" >Matiere 2<br>
   <input type="checkbox" name="champs[]" value="code_matiere3" >Matiere 3<br>
   <input type="checkbox" name="champs[]" value="code_matiere4" >Matiere 4<br>
   <input type="checkbox" name="champs[]" value="code_matiere5" >Matiere 5<br>
   <input type="checkbox" name="champs[]" value="code_matiere6" >Matiere 6<br>
   <input type="checkbox" name="champs[]" value="periode_debut" >Date debut<br>
   <input type="checkbox" name="champs[]" value="periode_fin" >Date fin<br></td>
   
  <td> 
    <input type="checkbox" name="champs2[]" value="Modifier">Modifier<br>
    <input type="checkbox" name="champs2[]" value="Suprimer">Suprimer<br>
</td>
</tr>
</table>
   <input type="submit" class="btn1" value="AFFICHER">
  </form>

    <h2>Liste des Vacataires</h2>
    <table>
        <tr id="items">
        <?php
            if($_POST)
            {
if(in_array('all',$_SESSION["champs"]))
  {?>
            <th>CIN</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Fonction</th>
            <th>Grade Professionnel</th>
            <th>Matiere 1</th>
            <th>Matiere 2</th>
            <th>Matiere 3</th>
            <th>Matiere 4</th>
            <th>Matiere 5</th>
            <th>Matiere 6</th>
            <th>Etat</th>
            <th>Date debut</th>
            <th>Date fin</th>
            <th>R.I.B</th>
            <th>Modifier</th>
            <th>Suprimer</th>
            </tr>
        <?php 
        $sql=$conn->query('SELECT * FROM vacataire');
        $row=$sql->fetchAll();
        foreach($row as $val){
        ?>
        <tr>
        <td><?php echo($val['CIN_vacataire'].'<br>');?>
        <td><?php echo($val['nom'].'<br>');?>
        <td><?php echo($val['prenom'].'<br>');?>
        <td><?php echo($val['email'].'<br>');?>
        <td><?php echo($val['tele'].'<br>');?>
        <td><?php echo($val['fonction'].'<br>');?>
        <td><?php echo($val['grade_professionnel'].'<br>');?>
        <?php $matiere1=$val['code_matiere1']; $matiere2=$val['code_matiere2'];  $matiere3=$val['code_matiere3'];  $matiere4=$val['code_matiere4'];  $matiere5=$val['code_matiere5'];  $matiere6=$val['code_matiere6'];  ?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere1' ");
        $res=$c->fetchAll(); ?>
        <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere2'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere3'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere4'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere5'");
        $res=$c->fetchAll(); ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <?php $c=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere6'");
        $res=$c->fetchAll();  ?>
          <td><?php if($res!= 0){
        foreach($res as $row){ echo($row['intitule_matiere'].'<br>'); }} else{ echo " "; }?>
        <td><?php echo($val['etat'].'<br>');?>
        <td><?php echo($val['periode_debut'].'<br>');?>
        <td><?php echo($val['periode_fin'].'<br>');?>
        <td><?php echo($val['RIB'].'<br>');?>
        <td><a href="modifier vacataire.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer vacataire.php?id=<?=$val['id']?>" class="danger">suprimer</a></td>
    </tr> <?php }?>
 </table>
 </div>  
 <a href="exporter vacataire.php" class="btn1">exporter tout</a>
 <a href="imprimer vacataire.php" class="btn1">imprimer</a>
</body>
</html>
<?php 
}
else {          
if(isset($_SESSION["tab"]))
{
foreach($_SESSION["tab"] as $valeur)
{?><th><?php echo $valeur ."<br>";?></th>
<?php } }?>
<?php if(isset($_SESSION["tab2"]))
{ 
foreach($_SESSION["tab2"] as $valeur){ ?>
<th><?php echo $valeur ."<br>";?></th> <?php } }?>
</tr>
<tr>
        <?php 
        $sql=$conn->query('SELECT * FROM vacataire');
        $row=$sql->fetchAll();
        foreach($row as $val){?><tr>
        <?php foreach($_SESSION["champs"] as $chp)
         {
        ?>
       <td><?php echo($val[$chp].'<br>');?></td><?php } ?>
       <?php foreach($_SESSION["tab2"] as $chp2){ ?>
         <?php
         if($chp2=="Modifier"){?>
        <td><a href="modifier vacataire.php?id=<?=$val['id'];?>" class="btn1">Modifier</a><?php }?></td>
        <?php if($chp2=="Suprimer"){?>
        <td><a href="suprimer vacataire.php?id=<?=$val['id'];?>" class="danger">Suprimer</a><?php }?></td>
        
<?php } } ?> </tr>
<?php 
} }
?>
 </table>
   </div> 
 </body>
 </html>
 <?php 
 }?>