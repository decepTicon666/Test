<?php
namespace App\Post;


use PDO;

//Ich sage dem Konstruktor, dass er die Klasse PDO nutzen soll, da sie nicht im Namespace Post ist
use App\Core\AbstractRepository;

//Repository erbt getTableName und getModelName von der abstrakten Klasse
class CommentsRepository extends AbstractRepository{


  //gibt den Namen der Tabelle aus
  public function getTableName(){
    return "comments";
  }

  //gibt den Namen des Models aus
  public function getModelName(){
    return "App\\Post\\CommentModel";
  }

  //2 spezifische Funktionen, die nur auf die Comments zutreffen müssen in die Repository rein
  //Abfragen aller Comments zu Post ID
  public function allByPost($id){
    $table = $this->getTableName();
    $model = $this->getModelName();
    $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE post_id = :id");
    $stmt->execute(['id' => $id]);
    $comments = $stmt->fetchAll(PDO::FETCH_CLASS, $model);
    return $comments;
  }

  //Speichern von Comments
  public function insertForPost($postId, $content)
  {
    $table = $this->getTableName();
    $stmt =$this->pdo->prepare("INSERT INTO `$table` (`content`, `post_id`) VALUES (:content, :postID)");
    $stmt->execute([
      'content' => $content,
      'postID' => $postId]);
  }
}
 ?>
