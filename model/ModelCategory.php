<?php
require_once "ConnexionBdd.php";

//$requete->debugDumpParams();


class ModelCategory
{
  private $id;
  private $nom;

  public function __construct($id = null, $nom = null)
  {
    $this->id = $id;
    $this->nom = $nom;
  }

  public function getCategorie($categorie = null)
  {
    $idcon = connexion();

    if ($categorie) {
      $requete = $idcon->prepare("
            SELECT * FROM `category` WHERE nom = ?
        ");

      $requete->execute(array($categorie));
      return $requete->fetch(PDO::FETCH_ASSOC);
    } else {
      $requete = $idcon->prepare("
            SELECT * FROM `category`
        ");

      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  public function addCategorie($newCategorie)
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
        INSERT INTO `category`(`id`, `nom`) VALUES (null,?)");

    return $requete->execute(array($newCategorie));
  }

  public function latestCategory()
  {

    $idcon = connexion();

    $requete = $idcon->prepare("
    SELECT nom FROM category ORDER BY id DESC LIMIT 5
    ");

    $requete->execute();
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of nom
   */
  public function getNom()
  {
    return $this->nom;
  }

  /**
   * Set the value of nom
   *
   * @return  self
   */
  public function setNom($nom)
  {
    $this->nom = $nom;

    return $this;
  }
}
