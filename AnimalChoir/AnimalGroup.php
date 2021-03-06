<?php

/**
 *@author Milan Nikolic linkedin.com/in/milan1nikolic
 */

namespace AnimalChoir;

class AnimalGroup{

    private $_loudness = null;
    private $_group = array();

    public function __construct($loudness){
        if  ($loudness >= 1 && $loudness <= 3)
            $this->_loudness = $loudness;
    }

    public function addAnimal(Animal $animal){
        $animal->voiceByLoudnessType($this->_loudness);
        $this->_group[] = $animal;
    }

    public function removeAnimal(Animal $animal){
        foreach($this->_group as $key => $current){
            if ($current->getAnimalName() == $animal->getAnimalName()){
                unset($this->_group[$key]);
            }
        }
    }

    public function getLoudness(){
        return $this->_loudness;
    }

    public function getAnimalsInGroup(){
        return $this->_group;
    }

    public function setLoudness($loudness){
        if  ($loudness >= 1 && $loudness <= 3)
            $this->_loudness = $loudness;
    }
}