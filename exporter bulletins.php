<?php 
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$matiere="";
$semestre=$_POST['semestre'];

$promotion= $_POST['promotion'];
$code="";
$code=$_POST['code'];
$select=$conn->query("SELECT nom,prenom from etudiant  where n_apogee='$code' ");

 if($select->num_rows >0){
    $tab=array(); $tab2=array();
    $total_coef=0; $total_note=0;
$delimiter = ";"; 
    $f = fopen('php://memory', 'w');
    $filename = "bulletins" . ".csv"; 

    $field=array('semestre');
    fputcsv($f, $field, $delimiter);
    $lineData = array($semestre);
    fputcsv($f, $lineData, $delimiter);

    $field2=array('nom','prenom');
    fputcsv($f, $field2, $delimiter);
    while($val=$select->fetch_assoc()){
        $nom=$val['nom']; $prenom=$val['prenom'];
    }
    $lineData2 = array($nom,$prenom);
    fputcsv($f, $lineData2, $delimiter);
     

    $field3=array('code matiere','intitule matiere','coeficient','note','calcul');
    fputcsv($f, $field3, $delimiter);
    $sql=$conn->query("SELECT code_matiere,`note semestre` from note 
where n_apogee='$code' and semestre='$semestre'");
  while($row=$sql->fetch_assoc()){
    $code_matiere=$row['code_matiere']; $note=$row['note semestre'];  
    }
 $s=$conn->query("SELECT intitule_matiere,coef from matiere where code_matiere='$code_matiere' "); 
    while($r=$s->fetch_assoc()){
        $matiere=$r['intitule_matiere']; $coef=$r['coef']; $tab[]=$coef;
        $calcul=($coef)*($note); $tab2[]=$calcul;
         }   
       $lineData3 = array($code_matiere,$matiere,$coef,$note,$calcul);
        fputcsv($f, $lineData3, $delimiter);
        foreach($tab as $val){
            $total_coef+=$val;
        }  
        foreach($tab2 as $val){
            $total_note+=$val;}
         if($total_coef!=0 ){
                $note_semestre=$total_note/$total_coef;
            $_SESSION[$code]=$note_semestre;
            $field4=array('note semestre');
    fputcsv($f, $field4, $delimiter);
    $lineData4 = array( $note_semestre);
    fputcsv($f, $lineData4, $delimiter);
                       }

    fseek($f, 0);   
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f);
}
exit;
?>
