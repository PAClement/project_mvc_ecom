<?php

session_start();

require_once('../controller/mainController.php');
require_once('../controller/authController.php');
require_once('../controller/adminGestionController.php');
require_once('../controller/membreController.php');

try {

  if (isset($_GET['action'])) {

    if ($_GET['action'] == 'userGestion') {
      adminGestionController::userDisplay();
    }

    switch ($_GET['action']) {

      case (($_GET['action'] == "connexion") || ($_GET['action'] == "inscription") || ($_GET['action'] == "deconnect")):
        if ($_GET['action'] == 'connexion') {

          !empty($_POST) ? authController::userConnect($_POST) : authController::userConnect();
        } else if ($_GET['action'] == 'inscription') {

          !empty($_POST) ? authController::userInscription($_POST) : authController::userInscription();
        } else if ($_GET['action'] == 'deconnect') {

          authController::deconnect();
        }
        break;

      case (($_GET['action'] == "mySpace") || ($_GET['action'] == "myAccount") || ($_GET['action'] == "editAccount")):
        if ($_GET['action'] == 'mySpace') {
          membreController::mySpace();
        } else if ($_GET['action'] == 'myAccount') {
          !empty($_POST) ? membreController::myAccount($_POST) : membreController::myAccount();
        }
        break;

      case (($_GET['action'] == 'adminSpace') || ($_GET['action'] == 'adminAccount') || ($_GET['action'] == 'userDisplay')):

        if ($_GET['action'] == 'adminSpace') {

          adminGestionController::adminSpace();
        } else if ($_GET['action'] == 'adminAccount') {

          adminGestionController::adminAccount();
        } else if ($_GET['action'] == "userDisplay") {

          adminGestionController::userDisplay();
        }

        break;

      case 'deleteAccount':
        authController::deleteAccount($_SESSION['user_id']);
        break;
      default:
        throw new Exception('Page not found');
    }
  } else {
    mainController::accueilGo();
  }
} catch (Exception $e) {

  $errorMessage = $e->getMessage();
  var_dump($e->getMessage());
  //error View design error CATCH
  //require('view/errorView.php');
}
