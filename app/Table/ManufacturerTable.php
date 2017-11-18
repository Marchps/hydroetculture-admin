<?php
namespace App\Table;

use Core\Table\Table;

class ManufacturerTable extends Table{

    public function liste(){
		return $this->query("
			SELECT *
			FROM jm_manufacturer
		");
    }
}