<?php
require_once("../model/ModelAdmin.php");

class adminGestionController
{

  //Access to admin space
  public static function adminSpace()
  {

    if (isset($_SESSION['user_id'])) {

      $conn = new ModelUser();
      $infoAdmin = $conn->getUserById($_SESSION['user_id']);
      if ($infoAdmin['role_id'] == 1) {

        require('../view/admin/adminSpace.php');
      } else {

        header('Location: index.php');
      }
    } else {
      header('Location: index.php');
    }
  }

  //Access to admin detail account on ADMIN SPACE
  public static function adminAccount()
  {
    if (isset($_SESSION['user_id'])) {

      $conn = new ModelUser();
      $infoAdmin = $conn->getUserById($_SESSION['user_id']);
      if ($infoAdmin['role_id'] == 1) {

        require('../view/admin/adminAccount.php');
      } else {

        header('Location: index.php');
      }
    } else {
      header('Location: index.php');
    }
  }

  //list of users on database
  public static function userDisplay()
  {

    $conn = new ModelAdmin();
    $tab = $conn->getAllUser();

    require('../view/admin/adminGestion.php');
  }
}
