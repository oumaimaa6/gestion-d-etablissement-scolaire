<?php 
include_once('conbd.php');
include_once('baredemenu.php');
include_once('verification.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajouter</title>
    <link rel="stylesheet" href="css/addetudiant.css">
   
</head>
<body>

<?php if(isset($_POST['submit'])){
    $CIN= $_POST['CIN'];
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
    $stm=$conn->query("select * from vacataire where CIN_vacataire='$CIN'");
        $res=$stm->fetchAll();
          if($res==NULL)
        {
         $conn->query("INSERT INTO vacataire(CIN_vacataire,nom,prenom,email,tele,fonction,grade_professionnel, code_matiere1,code_matiere2,code_matiere3,code_matiere4,code_matiere5,code_matiere6,etat, periode_debut,periode_fin,RIB) 
            VALUES ('$CIN','$nom','$prenom','$email','$tele','$fonc','$grade','$code1','$code2','$code3','$code4','$code5','$code6','$etat','$debut','$fin','$rip')");
    header('location:vacataire.php');
    }		
    else
    {	
         $msg="ce vacataire est déjà ajouté";
    }?>
    <h2><?php echo $msg;?></h2>
    <?php }?>
    <div class="forme">
    <a href="vacataire.php" class="btn1">Retour</a></div>
    <div class="container">
<div class="panel panel-primary">
        <div class="panel-heading" align="center"> Nouveau vacataire</div>
        <div class="panel-body">
    <form action="addvacataire.php" method="POST">
    <div class="row my-row">
    <label class="control-label col-sm-2">CIN :</label>
    <div class="col-sm-4">
        <input type="text" name="CIN" class="form-control"><br></div>
        <label class="control-label col-sm-2">Nom :</label>
        <div class="col-sm-4">
        <input type="text" name="nom" class="form-control"><br></div>
        </div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Prenom :</label>
        <div class="col-sm-4">
        <input type="text" name="prenom" class="form-control"><br></div>
        <label class="control-label col-sm-2">Email :</label>
        <div class="col-sm-4">
        <input type="email" name="email" class="form-control"><br></div>
        </div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Mobile :</label>
        <div class="col-sm-4">
        <input type="number" name="tele" value="0" class="form-control"><br></div>
        <label class="control-label col-sm-2">Fonction</label>
        <div class="col-sm-4">
        <input type="text" name="fonc" class="form-control"><br></div>
        </div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Grade Professionnel :</label>
        <div class="col-sm-4">
        <input type="text" name="grade_professionnel" class="form-control"><br></div>
        <label class="control-label col-sm-2">Code matiere 1 :</label>
        <div class="col-sm-4">
        <input type="text" name="code1" class="form-control"><br></div>
        </div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Code matiere 2 :</label>
        <div class="col-sm-4">
        <input type="text" name="code2" class="form-control"><br></div>
        <label class="control-label col-sm-2">Code matiere 3 : </label>
        <div class="col-sm-4">
        <input type="text" name="code3" class="form-control"><br></div>
        </div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Code matiere 4 :</label>
        <div class="col-sm-4">
        <input type="text" name="code4" class="form-control"><br></div>
    
        <label class="control-label col-sm-2">Code matiere 5 :</label>
        <div class="col-sm-4">
        <input type="text" name="code5" class="form-control"><br></div>
        </div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Code matiere 6 :</label>
        <div class="col-sm-4">
        <input type="text" name="code6" class="form-control"><br></div>
        <label class="control-label col-sm-2">Etat :</label>
        <div class="col-sm-4">
        <select name="etat" class="form-control">
            <option value="actif">actif</option>
            <option value="inactif">inactif</option>
        </select><br></div>
</div>
        <div class="row my-row">

        <label class="control-label col-sm-2">Date debut :</label>
        <div class="col-sm-4">
        <input type="date" name="debut" required="required" class="form-control"><br></div>
        <label class="control-label col-sm-2">Date fin :</label>
        <div class="col-sm-4">
        <input type="date" name="fin" required="required" class="form-control"><br></div>
        <label class="control-label col-sm-2" >R.I.B :</label>
        <div class="col-sm-4">
        <input type="number" name="RIB" value="0" class="form-control"><br></div>
        </div>
        <input type="submit" value="ajouter" name="submit" class="btn1">
        
        </form>
    </div>
</body>
</html>