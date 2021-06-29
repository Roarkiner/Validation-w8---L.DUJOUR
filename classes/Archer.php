<?php

class Archer extends Character{
    private $arrowDamage = 15;
    private $nbrOfArrows = 4;
    private $multiShotPrep = false;
    private $weakPointShotPrep = false;

    public function __construct($name) {
        parent::__construct($name);
        $this->damage = 7;
    }

    public function turn($target){
        if( $this->multiShotPrep ){
            $status = $this->shootMultiShot($target);
        } elseif ( $this->weakPointShotPrep ) {
            $status = $this->shootWeakPointShot($target);
        } else {
            $rand = rand(1, 10);
            if( $this->nbrOfArrows === 0 ){
                $status = $this->attack($target);
            } else if( $rand < 3 && $this->nbrOfArrows > 1 ) {
                $status = $this->chargeMultiShot();
            } else if( $rand > 2 && $rand < 6 ){
                $status = $this->chargeWeakPointShot();
            } else {
                $status = $this->simpleShot($target);
            }
        }
        return $status;
    }

    public function simpleShot($target){
        $target->setHealthPoints($this->arrowDamage);
        $this->nbrOfArrows -= 1;
        $status = "$this->name tire une flèche sur $target->name ! Il reste " . $target->getHealthPoints() . " points de vie à $target->name ! Il reste $this->nbrOfArrows flèches à $this->name.";
        return $status;
    }

    public function chargeMultiShot(){
        $this->multiShotPrep = true;
        $status = "$this->name prend deux flèches de son carquois et commence à les mettre sur la corde de son arc...";
        return $status;
    }

    public function shootMultiShot($target){
        $target->setHealthPoints($this->arrowDamage);
        $target->setHealthPoints($this->arrowDamage);
        $this->nbrOfArrows -= 2;
        $this->multiShotPrep = false;
        $status = "$this->name tire deux flèches sur $target->name ! Il reste " . $target->getHealthPoints() . " points de vie à $target->name ! Il reste $this->nbrOfArrows flèches à $this->name.";
        return $status;
    }

    public function chargeWeakPointShot(){
        $this->weakPointShotPrep = true;
        $status = "$this->name vise avec précision...";
        return $status;
    }

    public function shootWeakPointShot($target){
        $damageMultiplicator = rand(3, 6) / 2;
        $target->setHealthPoints($this->arrowDamage * $damageMultiplicator);
        $this->nbrOfArrows -= 1;
        $this->weakPointShotPrep = false;
        $status = "$this->name tire une flèche directement à la tête de $target->name ! Il reste " . $target->getHealthPoints() . " points de vie à $target->name ! Il reste $this->nbrOfArrows flèches à $this->name.";
        return $status;
    }

    public function attack($target){
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup de dague à $target->name ! Il reste " . $target->getHealthPoints() . " points de vie à $target->name !";
        return $status;
    }
}