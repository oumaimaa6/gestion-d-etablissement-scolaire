<?php 
include_once('conbd.php');
include_once('baredemenu.php');

if(isset($_POST['submit'])){
    if(isset($_POST['name']))
    $nom=$_POST['name'];
else
    $nom="";
    
  
$stm=$conn->query("SELECT CIN_vacataire from vacataire where  nom='$nom'  ");
$res=$stm->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vacation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="css/test.css">
    
</head>
<body>

<div class="contrainer">
    
<a href="addvacation.php" class="btn_add">Ajouter</a>
<!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Rechecher les vacations</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Nom: </label>
        <input class="form-control" type="text" name="name" placeholder="Nom">
       
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
        <input type="submit" name="button" value="afficher tout" class="btn btn-primary">
    </form>
    </div>
    </div>

    <!--********************fin de recherche********************* -->
    
    <table>
        <tr id="items">
            <th>Date</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Matiere</th>
            <th>Semestre</th>
            <th>Séance</th>
            <th>Type Séance</th>
            <th>Action</th>
            <th>Durée</th>
            <th>Modifier</th>
            <th>Suprimer</th>
            </tr>
            <?php 
            foreach($res as $value){
                $cin=$value['CIN_vacataire'];   
                $q=$conn->query("SELECT * from vacation where id_vacataire='$cin' '");
                $resultat=$q->fetchAll();
            foreach($resultat as $val){ ?>
            <tr>
        <td><?php echo($val['date'].'<br>');?>
        <?php 
$result=$conn->query("SELECT nom, prenom FROM vacataire JOIN vacation on CIN_vacataire=id_vacataire  where CIN_vacataire='$cin' LIMIT 1 ");
        $c=$result->fetchAll();
        foreach($c as $v){ ?>
        <td> <?php echo ($v['nom']);?>
        <td> <?php echo($v['prenom']);} ?>
        <td><?php $id=$val['id_matiere'];
         $res=$conn->query("SELECT intitule_matiere FROM matiere JOIN vacation on code_matiere=id_matiere where code_matiere='$id'LIMIT 1 ");
         $colone=$res->fetchAll();
         foreach($colone as $valeur){
            echo ($valeur['intitule_matiere']);}?>
         <td><?php echo($val['semestre']);?>
        <td><?php echo($val['seance']);?>
        <td><?php echo($val['type_seance']);?>
        <td><?php echo($val['action']);?>
        <td><?php echo($val['duree']);?>
        <td><a href="modifier vacation.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer vacation.php?id=<?=$val['id']?>" class="danger">suprimer</a></td>
        </tr>
<?php }} } else{ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vacation</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="css/test.css">
    <link rel="stylesheet" href="css/c.css">
    <link rel="stylesheet" href="css/button.css">
</head>
<body>

<div class="contrainer">

<a href="addvacation.php" class="btn_add">Ajouter</a>
<a href="recherche vacation.php" class="btn_btn">Rechercher les vacataires</a><br>
<a href="recherche de matiere.php" class="btn_btn">Rechercher les matieres</a>
<!--  *************   debut rechercher les vacataires     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Rechecher les vacations</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Nom: </label>
        <input class="form-control" type="text" name="name" placeholder="Nom">
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
       <!-- <input type="submit" name="submit" value="afficher tout" class="btn btn-primary">-->
    </form>
    </div>
    </div>

    <!--********************fin de recherche********************* -->
    
    <table>
        <tr id="items">
            <th>Date</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Matiere</th>
            <th>Semestre</th>
            <th>Séance</th>
            <th>Type Séance</th>
            <th>Action</th>
            <th>Durée</th>
            <th>Modifier</th>
            <th>Suprimer</th>
            </tr>
            <?php 
        $sql=$conn->query('SELECT * FROM vacation');
        $row=$sql->fetchAll();
        foreach($row as $val){
        ?>
        <tr>
        <td><?php echo($val['date'].'<br>');?>
        <?php $cin=$val['id_vacataire'];
        $result=$conn->query("SELECT nom, prenom FROM vacataire JOIN vacation on CIN_vacataire=id_vacataire  where CIN_vacataire='$cin' LIMIT 1");
        $c=$result->fetchAll();
        foreach($c as $v){ ?>
        <td> <?php echo ($v['nom']);?>
        <td> <?php echo($v['prenom']);} ?>
        <td><?php $id=$val['id_matiere'];
         $res=$conn->query("SELECT intitule_matiere FROM matiere JOIN vacation on code_matiere=id_matiere where code_matiere='$id' LIMIT 1");
         $colone=$res->fetchAll();
         foreach($colone as $valeur){
            echo ($valeur['intitule_matiere']);}?>
            <td><?php echo($val['semestre']);?>
        <td><?php echo($val['seance']);?>
        <td><?php echo($val['type_seance']);?>
        <td><?php echo($val['action']);?>
        <td><?php echo($val['duree']);?>
        <td><a href="modifier vacation.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
        <td><a href="suprimer vacation.php?id=<?=$val['id']?>" class="danger">suprimer</a></td>
        </tr>
        <?php }?>
        </table>
        
  </div>
  <a href="export vacation.php" class="btn_add">exporter</a>
  <a href="imprimer vacation.php" class="btn1">imprimer</a>
</body>
</html>
<?php } ?>