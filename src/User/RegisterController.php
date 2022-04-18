<?php

namespace App\User;

use App\Core\AbstractController;

class RegisterController extends AbstractController{

  public function __construct(UsersRepository $usersRepository){
    $this->usersRepository = $usersRepository;
  }

  //zeigt die Registrierseite an
  public function show(){
    $this->render("user/register", []);
  }

  public function attemptRegister($password, $passwordRepeat){

    //Validierung der Passwörter
    if ($password == $passwordRepeat){
      return true;
    }
    else{
      return false;
    }
  }

  //User einloggen
  public function register(){
    $error = false;
    if (!empty($_POST['username'])
    AND !empty($_POST['password'])
    AND !empty($_POST['passwordRepeat'])
    AND !empty($_POST['street'])
    AND !empty($_POST['adress'])
    AND !empty($_POST['zipCode'])
    AND !empty($_POST['city'])
    AND !empty($_POST['country'])
    AND !empty($_POST['phone'])){
      $username = $_POST['username'];
      $password = $_POST['password'];
      $passwordRepeat = $_POST['passwordRepeat'];
      $street = $_POST['street'];
      $adress = $_POST['adress'];
      $zipCode = $_POST['zipCode'];
      $city = $_POST['city'];
      $country = $_POST['country'];
      $phone = $_POST['phone'];

      $user = $this->usersRepository();
      var_dump($user);
      //Authentifizierung
      if ($this->usersRepository->attemptRegister($username, $usernameRepeat)){

        $this->usersRepository->insertUser($username, $password, $surname, $lastname, $street, $adress, $zipCode, $city, $country, $phone);
        //damit wird hinter dem letzten / der string ersetzt
        //Es folgt die Route /dashboard
        header("Location: dashboard");
        return;
      }
    }
    else{
      $error = "Registrierung nicht erfolgreich";
    }
    //$this->render("user/register", ['error' => $error]);
  }
}
?>
