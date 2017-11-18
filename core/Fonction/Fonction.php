<?php

namespace Core\Fonction;

class Fonction {

public function dateDiff($date1, $date2){
    $diff = abs($date1 - $date2); // abs pour avoir la valeur absolute, ainsi éviter d'avoir une différence négative
    $retour = array();
 
    $tmp = $diff;
    $retour['second'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['second']) /60 );
    $retour['minute'] = $tmp % 60;
 
    $tmp = floor( ($tmp - $retour['minute'])/60 );
    $retour['hour'] = $tmp % 24;
 
    $tmp = floor( ($tmp - $retour['hour'])  /24 );
    $retour['day'] = $tmp;
 
    return $retour;
}
   
    static function initial($string) {
        $datas = explode(" ", $string);
        $tab ='';
        foreach ($datas as $key => $value) {
             $tab .= Strtoupper(substr($value, 0, 1)).'.';
        }
 
      return substr($tab,0,-1);
    }

   public function slugify($titre){

            $titre = str_replace(chr('160')," ",$titre);
            $slug =  str_replace(' ', '-', $titre);
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