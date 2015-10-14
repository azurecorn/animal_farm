#animal_farm
#Animal Choir simulator

Namespace AnimalChoir

Classes and description:
    * Animal - entity with it's properties like animal name, voice.
    * AnimalGroup - container for animals. It has loudness property, which is a constructor argument. You can add or remove animals from group.
    * Choir - container for groups. You can add groups and retrieve them.
    * ChoirSimulatorInterface - interface which has two methods for implementation, crescendo and arpeggio.
    * ChoirSimulator - class with main logic, implements a ChoirSimulatorInterface interface.
        It sets an animal groups into a groups with the same loudness property.
        It has a methods crescendo and arpeggio which sets the singing style and method sing for singing.
        Animal voices are randomly represented.
    * CSVexport - a class with one static method createCsv which generate a song file and prints a link to the file on the screen.

execute.php file is an example of using this classes.



