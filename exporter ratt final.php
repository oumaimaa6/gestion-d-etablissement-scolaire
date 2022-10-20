<?php 
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$matiere="";
$matiere=$_POST['matiere'];

$promotion= $_POST['promotion'];
$se=$_POST['se'];
$sql=$conn->query("SELECT n_apogee, `note semestre` FROM note  where code_matiere='$matiere'  and semestre='$se' ") ;
if($sql->num_rows >0){
    $delimiter = ";"; 
    $f = fopen('php://memory', 'w');
    $filename = "etudiant ratt" . ".csv"; 
    $field=array('semestre','matiere');
    fputcsv($f, $field, $delimiter); 
    $result=$conn->query("SELECT intitule_matiere from matiere where code_matiere='$matiere'");
   while($row=$result->fetch_assoc()){
   $name=$row['intitule_matiere'];
   }
    
    $lineData = array($se,$name);
    fputcsv($f, $lineData, $delimiter);

    while($val=$sql->fetch_assoc()){ 
        
           $code=$val["n_apogee"]; $note=$val["note semestre"];
 }
        if($note<10 && $_SESSION[$code]<10){

     $field2=array('code_etudiant','nom','prenom','note_finale');
    fputcsv($f, $field2, $delimiter); 
$s=$conn->query("SELECT nom, prenom from etudiant where n_apogee='$code' ");
while($v=$s->fetch_assoc()){  $nom=$v['nom']; 
   $prenom=$v["prenom"];
    }
    
    $lineData2 = array($n,$nom,$prenom,$note);
    fputcsv($f, $lineData2, $delimiter);
   
    fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 
        }
}
exit;
   
      
      
      
    ?>