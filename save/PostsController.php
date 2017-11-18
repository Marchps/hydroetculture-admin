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
                return $this->redirect('admin/posts/index');
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit($id){
        if (!empty($_POST)) {

            if(!empty($_FILES['thumb']['name'])){
                //on appelle
               $res = Image::upload($_FILES,'blog',$id);
               if(!$res){
                return $this->redirect('admin/posts/edit/'.$id);
               }else{
                //on place l'image dans la table media afin d'en disposer pour les articles
                $this->loadModel('Media');

            /*ici on sauvegarde l'image dans la table media
            il faut aussi ajouter le nom de l'image dans la table blog ou alors l'id de l'image
            prevoir toute les possibilitée 
            on peux ajouter un nom à l'image pour le seo et dans ce cas on utilise pas le slug
            l'ideal serai de sortir cette partie de l'upload du code et dans faire une fonction
             generique à laquelle on pass $_FILE ainsi que le repertoire de destination.
               */ 

               }

            }
            $result = $this->Post->update($id, [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'category_id' => $_POST['category_id']
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