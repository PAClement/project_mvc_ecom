<?php
session_start();

class mainController
{

  public static function accueilGo()
  {

    require('../view/accueil.php');
  }
}
