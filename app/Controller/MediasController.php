<?php

namespace App\Controller;

use Core\Fonction\Image;

class MediasController extends AppController{
public function __construct(){
        parent::__construct();
        $this->loadModel('Media');
        $this->loadModel('Boutique');
        $this->loadModel('User');        
        $this->loadModel('Message');        
        $this->loadModel('Download');        
    }

 public function index(){
	if(isset($_SESSION['id_user'])){
		$id_user = $_SESSION['id_user'];
	}

    $messages_non_lu = $this->Message->get_all_messages_non_lu($_SESSION['id_user']);
    $medias = $this->Media->get_all_medias();
    $galeries = $this->Media->get_galeries();
    $boutiques = $this->Boutique->all_btq_user($id_user);
    $count_btq = $this->Boutique->cpt_btq($id_user);
    $user = $this->User->get_user($id_user);
    $last_downloads = $this->Download->last_downloads();

    $this->render('medias.index', compact('last_downloads','medias','galeries','boutiques','count_btq','user','messages_non_lu'));
    }

    public function add(){
        if (!empty($_POST)) {

            //$dir= BASE_LINK . 'photos/' . $_POST['nom'] . '-' . strtolower($_POST['ville']);


            $chemin = 'photos/' . $_POST['nom'] . '-' . $_POST['ville'] . '/';
            //$dossier = str_replace(' ', '%20', $dossier);
            $name = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];

            if(Image::upload_image($chemin,$name,$tmp_name)==false){
                echo "Erreur";
            }else{
                    $fichier = basename($name);
                    $result = $this->Media->create([
                        'id_galerie' => $_POST['galerie'],
                        'path_image' => 'images/' . $chemin . $fichier
                    ],'jm_image');
                if($result){
                    return $this->redirect(BASE_LINK_MEDIA);
                }
            }
            
        }
    }
	
	public function del_medias(){
		$medias = $this->Media->del_medias($_POST['id_media']);
	}
}

