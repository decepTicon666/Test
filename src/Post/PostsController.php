<?php

namespace App\Post;

use App\Core\AbstractController;

class PostsController extends AbstractController{

  public function __construct(PostsRepository $postsRepository,
CommentsRepository $commentsRepository){
    $this->postsRepository = $postsRepository;
    $this->commentsRepository = $commentsRepository;
  }
  //Ausgabe aller Posts
  public function index(){
    $posts = $this->postsRepository->all();
    $this->render("post/index", [
      'posts' => $posts
    ]);
  }

  //Ausgabe eines einzelnen Posts inkl der Kommentare
  public function show($id){
    $id = $_GET["id"];

    if (isset($_POST['content'])){
      $content = $_POST['content'];
      $this->commentsRepository->insertForPost($id, $content);
    }
    $post = $this->postsRepository->find($id);
    $comments = $this->commentsRepository->allByPost($id);
    //Über die Arrayschreibweise kann die Datenbankabfrage übergeben werden
    $this->render("post/postView", [
      'post' => $post,
      'comments' => $comments
    ]);
  }
}
?>
