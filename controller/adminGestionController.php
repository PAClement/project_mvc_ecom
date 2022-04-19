<?php
session_start();

require_once("../model/ModelAdmin.php");

class adminGestionController
{
  public static function userDisplay()
  {

    $conn = new ModelAdmin();
    $tab = $conn->getAllUser();

    require('../view/admin/adminGestion.php');
  }
}
