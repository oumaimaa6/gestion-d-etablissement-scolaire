<?php 
include_once('conbd.php');
include_once ('baredemenu.php');
include("fonction.php");
$annee_debut=2017;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rattrapage</title>
    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
</head>
<body>
<div class="contrainer">
<a href="rattrapage.php" class="btn_add">Retour</a>
    <!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Rechecher les rattrapages</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
        <label>Semestre: </label>
        <select name="semestre" class="input">
        <option value="Semestre_1">Semestre_1</option>
        <option value="Semestre_2">Semestre_2</option>
        <option value="Semestre_3">Semestre_3</option>
        <option value="Semestre_4">Semestre_4</option>
    </select>
    <input type="submit" name="sub" value="suivant" class="btn btn-primary">
    </form>
    <?php if(isset($_POST['sub'])){ ?>
    <form method="POST" action="exporter ratt final.php">
    <?php 
        $semestre=$_POST['semestre'] ; ?>
        <label>Semestre choisi:</label>
        <select name="se">
            <option value="<?php echo $semestre ; ?>"><?php echo $semestre ; ?></option>
        </select>
    <label>Matiere: </label>
    <select name="matiere">
<?php  if($semestre=="Semestre_1" || $semestre=="Semestre_2"){ $semes="semestre_1/semestre_2";
 $stm=$conn->query("SELECT code_matiere, intitule_matiere from matiere where  semestre='$semes'");
while($row=$stm->fetch()){
    echo "<option value=".$row['code_matiere'].">".$row['intitule_matiere']."</option>";
}} 
 if($semestre=="Semestre_3" || $semestre=="Semestre_4"){ $semes="semestre_3/semestre_4";
 $stm=$conn->query("SELECT code_matiere,intitule_matiere from matiere where  semestre='$semes'");
 while($row=$stm->fetch()){
    echo "<option value=".$row['code_matiere'].">".$row['intitule_matiere']."</option>";
}} ?>
    </select>
    <label>Promotion: </label>
        <select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">promotion ".$i."</option>";   
}?>
 </select>
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
                        <?php ?>
    </form> </div> </div>
<?php } ?>
    <!--********************fin de recherche********************* -->
   