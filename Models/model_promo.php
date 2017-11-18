<?php
include 'connexionBDD.php';

global $nom_table_promo;
$nom_table_promo="_promo";

/**
 * La requte renvoi le listing de toutes les promos.
 * 
 */

function get_listing_facilite(){
    global $nom_table_promo;

    $sth = $dbh->prepare("SELECT * FROM ".$nom_table_promo.";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}

/**
 * La requte renvoi les informations de la promo dont l'id est en paramètre.
 * 
 * @param type $id_promo : le code de la promo dont on veut les infos.
 */

function get_promo($id_promo){
	$sth= $dbh->prepare("SELECT * FROM ".$nom_table_promo." WHERE id_promo=".$id_promo);
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}
?>