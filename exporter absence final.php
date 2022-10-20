<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'iftsau';
$conn = mysqli_connect($servername, $username, $password, $dbname);
$semestre=$_POST['semestre']; $promotion=$_POST['promotion'];
$stm=$conn->query("SELECT code,nom, prenom,total_absence.promotion, nb_total from total_absence join etudiant on total_absence.code=etudiant.n_apogee 
where total_absence.promotion='$promotion'  and total_absence.semestre='$semestre'");
if($stm->num_rows >0){
    $delimiter = ";"; 
    $filename = "dossier-absence" . ".csv"; 
     $f = fopen('php://memory', 'w');
    $fi=array('promotion','semestre');
     fputcsv($f,$fi, $delimiter);
     $se=$conn->query("SELECT semestre,promotion from total_absence where semestre='$semestre' and promotion='$promotion' LIMIT 1");
     while($row=$se->fetch_assoc()){$lineData2 = array($row['promotion'],$row['semestre']) ;
        fputcsv($f, $lineData2, $delimiter);
    }
     $field=array('code','nom','prenom','nb_total');
     fputcsv($f,$field, $delimiter);
       while($row=$stm->fetch_assoc()){  
          $lineData = array($row["code"], $row["nom"],$row["prenom"],$row["nb_total"]);
            fputcsv($f, $lineData, $delimiter); 
        }
        
        fseek($f, 0); 
     
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    fpassthru($f); 

    } exit;
    ?>