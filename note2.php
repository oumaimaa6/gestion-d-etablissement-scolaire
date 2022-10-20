<?php
include_once('conbd.php');
include_once('verification.php');
include("fonction.php");
include_once ('baredemenu.php');
$annee_debut=2017; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note</title>
    
    <link rel="stylesheet" href="css/addnote.css">
    <!-- css de tableau si tu veut le changer -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="body.css">
   
</head>
<body>
<a href="note.php" class="btn_add">Retour</a>
<table style="position:absolute ;top:50px ; left:250px">
<td><p><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ROYAUME DU MAROC&emsp;&emsp;&emsp;</b><br> &emsp;&emsp;&emsp;&emsp; Ministère de l'Aménagement du Territoire, de l'Urbanisme,<br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;de l'Habitat et de la Politique de la Ville<br><b>Institut de Formation des Techniciens Spécialisés En Architecture et en Urbanisme<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Oujda</b></p></td> 
<td><img  src="royaume.jpeg" style="width: 100px;"></td>
<td><p lang="arab">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>المملكة المغربية </b> <br>&emsp;&emsp;وزارة إعداد التراب الوطني و التعميروالإسكان وسياسة المدينة <br>&emsp;<b>معهد تكوين التقنيين المتخصصين في التعمير و الهندسة المعمارية </b><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;وجدة </p></td> 
</table>
<div style="position:absolute ;top:200px ; left:50px">
<?php

if(isset($_POST['submit2'])){
    $semestre=$_POST['se'];
    $code='';
    $promotion=$_POST['promotion'];
    $nom=""; 
    $prenom="";
    $intitule="";
    if(!empty($_POST['code'])){
        $code=$_POST['code'];
    $sql=$conn->query("SELECT nom, prenom from vacataire where code_matiere1='$code' or code_matiere2='$code' or code_matiere3='$code' or code_matiere4='$code'");
    $row=$sql->fetchAll();
    if($row != 0){
        foreach($row as $val){
           $nom= $val['nom'];
           $prenom=$val['prenom'];
           }}
    $stm=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$code'");
    $res=$stm->fetchAll();
    if($res != 0){
    foreach($res as $val){
        $intitule=$val['intitule_matiere'];
    }}
}
    ?>
    <div class="table">
<h2 style="width: 1000px; ">la matiere: <?php echo $intitule; ?></h2>
<h2><p style="width: 1000px;" >le professeur: <?php echo $nom." ".$prenom; ?></p></h2>
<h2><div style="position:absolute ;top:90px ; left:1100px"><?php echo $semestre; ?></div></h2>
<h2><div style="position:absolute ;top:0px ; left:1100px">Promotion  <?php echo $promotion; ?></div></h2>
<form action="note2.php" method="POST">
    <table>
        <tr>
            <th>N° d'inscription</th>
            <th>Nom </th>
            <th>Prénom</th>
            <th>Note ordinaire</th>
            <th>Note rattrapage</th>
            <th>Note finale</th>
        </tr>
        
        <?php //remplacer student par votre table etudiant
     //ici j'ai teste par annee ,tu peut faire par promotion
       $q=$conn->query("SELECT etudiant.id,etudiant.n_apogee,etudiant.nom,etudiant.prenom,note.`note semestre`,note.`note ratt`,note.`note exam` from etudiant INNER JOIN note ON etudiant.n_apogee =note.n_apogee where etudiant.semestre='$semestre' AND etudiant.promotion='$promotion' AND note.code_matiere ='$code' order by etudiant.id");
      $e=$q->fetchAll();
       if(empty($e))
    { 
        $q=$conn->query("SELECT id,n_apogee,nom,prenom from etudiant  where semestre='$semestre' AND promotion='$promotion' order by n_apogee");
        $e=$q->fetchAll();
    }
    
        foreach($e as $val){ 
       ?>

    <td><?php echo($val['n_apogee']);?></td>
    <td><?php echo($val['nom'].'<br>');?></td>
    <td><?php echo($val['prenom'].'<br>');?></td>
    <td ><input type="number" name="note_exam[]" class="on" style="width: 100px; border:none;" min="0" max="20" step='0.1' required="required" value="<?php if(isset($val['note exam'])) echo $val['note exam']; ?>"></td>
    <td><input type="number" name="note_ratt[]" class="on" style="width: 100px; border:none;"  min="0" max="20" step='0.1' value="<?php if(isset($val['note ratt'])) echo $val['note ratt']; ?>"></td>
    <td><?php if(isset($val['note semestre'])) echo $val['note semestre']; ?></td>
    <input type="hidden" name="code2[]" value="<?php echo $code ; ?>">
    <input type="hidden" name="note_semestre[]" value="<?php if(isset($val['note semestre'])) echo $val['note semestre']; ?>">
    <input type="hidden" name="sem[]" value="<?php echo $semestre ; ?>">
    <input type="hidden" name="promo[]" value="<?php echo $promotion ; ?>">
    <input type="hidden" name="n_apogee[]" value="<?php echo($val['n_apogee']);?>" readonly style="border:none;">
</tr>
<?php } ?>
        </table>
        <?php
        $stm=$conn->query("SELECT * from note where code_matiere='$code' and semestre='$semestre' and promotion='$promotion'");
        $res=$stm->fetchAll();
        if(empty($res)){
         echo '<input type="submit" value="Enregistrer" name="enre">';
        }
        if(!empty($res)){
         echo '<input type="submit" value="Modifier" name="modi">';
        }
        ?>
</form>
        <?php }
        ?>
        </div>
        </div>
</body>
</html>
<?php 
if(isset($_POST['enre'])){ 

  for($i=0;$i<count($_POST['n_apogee']);$i++){

   
 
    if(!empty($_POST['n_apogee'][$i]))
    {$n_apogee=$_POST['n_apogee'][$i];}
    else {$n_apogee=NULL;}

    if(!empty($_POST['promo'][$i]))
    {$promo=$_POST['promo'][$i];}
    else {$promo=NULL;}

    if(!empty($_POST['code2'][$i]))
    {$coemat=$_POST['code2'][$i];}
    else {$coemat=NULL;}

    if(!empty($_POST['sem'][$i]))
    {$seme=$_POST['sem'][$i];}
    else {$seme=NULL;}

    if(!empty($_POST['note_exam'][$i]))
    {$note_axam=$_POST['note_exam'][$i];}
    else {$note_axam=NULL;}

    if(!empty($_POST['note_ratt'][$i]))
    {$note_ratt=$_POST['note_ratt'][$i];}
    else {$note_ratt=NULL;}
    $note=$_POST['note_semestre'][$i];
    if(!empty($note))
    {
    $note_semestre=$note;
    }else 
    {
        if($note_axam>=$note_ratt)
        {
         $note_semestre= $note_axam;
        }
        if($note_axam<$note_ratt)
        {$note_semestre=$note_ratt;}
    }
$conn->query("INSERT INTO note (`n_apogee`,`code_matiere`,`note semestre`,`note ratt`,`note exam`,`semestre`,`promotion`) value('$n_apogee','$coemat','$note_semestre','$note_ratt','$note_axam','$seme','$promo')"); } 

}
if(isset($_POST['modi']))
{
    for($i=0;$i<count($_POST['n_apogee']);$i++){

     
        if(!empty($_POST['n_apogee'][$i]))
        {$n_apogee2=$_POST['n_apogee'][$i];}
        else {$n_apogee2=NULL;}

        if(!empty($_POST['promo'][$i]))
        {$promo=$_POST['promo'][$i];}
        else {$promo=NULL;}
    
        if(!empty($_POST['code2'][$i]))
        {$coemat=$_POST['code2'][$i];}
        else {$coemat=NULL;}
    
        if(!empty($_POST['sem'][$i]))
        {$seme=$_POST['sem'][$i];}
        else {$seme=NULL;}
    
        if(!empty($_POST['note_exam'][$i]))
        {$note_axam=$_POST['note_exam'][$i];}
        else {$note_axam=NULL;}
    
        if(!empty($_POST['note_ratt'][$i]))
        {$note_ratt=$_POST['note_ratt'][$i];}
        else {$note_ratt=NULL;}
        
            if($note_axam>=$note_ratt)
            {
             $note_semestre= $note_axam;
            }else{
            if($note_axam<$note_ratt)
            {$note_semestre=$note_ratt;}
            else $note_semestre=$_POST['note_semestre'][$i];}
        
     
$conn->query("UPDATE note SET `note semestre`='$note_semestre',`note ratt`='$note_ratt',`note exam`='$note_axam' WHERE n_apogee='$n_apogee2' and promotion='$promo' and semestre='$seme' and code_matiere='$coemat' ");   
} }

?>



