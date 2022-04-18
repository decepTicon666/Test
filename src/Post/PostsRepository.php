<?php
namespace App\Post;

use App\Core\AbstractRepository;

//Klasse erbt von Abstract Klasse
class PostsRepository extends AbstractRepository{


  //gibt den Namen der Tabelle aus
  public function getTableName(){
    return "posts";
  }

  //gibt den Namen des Models aus
  public function getModelName(){
    return "App\\Post\\PostModel";
  }
}
 ?>
