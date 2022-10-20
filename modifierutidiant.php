<?php 
include_once('baredemenu.php');
include_once('verification.php');
include_once('conbd.php');
include('fonction.php');
if(isset($_GET['id']))
{
$_SESSION['id']=$_GET['id'];
}
$id=$_SESSION['id'];
$sql=$conn->query("SELECT * from etudiant WHERE id='$id'");
while($val=$sql->fetch()){
    $photo=$val['photo'];
    $code=$val['n_apogee'];
$cin=$val['CIN'];
$nom=$val['nom'];
$prenom=$val['prenom'];
$masar=$val['code_massar'];
$email=$val['email'];
$tel=$val['tele'];
$adress=$val['adresse'];
$date=$val['date_naissance'];
$lieu=$val['lieu_naissance'];
$sexe=$val['sexe'];
$rib=$val['RIB'];
$type=$val['type_bac'];
$moy=$val['moyenne_bac'];
$etat=$val['etat'];
$promotion=$val['promotion'];
$semestre=$val['semestre'];
$annee=$val['annee'];
$anne1=$val['anne acad_1'];
$anne2=$val['anne acad_2'];
$datinsc=$val["date_d'inscription"];
$datefin=$val['datefin'];
$nat=$val['nationalite'];
$nomtut=$val['nom_tuteur'];
$teltut=$val['tele_tuteur'];
$nsej=$val['n_sejour'];
$telurg=$val['tele_urgence'];
}
if(isset($_POST['submit'])){
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
            $photo = $uniqueName.".".$extension;
            //$file = 5f586bf96dcd38.73540086.jpg
    
            move_uploaded_file($tmpName, './upload/'.$photo);
        }
    } 
    $code=$_POST['n_apogee'];
    $cin=$_POST['CIN'];
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $masar=$_POST['code_massar'];
    $email=$_POST['email'];
    $tel=$_POST['tele'];
    $adress=$_POST['adresse'];
    $date=$_POST['date_naissance'];
    $lieu=$_POST['lieu_naissance'];
    $sexe=$_POST['sexe'];
    $rib=$_POST['RIB'];
    $type=$_POST['type_bac'];
    $moy=$_POST['moyenne_bac'];
    $etat=$_POST['etat'];
    $promotion=$_POST['promotion'];
    $semestre=$_POST['semestre'];
    $annee=$_POST['annee'];
    $anne1=$_POST['anne1'];
    $anne2=$_POST['anne2'];
    $datinsc=$_POST["date_d'inscription"];
    $datefin=$_POST['datefin'];
    $nat=$_POST['nationalite'];
    $nomtut=$_POST['nom_tuteur'];
    $teltut=$_POST['tele_tuteur'];
    $nsej=$_POST['n_sejour'];
    $telurg=$_POST['tele_urgence'];
    $conn->query("UPDATE etudiant SET photo='$photo',n_apogee='$code',nom='$nom',prenom='$prenom',date_naissance='$date',lieu_naissance='$lieu',CIN='$cin',email='$email',tele='$tel',adresse='$adress',sexe='$sexe',RIB='$rib',code_massar='$masar',type_bac='$type',moyenne_bac='$moy',nom_tuteur='$nomtut',tele_tuteur='$teltut',nationalite='$nat',n_sejour='$nsej',tele_urgence='$telurg',promotion='$promotion',semestre='$semestre',etat='$etat',`date_d'inscription`='$datinsc',datefin='$datefin',annee='$annee',`anne acad_1`='$anne1',`anne acad_2`='$anne2' where id='$id'");
    header('location:etudiant.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="addetudiant.css">
    <link rel="stylesheet" href="modif.css">
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
<style>
        .zoom {
            height: auto;
            transition: transform ease-in-out 0.3s;
        }
        .zoom:hover {
            width: 200px;
            height: 200px;
            transform: scale(1.2);
        }
    </style>  
</head>
<body>
<div class="forme">
    <a href="etudiant.php" class='btn1'>Retour</a>
    <div class="container">
<div class="panel panel-primary">
        <div class="panel-heading" align="center"> Modifier un Etudiant</div>
        <div class="panel-body">
    <form action="modifierutidiant.php" method="POST" enctype="multipart/form-data">
    <table>

    <div class="ligne_horizontal"><b>DONNEES ETUDIANTS</b></div>
    <?php 
    $sql=$conn->query("select * from etudiant where id='$id'");
while($res=$sql->fetch()){
?>	    <div class="row my-row">
        <label class="control-label col-sm-2">Photo</label>
        <div class="col-sm-4">
        <img class="zoom"  class="form-control"src='./upload/<?php echo $res['photo'];?>' width='100px' height='70px'><br>
        <input type="file"  class="form-control" name="file"><br></div>
        <label class="control-label col-sm-2">CIN</label>
        <div class="col-sm-4">
        <input type="text" name="CIN" class="form-control"  value="<?php echo $res['CIN']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Nom</label>
        <div class="col-sm-4">
        <input type="text" name="nom" class="form-control" value="<?php echo $res['nom']; ?>"><br></div>
        <label class="control-label col-sm-2">Prénom</label>
        <div class="col-sm-4">
        <input type="text" name="prenom" class="form-control" value="<?php echo $res['prenom']; ?>"><br> </div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Code MASSAR</label>
        <div class="col-sm-4">
        <input type="text" name="code_massar" class="form-control" value="<?php echo $res['code_massar']; ?>"><br></div>
        <label class="control-label col-sm-2">Email</label>
        <div class="col-sm-4">
        <input type="email" name="email" class="form-control" value="<?php echo $res['email']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Numéro de téléphone</label>
        <div class="col-sm-4">
        <input  type="tel" placeholder="0601010101" class="form-control" name="tele" value="<?php echo $res['tele']; ?>"><br></div>
        <label class="control-label col-sm-2">Adresse</label>
        <div class="col-sm-4">
        <input type="text" name="adresse" class="form-control" value="<?php echo $res['adresse']; ?>" style="height:100px;"><br> </div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Date de naissance</label>
        <div class="col-sm-4">
        <input type="date" name="date_naissance" class="form-control" value="<?php echo $res['date_naissance']; ?>"><br></div>
        <label class="control-label col-sm-2">Lieu de naissance</label>
        <div class="col-sm-4">
        <input type="text" name="lieu_naissance" class="form-control" value="<?php echo $res['lieu_naissance']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Sexe</label><br>
        <div class="col-sm-4">
        <select name="sexe" class="form-control">
        <option value="<?php echo $res['sexe']; ?>"><?php echo $res['sexe']; ?></option>
        <?php 
        if($res['sexe']!="FEMININ")
        {
            echo "<option value='FEMININ'>FEMININ</option>";
        }
        if($res['sexe']!="MASCULIN")
        {
            echo "<option value='MASCULIN'>MASCULIN</option>";
        }
        ?>
        </select><br></div>
        <label class="control-label col-sm-2">RIB</label>
        <div class="col-sm-4">
        <input type="text" name="RIB"  class="form-control" value="<?php echo $res['RIB']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Type Bac</label>
        <div class="col-sm-4">
        <select name="type_bac" class="form-control">
        <option value="<?php echo $res['type_bac']; ?>"><?php echo $res['type_bac']; ?></option>
        <?php 
        if($res['type_bac']!="Sciences Mathematiques")
        {
            echo "<option value='Sciences Mathematiques'>Sciences Mathematiques</option>";
        }
        if($res['type_bac']!="Sciences de la Vie et de la Terre")
        {
            echo "<option value='Sciences de la Vie et de la Terre'>Sciences de la Vie et de la Terre/option>";
        }
        if($res['type_bac']!="Sciences physiques")
        {
            echo "<option value='Sciences physiques'>Sciences physiques</option>";
        }
        if($res['type_bac']!="Sciences Agricoles")
        {
            echo "<option value='Sciences Agricoles'>Sciences Agricoles</option>";
        }
        if($res['type_bac']!="Architecture Batiments et Travaux Publics")
        {
            echo "<option value='Architecture Batiments et Travaux Publics'>Architecture Batiments et Travaux Publics</option>";
        }
        if($res['type_bac']!="Arts Plastiques")
        {
            echo "<option value='Arts Plastiques'>Arts Plastiques</option>";
        }
        if($res['type_bac']!="Diplome equivalent")
        {
            echo "<option value='Diplome equivalent'>Diplome equivalent</option>";
        }
        ?>
        </select><br></div>
        <label class="control-label col-sm-2">Moyenne de Bac</label>
        <div class="col-sm-4">
        <input type="number" name="moyenne_bac" class="form-control" step='0.1' min="0" max="20" value="<?php echo $res['moyenne_bac']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Nationalite</label>
        <div class="col-sm-4">
        <input type="text" name="nationalite" class="form-control" value="<?php echo $res['nationalite']; ?>"><br></div>
        <label class="control-label col-sm-2">Nom du tuteur</label>
        <div class="col-sm-4">
        <input type="text" name="nom_tuteur" class="form-control" value="<?php echo $res['nom_tuteur']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Numéro téléphone du tuteur</label>
        <div class="col-sm-4">
        <input  type="tel" placeholder="0601010101" class="form-control" name="tele_tuteur" value="<?php echo $res['tele_tuteur']; ?>"><br></div>
        <label class="control-label col-sm-2">Numéro séjour</label>
        <div class="col-sm-4">
        <input type="text" name="n_sejour" class="form-control" value="<?php echo $res['n_sejour']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Numéro téléphone d'urgence</label>
        <div class="col-sm-4">
        <input  type="tel" placeholder="0601010101"class="form-control"  name="tele_urgence" value="<?php echo $res['tele_urgence']; ?>"><br></div></div>
        <div class="ligne_horizontal"><b>DONNEES D'INSCRIPTION</b></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Code d'inscription</label>
        <div class="col-sm-4">
        <input type="text" name="n_apogee" class="form-control" value="<?php echo $res['n_apogee']; ?>"><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Statut d'étudiant</label>
        <div class="col-sm-4">
        <select name="etat" class="form-control">
        <option value="<?php echo $res['etat']; ?>"><?php echo $res['etat']; ?></option>
        <?php 
        if($res['etat']!="Actif")
        {
            echo "<option value='Actif'>Actif</option>";
        }
        if($res['etat']!="Exclu")
        {
            echo "<option value='Exclu'>Exclu</option>";
        }
        if($res['etat']!="Laureat")
        {
            echo "<option value='Laureat'>Laureat</option>";
        }
        if($res['etat']!="Abandon")
        {
            echo "<option value='Abandon'>Abandon</option>";
        }
        ?>
        </select><br></div>
        <label class="control-label col-sm-2">Promotion</label>
        <div class="col-sm-4">
        <select name="promotion" class="form-control"> 
            <option value="<?php echo $res['promotion']; ?>"><?php echo $res['promotion']; ?></option>
           <?php 
           for($i=1 ; $i<=nombre_annee_scolaire() ; $i++){
                if($i!=$res['promotion'])
                      {
                            echo "<option value=".$i.">".$i."</option>"; 
                      }  
            }?>
        </select></div>
        <br></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Niveau d'études</label>
        <div class="col-sm-4">
        <select name="annee" class="form-control">
        <option value="<?php echo $res['annee']; ?>"><?php echo $res['annee']; ?></option>
       <?php  if($res['annee']!="Premiere Annee")
        {
            echo "<option value='Premiere Annee'>Premiere Annee</option>";
        }
        if($res['annee']!="Deuxieme Annee")
        {
            echo "<option value='Deuxieme Annee'>Deuxieme Annee</option>";
        }?>
        </select><br></div>
        <label class="control-label col-sm-2">Annee academique 1</label>
        <div class="col-sm-4">
        <select name="anne1" class="form-control">
            <option value="<?php echo $res['anne acad_1']; ?>"><?php echo $res['anne acad_1']; ?></option>
            <?php foreach($_SESSION['annee_presedent'] as $v){
                if( $res['anne acad_1'] != $_SESSION['annee_presedent'])
                { echo ' <option value="'.$v.'">'. $v .'</option> ';  }  
            }?>
        </select><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Annee academique 2</label>
        <div class="col-sm-4">
        <select name="anne2" class="form-control">
        <option value="<?php echo $res['anne acad_2']; ?>"><?php echo $res['anne acad_2']; ?></option>
            <?php foreach($_SESSION['annee_presedent'] as $v){
                if( $res['anne acad_2'] != $_SESSION['annee_presedent'])
             {echo ' <option value="'.$v.'">'. $v .'</option> ';  }  
            }?>
        </select><br></div>
        <label class="control-label col-sm-2">Semestre</label>
        <div class="col-sm-4">
        <select name="semestre"  class="form-control">
        <option value="<?php echo $res['semestre']; ?>"><?php echo $res['semestre']; ?></option>
        <?php 
        if($res['semestre']!="Semestre_1")
        {
            echo "<option value='Semestre_1'>Semestre_1</option>";
        }
        if($res['semestre']!="Semestre_2")
        {
            echo "<option value='Semestre_2'>Semestre_2</option>";
        }
        if($res['semestre']!="Semestre_3")
        {
            echo "<option value='Semestre_3'>Semestre_3</option>";
        }
        if($res['semestre']!="Semestre_4")
        {
            echo "<option value='Semestre_4'>Semestre_4</option>";
        }
        ?>
        </select><br></div></div>
        <div class="row my-row">
        <label class="control-label col-sm-2">Date d'inscription</label>
        <div class="col-sm-4">
        <input type="date" name="date_d'inscription" value="<?php echo $res["date_d'inscription"]; ?>" class="form-control"><br></div>
        <label class="control-label col-sm-2">Date de sortie</label>
        <div class="col-sm-4">
        <input type="date" name="datefin" value="<?php echo $res['datefin']; ?>" class="form-control"><br> </div></div>
    <?php } ?>
    </table> 
        <input type="submit" value="Modifier" name="submit" class='btn1'>
        </form>
    </div>
</body>
</html>