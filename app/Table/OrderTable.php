<?php
namespace App\Table;

use Core\Table\Table;

class OrderTable extends Table{

/**
 * Récupère les commandes qui ont été validées
 * @return \App\Entity\PostEntity
 */	 
	
	public function index(){
        return $this->query("
            SELECT *
            FROM jm_orders o,jm_user u WHERE o.id_user=u.id_user");
    }
	
	public function update_etat($id_order){
			
		return $this->query("
			UPDATE prstshp_orders SET current_state = 32 WHERE id_order = ?",[$id_order], true);
	}
	 
}