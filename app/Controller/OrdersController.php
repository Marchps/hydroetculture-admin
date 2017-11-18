<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Fonction\Image;


class OrdersController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Boutique');
        $this->loadModel('Promo');
        $this->loadModel('User');
        $this->loadModel('Message');
        $this->loadModel('Order');
        $this->loadModel('Download');
    }

	public function nouveau(){
		if(isset($_SESSION['id_user'])){
			$id_user = $_SESSION['id_user'];
		}else{
			$id_user = 0;
		}
		
		/*Insertion des données de commande */
		$result = $this->Order->create([
			'id_order' => '',
			'id_prstshp_order' => $_POST['id_prstshp_order'],
			'validate' => date("Y-m-d H:i:s"),
			'id_boutique' => $_POST['id_boutique'],
			'id_user' => $_POST['id_user'],
		],'jm_orders');
		
		/*Insertion de la mise à jour de l'état de la commande*/		
		$resultat = $this->Order->create([
			'id_order_history' => '',
			'id_employee' => 0,
			'id_order' => $_POST['id_prstshp_order'],
			'id_order_state' => 32,
			'date_add' => date("Y-m-d H:i:s"),
		],'prstshp_order_history');
		
		/*Mise à jour de l'état dans order*/
	    //$update_etat = $this->Order->update_etat($_POST['id_prstshp_order']);
		$result_update = $this->Message->update($_POST['id_prstshp_order'],"id_order",[
                'current_state' => 32,
                ],'prstshp_orders');
		
		
		if($result){
			return $this->redirect(BASE_LINK.'/boutiques/orders');
		}
	}
}
	