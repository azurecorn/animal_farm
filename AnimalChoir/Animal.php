<?php

namespace AnimalChoir;

class Animal{

    private $_name = null;
	private $_voiceloudness = null;
	private $_voice = null;

	public function __construct($name,$voice){
		$this->_name = $name;
		$this->_voice = $voice;
    }

	/*get set name*/
    public function getAnimalName(){
        return $this->_name;
    }

    public function setAnimalName($name){
        $this->_name = $name;
    }
	
	/*get set voice*/
	 public function getAnimalVoice(){
        return $this->_voice;
    }

    public function setAnimalVoice($voice){
        $this->_voice = $voice;
    }

    public function voiceByLoudnessType($loudness){
        switch ($loudness) {
            case 1:
                $this->_voiceloudness = strtolower($this->_voice);
                break;
            case 2:
                $this->_voiceloudness = ucfirst(strtolower($this->_voice));
                break;
            case 3:
                $this->_voiceloudness = strtoupper($this->_voice);
                break;
            default:
                $this->_voiceloudness = new \Exception('error loudness value');
        }
        return $this->_voiceloudness;
    }
}
