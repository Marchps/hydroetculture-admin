<?php
namespace App\Entity;

use Core\Entity\Entity;

class MediaEntity extends Entity{

    public function getUrl(){
        return BASE_URL.DS.'medias'.DS.'show'.DS . $this->id;
    }
    


}