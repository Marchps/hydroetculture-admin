<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Boutique');
        $this->loadModel('User');
        $this->loadModel('Message');
        $this->loadModel('Download');
        $this->loadModel('Droit');
    }

public function data(){
        $id_user = $_SESSION['id_user'];
        $user = $this->User->get_user($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($_SESSION['id_user']);
        $boutiques = $this->Boutique->all_btq_user($id_user);
		$last_downloads = $this->Download->last_downloads();
        $this->render('users.data', compact('user','boutiques','messages_non_lu','last_downloads'));
    }
	
public function add_user(){
	    if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		
		//on ajoute l'utilisateur
		$result = $this->User->create([
				'id_user' => '',
                'login' => addslashes($_POST['username']),
                'nom' => addslashes($_POST['lastname']),
                'prenom' => addslashes($_POST['firstname']),
				'cloud_vip' => $_POST['cloud_vip'],
                'mail' => addslashes($_POST['email']),
                'password' => md5($_POST['password']),
				'id_droit' => 3,
                'poste' => addslashes($_POST['job'])
            ],'jm_user');
		
		
        return $this->redirect(BASE_LINK.'/boutiques/step3');

}

//Création d'un nouvel utilisateur depuis la liste des utilisateurs
public function user_add(){
	
	    if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		
		//on ajoute l'utilisateur
		$result = $this->User->create([
				'id_user' => '',
                'login' => addslashes($_POST['login']),
                'nom' => addslashes($_POST['nom']),
                'prenom' => addslashes($_POST['prenom']),
				'cloud_vip' => $_POST['cloud_vip'],
                'mail' => addslashes($_POST['mail']),
                'password' => md5($_POST['password']),
				'id_droit' => $_POST['droit'],
                'poste' => addslashes($_POST['job'])
            ],'jm_user');
		
		$new_user_id = $this->User->last_user_create();
		$new_user_id = $new_user_id[0]->maxid;
		
		//on l'associe aux boutiques souhaitées
		foreach($_POST['boutique'] as $boutique){
			
			$result2 = $this->User->create([
					'id' => '',
					'id_user' => $new_user_id,
					'id_boutique' => $boutique,
			],'jm_user_boutique');
		}
		
        return $this->redirect(BASE_LINK.'/users/index_admin');
		
}

public function index_admin(){
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
		$droits = $this->Droit->all_droit();
		$all_btq = $this->Boutique->all_btq();
		
        $this->render('users.index_admin', compact('all_btq','droits','user','users_btq','users','boutiques','messages_non_lu','boutiques_admin','last_downloads','boutiques','messages'));
}

public function test($id_user){
	echo "mon test".$id_user;
}
	
public function update_user(){
        $id_user = $_SESSION['id_user'];

        if($_POST['password']<>""){
            $data_array=[
                'login' => addslashes($_POST['username']),
                'nom' => addslashes($_POST['lastname']),
                'prenom' => addslashes($_POST['firstname']),
                'mail' => addslashes($_POST['email']),
                'password' => md5($_POST['password']),
                'poste' => addslashes($_POST['job'])
            ];
        }else{
             $data_array=[
                'login' => addslashes($_POST['username']),
                'nom' => addslashes($_POST['lastname']),
                'prenom' => addslashes($_POST['firstname']),
                'mail' => addslashes($_POST['email']),
                'poste' => addslashes($_POST['job'])
            ];
        }
        if (!empty($_POST)) {
            $result = $this->User->update($id_user,'id_user',$data_array,'jm_user');
            if($result){
                return $this->redirect(BASE_LINK.'/users/data');
            }
        }
    }    

public function role(){
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
		$droits = $this->Droit->all_droit();
		$droit_user = $this->Droit->users_droits();
		
        $this->render('users.role', compact('user','droit_user','droits','users_btq','users','boutiques','messages_non_lu','boutiques_admin','last_downloads','boutiques','messages'));
	
}
	
public function update_role(){
		$data =[
			'id_user' => $_POST['id_user'],
			'id_droit' => $_POST['new_level']
		];

		$result = $this->User->update($_POST['id_user'],'id_user',$data,'jm_user');
		
		if($result){
			return $this->redirect(BASE_LINK.'/users/role');
		}
}	

	
public function disconnect(){
        session_destroy();
		unset($user);
        header('Location: ' . LOGIN_LINK);      
    }


}