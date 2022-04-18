<?php
namespace App\Post;

use App\Core\AbstractModel;

//Objektmodell mit Attributen, das für den FETCH_CLASS Mode benötigt wird
class PostModel extends AbstractModel{
  public $id;
  public $title;
  public $content;
}
 ?>
