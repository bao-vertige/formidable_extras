<?php

// Sécurité
if (!defined("_ECRIRE_INC_VERSION")) return;

function traiter_newsletters_dist($args, $retours){

    $options = $args['options'];

    $adresse_mail = _request($options['champ_adresse_inscrite']);
    $listes = _request($options['champ_listes']);

    $subscribe = charger_fonction('subscribe', 'newsletter');
    $subscribe($adresse_mail, array('listes' => $listes));

	// noter qu'on a deja fait le boulot, pour ne pas risquer double appel
	$retours['traitements']['newsletter'] = true;
	return $retours;
}
