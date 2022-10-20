<?php
include_once('baredemenu.php');
include_once('verification.php');
include_once('fonction.php');
include_once('conbd.php');
    if(isset($_POST['submit'])){
           if(isset($_POST['name']))
           $nom=$_POST['name'];
           else
           $nom="";
           if(isset($_POST['code']))
            $cin=$_POST['code'];
           else
            $cin="";
            if(isset($_POST['n_apogee']))
            $n_apogee=$_POST['n_apogee'];
            else
            $n_apogee="";
            if(isset($_POST['promotion']))
            $promotion=$_POST['promotion'];
            else
            $promotion="";

            if(!empty($nom))
            {
                $sqlnom=" AND nom LIKE '%".$nom."%'";
            }
            else $sqlnom="";

            if(!empty($cin))
            {
                $sqlcin="AND CIN='$cin'";
            }
            else $sqlcin="";

            if(!empty($n_apogee))
            {
                $sqlapogee="AND n_apogee='$n_apogee'";
            }
            else $sqlapogee="";

            if(!empty($promotion))
            {
                $sqlpromo="AND promotion='$promotion'";
            }
            else $sqlpromo="";


    $stm=$conn->query("SELECT * from etudiant where 1 $sqlnom $sqlcin $sqlapogee $sqlpromo ORDER BY PROMOTION DESC");
    $res=$stm->fetchAll();
    }

    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Recherche</title>
            <link rel="stylesheet" href="css/style.css">
            <link rel="stylesheet" href="modif.css">
            <link rel="stylesheet" href="body.css">
            <link rel="stylesheet" href="css/test.css">
            <style>
                td {font-size: 17px} 
    th {font-size: 17px}
        .zoom {
         
            transition: transform ease-in-out 0.3s;
        }
        .zoom:hover {
            width: 200px;
            height: 200px;
            transform: scale(1.2);
        }
     
      .larg{
         width: 100px;
      }
     
    </style> 
        </head>
        <body>
        <div class="contrainer">
    <a href="addetudiant.php" class="btn_add">+ NOUVEAU ETUDIANT</a>

    <!--********************debut de recherche********************* -->

    <div class="panel panel-primary">
    <div class="panel-heading">Rechecher les étudiants</div>
    <div class="panel-body">
    <form method="POST" action="recherche.php" class="form-inline" >
    <label>Nom : </label>
        <input class="form-control" type="text" name="name" placeholder="Nom">
        <label>Code d'inscription : </label>
        <input class="form-control" type="text" name="n_apogee" placeholder="Code">
        <label>CIN : </label>
        <input class="form-control" type="text" name="code" placeholder="CIN">
        <label>Promotion : </label>
        <select name="promotion">
    <?php 
    echo "<option value=''>--choisir une option--</option>";
for($i=nombre_annee_scolaire() ; $i>=1 ; $i--){
    echo "<option value=".$i.">".$i."</option>";   
}?>
 </select>
        <button name="submit" class="btn btn-primary"> 
							<span class="fa fa-search"></span></button>
        
    </form>
    </div>
    </div>
    <!--********************fin de recherche********************* -->
    <a href="etudiant.php" class="btn_add">retour</a>
    <?php 
    if($stm->rowCount() > 0){
    ?>
    <table>
        <tr id="items">
        <th>Photo</th>
   <th>Code d'inscription</th>
   <th>CIN</th>                                                                      
   <th>Nom</th>
   <th>Prénom</th>
   <th>Code MASSAR</th>
   <th>Email</th>
   <th>Numéro de téléphone</th>
   <th>Adresse</th>
   <th>Date de naissance</th>
   <th>Lieu de naissance</th>
   <th>Sexe</th>
   <th>RIB</th>
   <th>Type de Bac</th>
   <th>Moyenne de Bac</th>
   <th>Statut d'étudiant</th>
   <th>Promotion</th>
   <th>Niveau d'études</th>
   <th>Semestre</th>
   <th>Date d'inscription</th>
   <th>Date de sortie</th>
   <th>Nationalite</th>
   <th>Nom du tuteur</th>
   <th>Numéro téléphone du tuteur</th>
   <th>Numéro séjour</th>
   <th>Numéro téléphone d'urgence</th>
   <th>modifier</th>
   <th>suprimer</th>
   </tr>
   
    <?php 
     foreach($res as $val){ ?>
     <tr>
<td><?php echo "<img class='zoom' src='./upload/".$val['photo']."' width='100px' height='70px'><br>";?></td>
<td><?php echo($val['n_apogee'].'<br>');?>
<td><?php echo($val['CIN'].'<br>');?>
<td><?php echo($val['nom'].'<br>');?>
<td><?php echo($val['prenom'].'<br>');?>
<td><?php echo($val['code_massar'].'<br>');?>
<td><?php echo($val['email'].'<br>');?>
<td><?php echo($val['tele'].'<br>');?>
<td><?php echo($val['adresse'].'<br>');?></td>
<td><div class="larg">
<?php echo($val['date_naissance'].'<br>');?></td></div>
<td><?php echo($val['lieu_naissance'].'<br>');?>
<td><?php echo($val['sexe'].'<br>');?>
<td><?php echo($val['RIB'].'<br>');?>
<td><?php echo($val['type_bac'].'<br>');?>
<td><?php echo($val['moyenne_bac'].'<br>');?>
<td><?php echo($val['etat'].'<br>');?>
<td><?php echo($val['promotion'].'<br>');?>
<td><?php echo($val['annee'].'<br>');?>
<td><?php echo($val['semestre'].'<br>');?>
<td><div class="larg"><?php echo($val["date_d'inscription"].'<br>');?></div></td>
<td><div class="larg"><?php echo($val['datefin'].'<br>');?></div></td>
<td><?php echo($val['nationalite'].'<br>');?>
<td><?php echo($val['nom_tuteur'].'<br>');?>
<td><?php echo($val['tele_tuteur'].'<br>');?>
<td><?php echo($val['n_sejour'].'<br>');?>
<td><?php echo($val['tele_urgence'].'<br>');?>
<td><a href="modifierutidiant.php?id=<?=$val['id']?>" class="btn1">modifier</a></td>
<td><a href="suprimerutidiant.php?id=<?=$val['id']?>" class="danger">suprimer</a></td> </tr>
<?php } }?>
    
    </table>
 <?php 
 if(!($stm->rowCount() > 0))
 echo ' Aucun résultat trouvé ';
 ?>
  </div> 
  </body>
</html>