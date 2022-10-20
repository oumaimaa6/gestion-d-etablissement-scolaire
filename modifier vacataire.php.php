<?php 
include_once('conbd.php');
//include_once('baredemenu.php');

$id=$_GET['id'];
$sql=$conn->query("SELECT * from vacataire WHERE id='$id'");
while($res=$sql->fetch()){
$id=$res['id'];
$cin= $res['CIN_vacataire'];
$nom= $res['nom'];
$prenom= $res['prenom'];
$email= $res['email'];
$tele= $res['tele'];
$fonc= $res['fonction'];
$grade= $res['grade_professionnel'];
$code1= $res['code_matiere1'];
$code2= $res['code_matiere2'];
$code3=$res['code_matiere3'];
$code4=$res['code_matiere4'];
$code5=$res['code_matiere5'];
$code6=$res['code_matiere6'];
$etat= $res['etat'];
$debut= $res['periode_debut'];
$fin= $res['periode_fin'];
$rip= $res['RIB'];
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $cin= $_POST['CIN'];
    $nom= $_POST['nom'];
    $prenom= $_POST['prenom'];
    $email= $_POST['email'];
    $tele= $_POST['tele'];
    $fonc= $_POST['fonc'];
    $grade= $_POST['grade_professionnel'];
    $code1= $_POST['code1'];
    $code2= $_POST['code2'];
    $code3= $_POST['code3'];
    $code4= $_POST['code4'];
    $code5= $_POST['code5'];
    $code6= $_POST['code6'];
    $etat= $_POST['etat'];
    $debut= $_POST['debut'];
    $fin= $_POST['fin'];
    $rip= $_POST['RIB'];
    $conn->query("UPDATE vacataire SET CIN_vacataire='$cin',nom='$nom',prenom='$prenom',email='$email',tele='$tele',
    fonction='$fonc',grade_professionnel='$grade', code_matiere1='$code1',code_matiere2='$code2',code_matiere3='$code3',code_matiere4='$code4',code_matiere5='$code5',code_matiere6='$code6',etat='$etat',
     periode_debut='$debut',periode_fin='$fin',RIB='$rip' where id='$id'");
    header('location:vacataire.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <link rel="stylesheet" href="css/cherche.css">
    
</head>
<body>
<div class="forme">
     <a href="vacataire.php" class="back_btn">Retour</a>
     <h2>Modifier un vacataire</h2>
     <form action="modifier vacataire.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id;?>">
	<label>CIN vacataire</label>
        <input type="text" name="CIN" value="<?php echo $cin;?>"><br>
        <label>Nom </label>
        <input type="text" name="nom" value="<?php echo $nom;?>"><br>
        <label>Prenom </label>
        <input type="text" name="prenom" value="<?php echo $prenom;?>"><br>
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $email;?>"><br>
        <label>Mobile</label>
        <input type="tele" name="tele" value="<?php echo $tele;?>"><br>
        <label>Fonction</label>
        <input type="text" name="fonc" value="<?php echo $fonc;?>"><br>
        <label>Grade Professionnel</label>
        <input type="text" name="grade_professionnel" value="<?php echo $grade;?>"><br>
        <label>Code matiere 1</label>
        <input type="text" name="code1" value="<?php echo $code1;?>"><br>
        <label>Code matiere 2</label>
        <input type="text" name="code2" value="<?php echo $code2;?>"><br>
        <label>Code matiere 3</label>
        <input type="text" name="code3" value="<?php echo $code3;?>"><br>
        <label>Code matiere 4</label>
        <input type="text" name="code4" value="<?php echo $code4;?>"><br>
        <label>Code matiere 5</label>
        <input type="text" name="code5" value="<?php echo $code5;?>"><br>
        <label>Code matiere 6</label>
        <input type="text" name="code6" value="<?php echo $code6;?>"><br>
        <label>Etat</label>
        <select name="etat">
        <option value="<?php echo $etat;?>"><?php echo $etat;?></option>
            <option value="actif">actif</option>
            <option value="inactif">inactif</option>
        </select><br>
        <label>Periode debut</label>
        <input type="date" name="debut" value="<?php echo $debut;?>"><br>
        <label>Periode fin</label>
        <input type="date" name="fin" value="<?php echo $fin;?>"><br>
        <label>R.I.B</label>
        <input type="number" name="RIB" value="<?php echo $rip;?>"><br>
 
 <input type="submit" value="modifier" name="submit">
     </form>
    </div>
    
</body>
</html>