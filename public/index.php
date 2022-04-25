<?php

session_start();

require_once('../controller/mainController.php');
require_once('../controller/authController.php');
require_once('../controller/adminGestionController.php');
require_once('../controller/membreController.php');
require_once('../controller/productController.php');
require_once('../controller/cartController.php');

require_once('../view/classes/addons.php');

?>

<head>
  <link rel="stylesheet" href="../css/style.css">
</head>
<?php

try {

  if (isset($_GET['action'])) {

    switch ($_GET['action']) {

        /**
       * CASE AUTH GLOBAL
       */
      case (($_GET['action'] == "connexion") || ($_GET['action'] == "inscription") || ($_GET['action'] == "deconnect") || ($_GET['action'] == 'forgetPassword') || ($_GET['action'] == "deleteAccount")):

        if ($_GET['action'] == 'connexion') {

          !empty($_POST) ? authController::userConnect($_POST) : authController::userConnect();
        } else if ($_GET['action'] == 'inscription') {

          !empty($_POST) ? authController::userInscription($_POST) : authController::userInscription();
        } else if ($_GET['action'] == 'deconnect') {

          authController::deconnect();
        } else if ($_GET['action'] == 'forgetPassword') {

          if (isset($_POST['getToken'])) {

            authController::forgetPassword($_POST, null);
          } else if (isset($_POST['resetPassword'])) {

            authController::forgetPassword(null, $_POST);
          } else {

            authController::userConnect();
          }
        } else if ($_GET['action'] == 'deleteAccount') {

          authController::deleteAccount($_SESSION['user_id']);
        }
        break;

        /**
         * CASE USER ACCOUNT
         */
      case (($_GET['action'] == "mySpace") || ($_GET['action'] == "myAccount") || ($_GET['action'] == "editAccount")):

        if ($_GET['action'] == 'mySpace') {

          membreController::mySpace();
        } else if ($_GET['action'] == 'myAccount') {

          !empty($_POST) ? membreController::myAccount($_POST) : membreController::myAccount();
        }

        break;

        /**
         * CASE ADMIN GLOBAL
         */
      case (($_GET['action'] == 'adminSpace') || ($_GET['action'] == 'adminAccount') || ($_GET['action'] == 'userGestion') || ($_GET['action'] == 'adminProducts')):

        if ($_GET['action'] == 'adminSpace') {

          adminGestionController::adminSpace();
        } else if ($_GET['action'] == 'adminAccount') {

          adminGestionController::adminAccount();
        } else if ($_GET['action'] == "userGestion") {

          adminGestionController::userDisplay();
        } else if ($_GET['action'] == 'adminProducts') {

          //-------------------------------------
          //Admin Product add, edit, suppression
          //-------------------------------------
          if (!empty($_POST)) {
            if (isset($_POST['addCategorie'])) {

              productController::addCategorie($_POST);
            } else if (isset($_POST['addmarque'])) {

              productController::addMarque($_POST);
            } else if (isset($_POST['addtransporteur'])) {

              productController::addTransporteur($_POST);
            } else if (isset($_POST['addProduit'])) {

              productController::addProduit($_POST);
            } else if (isset($_POST['editElement'])) {

              productController::elementEdit($_POST);
            }
          } else if (isset($_GET['element'])) {

            if (($_GET['element'] == 'product') || ($_GET['element'] == 'category') || ($_GET['element'] == 'marque') || ($_GET['element'] == 'transporteur')) {

              productController::elementSuppr($_GET['element'], $_GET['id']);
            } else {

              productController::productPage();
            }
          } else if (isset($_GET['page'])) {

            productController::productPage($_GET['page']);
          } else {

            productController::productPage();
          }
        }

        break;

        /**
         * CUSTOMER PRODUCT
         * */
      case (($_GET['action'] == 'viewProduct') || ($_GET['action'] == 'addCart') || ($_GET['action'] == 'myCart')):

        if ($_GET['action'] == 'viewProduct') {

          mainController::productView($_GET['id']);
        } else if ($_GET['action'] == 'myCart') {

          cartController::myCart();
        } else if ($_GET['action'] == 'addCart') {

          cartController::addCart($_GET['id']);
        }
        break;
      default:

        mainController::accueilGo();
        break;
    }
  } else {
    mainController::accueilGo();
  }
} catch (Exception $e) {

  $errorMessage = $e->getMessage();
  //error View design error CATCH
  //require('view/errorView.php');
}
