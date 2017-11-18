<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Fonction\Image;


class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
    }

    public function index(){
        $posts = $this->Post->all();
        $this->render('admin.posts.index', compact('posts'));

    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Post->create([
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
            ]);
            if($result){
                return $this->redirect(PREFIX.'/posts/index');
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit($id){
        if (!empty($_POST)) {
          $this->loadModel('Media');
          $nomfichier = null;
          $article = $this->Post->findWithThumb($id);
         /* var_dump($article);
          die();*/
               
            if(!empty($_FILES['thumb']['name'])){
                
                if(strpos($_FILES['thumb']['type'], 'image') !== false){

                    //en prod il faudra peut être adapté pour trouver le repertoire
                   // $dir = '../../../images/blog/';
                    $dir = $_SERVER['DOCUMENT_ROOT'].'mvcbachelor'.DS.'web'.DS.'images'.DS.'blog'.DS;
                    
                     if(!file_exists($dir)) mkdir($dir,0777);
                     
                     unset($erreur);
                     
            
            
                     //on verifie le format de l'image
            $extensions_ok = array('png', 'gif', 'jpg', 'jpeg', 'JPG', 'bmp');

                    //double verif pour le type de fichier never trust user
            if( !in_array( substr(strrchr($_FILES['thumb']['name'], '.'), 1), $extensions_ok ) ) {
                    $erreur = 'Le fichier n\'est pas une image';  
                    return $this->redirect('admin/posts/edit/'.$id);     
                }            
            if(!isset($erreur)) { 
                /* recup l'extension du fichier */     
            $path_part = pathinfo($_FILES['thumb']['name']);
           $s_extension = $path_part['extension'];

            $slug = $this->slugify($_POST['titre']);
            $nomfichier = $id.'-'.$slug.$s_extension;
            move_uploaded_file($_FILES['thumb']['tmp_name'],$dir.$nomfichier);
            //ça peut servir si on redimensionne
            copy($dir.$nomfichier,$dir.'big'.DS.$nomfichier);

            //si on veut supprimer une image unlink($dir.$nomfichier);
            
            //si l'image existe on fait un update des donnée sinon on la crée
                        if(is_null($article->thumb)){
                            $result = $this->Media->create([
                            'name' => $id.'-'.$slug,
                            'rep' => 'image/blog/'.$nomfichier,
                            'file' => 'image/blog/',
                            'post_id' => $id,
                            'genre' => 'thumb',
                            'type' => 'blog',
                            'thumb' => $nomfichier,
                            'online' => true,
                            'login' => $_SESSION['user'] ,

                        ]);
                        }else{
                            $result = $this->Media->update($article->thumb_id,[
                            'name' => $id.'-'.$slug,
                            'rep' => 'image/blog/'.$nomfichier,
                            'file' => 'image/blog/',
                            'post_id' => $id,
                            'genre' => 'thumb',
                            'type' => 'blog',
                            'thumb' => $nomfichier,
                            'online' => true,
                            'login' => $_SESSION['user'] ,

                        ]);

                        }
                //on place l'image dans la table media afin d'en disposer pour les articles
            

            /*ici on sauvegarde l'image dans la table media
            il faut aussi ajouter le nom de l'image dans la table blog ou alors l'id de l'image
            prevoir toute les possibilitée .
               */ 
              
             
        }
        }else{
            $erreur = 'Le fichier n\'est pas une image';  
                    return $this->redirect('admin/posts/edit/'.$id);
        }
 }
            $result = $this->Post->update($id, [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id'],
                'thumb_id'   => $nomfichier,
            ]);
            if($result){
                return $this->redirect('admin/posts/index');
            }
        }
        $post = $this->Post->find($id);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
    }

}