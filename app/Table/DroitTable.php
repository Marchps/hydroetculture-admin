<?php
namespace App\Table;

use Core\Table\Table;

class DroitTable extends Table{

	/**
     * Récupère les droits
     */
    public function all_droit(){
        return $this->query("
            SELECT *
            FROM jm_droit WHERE level<>1");
    }
	
	public function users_droits(){
        return $this->query("
            SELECT *
            FROM jm_droit d,jm_user u WHERE d.id_droit=u.id_droit");
    }

}