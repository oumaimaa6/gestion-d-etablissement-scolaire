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
<a href="exportenote.php" class="btn_add">EXPORTER ALL</a>
<table style="position:absolute ;top:150px ; left:150px">
<td><p><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ROYAUME DU MAROC&emsp;&emsp;&emsp;</b><br> &emsp;&emsp;&emsp;&emsp; Ministère de l'Aménagement du Territoire, de l'Urbanisme,<br> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;de l'Habitat et de la Politique de la Ville<br><b>Institut de Formation des Techniciens Spécialisés En Architecture et en Urbanisme<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Oujda</b></p></td> 
<td><img  src="royaume.jpeg" style="width: 100px;"></td>
<td><p lang="arab">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<b>المملكة المغربية </b> <br>&emsp;&emsp;وزارة إعداد التراب الوطني و التعميروالإسكان وسياسة المدينة <br>&emsp;<b>معهد تكوين التقنيين المتخصصين في التعمير و الهندسة المعمارية </b><br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;وجدة </p></td> 
</table><div class="forme">
<form action="note.php" method="POST">
    <div style="position:absolute ;top:350px ; left:650px">
<label>Semestre</label><br>
    <select name="semestre" class="input">
    <option value="">--choisie une option--</option>
        <option value="Semestre_1">Semestre_1</option>
        <option value="Semestre_2">Semestre_2</option>
        <option value="Semestre_3">Semestre_3</option>
        <option value="Semestre_4">Semestre_4</option>
    </select><br>
    <input type="submit" name="submit" value="VALIDER"><br>
</form></div>
<div style="position:absolute ;top:450px ; left:640px">
<!--******* premier submit ***************  -->
<?php if(isset($_POST['submit']) && $_POST['semestre']!=""){?>
    <form action="note2.php" method="POST">
    <label>semestre</label> 
    <select name="se" class="input">
    <?php $se=$_POST['semestre'];
     echo "<option value=".$se.">".$se."</option>";?>
        </select><br>
    <label>Matiere</label>
    <select name="code" class="input" required="required">
    <?php if($se=="Semestre_1" || $se=="Semestre_2"){ $semes="semestre_1/semestre_2";
     $resultat=$conn->query("SELECT code_matiere,intitule_matiere from matiere where  semestre='$semes'");
     $res=$resultat->fetchAll();
     foreach($res as $val){ 
      $code=$val['code_matiere'];
        $name=$val['intitule_matiere'];
    echo "<option value=".$code.">".$name."</option>";} }
    if($se=="Semestre_3" || $se=="Semestre_4"){ $semes="semestre_3/semestre_4";
        $resultat=$conn->query("SELECT code_matiere,intitule_matiere from matiere where  semestre='$semes'");
        $res=$resultat->fetchAll();
        foreach($res as $val){ 
         $code=$val['code_matiere'];
           $name=$val['intitule_matiere'];
       echo "<option value=".$code.">".$name."</option>"; } }
    ?>
     </select><br> 

<label>Promotion</label>
    <select name="promotion" class="input">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">".$i."</option>";   
}?>
 </select>
     <input type="submit" name="submit2">
     </form> </div></div>
<?php }?>
</body>
</html>

