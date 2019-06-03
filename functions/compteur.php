<?php



function ajouter_vue () : void
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    $fichier_jour = $fichier . '-' . date('Y-m-d');
    compter_vue($fichier);
    compter_vue($fichier_jour);
}


function compter_vue($fichier) : void
{
    $compteur_page = 1;
    if (file_exists($fichier)) {
        $compteur_page = (int)file_get_contents($fichier);
        $compteur_page++;
    }

    file_put_contents($fichier, $compteur_page);
}

function afficher_nombre_vues() : string
{
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur';
    return file_get_contents($fichier);
}

function afficher_nombre_vue_mois( int $annee, int $mois) : int
{
    $mois = str_pad($mois, '2', '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-'.$annee.'-'.$mois.'-'.'*';
    $fichiers = glob($fichier);
    $total = 0;
    foreach($fichiers as $fichier)
    {
        $total += (int) file_get_contents($fichier);
    }
    return $total;
}

function afficher_details_nombre_vue_mois( int $annee, int $mois) : array
{
    $mois = str_pad($mois, '2', '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur-'.$annee.'-'.$mois.'-'.'*';
    $fichiers = glob($fichier);
    $vues = [];
    foreach($fichiers as $fichier)
    {
        $partie = explode('-', basename($fichier));
        $vues[] = [
            'jour' => $partie[3],
            'mois' => $partie[2],
            'annee' => $partie[1],
            'visites' => file_get_contents($fichier)
        ];
    }
    return $vues;
}