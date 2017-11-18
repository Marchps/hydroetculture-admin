<?php
namespace Core\Fonction;

class Image {
    
    /*------------------------------*/

  static function upload_image($chemin,$name,$tmp_name){

            //$dossier = str_replace(' ', '%20', $dossier);
print_r($_FILES);
            $dossier = DOC_ROOT. $chemin ;
            $fichier = basename($name);
            $taille_maxi = 10000000;
            $taille = filesize($tmp_name);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg');
            $extension = strrchr($name, '.'); 
            //Début des vérifications de sécurité...
            if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
            {
                 $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc... Extension actuelle' . $extension .' pour le fichier ' . $fichier ;
                 print_r($erreur);
            }
            if($taille>$taille_maxi)
            {
                 $erreur = 'Le fichier est trop gros...';
                 print_r($erreur);
            }
            if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
            {
                 //On formate le nom du fichier ici...
                 $fichier = strtr($fichier, 
                      'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                      'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
                 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                 if(move_uploaded_file($tmp_name, $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
                 {
                      echo 'Upload effectué avec succès !';
                      return $fichier;
                  }
            }else{
                return false;
            }
  }
/*----------------*/

   static function upload($file, $name_dir, $slug){
    if(strpos($file['type'], 'image') !== false){

        //en prod il faudra peut être adapté pour trouver le repertoire
        
        $dir = $_SERVER['DOCUMENT_ROOT'].DS.'mvcbachelor'.DS.'web'.DS.'images'.DS.$name_dir.DS;
         if(!file_exists($dir)) mkdir($dir,0777);

                /* recup l'extension du fichier */     
           $path_part = pathinfo($file['name']);
           $s_extension = $path_part['extension'];
            
            $nomfichier = $slug.'.'.$s_extension;
            move_uploaded_file($file['tmp_name'],$dir.$nomfichier);
            //ça peut servir si on redimensionne
            copy($dir.$nomfichier,$dir.'big'.DS.$nomfichier);

            $result = true;  
                    
        }else{
            $result = false;  

        }

       return $result;
   }
    
}

?>