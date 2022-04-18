<?php
namespace App\User;

use App\Core\AbstractRepository;
use PDO;

//Klasse erbt von Abstract Klasse
class UsersRepository extends AbstractRepository{


  //gibt den Namen der Tabelle aus
  public function getTableName(){
    return "users";
  }

  //gibt den Namen des Models aus
  public function getModelName(){
    return "App\\User\\UsersModel";
  }

  //sucht nach bestimmten User
  public function findByUsername($username){
    $table = $this->getTableName();
    $model = $this->getModelName();
    $stmt = $this->pdo->prepare("SELECT * FROM `$table` WHERE username= :username");
    $stmt->execute(['username' => $username]);
    $stmt->setFetchMode(PDO::FETCH_CLASS, $model);
    $user = $stmt->fetch(PDO::FETCH_CLASS);
    return $user;
  }

  //Speichern von User
  public function insertUser($username, $password, $surname, $lastname, $street, $number, $adress, $zipCode, $city, $country, $phone, $email){
    $table = $this->getTableName();
    $registerDate = date();
    $stmt =$this->pdo->prepare("INSERT INTO `$table` (`username`, `password`, `surname`, `lastname`, `street`, `number`, `address`, `zipCode`, `city`, `country`, `phone`, `registerDate`)
    VALUES (:username, :password, :surname, :lastname, :street, :number, :adress, :zipCode, :city, :country, :phone, :email, :registerDate)");
    $stmt->execute([
      'username' => $username,
      'password' => $password,
      'surname' => $surname,
      'lastname' => $lastname,
      'street' => $street,
      'number' => $number,
      'adress' => $address,
      'zipCode' => $zipCode,
      'city' => $city,
      'country' => $country,
      'phone' => $phone,
      'email' => $email,
      'registerDate' => $registerDate]);
    }
  }
  ?>
