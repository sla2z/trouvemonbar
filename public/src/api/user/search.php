<?php
/**
 * Recherche des utilisateurs
 * Méthode : GET
 * Paramètres :
 * - term  : le terme de la recherche
 * - limit : le nombre maximal d'utilisateurs à renvoyer
 * Renvoie :
 * - status = success, <Liste de <User sérialisé>>
 */

require_once("../../config.php");
require_once("SearchHelper.php");

if (isset($_GET['term']))
    $term = $_GET['term'];
else
    error_die("term", ERROR_FieldMissing);

if (isset($_GET['limit']))
    $limit = $_GET['limit'];
else
    $limit = 50;

if ($limit > 250)
    $limit = 250;

$results = Search::User($term, $limit);
success_die($results);