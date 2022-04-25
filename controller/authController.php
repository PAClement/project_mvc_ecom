<?php


require_once("../model/ModelUser.php");
require_once("../view/classes/addons.php");

class authController
{

  //connection module
  public static function userConnect($data = null)
  {
    if (!isset($_SESSION['user_id'])) {
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
    } else {

      header('Location: index.php');
    }
  }

  //inscription module
  public static function userInscription($data = null)
  {
    //check if informations on formulaire are conform
    function formCheck(array $data)
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

    if (!isset($_SESSION['user_id'])) {
      if ($data) {

        $sign = new ModelUser();
        if (isset($data["inscription"])) {
          if (!$sign->getUser($data['mail'])) {
            if (formCheck($data)) {

              $data = array_map(function ($a) {
                return htmlspecialchars($a);
              }, $data);

              do {
                //generation token et verification si le token existe deja
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
    } else {

      header('Location: index.php');
    }
  }

  //module deconnection
  public static function deconnect()
  {
    if (isset($_SESSION['user_id'])) {

      session_unset();
      session_destroy();

      ViewTemplate::response("danger", "Deconnexion reussi ! A bientôt !", "index.php");
    } else {

      header('Location: index.php');
    }
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
    } else {

      header('Location: index.php');
    }
  }

  public static function forgetPassword($email = null, $password = null)
  {

    function passCheck(array $data)
    {
      $isOk = true;
      if ($data['newPassword']) {

        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,})$/", $data['newPassword']) == 1) {
          $isOk = false;
        }
      }

      return $isOk;
    }

    $conn = new ModelUser();

    // Verification de le provenance des données 
    if ($email) {

      //Verification si le compte existe ou non, si oui recuperation du token et de l'email

      $user = $conn->getUser($email['mail']);
      if ($user) {

        $email = $user['mail'];
        $token = $user['token'];
        require('../view/auth/forgetPassword.php');
      } else {

        ViewTemplate::response("danger", $email['mail'] . " n'existe pas !", "index.php?action=connexion");
      }
    } else if ($password) {

      //Check si le password est conforme et si le token de la base et du formulaire sont identique puis generation du nouveau token

      $user = $conn->getUser($password['mail']);

      if (passCheck($password)) {

        if ($user['token'] == $password['token']) {
          $password['newPassword'] = htmlspecialchars($password['newPassword']);
          $token = htmlspecialchars($token);

          do {
            $token = mt_rand();
          } while ($token == $conn->tokenVerif($token, null));

          $newPass = password_hash($password['newPassword'], PASSWORD_DEFAULT);

          if ($conn->passUpdate($newPass, $password['mail'], $token)) {

            ViewTemplate::response("success", "Votre nouveau mot de passe à bien été modifié", "index.php?action=connexion");
          } else {

            ViewTemplate::response("danger", "Un problème est survenue", "index.php?action=connexion");
          }
        } else {

          $email = $user['mail'];
          $token = $user['token'];
          $errorForgotPassword = 'Le token n\'est pas conforme';
          require('../view/auth/forgetPassword.php');
        }
      } else {

        $email = $user['mail'];
        $token = $user['token'];
        $errorForgotPassword = 'Le mot de passe n\'est pas conforme';
        require('../view/auth/forgetPassword.php');
      }
    }
  }
}
