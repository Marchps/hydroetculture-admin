<?php
include 'connexionBDD.php';

global $nom_table_droit;
$nom_table_droit="_droit";

/**
 * La requte renvoi le listing de tous les droits.
 * 
 */

function get_listing_droit(){
    global $nom_table_droit;

    $sth = $dbh->prepare("SELECT * FROM ".$nom_table_droit.";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}

/**
 * La requte renvoi les informations du droit dont l'id est en paramètre.
 * 
 * @param type $id_droit : le code du droit dont on veut les infos.
 */

function get_droit($id_droit){
	$sth= $dbh->prepare("SELECT * FROM ".$nom_table_droit." WHERE id_droit=".$id_droit);
	$rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}
?>