<?php

namespace App\Controller;

use Core\Controller\Controller;
use Core\Fonction\Fonction; 

class DownloadsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Download');
        $this->loadModel('User');
        $this->loadModel('Message');
        $this->loadModel('Boutique');
    }

 	public function index(){
 		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		$all_user = $this->User->getUsers();
		$count_btq = $this->Boutique->cpt_btq($id_user);
		$boutiques = $this->Boutique->all_btq_user($id_user);
		$downloads = $this->Download->all_download();
		$last_downloads = $this->Download->last_downloads();
	    $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
	    $user = $this->User->get_user($id_user);
		$types = $this->Download->all_types();
    
        $this->render('downloads.index', compact('types','last_downloads','downloads','count_btq','boutiques','messages_non_lu','all_user','user'));
    }
	
	public function index_admin(){
	
		if(isset($_SESSION['id_user'])){
			$id_user = $_SESSION['id_user'];
		}

		$types = $this->Download->all_types();
		$messages_non_lu = $this->Message->get_all_messages_non_lu($_SESSION['id_user']);
		$boutiques = $this->Boutique->all_btq_user($id_user);
		$count_btq = $this->Boutique->cpt_btq($id_user);
		$user = $this->User->get_user($id_user);
		$last_downloads = $this->Download->last_downloads();
		$downloads = $this->Download->all_download();

		$this->render('downloads.index_admin', compact('types','downloads','last_downloads','boutiques','count_btq','user','messages_non_lu'));
    }
	
	public function add(){
        if (!empty($_POST)) {
		$target_dir = "downloads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			/*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {*/
				//echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
				$result = $this->Download->create([
                        'name' => $_FILES["fileToUpload"]["name"],
                        'size' => $_FILES["fileToUpload"]["size"],
                        'type' => $imageFileType,
						'creator' => $_SESSION['login'],
						'valid' => 1,
						'id_type' => $_POST['id_type']
                    ],'jm_downloads');
				echo "fichier inséré en BDD / ";
				
			/*} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}*/
		}
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "Ce fichier est déjà présent sur le serveur.";
			$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 10000000) {
			echo "Le fichier est trop volumineux, 9 Mo Maximum.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "pdf" && $imageFileType != "csv" 
		&& $imageFileType != "xml" && $imageFileType != "xlsm" && $imageFileType != "xlsx" 
		&& $imageFileType != "ods" && $imageFileType != "doc" && $imageFileType != "avi") {
			echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, ODS, CSV, XML, xlsm, xslx files are allowed.";
			$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo "Le fichier n'a pas pu être importé sur le serveur.";
		// if everything is ok, try to upload file
		} else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
				echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
				if($result){
                    return $this->redirect(BASE_LINK.'/downloads/index_admin');
                }
			} else {
				echo "Il y a eu un problème lors de l'upload de votre fichier sur le serveur.";
			}
		}            
        }
    }
	
	public function del_download(){
		unlink(DL_ROOT.$_POST['nom']);
		$medias = $this->Download->del_download($_POST['id_downloads']);
	}
	
	 public function cloud(){
 		if(isset($_SESSION['id_user'])){
	 		$id_user = $_SESSION['id_user'];
 		}else{
 			$id_user = 0;
 		}
		$all_user = $this->User->getUsers();
		$count_btq = $this->Boutique->cpt_btq($id_user);
		$boutiques = $this->Boutique->all_btq_user($id_user);
		$downloads = $this->Download->all_download();
		$last_downloads = $this->Download->last_downloads();
	    $messages_non_lu = $this->Message->get_all_messages_non_lu($id_user);
	    $user = $this->User->get_user($id_user);
    
        $this->render('downloads.cloud', compact('last_downloads','downloads','count_btq','boutiques','messages_non_lu','all_user','user'));
    }

}