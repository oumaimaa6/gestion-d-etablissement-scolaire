<?php 
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
 $field=array('Code d_inscription','CIN','Nom','Prenom','Code MASSAR','Email','Numero de telephone','Adresse','Date de naissance','Lieu de naissance','Sexe','RIB','Type de Bac','Moyenne de Bac','Statut d_etudiant','Promotion','Niveau d_etudes','Annee academique 1','Annnee academique 2','Semestre','Date d_inscription','Date de sortie','Nationalite','Nom du tuteur','Numero telephone du tuteur','Numero sejour','Numero telephone d_urgence');
 fputcsv($f, $field, $delimiter); 
while($val=$sql->fetch_assoc()){ 
    $lineData = array($val['n_apogee'],$val['CIN'],$val['nom'],$val['prenom'],$val['code_massar'],$val['email'],$val['tele'],$val['adresse'],$val['date_naissance'],$val['lieu_naissance'],$val['RIB'],$val['type_bac'],$val['moyenne_bac'],$val['etat'],$val['promotion'],$val['annee'],$val['anne acad_1'],$val['anne acad_2'],$val['semestre'],$val["date_d'inscription"],$val['datefin'],$val['nationalite'],$val['nom_tuteur'],$val['tele_tuteur'],$val['n_sejour'],$val['tele_urgence']);
    fputcsv($f, $lineData, $delimiter);
}
fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 

}
exit;
?>