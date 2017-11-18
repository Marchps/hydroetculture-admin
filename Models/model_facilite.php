<?php
include 'connexionBDD.php';

global $nom_table_facilite;
$nom_table_facilite="_facilite";

/**
 * La requte renvoi le listing e toutes les facilites disponibles.
 * 
 */

function get_listing_facilite(){
    global $nom_table_facilite;

    $sth = $dbh->prepare("SELECT * FROM ".$nom_table_facilite.";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}

/**
 * La requte renvoi les id facilite associés à la boutique courante.
 * 
 * @param type $id_boutique : id de la boutique courante
 */

function get_id_facilite($id_boutique){

	$sth = $dbh->prepare("SELECT * FROM jm_boutique_to_facilites WHERE id_boutique=".$id_boutique.";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw['id_facilite'];
}

/**
 * La requte renvoi les informations de la facilite dont l'id est en paramètre.
 * 
 * @param type $id_facilite : le code de de la facilite dont on veut les infos.
 */

function get_facilite($id_facilite){
	$sth= $dbh->prepare("SELECT * FROM ".$nom_table_facilite." WHERE id_facilite=".$id_facilite);
	$rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}
?>