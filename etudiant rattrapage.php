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
    <input type="submit" name="sub" value="suivant" class="btn btn-primary" >
    <?php if(isset($_POST['sub'])){
        $semestre1=$_POST['semestre'] ; ?>
        <label>Semestre choisi:</label>
        <select name="se">
            <option value="<?php echo $semestre1 ; ?>"><?php echo $semestre1 ; ?></option>
        </select>
    <label>Matiere: </label>
    <select name="matiere">
<?php  if($semestre1=="Semestre_1" || $semestre1=="Semestre_2"){ $semes="semestre_1/semestre_2";
 $stm=$conn->query("SELECT code_matiere, intitule_matiere from matiere where   semestre='$semes'");
while($row=$stm->fetch()){
    echo "<option value=".$row['code_matiere'].">".$row['intitule_matiere']."</option>";
}} 
 if($semestre1=="Semestre_3" || $semestre1=="Semestre_4"){ $semes="semestre_3/semestre_4";
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
                        <?php } ?>
    </form> </div> </div>

    <!--********************fin de recherche********************* -->
    <?php if(isset($_POST['submit'])){
         if(isset($_POST['matiere']))
         $matiere=$_POST['matiere'];
     else
         $matiere="";
        $promotion= $_POST['promotion'];
        $semestre=$_POST['se'];
        $nom=" ";
        $s=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere'");
        while($row=$s->fetch()){
         $nom=$row['intitule_matiere'];
        }
        echo "<h1>Les rattrapages du matiere : '" .$nom."'</h1>" ; 
        echo "<h1> ".$semestre."</h1>" ; ?>
         <table>
        <tr>
             <th>code d'inscription</th>
             <th>Nom </th>
             <th>Prenom</th>
             <th>Note finale</th>
        </tr>
        <tr>
            <?php $sql=$conn->query("SELECT n_apogee, `note semestre` FROM note where code_matiere='$matiere'  and semestre='$semestre' ") ;
            while($val=$sql->fetch()){  $code=$val['n_apogee']; 
                if($val['note semestre']<10 && $_SESSION[$code]<10){
               ?>
            <td><?php echo($val['n_apogee'].'<br>');?></td>
            <?php $select=$conn->query("SELECT nom,prenom from etudiant where n_apogee='$code'");
            while($v=$select->fetch()){  ?>
            <td><?php echo($v['nom'].'<br>'); ?></td>
            <td><?php echo($v['prenom'].'<br>'); } ?></td>
            <td><?php echo($val['note semestre'].'<br>'); }?></td>
        </tr>
    <?php  }} ?> </table>
    <a href="etudiant ratt exporter.php" class="btn_add">exporter</a>
</body>
</html