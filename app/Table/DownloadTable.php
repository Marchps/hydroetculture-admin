<?php
namespace App\Table;

use Core\Table\Table;

class DownloadTable extends Table{

	/**
     * Récupère les fichiers
     */
    public function all_download(){
        return $this->query("
            SELECT *
            FROM jm_downloads WHERE valid=1 AND deleted_at IS NULL ORDER BY id_downloads DESC ");
    }
	
	/**
	* 3 derniers fichiers ajoutés
	*/
	public function last_downloads(){
        return $this->query("
            SELECT *
            FROM jm_downloads WHERE valid=1 AND deleted_at IS NULL ORDER BY date_add DESC LIMIT 3 ");
    }
	
	public function del_download($id_download){
        return $this->query("
            DELETE FROM jm_downloads 
			WHERE id_downloads = ".$id_download);
	}
	
	public function all_types(){
		return $this->query("
            SELECT * FROM jm_types");
	}
	

}