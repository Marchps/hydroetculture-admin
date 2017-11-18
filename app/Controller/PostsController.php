<?php

namespace App\Controller;

use Core\Controller\Controller;


class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');

    }

    public function ajaxindex(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $this->render('posts.ajaxindex', compact('posts', 'categories'));
    }

    public function ajaxSearchCat($id){
        $articles = $this->Post->lastByCategory($id);
        $this->render('posts.ajaxshow', compact('articles'));
    }

    public function ajaxSearchCategorie(){
        $id = $_POST['id'];
        $articles = $this->Post->lastByCategory($id);
        $this->render('posts.ajaxshow', compact('articles'));
    }

    public function category($id){
        $categorie = $this->Category->find($id);
        if($categorie === false){
            $this->notFound();
        }
        $articles = $this->Post->lastByCategory($id);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('articles', 'categories', 'categorie'));
    }

    public function show($id){
        $article = $this->Post->findWithCategory($id);
        $this->render('posts.show', compact('article'));
    }

}