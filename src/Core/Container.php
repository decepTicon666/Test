<?php
/*Im Core werden alle Objekte aller Klassen erzeugt.
  Ziel ist es wenn irgendwo ein Attribut oder eine Variable hinzugefügt werden muss,
  müssen dann nicht viele dateien angepasst werden sondern nur die hier.
  Besonders wichtig ist es, wenn man dauernd $pdo übergeben muss an neue objektinstanz,
  sobald eine zweite Variable dazuübergeben muss, muss man alle Dateien, wo objektinstanzen erstellt werden,
  geändert werden.
  Mit dieser Schreibweise muss es nur hier geändert werden, weil dann im code nichts mehr übergeben muss.*/
namespace App\Core;

//sonst kein Zugriff auf die Instanz PDO
use PDO;
use Exception;
use PDOException;

//sonst kein Zugriff da nicht im Namespace
use App\Post\Postsrepository;
use App\Post\CommentsRepository;
use App\User\UsersRepository;
use App\User\LoginController;
use App\Post\PostsController;
use App\User\LoginService;
use App\User\RegisterController;
use App\User\ResetController;


//Erstellen der Objekte aller Klassen
class Container{
  private $instances = [];
  private $receipts = [];

//Rezeptesammlung für jede Art eines Objekts
  public function __construct(){
    $this->receipts = [
      'postsController' => function() {
        return new PostsController(
          $this->make('postsRepository'),
          $this->make('commentsRepository')
        );
      },
      'loginController' => function() {
        return new LoginController(
          $this->make('loginService')
        );
      },
      'loginService' => function() {
        return new LoginService(
          $this->make('usersRepository')
        );
      },
      'registerController' => function() {
        return new RegisterController(
          $this->make('usersRepository')
        );
      },
      'resetController' => function() {
        return new ResetController(
          $this->make('usersRepository')
        );
      },
      'postsRepository' => function() {
        return new PostsRepository(
          $this->make("pdo")
        );
      },
      'commentsRepository' => function() {
        return new CommentsRepository(
          $this->make("pdo")
        );
      },
      'usersRepository' => function() {
        return new UsersRepository(
          $this->make("pdo")
        );
      },
      //Datenbankverbindung wird nur einmal erstellt und kann mehrmal abgerufen werden durch $instances
      'pdo' => function() {
        try{
          $pdo = new PDO('mysql:host=localhost;dbname=BLOG', 'test', 'test');
          $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }
        catch (PDOException $e){
          echo "Verbindung zur Datenbank fehlgeschlagen";
        }
          return $pdo;
      }
    ];
  }

//Erstellung aller objekte mit der Funtkion make und Übergabe von Strings
//Die Instanz wird nur einmal erstellt und kann mehrmals abgerufen werden
  public function make($name){
    if (!empty($this->instances[$name])){
      return $this->instances[$name];
    }
    if (isset($this->receipts[$name])){
      $this->instances[$name] = $this->receipts[$name]();
    }
    // ERZEUGE: $this->instances[$name];

    return $this->instances[$name];
  }
/*
  private $pdo;
  private $postsRepository;

//Erstellen der Datenverbindung
  public function getPdo(){
    //prüft, ob eine Datenverbindung steht, um eine weitere Instanz zu verhindern, sollten 2 gleiche Instanzen einer Klasse erfolgen
    if (!empty($this->pdo)){
      return $this->pdo;
    }
    $this->pdo = new PDO('mysql:host=localhost;dbname=BLOG', 'test', 'test');
    $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $this->pdo;
  }

  public function getPostsRepository(){
    if (!empty($this->postsRepository)){
      return $this->postsRepository;
    }
    //Übergabe der Datenbankverbindung und Ausgabe des Objektes PostsRepository, das dann im Objekt der Klasse Container hinterlegt wird
    $this->postsRepository = new PostsRepository($this->getPdo());

    return $this->postsRepository;
  }*/
}
 ?>
