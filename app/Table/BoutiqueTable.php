<?php
namespace App\Table;

use Core\Table\Table;

class BoutiqueTable extends Table{

/**
     * Récupère les boutiques associées à l'id_user
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function all_btq_user($id_user){
        return $this->query("
            SELECT *
            FROM jm_user_boutique ub,jm_boutique b
            WHERE ub.id_boutique=b.id_boutique AND id_user = ?", [$id_user], false);
    }

	public function all_btq(){
        return $this->query("
            SELECT *
            FROM jm_boutique
            ");
    }
	
    public function cpt_btq($id_user){
    	return $this->query("
    		SELECT count(*) AS cpt
			FROM jm_user_boutique ub,jm_boutique b
            WHERE ub.id_boutique=b.id_boutique AND id_user = ?", [$id_user], false);
    }

	public function get_last_btq_id(){
		return $this->query("
			SELECT *
			FROM jm_boutique ORDER BY `id_boutique` DESC LIMIT 1
		");
	}
	
    public function get_facilites_btq(){
    	return $this->query("
    		SELECT *
			FROM jm_boutique_to_facilites bf");
    }

	public function get_all_facilites(){
    	return $this->query("
    		SELECT *
			FROM jm_facilites");
    }
	
	public function get_all_boutiques_orders(){
		return $this->query("
			SELECT *, o.date_add as date_commande
			FROM prstshp_orders o, prstshp_customer c
			WHERE c.id_customer=o.id_customer AND id_carrier=74 ORDER BY o.date_add DESC;
			");
	}
	
	public function get_all_products(){
		return $this->query("
			SELECT * 
			FROM prstshp_order_detail
			");
	}
}