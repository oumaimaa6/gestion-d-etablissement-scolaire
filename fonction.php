<?php


function annee_scolaire_actuelle()
{
    
    $mois = date("m");//Le mois de la date actuelle
    $annee_actuelle = date("Y");//L'année de la date actuelle
    if ($mois >= 9 && $mois <= 12) {
        $annee1 = $annee_actuelle;
        $annee2 = $annee_actuelle + 1;
    } else {
        $annee1 = $annee_actuelle - 1;
        $annee2 = $annee_actuelle;
    }

    $annee_scolaire_actuelle = $annee1 . "/" . $annee2;
    return $annee_scolaire_actuelle;
}



function nombre_annee_scolaire()
{
    $annee_debut = 2017;
    $mois = date("m");
    $annee_actuelle = date("Y");
    if ($mois >= 9 && $mois <= 12)
        return ($annee_actuelle - $annee_debut) + 1;
    else
        return $annee_actuelle - $annee_debut;
}
?>