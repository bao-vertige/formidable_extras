<?php

// Sécurité
if (!defined("_ECRIRE_INC_VERSION")) return;

function traiter_newsletters_dist($args, $retours){

    $options = $args['options'];

    $adresse_mail = _request($options['champ_adresse_inscrite']);
    $listes = $options['listes_de_diffusion'];

    $listes = _request('listes_de_diffusion_1');

    $subscribe = charger_fonction('subscribe', 'newsletter');
    $subscribe($adresse_mail, array('listes' => $listes));
}
