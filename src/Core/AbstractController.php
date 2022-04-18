<?php

namespace App\Core;

abstract class AbstractController{

  //protected, weil diese Methode nur im Controller benötigt wird
  /*Pfad und return der Datenbankabfrage wird ausgegeben
    Mit extract werden die Paramter aus der Datenbank ausgegeben des jeweiligen returns*/
  protected function render($view, $params){
    //foreach ($params AS $key => $value) {
    //  ${$key} = $value;
    //}
    extract($params);
    include __DIR__ . "/../../Views/{$view}.php";
  }
}
 ?>
