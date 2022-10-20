<?php
include_once('conbd.php');

//$pdo = new PDO("mysql:host=localhost;dbname=ecoledb", "root", "");


if (isset($_GET['cin']))
    $cin = $_GET['cin'];

if (isset($_GET['annee']))
    $anne = $_GET['annee'];


$q = $conn->query("SELECT * FROM etudiant WHERE CIN='$cin'");
$val = $q->fetch();
print_r($val);

$nom_prenom = strtoupper($val['nom'] . "  " . $val['prenom']);
if(!empty($val['date_naissance']))
{$datenais=$val['date_naissance'];}
else $datenais="";

if(!empty($val['date_d\'inscription']))
{$datedebut1=$val['date_d\'inscription'];
    $datedebut=date('Y',strtotime($datedebut1));
}
else $datedebut="";

if(!empty($datedebut))
{
    $datefin=$datedebut+2;
}
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
    <title>attestation de reussite</title>
</head>
<body>
<table style="position:absolute ;top:5px ; left:0px;">
<td><img  src="en-tete .png" style="width: 750px; "></td>
</table> 
<?php if($anne=="Premiere Annee") {?>
<h2 style="position:absolute ;top:250px ; left:250px">Attestation de réussite</h2>
<P style="position:absolute ;top:400px ; left:50px ; font-size:19px;">
Le Directeur de l’institut de Formation des Techniciens Spécialisés en Architecture et en <br>Urbanisme (IFTSAU) d’Oujda certifie que : <br><br>
   <b><?php echo $nom_prenom ;?></b>, Titulaire de la CNI : <b><?php echo $cin2 ;?></b>
   Inscrit (e) sous le N° <b><?php echo $napogee ;?></b>, a passé avec succès les examens de la première année au titre de l’année académique  <b><?php echo $anneacad ;?></b>.<br><br>
   Cette attestation est délivré(e)  à l’intéressé(e) pour servir et valoir ce que de droit.
</P>
<?php }?>
<?php if($anne=="Deuxieme Annee") {?>
<h2 style="position:absolute ;top:250px ; left:250px">Attestation de réussite</h2>
<P style="position:absolute ;top:400px ; left:50px ; font-size:19px;">

Le Directeur de l’institut de Formation des Techniciens Spécialisés en Architecture et en Urbanisme (IFTSAU) d’Oujda atteste que :  <br>
-  L’Élève stagiaire : <b><?php echo $nom_prenom ;?></b> <br> -  Né (e) le : <b><?php echo $datenais ;?></b> <br>-  Titulaire de la CNI : <b><?php echo $cin2 ;?></b><br>
a passé avec succès les examens de fin de formation et a obtenu le Diplôme de  Technicien Spécialisé, option : Urbanisme, Architecture, Construction et Génie Civil à  l’issue d’un cycle d’études de 2 ans qu’il (qu’elle) a suivi à l’IFTSAU d’Oujda de Septembre  <b><?php echo $datedebut ;?></b> à juilet <b><?php echo $datefin ;?></b>.
<br><br>Cette attestation est délivrée à l’intéressé(e) pour servir et valoir ce que de droit
</P>
<?php }?>
<img  src="bas.png" style="width: 650px;position:absolute ;top:970px ; left: 40px;  ">
</body>
</html>