<?php
namespace App\Table;

use Core\Table\Table;

class MediaTable extends Table{

    protected $table = "medias";

/**
     * Récupère un article en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\PostEntity
     */
    public function get_all_medias(){
        return $this->query("
            SELECT *
            FROM jm_galerie g,jm_image i
            WHERE g.id_galerie=i.id_galerie AND deleted_at IS NULL");
    }

    public function get_galeries(){
        return $this->query("
            SELECT *
            FROM jm_galerie");
    }

	public function del_medias($id_image){
        return $this->query("
            UPDATE jm_image
			SET deleted_at = '" . date("Y-m-d H:i:s") . "' 
			WHERE id_image = ?", [$id_image], true);
    }
}