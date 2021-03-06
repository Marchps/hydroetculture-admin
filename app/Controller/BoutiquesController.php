<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Fonction\Fonction; 

class BoutiquesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Boutique');
        $this->loadModel('User');
        $this->loadModel('Promo');
        $this->loadModel('Message');
        $this->loadModel('Download');
        $this->loadModel('Order');
    }

	public function dashboard(){
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

        $this->render('boutiques.dashboard', compact('last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
    }
	
	public function orders(){
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
		$orders = $this->Boutique->get_all_boutiques_orders();
		$products = $this->Boutique->get_all_products();
		$valid_orders = $this->Order->index();

        $this->render('boutiques.orders', compact('valid_orders','last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu','orders','products'));
	}
	
 	public function index(){
 		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
        $user = $this->User->get_user($id_user);
        $user = $this->User->get_user($id_user);
        $messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $facilites = $this->Boutique->get_all_facilites();
        $facilites_btq = $this->Boutique->get_facilites_btq();
        $count_btq = $this->Boutique->cpt_btq($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
		$last_downloads = $this->Download->last_downloads();

        $this->render('boutiques.index', compact('last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
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

        $this->render('boutiques.index_admin', compact('boutiques_admin','last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
    }	

	public function coord(){
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

        $this->render('boutiques.coord', compact('boutiques_admin','last_downloads','boutiques','count_btq','facilites','facilites_btq','user','messages','messages_non_lu'));
    }	
	
	
    public function map(){
    	if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
        $user = $this->User->get_user($id_user);
        $count_btq = $this->Boutique->cpt_btq($id_user);
		$boutiques = $this->Boutique->all_btq_user($id_user);
        $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
		$last_downloads = $this->Download->last_downloads();

    	$this->render('boutiques.carte', compact('last_downloads','boutiques','count_btq','user','messages_non_lu'));
    }
	
	/*Etape 2 de la création d'une boutique : Ajout des pictos facilites*/
	public function step2(){
		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		//Si on a pas encore envoyé le form (à la place de mettre le chemin dans l'attribut action de form)
		if(empty($_POST)){
		$facilites = $this->Boutique->get_all_facilites();
		$messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
        $user = $this->User->get_user($id_user);
		$messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $boutiques_admin = $this->Boutique->all_btq();
        $boutiques_last_btq = $this->Boutique->get_last_btq_id();
		$last_downloads = $this->Download->last_downloads();
	
		$this->render('boutiques.step2', compact('facilites','last_downloads','boutiques_last_btq','boutiques','boutiques_admin','user','messages_non_lu'));
		
		}else{
			if(isset($_POST)){
				/*Création des lignes de promotion vides*/
				$result1 = $this->Promo->create([
					'id_promo' => '',
					'libelle' => '',
					'description' => '',
					'picto' => '',
					'order_by' => '1',
					'id_boutique' => $_POST['id_btq'],
					],'jm_promo');
				$result2 = $this->Promo->create([
					'id_promo' => '',
					'libelle' => '',
					'description' => '',
					'picto' => '',
					'order_by' => '2',
					'id_boutique' => $_POST['id_btq'],
					],'jm_promo');
				
				//pour chaque attribut différent de id_btq
				foreach($_POST as $key=>$id_facil)
				{
					if($key<>"id_btq"){
						$result = $this->Boutique->create([
							'id_boutique' => $_POST[id_btq],
							'id_facilites' => $id_facil,
						],' jm_boutique_to_facilites');
					}
				}
				
				/*Création de la galerie d'image associée à la btq*/
				
				$nom_galerie = $_POST['nom_boutique'].' '.$_POST['ville_boutique'];
				$result3 = $this->Boutique->create([
					'id_galerie' => '',
					'libelle' => $nom_galerie,
					'id_boutique' => $_POST['id_btq'],
				],'jm_galerie');
				
				
				print_r($result);
				/**/
				
			}
			//On fonce vers le step 3 ===>
			if($result){
               //return $this->redirect(BASE_LINK.'/boutiques/step3');
            }
		}
	}
	
	/*Etape 3 de la création d'une boutique : Ajout du gestionnaire de la page*/
	public function step3(){
		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		//Si on a pas encore envoyé le form
		if(empty($_POST)){
		$facilites = $this->Boutique->get_all_facilites();
		$messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
        $user = $this->User->get_user($id_user);
        $all_user = $this->User->getUsers();
		$messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $boutiques_admin = $this->Boutique->all_btq();
        $boutiques_last_btq = $this->Boutique->get_last_btq_id();
		$last_downloads = $this->Download->last_downloads();
	
		$this->render('boutiques.step3', compact('facilites','last_downloads','boutiques_last_btq','boutiques','count_btq','user','all_user','messages_non_lu'));
		
		}else{
				//pour chaque attribut différent de id_btq
				foreach($_POST as $key=>$id_facil)
				{
					if($key<>"id_btq"){
						$result = $this->Boutique->create([
							'id_boutique' => $_POST[id_btq],
							'id_facilites' => $id_facil,
						],' jm_boutique_to_facilites');
					}
				}
			
			//On fonce vers le step 3 ===>
			if($result){
               return $this->redirect(BASE_LINK.'/boutiques/step3');
            }
		}
	}
	
	//Validation de l'ajout d'une nouvelle boutique : association utilisateur
	public function validate(){
		
		$gestionnaire = explode('-',substr($_POST['gestionnaires'],0,-1));
		$id_btq = $_POST['id_btq'];
		
		foreach($gestionnaire as $gest){
			echo $id_btq." - > ". $gest."<br />";
			$result = $this->Boutique->create([
				'id_boutique' => $id_btq,
                'id_user' => $gest
            ],'jm_user_boutique');
			
			
		}
		
				return $this->redirect(BASE_LINK.'/boutiques/dashboard');

	}
	
	public function nouveau(){
		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		
		if(empty($_POST)){	
        $facilites = $this->Boutique->get_all_facilites();
		$messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
        $user = $this->User->get_user($id_user);
		$messages = $this->Message->get_all_messages_non_lu($id_user);
        $boutiques = $this->Boutique->all_btq_user($id_user);
        $boutiques_admin = $this->Boutique->all_btq();
		$last_downloads = $this->Download->last_downloads();
	
		$this->render('boutiques.add', compact('facilites','last_downloads','boutiques','count_btq','user','messages_non_lu'));
		
		}else{
			/*Insertion des données de boutique : génération du slug*/
			$result = $this->Boutique->create([
				'id_boutique' => '',
                'nom' => addslashes($_POST['nom_boutique']),
                'active' => $_POST['active'],
                //'enseigne' => addslashes($_POST['enseigne']),
                'slogan' => addslashes($_POST['slogan_boutique']),
                'adresse' => addslashes($_POST['adresse_boutique']),
                'cp' => $_POST['cp_boutique'],
                'tel' => $_POST['tel_boutique'],
                'ville' => addslashes($_POST['ville_boutique']),
                'mail' => $_POST['mail_boutique'],
                'facebook' => $_POST['facebook_boutique'],
                'twitter' => $_POST['twitter_boutique'],
                'skype' => $_POST['skype_boutique'],
				'h_lundi' => addslashes($_POST['h_lundi']),
				'h_mardi' => addslashes($_POST['h_mardi']),
				'h_mercredi' => addslashes($_POST['h_mercredi']),
				'h_jeudi' => addslashes($_POST['h_jeudi']),
				'h_vendredi' => addslashes($_POST['h_vendredi']),
				'h_samedi' => addslashes($_POST['h_samedi']),
				'h_dimanche' => addslashes($_POST['h_dimanche']),
				'h_a_savoir' => addslashes($_POST['h_a_savoir']),
				'latitude' => $_POST['latitude'],
				'longitude' => $_POST['longitude'],
                'boutique_description' => addslashes($_POST['description']),
				'slug' => Fonction::slugify($_POST['nom_boutique']).'-'.Fonction::slugify($_POST['ville_boutique']),
            ],'jm_boutique');
			

			/*Création des répertoires pour les encarts de promos et pour les images*/
				$dossier = Fonction::slugify($_POST['nom_boutique']).'-'.Fonction::slugify($_POST['ville_boutique']);
				
				if (!file_exists('images/photos/'.$dossier)) {
					mkdir('images/photos/'.$dossier);
				}
				if (!file_exists('images/promos/'.$dossier)) {
					mkdir('images/promos/'.$dossier);
				}
					
			/*insertion de l'image par défaut*/
				$file_default = 'images/15ans.jpg';
				$new = 'images/photos/'.$dossier.'/default.jpg';
				copy($file_default,$new);
			
			
			if($result){
                return $this->redirect(BASE_LINK.'/boutiques/step2');
            }
		}
	}

	public function update(){
     	if (!empty($_POST)) {
            $result = $this->Boutique->update($_POST['id_btq'],'id_boutique',[
                'nom' => addslashes($_POST['nom_boutique']),
                //'enseigne' => addslashes($_POST['enseigne']),
                'desc_courte' => addslashes($_POST['slogan_boutique']),
                'adresse' => addslashes($_POST['adresse_boutique']),
                'cp' => addslashes($_POST['cp_boutique']),
                'tel' => addslashes($_POST['tel_boutique']),
                'ville' => addslashes($_POST['ville_boutique']),
                'mail' => addslashes($_POST['mail_boutique']),
                'facebook' => addslashes($_POST['facebook_boutique']),
                'twitter' => addslashes($_POST['twitter_boutique']),
                'skype' => addslashes($_POST['skype_boutique']),
                'boutique_description' => addslashes($_POST['description']),
                'recall' => $_POST['recall']
            ],'jm_boutique');
            if($result){
                return $this->redirect(BASE_LINK.'/boutiques/index?idb='.$_POST['id_btq'].'&state=success');
            }
        }
	}

	public function expir(){
		$this->setTemplate('default');
		$this->render('boutiques.expir');
	}
	
	public function page404(){
		$this->setTemplate('default');
		$this->render('boutiques.page404');
	}
	
	public function update_houres(){
     	if (!empty($_POST)) {
            $result = $this->Boutique->update($_POST['id_btq'],'id_boutique',[
                'h_lundi' => addslashes($_POST['h_lundi']),
                'h_mardi' => addslashes($_POST['h_mardi']),
                'h_mercredi' => addslashes($_POST['h_mercredi']),
                'h_jeudi' => addslashes($_POST['h_jeudi']),
                'h_vendredi' => addslashes($_POST['h_vendredi']),
                'h_samedi' => addslashes($_POST['h_samedi']),
                'h_dimanche' => addslashes($_POST['h_dimanche']),
                'h_a_savoir' => addslashes($_POST['h_a_savoir'])
            ],'jm_boutique');
            
            if($result){
                return $this->redirect(BASE_LINK.'/boutiques/index');
            }
        }
	}

	public function update_facilites(){
			//MAJ de la date d'agrément			
			if(!empty($_POST['date_ag'])){
				$result = $this->Boutique->update($_POST['id_btq'],'id_boutique',[
                'date_agrement' => $_POST['date_ag'],
            ],'jm_boutique');
			}
				
			$result = $this->Boutique->delete($_POST['id_btq'],'id_boutique','jm_boutique_to_facilites');
     		/*On regharde si des champs contenant 'facil' se trouvent dans notre POST et on boucle tant que c'est le cas*/
			while($valeur = current($_POST)) {
            	if(strstr(key($_POST), 'facil')) {
                	$result = $this->Boutique->create([
                		'id_boutique' => $_POST['id_btq'],
						'id_facilites' => $_POST[key($_POST)]
						],'jm_boutique_to_facilites');                		
                }
                next($_POST);
            }
            
            if($result){
				return $this->redirect(BASE_LINK.'/boutiques/index');
            }
	}
	
	public function update_map(){
		     	if (!empty($_POST)) {
            $result = $this->Boutique->update($_POST['id_btq'],'id_boutique',[
                'latitude' => $_POST['latitude'],
                'longitude' => $_POST['longitude']
            ],'jm_boutique');
            if($result){
                return $this->redirect(BASE_LINK.'/boutiques/coord');
            }
        }
	}

}