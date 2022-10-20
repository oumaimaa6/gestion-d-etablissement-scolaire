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
    <title>Add Absence</title>
    <link rel="stylesheet" href="css/cherche.css">
    <link rel="stylesheet" href="body.css">
    <link rel="stylesheet" href="css/new.css">
</head>
<body>
<div class="forme">
<a href="abcence.php" class="back_btn">Retour</a>
 <form action="addabsence.php" method="POST">
    <label>Code d'inscription</label>
        <input type="text" name="code_inscription" ><br>
        <label>Semestre</label>
        <select name="semestre">
        <option value="semestre_1">Semestre 1</option>
        <option value="semestre_2">Semestre 2</option>
        <option value="semestre_3">Semestre 3</option>
        <option value="semestre_4">Semestre 4</option>
        </select><br>
        <input type="submit" name="submit" value="NEXT"><br>



<?php if(isset($_POST['submit'])){ ?>
<label>Code d'inscription</label>
<select name="code">

<?php $cin=$_POST['code_inscription'];
$stm=$conn->query("SELECT n_apogee,nom,prenom from etudiant where n_apogee='$cin'"); 
$res=$stm->fetchAll();
$name=" "; $last=" ";
if($res!=0){
      foreach($res as $val){ 
    $name=$val['nom']; $last=$val['prenom'];
echo "<option value=".$val['n_apogee'].">".$val['n_apogee']."</option>";
} ?>


</select>
<h3>L'etudiant: <?php echo $name." ".$last; } ?></h3>
<label>Promotion</label>
<select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">Promotion ".$i."</option>";   
}?>
 </select><br>

<label>Semestre</label>
 <select name="semes">
<?php $se=$_POST['semestre'];
 echo "<option value=".$se.">".$se."</option>";?>
 </select><br>
        <label>Matiere</label>
        <select name="matiere" >
<?php if($se=="semestre_1" || $se=="semestre_2"){ $semes="semestre_1/semestre_2";
    $s=$conn->query("SELECT  intitule_matiere from matiere where semestre='$se' OR semestre='$semes'");
while($val=$s->fetch()){
    echo "<option value=".$val['intitule_matiere'].">".$val['intitule_matiere']."</option>";
}}
if($se=="semestre_3" || $se=="semestre_4"){ $semes="semestre_3/semestre_4";
    $s=$conn->query("SELECT  intitule_matiere from matiere where semestre='$se' OR semestre='$semes'");

while($val=$s->fetch()){
    echo "<option value=".$val['intitule_matiere'].">".$val['intitule_matiere']."</option>";
}}
?>
</select><br>
        <label>Date</label>
        <input type="date" name="date"><br>
        <label>Justification</label>
        <select name="justification">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select><br>
        <label>Motif</label>
        <input type="text" name="motif"><br>
        <input type="submit" value="ajouter" name="submit2">
        </form>
        </div>
    <?php }
    if(isset($_POST['submit2'])){
    $code= $_POST['code'];
    $promotion=$_POST['promotion'];
    $date='1010-10-10';
    if(!empty( $_POST['date']))
    {$date= $_POST['date'];}
    $matiere=" ";
    if(!empty($_POST['matiere']))
    {$matiere= $_POST['matiere'];}
    $semestre= $_POST['semes'];
    $justification= $_POST['justification'];
    $motif= $_POST['motif'];
    $conn->query("INSERT INTO absence(code,date,matiere,promotion,semestre,justification,motif) 
        VALUES ('$code','$date','$matiere','$promotion','$semestre','$justification','$motif')");
        echo "Bien Ajouter";
        if($justification=="non"){
        $stm=$conn->query("SELECT * from total_absence where code='$code' and promotion='$promotion' and semestre='$semestre'");
        $res=$stm->fetchAll();
          if($res==NULL)
        {
         $conn->query("INSERT INTO total_absence(code,promotion, semestre, nb_total) 
            VALUES ('$code','$promotion','$semestre','1')");}
            else{
         $stm=$conn->query("SELECT nb_total from total_absence where code='$code' and promotion='$promotion' and semestre='$semestre'");
           while($val=$stm->fetch()){
            $i=($val["nb_total"] + 1);
           } 
           $conn->query("UPDATE total_absence set code='$code', promotion='$promotion', semestre='$semestre', nb_total='$i'
           where code='$code' and promotion='$promotion' and semestre='$semestre'");
            }
        }
}
    ?>
</body>
</html>