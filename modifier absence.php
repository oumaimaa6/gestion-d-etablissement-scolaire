<?php 
include('conbd.php');

$id=$_GET['id'];
$sql=$conn->query("SELECT * from absence WHERE id_absence='$id'");
while($res=$sql->fetch()){
    $id=$res['id_absence'];
    $code=$res['code'];
    $date=$res['date'];
    $matiere=$res['matiere'];
    $semestre=$res['semestre'];
    $justification=$res['justification'];
    $motif=$res['motif'];
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $code=$_POST['code'];
    $date=$_POST['date'];
    $matiere=$_POST['matiere'];
    $semestre=$_POST['semestre'];
    $justification=$_POST['justification'];
    $motif=$_POST['motif'];
    $conn->query("UPDATE absence SET code='$code',date='$date',matiere='$matiere',semestre='$semestre',justification='$justification',motif='$motif' where id_absence='$id'");
    header('location:abcence.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier absence</title>
    <link rel="stylesheet" href="css/cherche.css">
</head>
<body>
<div class="forme">
     <a href="abcence.php" class="back_btn">Retour</a>
     <h2>Modifier l'absence</h2>
     <form action="modifier absence.php" method="POST">
	
	<label>Code d'inscription</label>
     <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="text" name="code" value="<?php echo $code;?>"><br>
        <label>Date</label>
        <input type="date" name="date" value="<?php echo $date;?>"><br>
        <label>Matiere</label>
        <input type="text" name="matiere" value="<?php echo $matiere;?>"><br>
        <label>Semestre</label>
        <select name="semestre">
            <option value="<?php echo $semestre;?>"><?php echo $semestre;?></option>
        <option value="semestre_1">Semestre 1</option>
        <option value="semestre_2">Semestre 2</option>
        <option value="semestre_3">Semestre 3</option>
        <option value="semestre_4">Semestre 4</option>
        </select><br>
        <label>Justification</label>
        <select name="justification">
        <option value="<?php echo $justification;?>"><?php echo $justification;?></option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br>
        <label>Motif</label>
        <input type="text" name="motif" value="<?php echo $motif;?>"><br>
 
 <input type="submit" value="modifier" name="submit">
     </form>
    </div>
</body>
</html>