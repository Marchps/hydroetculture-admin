<?php
namespace App\Table;

use Core\Table\Table;

class MessageTable extends Table{

/**
     * Récupère les boutiques associées à l'id_user
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    
    /*Récupère Les messages reçu $id_user, toutes les infos du message et de l'expéditeur*/
    public function get_all_messages($id_user){
        return $this->query("
            SELECT *
            FROM jm_messages m, jm_user u
            WHERE id_exped=u.id_user AND delete_time IS NULL AND id_recept = ? ORDER BY send DESC ", [$id_user], false);
    }

    public function get_all_messages_lu($id_user){
    	return $this->query("
    		SELECT *
			FROM jm_messages m, jm_user u
            WHERE id_exped=u.id_user AND lu IS NOT NULL AND id_exped = ?", [$id_user], false);
    }

    public function get_all_messages_non_lu($id_user){
        return $this->query("
            SELECT *
            FROM jm_messages m, jm_user u
            WHERE id_exped=u.id_user AND lu IS NULL AND id_recept = ?", [$id_user], false);
    }

    public function get_all_messages_send($id_user){
    	return $this->query("
    		SELECT *
            FROM jm_messages m, jm_user u
            WHERE id_recept=u.id_user AND send IS NOT NULL AND delete_time IS NULL AND id_exped = ?", [$id_user], false);
    }

	public function get_messages_del($id_user){
    	return $this->query("
            SELECT *
            FROM jm_messages m, jm_user u
            WHERE id_exped=u.id_user AND delete_time IS NOT NULL AND id_recept = ?", [$id_user], false);
    }

    public function update_lu($id_message){
        return $this->query("
            UPDATE jm_messages SET lu=NOW() WHERE id_message = ?", [$id_message], true);
    }
    
    public function delete_msg($id_message){
        return $this->query("
            UPDATE jm_messages SET delete_time=NOW() WHERE id_message = ?", [$id_message], true);
    }
}