<?php

/**
*@author Milan Nikolic linkedin.com/in/milan1nikolic
*/

use AnimalChoir\AnimalGroup;
use AnimalChoir\Animal;
use AnimalChoir\Choir;
use AnimalChoir\ChoirSimulator;

//autoload
function autoloadClasses($className) {
    $file = str_replace('\\',DIRECTORY_SEPARATOR,$className);
    include "{$file}.php";
}

spl_autoload_register("autoloadClasses");

#register groups with loudness parameter
$animalgroup1 = new AnimalGroup(1);
$animalgroup2 = new AnimalGroup(2);
$animalgroup3 = new AnimalGroup(3);
$animalgroup4 = new AnimalGroup(2);

#make animals
$animal_cow = new Animal("cow","muuuu");
$animal_cat = new Animal("cat","miaauuu");
$animal_pig = new Animal("Pig","Oink");
$animal_duck = new Animal("Duck" ,"Quack");

#add animals to group 1
$animalgroup1->addAnimal($animal_cow);
$animalgroup1->addAnimal($animal_pig);

#add animals to group 2
$animalgroup2->addAnimal($animal_cow);
$animalgroup2->addAnimal($animal_cow);
$animalgroup2->addAnimal($animal_pig);
$animalgroup2->addAnimal($animal_cat);
$animalgroup2->addAnimal($animal_cat);
$animalgroup2->addAnimal($animal_cat);

#add animals to group 3
$animalgroup3->addAnimal($animal_cow);
$animalgroup3->addAnimal($animal_cat);
$animalgroup3->addAnimal($animal_duck);

#add animals to group 4
$animalgroup4->addAnimal($animal_duck);
$animalgroup4->addAnimal($animal_pig);
$animalgroup4->addAnimal($animal_cat);
#test animal removal from group
$animalgroup4->removeAnimal($animal_cat);

#register a choir
$choir = new Choir();

#add groups to our choir
$choir->addGroupToChoir($animalgroup1);
$choir->addGroupToChoir($animalgroup2);
$choir->addGroupToChoir($animalgroup3);
$choir->addGroupToChoir($animalgroup4);

#register a choir simulator with our choir
$simulator = new ChoirSimulator($choir);

#set a simulator song
$simulator->crescendo();
$simulator->crescendo();
$simulator->crescendo();
$simulator->arpeggio();
$simulator->crescendo();
$simulator->arpeggio();
$simulator->arpeggio();

#and action time!
$simulator->sing();

