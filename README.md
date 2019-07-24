# RockPaperScisor

RockPaperScisor is simple Lib which plays Rock, Paper and Scisor game. 

## Installation

Include `Game.php` file in your project and call ``new Game()`` instance in the code. 

You can provide a argument when calling Game instance to change the difficulty of the game. 

## Usage
### User input
     0 = Rock
     1 = Scisor
     2 = Paper

### Just a library.
```php
require_once('Game.php');
use Lib\Game;

$game = new Game();  //defaults to difficulty = 2;
$game = new Game(5); //sets difficulty to 5
$game->startGame(0); //Starts the game with user input of 0
```

### With a composer;
Inside the library directory. 

```bash
composer install
```

```php
require_once('autoload.php');
use Lib\Game;

$game = new Game(); //defaults to difficulty = 2;
$game->startGame(0); //Starts the game with user input of 0
```

### Testing
The library comes with set of test. 
To invoke the test just run the correct code located in the `tests` directory. Make sure that the composer files has been installed.

```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/GameTest.php
```

### More Examples
More examples can be found in the `app.php` file. 

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.