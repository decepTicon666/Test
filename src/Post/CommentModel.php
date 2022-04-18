<?php
namespace App\Post;

use App\Core\AbstractModel;

//Objektmodell mit Attributen, das für den FETCH_CLASS Mode benötigt wird

class CommentModel extends AbstractModel{
  public $id;
  public $content;
  public $post_id;
}
 ?>
