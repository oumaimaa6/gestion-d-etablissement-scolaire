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
    <title>Assiduite</title>
    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
</head>
<body>
<div class="contrainer">
    <a href="addassiduite.php" class="btn_add">Ajouter</a>
    <!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Rechecher </div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Code d'inscription: </label>
        <input class="form-control" type="text" name="code" placeholder="Code d'incription">
        <label>Nom: </label>
        <input class="form-control" type="text" name="nom" placeholder="Nom">
        
    
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
    </form>
    </div>
    </div>

    <!--********************fin de recherche********************* -->
    <table>
        <tr id="items">
            <th>Code d'inscription</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Semestre</th>
            <th>Date</th>
            <th>Type</th>
            <th>Motif</th>
            <th>Modifier</th>
            <th>Suprimer</th>
            </tr> 
            <?php 
     if(isset($_POST['submit'])){
        if(isset($_POST['code']))
        $code=$_POST['code'];
    else
        $code="";
      
        if(isset($_POST['nom']))
            $nom=$_POST['nom'];
    else
            $nom="";
    $stm=$conn->query("SELECT n_apogee from etudiant where  n_apogee='$code' or nom='$nom'");
    $res=$stm->fetchAll(); 
    foreach($res as $value){
        $cin=$value['n_apogee'];  
     $sql=$conn->query("SELECT id_assiduite ,code_etudiant,nom,prenom,assiduite.semestre,date, type,motif
      from assiduite join etudiant on assiduite.code_etudiant=etudiant.n_apogee where code_etudiant='$cin' 
       ");
     $res=$sql->fetchAll();
     foreach($res as $val){ ?>
     <tr>
     <td><?php echo($val['code_etudiant'].'<br>');?>
        <td><?php echo($val['nom'].'<br>');?>
        <td><?php echo($val['prenom'].'<br>'); ?>
        <td><?php echo($val['semestre'].'<br>');?>
        <td><?php echo($val['date'].'<br>');?>
        <td><?php echo($val['type'].'<br>');?>
        <td><?php echo($val['motif'].'<br>');?>
        <td><a href="modifier assiduite.php?id=<?=$val['id_assiduite']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer assiduite.php?id=<?=$val['id_assiduite']?>" class="danger">suprimer</a></td>
        <?php } ?>
    </tr> 
    <?php } }?>
    </table> </div> 
</body>
</html>