<?php
include 'connexionBDD.php';

global $nom_table_user;
$nom_table_user="_user";

/**
 * On obtient la liste de tous les users.
 * 
 */

function get_listing_user(){
    global $nom_table_user;

    $sth = $dbh->prepare("SELECT * FROM ".$nom_table_user.";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}

/**
 * La requte renvoi toutes informatiosn sur le user
 * 
 * @param type $id_user : le code du user dont on veut les infos
 */
function get_user($id_user){
    global $nom_table_user;

    $sth = $dbh->prepare("SELECT * FROM ".$nom_table_user." WHERE id_user=" .$id_user. ";");
    $rs = $sth->execute();
    if ($rs->rowCount() > 0) {
        $rw = $rs->fetch(PDO::FETCH_OBJ);
    }
    return $rw;
}
?>