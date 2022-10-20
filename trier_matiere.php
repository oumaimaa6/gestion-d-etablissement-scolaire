<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$semestre=$_POST['semestre']; 
$stm=$conn->query("SELECT etudiant.n_apogee,nom,prenom, intitule_matiere, `note semestre` , note.semestre from note
join etudiant on note.n_apogee=etudiant.n_apogee join matiere on note.code_matiere=matiere.code_matiere
where note.semestre='$semestre'"); 

 if($stm->num_rows >0){
    $delimiter = ";"; 
    $filename = "dossier-rattrapages_matieres" . ".csv"; 
     $f = fopen('php://memory', 'w');
     $fi=array('semestre');
     fputcsv($f,$fi, $delimiter);
     $se=$conn->query("SELECT semestre from note where semestre='$semestre' LIMIT 1");
     while($row=$se->fetch_assoc()){$lineData2 = array($row['semestre']) ;
        fputcsv($f, $lineData2, $delimiter);
    }
     
     $field=array('intitule_matiere','code_etudiant','nom','prenom','note semestre');
     fputcsv($f,$field, $delimiter);
       while($row=$stm->fetch_assoc()){  if($row['note semestre']<10){
        
          $lineData = array($row["intitule_matiere"], $row["n_apogee"],$row["nom"],$row["prenom"],$row['note semestre']);
            fputcsv($f, $lineData, $delimiter); }
        }
        fseek($f, 0); 
     
        header('Content-Type: text/csv'); 
        header('Content-Disposition: attachment; filename="' . $filename . '";'); 
         
        fpassthru($f); 
    
        } exit;
        ?>