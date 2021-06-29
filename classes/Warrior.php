<?php

class Warrior extends Character
{
    public function turn($target) {
        return $this->attack($target);
    }

    public function attack($target) {
        $target->setHealthPoints($this->damage);
        $status = "$this->name donne un coup d'épée à $target->name ! Il reste " . $target->getHealthPoints() . " points de vie à $target->name !";
        return $status;
    }
}
