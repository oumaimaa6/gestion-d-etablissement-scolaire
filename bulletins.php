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
    <title>bulletins</title>
    <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <link rel="stylesheet" href="css/c.css">
</head>
<body>
<div class="contrainer">
<a href="choix bulletins.php" class="btn_add">Exporter</a>
    <!--  *************   debut rechercher les vacations     ***************************-->

<div class="panel panel-primary">
    <div class="panel-heading">Rechecher des relevés semestriels</div>
    <div class="panel-body">
    <form method="POST" class="form-inline" >
    <label>Promotion: </label>
        <select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">promotion ".$i."</option>";   
}?>
 </select>
 <label>Semestre: </label>
        <select name="semestre" class="input">
        <option value="Semestre_1">Semestre_1</option>
        <option value="Semestre_2">Semestre_2</option>
        <option value="Semestre_3">Semestre_3</option>
        <option value="Semestre_4">Semestre_4</option>
        </select>
        <label>Code etudiant: </label>
       <input type="text" name="code" required="required">
       <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span>
						</button>
</form> </div> </div>

    <?php $total_coef=0; $total_note=0;
    if(isset($_POST['submit'])){
         if(isset($_POST['code']))
         $code=$_POST['code'];
         else $code="";
     $promotion= $_POST['promotion'];  $semestre=$_POST['semestre'];
 $tab=array(); $tab2=array();
  
    $select=$conn->query("SELECT nom,prenom from etudiant where n_apogee='$code'");
    while($v=$select->fetch()){ 
     echo "<h1>L'etudiant: ".$v['nom']." ".$v['prenom']."<h1>";
     echo"<h1>Le code d'inscription: ".$code."</h1>"; }
    ?>
     <table><tr>
     <th>Code matiere</th><th>Intitule matiere</th><th>Coefficient</th><th>Note finale</th><th>Note multiple</th> </tr>
<?php $sql=$conn->query("SELECT n_apogee,code_matiere, `note semestre` FROM note 
 where n_apogee='$code' and promotion='$promotion' and semestre='$semestre'") ;
  while($val=$sql->fetch()){  $matiere=$val['code_matiere']; ?>
        <tr>
        <td><?php echo($val['code_matiere'].'<br>'); ?></td>
    <?php $se=$conn->query("SELECT intitule_matiere,coef from matiere where code_matiere='$matiere'");
           
            while($va=$se->fetch()){ ?>
            <td><?php echo($va['intitule_matiere'].'<br>'); ?></td>
            <td><?php echo($va['coef'].'<br>'); $coef=$va['coef']; $tab[]=$coef; } ?></td>
            <td><?php echo($val['note semestre'].'<br>');   ?></td>
            <td><?php $calcul=($coef)*($val['note semestre']); $tab2[]=$calcul;
             echo ($calcul).'<br>';  ?></td>
            
        </tr>
        
     
    <?php  } foreach($tab as $val){
        $total_coef+=$val;
    }  
    foreach($tab2 as $val){
        $total_note+=$val;} ?>
    </table>
<?php 
if($total_coef!=0 ){
    $note_semestre=$total_note/$total_coef;
echo "<h1>la note du  ".$semestre." : ".$note_semestre."</h1>";
$_SESSION[$code]=$note_semestre;
           }
        
}
    ?>
</body>
</html>