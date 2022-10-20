<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql=$conn->query('SELECT * FROM note order BY promotion desc');
if($sql->num_rows >0){
    $delimiter = ";"; 
    $filename = "dossier-notes" . ".csv"; 
     
    $f = fopen('php://memory', 'w');
 $field=array('Code d_inscription','Code matiere','vacataire','Note ordinaire','Note rattrapage','Note finale','Semestre','Promotion');
 fputcsv($f, $field, $delimiter); 
while($val=$sql->fetch_assoc()){ 
    $code=$val['code_matiere'];
    
    $q=$conn->query("SELECT nom, prenom from vacataire where code_matiere1='$code' or code_matiere2='$code' or code_matiere3='$code' or code_matiere4='$code'");
$res=$q->fetch_all();
$vacataire=$res[0][0]." ".$res[0][1];
    $lineData = array($val['n_apogee'],$val['code_matiere'],$vacataire,$val['note exam'],$val['note ratt'],$val['note semestre'],$val['semestre'],$val['promotion']);
    $vacataire="";
    fputcsv($f, $lineData, $delimiter);
}
fseek($f, 0);
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 

}
//exit;
?>