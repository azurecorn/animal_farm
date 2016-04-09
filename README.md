##TASK Animal Choir simulator
this is some past job interview task

 * Create an Animal Choir simulator (rs_SR: Simulator životinjskog hora)
 *
 * The task constraints are:
 *
 * There must be 3 different choir member animals
 * (i.e. dogs, cats, mice)
 *
 * Every animal must have a sing method that returns a string representation of a voice
 * (i.e. 'bark', 'meow', 'squeak')
 *
 * Every animal must have a loudness property which can have 3 settings,
 * depending on which the sing method result will be rendered as
 * lowercase, first letter uppercase and uppercase.
 *
 * Singer groups are groups of animals with the same loudness property value.
 * Singer group song is represented with a CSV of the group singer sing result in random order.
 *
 * The choir simulator must have implement the following methods:
    * crescendo - the choir start singing from the least loud singer group, and then are being joined by more and more loud singer groups until they are singing all together. The joining is represented with a new line.
        * Example:
            * meow, squeak, bark
            * Meow, bark, squeak, Bark, meow
            * bark, Meow, MEOW, squeak, BARK, meow, Bark

    * arpeggio  - the choir singer groups of the same loudness start singing one by one from the least loud to the loudest
        * Example:
            * meow, squeak, bark
            * Meow, Bark
            * MEOW, BARK

##THE CODE

Namespace AnimalChoir

Classes and description:
* Animal - entity with it's properties like animal name, voice.
* AnimalGroup - container for animals. It has loudness property, which is a constructor argument. You can add or remove animals from group.
* Choir - container for groups. You can add groups and retrieve them.
* ChoirSimulatorInterface - interface which has two methods for implementation, crescendo and arpeggio.
* ChoirSimulator - class with main logic, implements a ChoirSimulatorInterface interface.
   * It sets an animal groups into a groups with the same loudness property.
   * It has a methods crescendo and arpeggio which sets the singing style and method sing for singing.
   *Animal voices are randomly represented.
* CSVexport - a class with one static method createCsv which generate a song file and prints a link to the file on the screen.

File __execute.php__ file is an example of using this classes.



