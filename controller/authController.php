<?php

session_start();

require_once("../model/ModelUser.php");
require_once("../view/classes/addons.php");

class authController
{

  public static function userConnect($data = null)
  {
    if ($data) {
      if (isset($data['connexion'])) {
        $res = new ModelUser();
        $info = $res->getUser(htmlspecialchars($data['mail']));
        if ($info) {
          if (password_verify(htmlspecialchars($data['password']), $info['password'])) {

            $_SESSION['user_id'] = $info['id'];
            ViewTemplate::response("success", "Connexion reussi !", "index.php?action=membre");
          } else {
            $error = "Email ou mot de passe incorrect ! ";
            require('../view/auth/formConnexion.php');
          }
        } else {
          $error = "Email ou mot de passe incorrect ! ";
          require('../view/auth/formConnexion.php');
        }
      } else {
        require('../view/accueil.php');
      }
    } else {

      require('../view/auth/formConnexion.php');
    }
  }

  public static function userInscription($data = null)
  {
    function formCheck(array $data): bool
    {
      $isOk = true;

      foreach ($data as $key => $value) {
        $value = htmlspecialchars($value);

        switch ($key) {
          case 'mail':
            $value = filter_var($value, FILTER_SANITIZE_EMAIL);
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
              $isOk = false;
            }
            break;
          case 'password':
            if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$/", $value) == 1) {
              $isOk = false;
            }
            break;
          case 'tel':
            if (!preg_match("/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/", $value) == 1) {
              $isOk = false;
            }
            break;
        }
      }

      return $isOk;
    }

    if ($data) {
      $sign = new ModelUser();
      if (isset($data["inscription"])) {
        if (!$sign->getUser($data['mail'])) {
          if (formCheck($data)) {

            $data = array_map(function ($a) {
              return htmlspecialchars($a);
            }, $data);

            do {
              $token = mt_rand();
            } while ($token == $sign->tokenVerif($token));

            array_push($data, $data['token'] = $token);
            array_push($data, $data['date_inscription'] = date("Y-m-d"));
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if ($sign->signUp($data)) {
              $tab = $sign->getUser($data['mail']);
              $_SESSION['user_id'] = $tab['id'];
              ViewTemplate::response("success", "Vous êtes inscrit !", "index.php?action=membre");
            } else {
              $error = "Une erreur est survenue ! ";
              require('../view/auth/formInscription.php');
            }
          } else {
            $error = "Il y'a un problème dans le formulaire ! ";
            require('../view/auth/formInscription.php');
          }
        } else {
          $error = "Compte déjà existant ! ";
          require('../view/auth/formInscription.php');
        }
      } else {
        require('../view/auth/formInscription.php');
      }
    } else {

      require('../view/auth/formInscription.php');
    }
  }

  public static function membre()
  {
    if (isset($_SESSION['user_id'])) {

      $conn = new ModelUser();
      $info = $conn->getUserInfo($_SESSION['user_id']);

      require('../view/auth/membre.php');
    } else {
      require('../view/accueil.php');
    }
  }

  public static function deconnect()
  {
    session_unset();
    session_destroy();

    ViewTemplate::response("danger", "Deconnexion reussi ! A bientôt !", "index.php?action=membre");
  }
}
