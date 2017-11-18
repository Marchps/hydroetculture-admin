<?php
namespace App\Table;
use Core\Table\Table;

class SessionTable extends Table{

    public function index(){
        return $this->query("
        	SELECT * FROM jm_session s, jm_user u WHERE s.id_user=u.id_user ORDER BY date DESC");
    }
	
	public function ip_list(){
		return $this->query("
			SELECT DISTINCT(ip) FROM jm_session;
		");
	}

}