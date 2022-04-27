<?php
require_once "ConnexionBdd.php";

//$requete->debugDumpParams();


class ModelTransporteur
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




  public function getTransporteur($transporteur = null)
  {
    $idcon = connexion();

    if ($transporteur) {
      $requete = $idcon->prepare("
            SELECT * FROM `transporteur` WHERE nom = ?
        ");

      $requete->execute(array($transporteur));
      return $requete->fetch(PDO::FETCH_ASSOC);
    } else {

      $requete = $idcon->prepare("
            SELECT * FROM `transporteur`
        ");

      $requete->execute();
      return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  public function addTransporteur($newTransporteur)
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
        INSERT INTO `transporteur`(`id`, `nom`, `logo`) VALUES (null,?,null)
        ");

    return $requete->execute(array($newTransporteur));
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
