<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql=$conn->query('SELECT * FROM vacataire');
$delimiter = ";"; 
    $filename = "dossier-vacataire" . ".csv"; 
     
    $f = fopen('php://memory', 'w');
 $field=array('CIN','nom','prenom','email','tele','fonction','grade professionnel',
 'matiere1','matiere2','matiere3','matiere4','etat','date debut','date fin','RIB');
 fputcsv($f, $field, $delimiter); 
 while($val=$sql->fetch_assoc()){
    $lineData = array($val["CIN_vacataire"],$val["nom"],$val["prenom"],$val["email"],$val["tele"],$val["fonction"],$val["grade_professionnel"],
    $val["code_matiere1"],$val["code_matiere2"],$val["code_matiere3"],$val["code_matiere4"],
    $val["etat"],$val["periode_debut"],$val["periode_fin"],$val["RIB"],);
    fputcsv($f, $lineData, $delimiter); 
 }
 fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 

exit;
?>