<?php 
class Ebook extends Livro { 
    private $waterMake;
       
    public function getWaterMake() {
        return $this->waterMake;
    }

    public function setWaterMake($waterMake) {
        $this->waterMake = $waterMake;
    }
    
}
?> 