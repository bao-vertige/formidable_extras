<?php

// Sécurité
if (!defined("_ECRIRE_INC_VERSION")) return;

function traiter_limiter_inscription_dist($args, $retours){

    // On récupère la limite
    $limite = $args['options']['limite'];

    // L'identifiant du formulaire
    $id_formulaire = $args['formulaire']['id_formulaire'];

    // On récupère le nombre de réponse validé
    $inscriptions = sql_countsel(
        'spip_formulaires_reponses',
        array(
            'id_formulaire='.intval($id_formulaire),
            'statut='.sql_quote('publie')
        )
    );

    if ($inscriptions >= $limite)
        $retours['message_erreur'] = _T('formidable_extras:erreur_limite_inscription');

    return $retours;
}
