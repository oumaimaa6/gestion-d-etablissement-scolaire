<?php 
include('conbd.php');
$id=$_GET['id'];
$sql=$conn->query("SELECT * from assiduite WHERE id_assiduite='$id'");
while($res=$sql->fetch()){
    $id=$res['id_assiduite'];
    $code=$res['code_etudiant'];
    $semestre=$res['semestre'];
    $date=$res['date'];
    $type=$res['type'];
    $motif=$res['motif'];
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $code=$_POST['code'];
    
    $date=$_POST['date'];
    $semestre=$_POST['semestre'];
    $type=$_POST['type'];
    $motif=$_POST['motif'];
    $conn->query("UPDATE assiduite SET code_etudiant='$code',
    semestre='$semestre',date='$date',type='$type',motif='$motif' where id_assiduite='$id'");
    header('location:assiduite.php');
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier assiduite</title>
    <link rel="stylesheet" href="css/cherche.css">
</head>
<body>
<div class="forme">
<a href="assiduite.php" class="back_btn">Retour</a>
 <form action="modifier assiduite.php" method="POST">
<label>Code d'inscription</label>
<input type="hidden" name="id" value="<?php echo $id;?>">
<select name="code">
<?php echo "<option value=".$code.">".$code."</option>";
 ?>
</select><br>
<label>Semestre</label>
    <select name="semestre">
<option value="<?php echo $semestre; ?>"><?php echo $semestre; ?></option>
        <option value="semestre_1">Semestre_1</option>
        <option value="semestre_2">Semestre_2</option>
        <option value="semestre_3">Semestre_3</option>
        <option value="semestre_4">Semestre_4</option>
 </select><br>
        <label>Date</label>
        <input type="date" name="date" value="<?php echo $date ;?>" ><br>
        <label>Type</label>
        <select name="type" ><option value="<?php echo $type;?>"><?php echo $type;?></option>
        <option value="aucune">Aucune</option>
        <option value="avertissement">Avertissement</option>
        <option value="blame">Blame</option>
        <option value="exclusion du cours">Exclusion du cours</option>
        </select><br>
        <label>Motif</label>
        <input type="text" name="motif" value="<?php echo $motif;?>"><br>
        <input type="submit" value="modifier" name="submit">
        </form>
        </div>
</body>
</html>