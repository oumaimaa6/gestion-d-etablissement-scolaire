<?php 
include_once('baredemenu.php');
include("fonction.php");
include_once('verification.php');
include_once('conbd.php');
if(isset($_POST['submit'])){
    $CIN=$_POST['CIN'];
    $stm=$conn->query("select * from etudiant where CIN='$CIN'");
        $res=$stm->fetchAll();
   if($res==NULL){
        if(!empty($_FILES['file'])){
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
    
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
    
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
        $maxSize = 400000;
          if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

            $uniqueName = uniqid('', true);
            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
            $file = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
    
            move_uploaded_file($tmpName, './upload/'.$file);
           } 
        }
        if(!isset($file))
        {
         $file = 'default.png';
        }

    if(!empty($_POST['npo']))
    {$NPO= $_POST['npo'];
    }
    else
    {$NPO=NULL;}
    
    if(!empty($_POST['CIN']))
    {$CIN=$_POST['CIN'];}
    else
    {$CIN=NULL;}
    
    if(!empty($_POST['nom']))
    {$nom=$_POST['nom'] ;}
    else
    {$nom=NULL;}
    
    if(!empty($_POST['prenom']))
    {$prenom= $_POST['prenom'];}
    else
    {$prenom=NULL;}

    if(!empty($_POST['nomarab']))
    {$nomarab= $_POST['nomarab'];}
    else
    {$nomarab=NULL;}

    if(!empty($_POST['prenomarab']))
    {$prenomarab= $_POST['prenomarab'];}
    else
    {$prenomarab=NULL;}

    if(!empty($_POST['date']))
    {$date=date('Y-m-d',strtotime($_POST['date']));}
    else
    {$date=NULL;}

    if(!empty($_POST['lieu']))
    {$lieu=$_POST['lieu'];}
    else
    {$lieu=NULL;}

    if(!empty($_POST['promotion']))
    {$promotion=$_POST['promotion'];}
    else
    {$promotion=NULL;}
    
    if(!empty($_POST['semestre']))
    {$semestre=$_POST['semestre'];}
    else
    {$semestre=NULL;}

    if(!empty($_POST['annee']))
    {$annee=$_POST['annee'];}
    else
    {$annee=NULL;}

    if(!empty($_POST['anne1']))
    {$anne1=$_POST['anne1'];}
    else
    {$anne1=NULL;}

    if(!empty($_POST['anne2']))
    {$anne2=$_POST['anne2'];}
    else
    {$anne2=NULL;}

    if(!empty($_POST['etat']))
    {$etat=$_POST['etat'];}
    else
    {$etat=NULL;}
    
    if(!empty($_POST["date_d'inscription"]))
    {$date_dins=$_POST["date_d'inscription"];}
    else
    {$date_dins=NULL;}
    
    if(!empty($_POST['datefin']))
    {$datefin=$_POST['datefin'];}
    else
    {$datefin=NULL;}

    if(!empty($_POST['email']))
    {$email= $_POST['email'];}
    else
    {$email=NULL;}

    if(!empty($_POST['tele']))
    { $tele= $_POST['tele'];}
    else
    {$tele=NULL;}

    if(!empty($_POST['add']))
    {$add= $_POST['add'];}
    else
    {$add=NULL;}
    
    if(!empty($_POST['sexe']))
    {$sexe= $_POST['sexe'];}
    else
    {$sexe=NULL;}
    
    if(!empty($_POST['rib']))
    { $rib= $_POST['rib'];}
    else
    {$rib=NULL;}
   
    if(!empty($_POST['code']))
    {$code= $_POST['code'];}
    else
    {$code=NULL;}

    if(!empty($_POST['type']))
    {$type= $_POST['type'];}
    else
    {$type=NULL;}
    
    if(!empty($_POST['moyenne']))
    {$moyenne= $_POST['moyenne'];}
    else
    {$moyenne=NULL;}
    
    if(!empty($_POST['nomtut']))
    {$nomtut= $_POST['nomtut'];}
    else
    {$nomtut=NULL;}

    if(!empty($_POST['teltut']))
    {$teltut= $_POST['teltut'];}
    else
    {$teltut=NULL;}
    
    if(!empty($_POST['nat']))
    {$nat= $_POST['nat'];}
    else
    {$nat=NULL;}

    if(!empty($_POST['nsjour']))
    {$nsjour= $_POST['nsjour'];}
    else
    {$nsjour=NULL;}
    
    if(!empty($_POST['telurge']))
    {$telurge= $_POST['telurge'];}
    else
    {$telurge=NULL;}

    
    
         $conn->query("INSERT INTO etudiant(photo,n_apogee,nom,prenom,date_naissance,lieu_naissance,CIN,email,tele,adresse,sexe,RIB,code_massar,type_bac,moyenne_bac,nom_tuteur,tele_tuteur,nationalite,n_sejour,tele_urgence,promotion,semestre,etat,`date_d'inscription`,datefin,annee,`anne acad_1`,`anne acad_2`) 
            VALUES ('$file','$NPO','$nom','$prenom','$date','$lieu','$CIN','$email','$tele','$add','$sexe','$rib','$code','$type','$moyenne','$nomtut','$teltut','$nat','$nsjour','$telurge','$promotion','$semestre','$etat','$date_dins','$datefin','$annee','$anne1','$anne2')");
    }		
    else
    {	?>
        <script type="text/javascript">
     alert("Ce étudient est déjà ajouté");
        </script>
     <?php
    }
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <link rel="stylesheet" href="addetudiant.css">
    
    <link rel="stylesheet" href="body.css">
    <style> 
.ligne_horizontal { 
display: flex; 
flex-direction: row; 
font-size: medium;
} 

.ligne_horizontal:before, 
.ligne_horizontal:after { 
content: ""; 
flex: 1 1; 
border-bottom: 2px solid #000; 
margin: auto; 
} 
</style>
</head>
<body>
<div class="forme">
    <a href="etudiant.php" class="btn1">Retour</a>
    <div class="container">
<div class="panel panel-primary">
<div class="panel-heading" align="center">Ajouter un Etudiant </div>
        <div class="panel-body">
        <div class="ligne_horizontal"><b>DONNEES ETUDIANTS</b><br><br></div>
    <form action="addetudiant.php" method="POST" enctype="multipart/form-data"> 
    <div class="row my-row">
    <label class="control-label col-sm-2">Photo</label>
    <div class="col-sm-4">
        <input type="file" name="file" class="form-control"></div>
    <table>
        
        <label class="control-label col-sm-2">CIN</label>
        <div class="col-sm-4">
        <input type="text" name="CIN" required="required" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Nom</label>
        <div class="col-sm-4">
        <input type="text" name="nom" required="required" class="form-control"><br></div>
        <label class="control-label col-sm-2">Prénom</label>
        <div class="col-sm-4">
        <input  type="text" name="prenom" required="required" class="form-control"><br> </div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Code MASSAR</label>
        <div class="col-sm-4">
        <input type="text" name="code" class="form-control"><br></div>
        <label class="control-label col-sm-2">Email</label>
        <div class="col-sm-4">
        <input type="email" name="email" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Numéro de téléphone</label>
        <div class="col-sm-4">
        <input  type="tel" placeholder="0601010101" name="tele" class="form-control"><br></div>
        <label class="control-label col-sm-2">Adresse</label>
        <div class="col-sm-4">
        <input type="text" name="add" style="height:100px;" class="form-control"><br></div>
</div>
<div class="row my-row"> 
        <label class="control-label col-sm-2">Date de naissance</label>
        <div class="col-sm-4">
        <input type="date" name="date" class="form-control"><br></div>
        <label class="control-label col-sm-2">Lieu de naissance</label>
        <div class="col-sm-4">
        <input type="text" name="lieu" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Sexe</label><br>
        <div class="col-sm-4">
        <select name="sexe" class="form-control">
            <option value="">--choisir une option--</option>
            <option value="FEMININ">FEMININ</option>
            <option value="MASCULIN">MASCULIN</option>
        </select><br></div>
        <label class="control-label col-sm-2">RIB</label>
        <div class="col-sm-4">
        <input type="text" name="rib" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Type Bac</label><br>
        <div class="col-sm-4">
        <select name="type" class="form-control">
            <option value="">--choisir une option--</option>
            <option value="Sciences Mathematiques">Sciences Mathématiques</option>
            <option value="Sciences de la Vie et de la Terre">Sciences de la Vie et de la Terre</option>
            <option value="Sciences physiques">Sciences physiques</option>
            <option value="Sciences Agricoles">Sciences Agricoles</option>
            <option value="Architecture Batiments et Travaux Publics">Architecture Bâtiments et Travaux Publics</option>
            <option value="Arts Plastiques ">Arts Plastiques </option>
            <option value="Diplome equivalent">Diplôme équivalent</option>
        </select><br></div>
        <label class="control-label col-sm-2">Moyenne de Bac</label>
        <div class="col-sm-4">
        <input type="number" name="moyenne" step='0.1' min="0" max="20" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Nationalite</label>
        <div class="col-sm-4">
        <input type="text" name="nat" class="form-control"><br></div>
        <label class="control-label col-sm-2">Nom du tuteur</label>
        <div class="col-sm-4">
        <input type="text" name="nomtut" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Numéro téléphone du tuteur</label>
        <div class="col-sm-4">
        <input type="tel" placeholder="0601010101"  name="teltut"class="form-control" ><br></div>
        <label class="control-label col-sm-2">Numéro séjour</label>
        <div class="col-sm-4">
        <input type="text" name="nsjour" class="form-control"><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Numéro téléphone d'urgence</label>
        <div class="col-sm-4">
        <input type="tel" placeholder="0601010101"  name="telurge" class="form-control"><br></div></div>
        <div class="ligne_horizontal"><b>DONNEES D'INSCRIPTION</b><br><br></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Code d'inscription</label>
        <div class="col-sm-4">
        <input type="text" name="npo" required="required" class="form-control"><br></div></div>

<div class="row my-row">
        <label class="control-label col-sm-2">Statut d'étudiant</label>
        <div class="col-sm-4">
        <select name="etat" class="form-control">
            <option value="Actif">Actif</option>
            <option value="Exclu">Exclu</option>
            <option value="Laureat">Laureat</option>
            <option value="Abandon">Abandon</option>
        </select><br></div>
        <label class="control-label col-sm-2">Promotion</label>
        <div class="col-sm-4">
    <select name="promotion" class="form-control">
    <?php 
for($i=nombre_annee_scolaire() ; $i>=1; $i--){
    echo "<option value=".$i.">".$i."</option>";   
}?>
 </select><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Niveau d'études</label>
        <div class="col-sm-4">
        <select name="annee" class="form-control">
            <option value="Premiere Annee">Premiere Annee</option>
            <option value="Deuxieme Annee">Deuxieme Annee</option>   
        </select><br></div>
        <label class="control-label col-sm-2">Semestre</label>
        <div class="col-sm-4">
        <select name="semestre" class="form-control">
            <option value="Semestre_1">Semestre_1</option>
            <option value="Semestre_2">Semestre_2</option>
            <option value="Semestre_3">Semestre_3</option>
            <option value="Semestre_4">Semestre_4</option>
        </select><br></div>
       
</div>
<div class="row my-row">
        
        <label class="control-label col-sm-2">Annee academique 1</label>
        <div class="col-sm-4">
        <select name="anne1" class="form-control">
            <option value="">--choisir une option--</option></option>
            <?php foreach($_SESSION['annee_presedent'] as $v){
             echo ' <option value="'.$v.'">'. $v .'</option> ';    
            }?>
        </select><br></div>
        <label class="control-label col-sm-2">Annee academique 2</label>
        <div class="col-sm-4">
        <select name="anne2" class="form-control">
        <option value="">--choisir une option--</option></option>
            <?php foreach($_SESSION['annee_presedent'] as $v){
             echo ' <option value="'.$v.'">'. $v .'</option> ';    
            }?>
        </select><br></div>
</div>
<div class="row my-row">
        <label class="control-label col-sm-2">Date d'inscription</label>
        <div class="col-sm-4">
        <input type="date" name="date_d'inscription" class="form-control"><br></div>
        <label class="control-label col-sm-2">Date de sortie</label>
        <div class="col-sm-4">
        <input type="date" name="datefin" class="form-control"><br> 
        </div>
</div>

    </table> 
        <input type="submit" value="ajouter" name="submit" class="btn1">
        </form>
    </div>
</body>
</html>