<?php 
include_once('conbd.php');
include_once ('baredemenu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vacation</title>
    <link rel="stylesheet" href="css/cherche.css">
    <link rel="stylesheet" href="body.css">
</head>
<body>
<div class="forme">
<a href="vacation.php" class="back_btn">Retour</a>
<form action="addvacation.php" method="POST">
<label>Vacataire</label>
    <select name="cin">
<?php $stm=$conn->query("select nom,prenom,CIN_vacataire from vacataire "); 
        while($val=$stm->fetch()){ 
        echo "<option value=".$val['CIN_vacataire'].">".$val['nom']." ".$val['prenom']."</option>";
        }?>
        </select><br>
<input type="submit" name="submit" value="ajouter une vacation"><br>
<?php if(isset($_POST['submit'])){?>
    <label>le vacataire</label> 
    <select name="vac">
<?php $id=$_POST['cin'];
$stm=$conn->query("select nom,prenom,CIN_vacataire from vacataire where CIN_vacataire='$id'"); 
        while($val=$stm->fetch()){ 
        echo "<option value=".$val['CIN_vacataire'].">".$val['nom']." ".$val['prenom']."</option>";
        }?>
        </select><br>
<label>Matiere</label>
<select name="code">
<?php 
$resultat=$conn->query("SELECT intitule_matiere,code_matiere FROM matiere JOIN vacataire ON matiere.code_matiere=vacataire.code_matiere1
OR matiere.code_matiere=vacataire.code_matiere2 OR matiere.code_matiere=vacataire.code_matiere3 OR matiere.code_matiere=vacataire.code_matiere4
OR matiere.code_matiere=vacataire.code_matiere5 OR matiere.code_matiere=vacataire.code_matiere6
where CIN_vacataire='$id'");
$res=$resultat->fetchAll();
foreach($res as $val){ 
    echo "<option value=".$val['code_matiere'].">".$val['intitule_matiere']."</option>";
}
?>
</select><br>
<label>Date</label>
<input type="date" name="date" required="required"><br>
<label>Semestre</label>
        <select name="semestre" >
        <option value="semestre_1">semestre 1</option>
        <option value="semestre_2">semestre 2</option>
        <option value="semestre_3">semestre 3</option>
        <option value="semestre_4">semestre 4</option>
    </select><br>
<label>Seance</label>
        <input type="text" name="seance"><br>
        <label>Type de Seance</label>
        <select name="type_seance" >
            <option value="aucune">aucune</option>
            <option value="cours/TD">cours/TD</option>
            <option value="examen">Examen</option>
            <option value="rattrapage/controle">Rattrapage/Controle</option>
            <option value="encadrement">Encadrement</option>
            <option value="sotenance">Soutenance</option>
            <option value="Sortie/visite de chantier">Sortie/visite de chantier</option>
            <option value="atelier">Atelier</option>
        </select><br>
        <label>Action</label>
        <select name="action">
            <option value="effectuer">effectuer</option>
            <option value="non effectuer">non effectuer</option>
        </select><br>
        <label>Duree</label>
        <input type="double" name="duree" value="0"><br>
        <input type="submit" name="vacation">

</form> 
</div>
<?php 
}
if(isset($_POST['vacation'])){

    $cin=$_POST['vac'];
    $matiere=$_POST['code'];
    $date=$_POST['date'];
    $seance= $_POST['seance'];
$type_seance= $_POST['type_seance'];
$action= $_POST['action'];
$semestre= $_POST['semestre'];
$duree= $_POST['duree'];
$conn->query("INSERT INTO vacation(date,id_vacataire,id_matiere,semestre,seance,type_seance,action,duree) 
VALUES ('$date','$cin','$matiere','$semestre','$seance','$type_seance','$action','$duree')");
//header('location:vacation.php');
	}
?>
</body>
</html>