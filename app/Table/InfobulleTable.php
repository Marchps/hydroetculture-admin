<?php
namespace App\Table;

use Core\Table\Table;

class InfobulleTable extends Table{

    protected $table = "infobulles";

/**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function get_infobulle(){
        return $this->query("
            SELECT *
            FROM jm_infobulles");
    }
}