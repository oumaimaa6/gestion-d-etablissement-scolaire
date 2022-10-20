<?php
include_once('conbd.php');

//$pdo = new PDO("mysql:host=localhost;dbname=ecoledb", "root", "");


if (isset($_GET['cin']))
    $cin = $_GET['cin'];

if (isset($_GET['annee']))
    $anne = $_GET['annee'];


$q = $conn->query("SELECT * FROM etudiant WHERE CIN='$cin'");
$val = $q->fetch();

$nom_prenom = strtoupper($val['nom'] . "  " . $val['prenom']);

$cin2 = strtoupper($cin);
$napogee=strtoupper($val['n_apogee']);
if($anne=="Premiere Annee")
{
    $anneacad=$val['anne acad_1'];
}

if($anne=="Deuxieme Annee")
{
    $anneacad=$val['anne acad_2'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attestation de scolarite</title>
</head>
<body>
<table style="position:absolute ;top:5px ; left:0px;">
<td><img  src="en-tete .png" style="width: 750px; "></td>
</table> 
<h2 style="position:absolute ;top:250px ; left:250px">Attestation de scolarité</h2>
<P style="position:absolute ;top:400px ; left:50px ; font-size:19px;">
Le Directeur de l’institut de Formation des Techniciens Spécialisés en Architecture et en <br>Urbanisme d’Oujda, certifie que :<br><br>
   <b><?php echo $nom_prenom ;?></b>, N° CNI : <b><?php echo $cin2 ;?></b>
   Inscrit (e) sous le n° <b><?php echo $napogee ;?></b>, poursuit (e) ces études en <b><?php echo $anne ;?></b> de formation à l’TFTSAU d’Oujda pour l’année académique <b><?php echo $anneacad ;?></b>.<br><br>
   Ce certificat est délivré à l’intéressé(e) sur sa demande, pour servir et valoir ce que de droit .
</P>
<img  src="bas.png" style="width: 650px;position:absolute ;top:970px ; left: 40px;  ">
</body>
</html>