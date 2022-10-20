<?php 
include_once('conbd.php');
//include_once('baredemenu.php');
include_once('verification.php');
$id=$_GET['id'];
$sql=$conn->query("SELECT * from vacation WHERE id='$id'");
while($res=$sql->fetch()){
$id=$res['id'];
$date= $res['date'];
$vacataire= $res['id_vacataire'];
$matiere= $res['id_matiere'];
$semestre= $res['semestre'];
$seance= $res['seance'];
$type_seance= $res['type_seance'];
$action= $res['action'];
$duree= $res['duree'];}
if(isset($_POST['submit'])){
$id=$_POST['id'];
$date=$_POST['date'];
$vacataire=$_POST['cin'];
$matiere=$_POST['code'];
$semestre=$_POST['semestre'];
$seance=$_POST['seance'];
$type_seance=$_POST['type_seance'];
$action=$_POST['action'];
$duree=$_POST['duree'];
    $conn->query("UPDATE vacation SET date='$date',id_vacataire='$vacataire',id_matiere='$matiere',semestre='$semestre',seance='$seance',type_seance='$type_seance',
    action='$action', duree='$duree' where id='$id'");
    header('location:vacation.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier vacation</title>
    <link rel="stylesheet" href="css/cherche.css">
    
</head>
<body>
<div class="forme">
<a href="vacation.php" class="back_btn">Retour</a>
    <form action="modifier vacation.php" method="POST">
    <label>Date</label>
    <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="date" name="date"  value="<?php echo $date;?>"><br>
        <label>Vacataire</label>
        <select name="cin">
        <?php $stm=$conn->query("select nom,prenom,CIN_vacataire from vacataire where CIN_vacataire='$vacataire' "); 
        while($val=$stm->fetch()){ 
        echo "<option value=".$val['CIN_vacataire'].">".$val['nom']." ".$val['prenom']."</option>";
        }?>
        </select><br>
        <label>Matiere</label>
        <select name="code">
        <?php 
        $cin= $_POST['cin'];
        $stm=$conn->query("SELECT intitule_matiere,code_matiere FROM matiere ");
        while($val=$stm->fetch()){ 
            echo "<option value=".$val['code_matiere'].">".$val['intitule_matiere']."</option>";
        }?>
        </select><br>
        <label>Semestre</label>
        <select name="semestre">
            <option value="<?php echo $semestre;?>"><?php echo $semestre;?></option>
        <option value="semestre_1">Semestre_1</option>
        <option value="semestre_2">Semestre_2</option>
        <option value="semestre_3">Semestre_3</option>
        <option value="semestre_4">Semestre_4</option>
        </select><br>
        <label>Seance</label>
        <input type="text" name="seance" value="<?php echo $seance;?>"><br>

        <label>Type de Seance</label>
        <select name="type_seance">
           <option value="<?php echo $type_seance;?>"><?php echo $type_seance;?></option>
            <option value="aucune">aucune</option>
            <option value="cours/TD">cours/TD</option>
            <option value="examen">Examen</option>
            <option value="rattrapage">Rattrapage</option>
            <option value="encadrement">Encadrement</option>
            <option value="sotenance">Soutenance</option>
            <option value="Sortie/visite de chantier">Sortie/visite de chantier</option>
            <option value="atelier">Atelier</option>
        </select><br>
        <label>Action</label>
        <select name="action">
        <option value="<?php echo $action;?>"><?php echo $action;?></option>
            <option value="actif">actif</option>
            <option value="inactif">inactif</option>
        </select><br>
        <label>Duree</label>
        <input type="number" step="0.1" name="duree" value="<?php echo $duree;?>"><br>
        <input type="submit" value="modifier" name="submit">
    </form>
</div>
</body>
</html>