<?php

namespace App\User;

class LoginService {

  public function __construct(UsersRepository $usersRepository){
    $this->usersRepository = $usersRepository;
  }

  //Validierungsfunktion
  public function attempt($username, $password){
    //Usersuche
    $user = $this->usersRepository->findByUsername($username);

    //Validierung der UserDaten
    if (empty($user)){
      return false;
    }
    if (password_verify($password, $user->password)){
      $_SESSION['login'] = $user->username;
      //stellt sicher, dass nur noch der User die SessionID besitzt
      session_regenerate_id(true);
      return true;
    }
    else{
      return false;
    }
  }

  //Ausloggen des Users
  public function logout(){
    unset($_SESSION['login']);
    session_regenerate_id(true);
    echo "Sie wurden ausgeloggt";
  }

  public function check(){
    if (isset($_SESSION['login'])){

      echo "<br /> Nutzer ist eingelogt";
    }
    else {
      //Im Falle nicht eingeloggt verweis auf login view
      header("location: login");
    }
  }
}
?>
