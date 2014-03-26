<?php
/**
 * Fonctions utiles au plugin Extras Formidable
 *
 * @plugin     Extras Formidable
 * @copyright  2014
 * @author     Michel @ Vertige ASBL
 * @licence    GNU/GPL
 * @package    SPIP\Formidable_extras\Fonctions
 */

if (!defined('_ECRIRE_INC_VERSION')) return;

/**
 * Retourne les paramètres d'une liste de diffusion mailsubscriber
 *
 * @param $id_liste : l'id d'une liste de diffusion
 *
 * @return les paramètres complets de la liste. p.ex :
 *
 *    array(
 *          'id' => string 'newsletter::newsletter',
 *          'id_bak' => string 'newsletter',
 *          'titre' => string 'newsletter',
 *          'status' => string 'open',
 *    )
 *
 * Retourne FALSE si l'id passé en argument ne correspond à aucune liste
 */
function parametres_liste ($id_liste) {

    foreach (lire_config('mailsubscribers/lists') as $liste) {
        if ($liste['id'] === $id_liste) {
            return $liste;
        }
    }
    return FALSE;
}

/**
 * Retourne un tableau avec les détails des listes correspondantes aux id
 * passés en paramètre.
 */
function detailler_listes ($listes) {

    if (is_array($listes)) {
        return array_map('parametres_liste', $listes);
    } else {
        return FALSE;
    }
}