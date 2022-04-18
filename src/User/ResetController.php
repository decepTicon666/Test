<?php

namespace App\User;

use App\Core\AbstractController;

class ResetController extends AbstractController{

  public function __construct(UsersRepository $usersRepository){
    $this->usersRepository = $usersRepository;
  }

  //zeigt die Reset Seite an
  public function showReset(){
    $this->render("user/passwordReset", []);
  }

  public function showChange(){
    $this->render("user/passwordChange", []);
  }
}
?>
