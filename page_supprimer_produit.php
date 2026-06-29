<?php
include_once("db.php");

$id = $_GET["id"]; // on recupere l'id et de la boutique 
$boutique_id = $_GET["boutique_id"];

dbquery("DELETE FROM stocks WHERE id = ?", [$id]);

header("Location: page_stock_gerant.php?boutique_id=" . $boutique_id); //redireiger 
?>