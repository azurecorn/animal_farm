<?php

namespace AnimalChoir;

class ChoirSimulator implements ChoirSimulatorInterface{
    private $_choir = [];
    private $_singergroups = [];
    private $_songcontent = [];

    public function __construct(Choir $choir){
        $voiceloudness = $this->getChoirLoudness($choir);
        sort($voiceloudness);

        foreach($voiceloudness as $vl){
            $this->_singergroups += $choir->getGroupsWithLoudness($vl);
        }
    }

    public function crescendo(){
        $loudnessgroups = $this->makeGroupsBySameLoudnessLevel();
        $res = [];
        $i = 0;

        foreach($loudnessgroups as $key => $group){
            $i++;
            foreach($group as $animalvoice){
                $res[$i][] = $animalvoice;
            }

            if($i == 1)
                continue;
            else{
                foreach($res[$i-1] as $previousvoices){
                    $res[$i][] = $previousvoices;
                }
            }
            shuffle($res[$i]);
        }

        $this->_songcontent[] = $res;
    }

    public function arpeggio(){
        $loudnessgroups = $this->makeGroupsBySameLoudnessLevel();
        $res = [];
        $i = 0;

        foreach($loudnessgroups as $key => $group){
            $i++;
            foreach($group as $animalvoice){
                $res[$i][] = $animalvoice;
            }
            shuffle($res[$i]);
        }

        $this->_songcontent[] = $res;
    }

    public function sing(){
        $res = "";

        if(!empty($this->_songcontent)){
            foreach($this->_songcontent as $songpart){
                foreach($songpart as $ar){
                    $res .= (implode(',',$ar))."\n";
                }
                $res.="\n";
            }

            CSVexport::createCsv($res);
        }
    }

    public function getChoirLoudness(Choir $choir){
        $groups = $choir->getAllGroupsInChoir();
        $voiceloudness = [];

        foreach($groups as $key => $group){
            $voiceloudness[] = $group->getLoudness();
        }

        $voiceloudness = array_unique($voiceloudness);

        return $voiceloudness;
    }

    public function makeGroupsBySameLoudnessLevel(){
        $res =[];

        foreach($this->_singergroups as $loudnessgroup){
            foreach($loudnessgroup as $group){
                $loudness = $group->getLoudness();
                $animalsingroup = $group->getAnimalsInGroup();
                foreach($animalsingroup as $animal){
                    $res["loudness{$loudness}"][] = $animal->voiceByLoudnessType($loudness);
                }
            }
        }

        return $res;
    }
}