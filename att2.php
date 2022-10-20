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
if(!empty($val['datefin']))
{$datefin=date('d/m/Y', strtotime($val['datefin']));}
else $datefin="";

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
    <title>attestation </title>
</head>
<body>
<table style="position:absolute ;top:5px ; left:0px;">
<td><img  src="en-tete .png" style="width: 750px; "></td>
</table> 
<h2 style="position:absolute ;top:250px ; left:300px">Attestation </h2>
<P style="position:absolute ;top:400px ; left:50px ; font-size:19px;">


Le Directeur de l’institut de Formation des Techniciens Spécialisés en Architecture et en <br>Urbanisme d’Oujda, certifie que :<br><br>
   <b><?php echo $nom_prenom ;?></b>, N° CNI : <b><?php echo $cin2 ;?></b><br>
   N’est plus inscrit (e) auprès de cet établissement depuis <b><?php echo $datefin ;?></b><br><br>
   Cette attestation est délivrée à l’intéressé(e) sur sa demande, pour servir et valoir ce que de droit.
</P>
<img  src="bas.png" style="width: 650px;position:absolute ;top:970px ; left: 40px;  ">
</body>
</html>