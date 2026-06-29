<?php
include_once("db.php");

$id = $_GET["id"]; // on modifie la stock 12
$action = $_GET["action"]; // on rajoute ou enleve 
$boutique_id = $_GET["boutique_id"]; // recuperation des données encoreeee de la boutique que l'on modifie

if($action == "plus"){
    dbquery("UPDATE stocks SET quantite = quantite + 1 WHERE id = ?", [$id]); // on augmente de un la ligne demander avec l'id 
}

if($action == "moins"){
    dbquery("UPDATE stocks SET quantite = quantite - 1 WHERE id = ? AND quantite > 0", [$id]);
}

header("Location: page_stock_gerant.php?boutique_id=" . $boutique_id); // on ou renvoie tout de suite sur la page des une action 

?>