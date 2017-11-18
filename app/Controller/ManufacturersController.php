<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Fonction\Fonction; 

class ManufacturersController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Boutique');
        $this->loadModel('User');
        $this->loadModel('Promo');
        $this->loadModel('Message');
        $this->loadModel('Download');
        $this->loadModel('Manufacturer');
    }

	public function liste(){
 		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
        $user = $this->User->get_user($id_user);
        $messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $facilites = $this->Boutique->get_all_facilites();
        $facilites_btq = $this->Boutique->get_facilites_btq();
        $count_btq = $this->Boutique->cpt_btq($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
		$last_downloads = $this->Download->last_downloads();
		$manufacturers = $this->Manufacturer->liste();

        $this->render('manufacturers.liste', compact('manufacturers','last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
    }

	public function mama(){
 		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
        $user = $this->User->get_user($id_user);
        $messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $facilites = $this->Boutique->get_all_facilites();
        $facilites_btq = $this->Boutique->get_facilites_btq();
        $count_btq = $this->Boutique->cpt_btq($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
		$last_downloads = $this->Download->last_downloads();
		$manufacturers = $this->Manufacturer->liste();

        $this->render('manufacturers.mama', compact('manufacturers','last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
    }
	
	public function edit(){
	 	if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
        $user = $this->User->get_user($id_user);
        $messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $facilites = $this->Boutique->get_all_facilites();
        $facilites_btq = $this->Boutique->get_facilites_btq();
        $count_btq = $this->Boutique->cpt_btq($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
		$last_downloads = $this->Download->last_downloads();
		$manufacturers = $this->Manufacturer->liste();

        $this->render('manufacturers.edit', compact('manufacturers','last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
	}
	
		public function update(){
     	if (!empty($_POST)) {
            $result = $this->Manufacturer->update($_POST['id_manuf'],'id_manufacturer',[
                'site' => addslashes($_POST['site']),
                'description' => addslashes($_POST['description']),
                'id_manufacturer_prstshp' => addslashes($_POST['id_presta']),
            ],'jm_manufacturer');
            if($result){
                return $this->redirect(BASE_LINK.'/manufacturers/edit');
            }
        }
	}
	
}