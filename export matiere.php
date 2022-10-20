<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql=$conn->query('SELECT * FROM matiere');
if($sql->num_rows >0){
    $delimiter = ";"; 
    $filename = "dossier-matiere" . ".csv"; 
     
    $f = fopen('php://memory', 'w');
 $field=array('code','matiere','coeficient','horaire','niveau');
 fputcsv($f, $field, $delimiter); 
while($row=$sql->fetch_assoc()){ 
    $lineData = array($row["code_matiere"], $row["intitule_matiere"],$row["coef"],$row["nb_heure"],$row["semestre"]);
    fputcsv($f, $lineData, $delimiter);
}
fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 

}
exit;
?>