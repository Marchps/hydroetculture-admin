<?php

namespace Core\Controller;
use Core\Router;
use Core\Dispatcher;

class Controller extends Dispatcher{

    protected $viewPath;
    protected $template;

    protected function render($view, $variables = []){
        ob_start();
        extract($variables);
        require($this->viewPath . str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require($this->viewPath . 'templates/' . $this->template . '.php');
    }

    protected function forbidden(){
        header('HTTP/1.0 403 Forbidden');
        die('Acces interdit');
    }

    protected function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }

    /**
    *Redirect
    **/
    public function redirect($url,$code = null){
        if($code == 301){
            header("HTTP/1.1 301 Moved Permanently");
        }
        header("location: ". $url );
    }

    public function initial($string) {
        $datas = explode(" ", $string);
        $tab ='';
        foreach ($datas as $key => $value) {
             $tab .= Strtoupper(substr($value, 0, 1)).'.';
        }
 
      return substr($tab,0,-1);
    }

   public function slugify($titre){

            $titre = str_replace(chr('160')," ",$titre);
            $slug = str_replace(' ', '-', $titre);
            $value = htmlentities($slug, ENT_NOQUOTES, 'utf-8');
            $value = preg_replace('#\&([A-za-z])(?:acute|cedil|circ|grave|ring|tilde|uml)\;#', '\1', $value);
            $value = preg_replace('#\&([A-za-z]{2})(?:lig)\;#', '\1', $value);
            $value = preg_replace('#\&[^;]+\;#', '', $value);
            $value = preg_replace('/\s/', '', $value);
            $value = preg_replace('/\W+/', '-', $value);
            $value = strtolower(trim($value, '-'));

             return strtolower($value);
}
}