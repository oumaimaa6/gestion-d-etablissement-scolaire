<?php 
include_once('conbd.php');
include_once('verification.php');
include("fonction.php");
include_once ('baredemenu.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attestation</title>
    <link rel="stylesheet" href="css/attestation.css">

</head>
<body>
<div class="forme">
<h2>le choix d'une Attestation</h2>
 <form action="attestaion.php" method="POST">
    <label>CIN</label>
        <input type="text" name="code_inscription"  required="required" ><br>
        <input type="submit" name="submit" value="NEXT"><br>
 </form>


<?php if(isset($_POST['submit'])){ ?>
    <form action="attestaion.php" method="POST">   
<label>CIN</label>
<input type="text" name='code' value="<?php echo $_POST['code_inscription'] ;?>"  readonly><br>
<label>l'Etudiant</label>
<?php $cin=$_POST['code_inscription'];
$stm=$conn->query("SELECT n_apogee,nom,prenom from etudiant where CIN='$cin'"); 
$res=$stm->fetchAll();
$name=" "; $last=" ";
if(!empty($res)){ 
    
    $name=$res[0]['nom']; $last=$res[0]['prenom'];
echo "<input type='text' value='".$name." ".$last."' name='etudiant'  readonly>";}
else {?>
<script type="text/javascript">
  alert("etudiant non existe");
     </script>
<?php 
}
?>
<br>
<label>Niveau d'études</label>
        <select name="annee"  required="required">
            <option value="Premiere Annee">Premiere Annee</option>
            <option value="Deuxieme Annee">Deuxieme Annee</option>   
        </select><br>

        <input type="submit" value="Next" name="submit2">

</div>
<?php } ?>
 </form>
 <?php if(isset($_POST['submit2']))
 {  
     ?>
 
 <h2>Séléctionner le document à imprimer</h2>
					
					<a class="btn btn-info" href="att_scolarite.php?cin=<?php echo $_POST['code'] ?>&annee=<?php echo $_POST['annee'] ?>">
                    Attestation de scolarité
                    </a>
					
					<a class="btn btn-info" href="att_reussite.php?cin=<?php echo $_POST['code'] ?>&annee=<?php echo $_POST['annee'] ?>">
                    Attestation de réussite
					</a>
					
					<a class="btn btn-info" href="att_inscription.php?cin=<?php echo $_POST['code'] ?>&annee=<?php echo $_POST['annee'] ?>">
                    Attestation d’Inscription
                    </a>

                    <a class="btn btn-info" href="att.php?cin=<?php echo $_POST['code'] ?>&annee=<?php echo $_POST['annee'] ?>">
                    Attestation
                    </a>

                    <a class="btn btn-success" href="avertisement.php?cin=<?php echo $_POST['code'] ?>&annee=<?php echo $_POST['annee'] ?>">
                    Avertissement
                    </a>

                    <a class="btn btn-primary" href="blame.php?cin=<?php echo $_POST['code'] ?>&annee=<?php echo $_POST['annee'] ?>">
                    BLAME
                    </a>

<?php 
}
?>
</body>
</html>