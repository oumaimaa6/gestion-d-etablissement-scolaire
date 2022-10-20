<?php 
include_once("verification.php");
if($_POST)
    { $tab = array();
        
    $_SESSION["champs3"]=$_POST["champs"];

    if(in_array('CIN',$_SESSION["champs3"]))
    {
    $tab[]="CIN";
    }
    if(in_array('nom',$_SESSION["champs3"]))
    {
    $tab[]="Nom";
    }
    if(in_array('prenom',$_SESSION["champs3"]))
    {
    $tab[]="Prenom";
    }
    if(in_array('code_massar',$_SESSION["champs3"]))
    {
    $tab[]="Code MASSAR";
    }
    if(in_array('email',$_SESSION["champs3"]))
    {
    $tab[]="Email";
    }
    if(in_array('tele',$_SESSION["champs3"]))
    {
    $tab[]="Numero de telephone";
    }
    if(in_array('adresse',$_SESSION["champs3"]))
    {
    $tab[]="Adresse";
    }
    if(in_array('date_naissance',$_SESSION["champs3"]))
    {
    $tab[]="Date de naissance";
    }
    if(in_array('lieu_naissance',$_SESSION["champs3"]))
    {
    $tab[]="Lieu de naissance";
    }
    if(in_array('sexe',$_SESSION["champs3"]))
    {
    $tab[]="Sexe";
    }
    if(in_array('RIB',$_SESSION["champs3"]))
    {
    $tab[]="RIB";
    }
    if(in_array('type_bac',$_SESSION["champs3"]))
    {
    $tab[]="Type de Bac";
    }
    if(in_array('moyenne_bac',$_SESSION["champs3"]))
    {
    $tab[]="Moyenne de Bac";
    }
    if(in_array('nationalite',$_SESSION["champs3"]))
    {
    $tab[]="Nationalite";
    }
    if(in_array('nom_tuteur',$_SESSION["champs3"]))
    {
    $tab[]="Nom du tuteur";
    }
    if(in_array('tele_tuteur',$_SESSION["champs3"]))
    {
    $tab[]="Numero telephone du tuteur";
    }
    if(in_array('n_sejour',$_SESSION["champs3"]))
    {
    $tab[]="Numero sejour";
    }
    if(in_array('tele_urgence',$_SESSION["champs3"]))
    {
    $tab[]="Numero telephone d'urgence";
    }
    if(in_array('n_apogee',$_SESSION["champs3"]))
    {
    $tab[]="Code d'inscription";
    }
    if(in_array('promotion',$_SESSION["champs3"]))
    {
    $tab[]="Promotion";
    }
    if(in_array('annee',$_SESSION["champs3"]))
    {
    $tab[]="Niveau d'etudes";
    }
    if(in_array('anne acad_1',$_SESSION["champs3"]))
    {
    $tab[]="Annee academique 1";
    }
    if(in_array('anne acad_2',$_SESSION["champs3"]))
    {
    $tab[]="Annee academique 2";
    }
    if(in_array('semestre',$_SESSION["champs3"]))
    {
    $tab[]="Semestre";
    }
    if(in_array('etat',$_SESSION["champs3"]))
    {
    $tab[]="Statu d'etudiant";
    }
    if(in_array("date_d'inscription",$_SESSION["champs3"]))
    {
    $tab[]="Date d'inscription";
    }
    if(in_array('datefin',$_SESSION["champs3"]))
    {
    $tab[]="Date de sortie";
    }
    }

    $_SESSION["tab"]=$tab;
   
    

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql=$conn->query('SELECT * FROM etudiant order BY promotion DESC');
if($sql->num_rows >0){
    $delimiter = ";"; 
    $filename = "dossier-etudiant" . ".csv"; 
     
   $f = fopen('php://memory', 'w');
   $field=$_SESSION["tab"];
   fputcsv($f, $field, $delimiter); 
 
while($val=$sql->fetch_assoc()){
    $lineData=array();
    foreach($_SESSION["champs3"] as $chp){
    $lineData[] =$val[$chp];
    } 
    fputcsv($f, $lineData, $delimiter);
    $lineData='';

    
}
fseek($f, 0); 

     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 

}
exit;
?>