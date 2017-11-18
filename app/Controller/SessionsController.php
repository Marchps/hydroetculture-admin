<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class SessionsController extends AppController {
	
    public function __construct(){
        parent::__construct();
        $this->loadModel('Boutique');
        $this->loadModel('User');
        $this->loadModel('Message');
        $this->loadModel('Download');
        $this->loadModel('Droit');
        $this->loadModel('Session');
    }

	
	public function index(){
		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
        $user = $this->User->get_user($id_user);
        $messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $boutiques_admin = $this->Boutique->all_btq();
        $facilites = $this->Boutique->get_all_facilites();
        $facilites_btq = $this->Boutique->get_facilites_btq();
        $count_btq = $this->Boutique->cpt_btq($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
		$last_downloads = $this->Download->last_downloads();
		$users = $this->User->getUsers();
		$users_btq = $this->User->users_btq();
		$sessions = $this->Session->index();
		$ip_list = $this->Session->ip_list();
	
        $this->render('sessions.index', compact('ip_list','sessions','user','users_btq','users','boutiques','messages_non_lu','boutiques_admin','last_downloads','boutiques','messages'));

	}
}
