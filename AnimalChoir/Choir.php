<?php

/**
 *@author Milan Nikolic linkedin.com/in/milan1nikolic
 */

namespace AnimalChoir;

class Choir{
    private $_choir = array();

    public function addGroupToChoir(AnimalGroup $group){
        $this->_choir[] = $group;
    }

    public function getAllGroupsInChoir(){
        return $this->_choir;
    }

    public function getGroupsWithLoudness($loudness){
        $result = [];

        foreach($this->_choir as $group){
            if ($group->getLoudness() == $loudness){
                $result["loudness{$loudness}"][] = $group;
            }
        }
        return $result;
    }
}