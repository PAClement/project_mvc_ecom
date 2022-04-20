<?php
require_once "ConnexionBdd.php";


class ModelUser
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $tel;
    private $address;

    public function __construct($id = null, $nom = null, $prenom = null, $mail = null, $address = null, $tel = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->tel = $tel;
        $this->address = $address;
    }

    public function getUser($mail)
    {

        $idcon = connexion();
        $requete = $idcon->prepare("
            SELECT * FROM users WHERE mail = ?
        ");
        $requete->execute(array($mail));

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
            SELECT * FROM users WHERE id = ?
        ");
        $requete->execute(array($id));

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserInfo($id)
    {

        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT users.mail, user_info.nom, user_info.prenom, user_info.address, user_info.tel, user_info.date_inscription
        FROM user_info
        INNER JOIN users ON user_info.user_id = users.id WHERE user_info.user_id = ?
        ");
        $requete->execute(array($id));

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function signUp($info)
    {

        $idcon = connexion();
        $requete = $idcon->prepare("
        INSERT INTO `users`(`id`, `mail`, `password`,`role_id`, `token`) VALUES (null, ?, ?,2, ?)
        ");
        $requete->execute(array($info['mail'], $info['password'], $info['token']));

        $requete2 = $idcon->prepare("
        INSERT INTO `user_info`(`id`,`user_id`, `nom`, `prenom`, `address`, `tel`, `date_inscription`) VALUES (null,(SELECT id FROM users WHERE mail = ?),?,?,?,?,?)
        ");
        return $requete2->execute(array($info['mail'], $info['nom'], $info['prenom'], $info['address'], $info['tel'], $info['date_inscription']));
    }

    public function tokenVerif($token, $email)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT `token` FROM `users` WHERE token = ? || mail = ?
        ");

        $requete->execute(array($token, $email));

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteAccount($user_id)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        DELETE FROM `user_info` WHERE user_id = ?
        ");

        $requete->execute(array($user_id));

        $requete2 = $idcon->prepare("
        DELETE FROM `users` WHERE id = ? 
        ");


        $requete2->execute(array($user_id));
    }

    public function editAccount($editData, $id)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        UPDATE `user_info` SET `nom`= ? ,`prenom`= ? ,`address`= ?,`tel`= ? WHERE user_id = ?
        ");

        return $requete->execute(array($editData['nom'], $editData['prenom'], $editData['address'], $editData['tel'], $id));
    }

    /*
  
  GETTERS ET SETTERS

  */

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function getTel()
    {
        return $this->tel;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
        return $this;
    }

    public function setTel($tel)
    {
        $this->tel = $tel;
        return $this;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }
}
