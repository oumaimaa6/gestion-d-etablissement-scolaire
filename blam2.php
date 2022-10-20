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
$tab=array();
$stq=$conn->query("SELECT type from assiduite where type='blame' and code_etudiant='$napogee'");
while($val=$stq->fetch()){
$tab[]=$val['type'];
}
$n=count($tab)+1;
$stm=$conn->query("SELECT `date` from assiduite where type='avertissement' and code_etudiant='$napogee' LIMIT 3");
$res=$stm->fetchAll(); 
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blam</title>
</head>
<body>
<table style="position:absolute ;top:5px ; left:0px;">
<td><img  src="en-tete .png" style="width: 750px; "></td>
</table> 
<h2 style="position:absolute ;top:250px ; left:320px">Blam n° <?php echo $n ;?></h2>
<P style="position:absolute ;top:400px ; left:50px ; font-size:19px;">
L'étudiant(e)<b><?php echo $nom_prenom ;?></b>, Titulaire de la CNI : <b><?php echo $cin2 ;?></b><br>
S'est absenté(e) plusieurs fois sans aucune autorisation préalable, et sans aucune justification. Il/elle a reçu pour cela 3 avertissements : <br><br>
<?php foreach($res as $value){ echo "- Avertisement le ".date('d/m/Y', strtotime($value['date']))."<br>";} ?><br>
Par conséquent, et conformément à l'article 26 du règlement intérieur de l'institut, la Direction de l'IFTSAU d'Oujda a décidé à son égard un Blâme.</P>
<img  src="bas.png" style="width: 650px;position:absolute ;top:970px ; left: 40px;  ">
</body>
</html>