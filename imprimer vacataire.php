<?php 
include_once('conbd.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tout les vacataires</title>
    <link rel="stylesheet" href="css/imprimer2.css">
</head>
<body>
    <div class="com">
<h2>Liste des vacataires</h2>
<table>
<tr id="items">
<th>CIN</th>
            <th>nom</th>
            <th>prenom</th>
            <th>email</th>
            <th>tele</th>
            <th>fonction</th>
            <th>grade professionnel</th>
            <th>code de matiere1</th>
            <th>code de matiere2</th>
            <th>code de matiere3</th>
            <th>code de matiere4</th>
            <th>etat</th>
            <th>date debut</th>
            <th>date fin</th>
            <th>RIB</th>
</tr>
<?php 
        $sql=$conn->query('SELECT * FROM vacataire');
        $row=$sql->fetchAll();
        foreach($row as $val){
        ?>
        <tr>
        <td><?php echo($val['CIN_vacataire'].'<br>');?>
        <td><?php echo($val['nom'].'<br>');?>
        <td><?php echo($val['prenom'].'<br>');?>
        <td><?php echo($val['email'].'<br>');?>
        <td><?php echo($val['tele'].'<br>');?>
        <td><?php echo($val['fonction'].'<br>');?>
        <td><?php echo($val['grade_professionnel'].'<br>');?>
        <td><?php echo($val['code_matiere1'].'<br>');?>
        <td><?php echo($val['code_matiere2'].'<br>');?>
        <td><?php echo($val['code_matiere3'].'<br>');?>
        <td><?php echo($val['code_matiere4'].'<br>');?>
        <td><?php echo($val['etat'].'<br>');?>
        <td><?php echo($val['periode_debut'].'<br>');?>
        <td><?php echo($val['periode_fin'].'<br>');?>
        <td><?php echo($val['RIB'].'<br>');?>
        </tr> <?php }?>
 </table><br>
 </div>  
 <button onclick="window.print()" class="btn-primary">print</button>
</body>
</html>