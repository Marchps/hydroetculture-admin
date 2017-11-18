<?php

namespace App\Controller;

use Core\Fonction\Image;
use Core\Fonction\Fonction;


class MessagesController extends AppController{
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
 		}else{
 			$id_user = 0;
 		}
    $user = $this->User->get_user($id_user);
    $all_user = $this->User->getUsers();
    $count_btq = $this->Boutique->cpt_btq($id_user);
    $boutiques = $this->Boutique->all_btq_user($id_user);
    $messages = $this->Message->get_all_messages($id_user);
    $messages_envoyes = $this->Message->get_all_messages_send($id_user);
    $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
    $messages_supprimes = $this->Message->get_messages_del($id_user);
    $last_downloads = $this->Download->last_downloads();
    
    $this->render('messages.index', compact('last_downloads','messages','boutiques','cpt_btq','user','messages_envoyes','messages_supprimes','all_user','messages_non_lu'));
    }

    public function new_message(){    
        if (!empty($_POST)) {
            $result = $this->Message->create([
                'id_exped' => $_POST['exped'],
                'id_recept' => $_POST['destinataire'],
                'subject' => addslashes($_POST['subject']),
                'content' => addslashes($_POST['content']),
                'send' => date('Y-m-d H:i:s'),
                ],'jm_messages');
            if($result){
                return $this->redirect(BASE_LINK_MESSAGES);
            }
        }
    }

    public function new_reply(){    
        if (!empty($_POST)) {
            
            $id_current_message=$_POST['current_message'];

            $result_insert = $this->Message->create([
                'id_exped' => $_POST['exped'],
                'id_recept' => $_POST['recept'],
                'subject' => addslashes($_POST['subject']),
                'content' => addslashes($_POST['content']),
                'send' => date('Y-m-d H:i:s'),
                ],'jm_messages'); 

            $result_update = $this->Message->update($id_current_message,"id_message",[
                'respond' => date('Y-m-d H:i:s'),
                ],'jm_messages');
            if($result_insert){
                return $this->redirect(BASE_LINK_MESSAGES);
            }
        }
    }

    public function update_lu(){    
        $id = $_POST['id'];
        $messages_envoyes = $this->Message->update_lu($id);
    }

    public function delete_msg(){    
        $id = $_POST['id'];
        $messages_envoyes = $this->Message->delete_msg($id);
    }
}

