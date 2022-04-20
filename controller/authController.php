<?php


require_once("../model/ModelUser.php");
require_once("../view/classes/addons.php");

class authController
{

  //connection module
  public static function userConnect($data = null)
  {
    if ($data) {
      if (isset($data['connexion'])) {
        $res = new ModelUser();
        $info = $res->getUser(htmlspecialchars($data['mail']));
        if ($info) {
          if (password_verify(htmlspecialchars($data['password']), $info['password'])) {

            $_SESSION['user_id'] = $info['id'];
            ViewTemplate::response("success", "Connexion reussi !", "index.php");
          } else {
            $error = "Email ou mot de passe incorrect ! ";
            require('../view/auth/formConnexion.php');
          }
        } else {
          $error = "Email ou mot de passe incorrect ! ";
          require('../view/auth/formConnexion.php');
        }
      } else {
        $error = "";

        require('../view/accueil.php');
      }
    } else {
      $error = "";
      require('../view/auth/formConnexion.php');
    }
  }

  //inscription module
  public static function userInscription($data = null)
  {
    //check if informations on formulaire are conform
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
            } while ($token == $sign->tokenVerif($token, null));

            array_push($data, $data['token'] = $token);
            array_push($data, $data['date_inscription'] = date("Y-m-d"));
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            if ($sign->signUp($data)) {
              $tab = $sign->getUser($data['mail']);
              $_SESSION['user_id'] = $tab['id'];
              ViewTemplate::response("success", "Vous êtes inscrit !", "index.php");
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

        $error = "";
        require('../view/auth/formInscription.php');
      }
    } else {

      $error = "";
      require('../view/auth/formInscription.php');
    }
  }

  //module deconnection
  public static function deconnect()
  {
    session_unset();
    session_destroy();

    ViewTemplate::response("danger", "Deconnexion reussi ! A bientôt !", "index.php");
  }

  //module suppression account
  public static function deleteAccount($user_id)
  {

    if (isset($_SESSION['user_id'])) {
      $conn = new ModelUser();
      $res = $conn->deleteAccount($user_id);

      if ($res != null) {
        ViewTemplate::response("warning", "Impossible de supprimer votre compte pour le moment !", "index.php?action=mySpace");
      } else {
        session_unset();
        session_destroy();
        ViewTemplate::response("danger", "Votre compte à bien été supprimé ! Merci d'avoir utilisé notre service !", "index.php?action=inscription");
      }
    }
  }

  //module if user forget password [NOT INCLUDE ON PROJECT NOW]
  public static function forgetPassword($forgetData = null, $newPassword = null)
  {

    function passCheck(array $data): bool
    {
      $isOk = true;
      if ($data['changePassword']) {

        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$/", $data['changePassword']) == 1) {
          $isOk = false;
        }
      }

      return $isOk;
    }

    if ($forgetData) {

      $sign = new ModelUser();
      if ($sign->getUser($forgetData['mail'])) {

        $yourToken = $sign->tokenVerif(null, $forgetData['mail']);

        $token = $yourToken['token'];
        $forgetError = "";
        $formNewPassword = true;
        require('../view/auth/forgetPassword.php');
      } else {

        $token = "";
        $formNewPassword = false;
        $forgetError = $forgetData['mail'] . " n'est pas enregistrer dans notre base de données";
        require('../view/auth/forgetPassword.php');
      }
    } else if ($newPassword) {

      if (passCheck($newPassword)) {

        var_dump($newPassword);
        $newPassword['changePassword'] = password_hash($newPassword['changePassword'], PASSWORD_DEFAULT);
        var_dump($newPassword);
      } else {

        $newError = "Votre nouveau mot de passe n'est pas conforme";
        $forgetError = "";
        $token = $yourToken['token'];
        $formNewPassword = true;
        require('../view/auth/forgetPassword.php');
      }
    } else {

      $token = "";
      $forgetError = "";
      $formNewPassword = false;
      require('../view/auth/forgetPassword.php');
    }
  }
}
