<?php
include 'connexionBDD.php';

global $nom_table_btq;
$nom_table_btq="_boutique";

/**
 * La requte renvoi toutes les informations de la boutique courante.
 * 
 * @param type $id_boutique : le code de la botique dont on veut les infos.
 */

function get_boutique_active($id_boutique){
    global $nom_table_btq;

    $sth = $dbh->prepare("SELECT * FROM ".$nom_table_btq." WHERE id_boutique=".$id_boutique.";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}
?>