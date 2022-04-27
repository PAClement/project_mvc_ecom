<?php
require_once "ConnexionBdd.php";

//$requete->debugDumpParams();


class ModelMarque
{
  private $id;
  private $nom;
  private $logo;

  public function __construct($id = null, $nom = null, $logo = null)
  {
    $this->id = $id;
    $this->nom = $nom;
    $this->logo = $logo;
  }

  public function getMarque($marque = null)
  {
    $idcon = connexion();

    if ($marque) {
      $requete = $idcon->prepare("
            SELECT * FROM `marque` WHERE nom = ?
        ");

      $requete->execute(array($marque));
      return $requete->fetch(PDO::FETCH_ASSOC);
    } else {

      $requete = $idcon->prepare("
            SELECT * FROM `marque`
        ");

      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  public function addMarque($newMarque)
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
        INSERT INTO `marque`(`id`, `nom`, `logo`) VALUES (null,?,null)
        ");

    return $requete->execute(array($newMarque));
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

  /**
   * Get the value of logo
   */
  public function getLogo()
  {
    return $this->logo;
  }

  /**
   * Set the value of logo
   *
   * @return  self
   */
  public function setLogo($logo)
  {
    $this->logo = $logo;

    return $this;
  }
}
