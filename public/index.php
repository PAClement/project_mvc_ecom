<?php
require_once('../controller/mainController.php');
require_once('../controller/authController.php');
require_once('../controller/adminGestionController.php');

try {

  if (isset($_GET['action'])) {

    if ($_GET['action'] == 'connexion') {
      if (!empty($_POST)) {

        authController::userConnect($_POST);
      } else {

        authController::userConnect();
      }
    }
    if ($_GET['action'] == 'inscription') {
      if (!empty($_POST)) {
        authController::userInscription($_POST);
      } else {
        authController::userInscription();
      }
    }
    if ($_GET['action'] == 'membre') {
      authController::membre();
    }
    if ($_GET['action'] == 'deconnect') {
      authController::deconnect();
    }
    if ($_GET['action'] == 'userGestion') {
      adminGestionController::userDisplay();
    }
  } else {
    mainController::accueilGo();
  }
} catch (Exception $e) {

  $errorMessage = $e->getMessage();

  //error View design error CATCH
  //require('view/errorView.php');
}
