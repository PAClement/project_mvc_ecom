<?php

require_once("../model/ModelUser.php");
require_once("../view/classes/addons.php");

class membreController
{

    //Module redirection to space member if connected
    public static function mySpace()
    {
        if (isset($_SESSION['user_id'])) {


            require('../view/auth/mySpace.php');
        } else {

            header('Location: index.php');
        }
    }

    //Page user Account: with modification suppresion & deconnection
    public static function myAccount($editData = null)
    {
        function formCheck(array $data): bool
        {
            $isOk = true;
            if ($data['tel']) {

                if (!preg_match("/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/", $data['tel']) == 1) {
                    $isOk = false;
                }
            }

            return $isOk;
        }

        if (isset($_SESSION['user_id'])) {

            $conn = new ModelUser();
            $info = $conn->getUserInfo($_SESSION['user_id']);
            if ($editData) {

                $editData = array_map(function ($a) {
                    return htmlspecialchars($a);
                }, $editData);

                if (formCheck($editData)) {

                    if ($conn->editAccount($editData, $_SESSION['user_id'])) {
                        ViewTemplate::response("success", "Vos informations ont bien été modifié!", "index.php?action=myAccount");
                    } else {
                        $editError = "Un problème est survenu, Reesayez plus tard";
                    }
                } else {

                    $editError = "Vos informations ne sont pas conformes";
                    require('../view/auth/espaceMembre/myAccount.php');
                }
            } else {
                $editError = "";
                require('../view/auth/espaceMembre/myAccount.php');
            }
        } else {
            $editError = "";
            require('../view/accueil.php');
        }
    }
}
