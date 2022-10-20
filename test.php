<?php 
include_once('conbd.php');
//absence
$stm=$conn->query("SELECT date from absence where justification='non'  
and code='1/17' LIMIT 3");
$res=$stm->fetchAll(); 
foreach($res as $value){ echo "Le ".$value['date']."<br>";}
//asssiduite
$stm=$conn->query("SELECT date from assiduite where type='avertissement'  
and code_etudiant='1/17' LIMIT 3");
$res=$stm->fetchAll(); 
foreach($res as $value){ echo "Avertissement ".$value['date']."<br>";}