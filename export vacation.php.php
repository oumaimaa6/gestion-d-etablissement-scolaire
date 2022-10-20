<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql=$conn->query('SELECT id_matiere, id_vacataire FROM vacation');
        
while($val=$sql->fetch_assoc()){ $cin=$val['id_vacataire']; $id=$val['id_matiere'];}
$result=$conn->query("SELECT date, nom, prenom, intitule_matiere, seance,type_seance,action,duree
 FROM vacation JOIN vacataire on id_vacataire=CIN_vacataire JOIN matiere on id_matiere=code_matiere 
 where id_vacataire='$cin' and id_matiere='$id' ");
if($result->num_rows >0){
    $delimiter = ";"; 
    $filename = "dossier-vacation" . ".csv"; 
     
    $f = fopen('php://memory', 'w');
 $field=array('date','nom','prenom','matiere','seance','type_seance','action','duree');
 fputcsv($f, $field, $delimiter); 
 while($row=$result->fetch_assoc()){
   $lineData = array($row["date"], $row["nom"],$row["prenom"],$row["intitule_matiere"],$row["seance"],$row["type_seance"],$row["action"],$row["duree"]);
    fputcsv($f, $lineData, $delimiter); 
}
fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 
}
exit;
?>