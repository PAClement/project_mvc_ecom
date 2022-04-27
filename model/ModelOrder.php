<?php
require_once "ConnexionBdd.php";

//$requete->debugDumpParams();

class ModelOrder
{

  private $id;
  private $date_commande;
  private $etat;
  private $mode;
  private $id_client;
  private $id_transporteur;

  public function __construct($id = null, $date_commande = null, $etat = null, $mode = null, $id_client = null, $id_transporteur = null)
  {
    $this->id = $id;
    $this->date_commande = $date_commande;
    $this->etat = $etat;
    $this->mode = $mode;
    $this->id_client = $id_client;
    $this->id_transporteur = $id_transporteur;
  }

  public function getOrder($id)
  {

    $idcon = connexion();

    $requete = $idcon->prepare("

    SELECT
        c.id,
        c.date_commande,
        c.etat,
        c.prix,
        t.nom
    FROM
        `commande` c
    INNER JOIN transporteur t ON
        c.id_transporteur = t.id
    WHERE
    c.id_client = ?
    ");

    $requete->execute(array($id));
    return $requete->fetchAll(PDO::FETCH_ASSOC);
  }


  public function submitOrder($submitData, $datadetails)
  {

    $idcon = connexion();

    $requete = $idcon->prepare("
    INSERT INTO `commande`(
      `id`,
      `date_commande`,
      `etat`,
      `mode`,
      `prix`,
      `id_client`,
      `id_transporteur`
      )
      VALUES(NULL, ?, ?, NULL, ?, ?, (SELECT id FROM transporteur WHERE nom = ?))
    ");

    $requete->execute(array($submitData['date_commande'], $submitData['etat'], $submitData['prix'], $submitData['id_client'], $submitData['id_transporteur']));

    for ($i = 0; $i < count($datadetails); $i++) {

      $requete1 = $idcon->prepare("
      INSERT INTO `details_commande`(
      `id_commande`,
      `id_produit`,
      `quantite`
      )
      VALUES((SELECT MAX(id) FROM commande),?,?)
      ");

      $requete1->execute(array($datadetails[$i]['id_produit'], $datadetails[$i]['quantite']));
    }
  }

  public function orderDetail($id)
  {
    $idcon = connexion();

    $requete = $idcon->prepare("
    SELECT
        c.id,
        c.date_commande,
        c.etat,
        c.prix as commande_prix,
        t.nom as nom_transporteur,
        p.nom as nom_produit,
        p.id as product_id,
        p.ref,
        p.prix as produit_prix,
        dc.quantite
    FROM
        `commande` c
    INNER JOIN details_commande dc ON
        c.id = dc.id_commande
    INNER JOIN product p ON
        dc.id_produit = p.id
    INNER JOIN transporteur t ON
        c.id_transporteur = t.id
    WHERE
        c.id = ?
    ");

    $requete->execute(array($id));

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
   * Get the value of date_commande
   */
  public function getDate_commande()
  {
    return $this->date_commande;
  }

  /**
   * Set the value of date_commande
   *
   * @return  self
   */
  public function setDate_commande($date_commande)
  {
    $this->date_commande = $date_commande;

    return $this;
  }

  /**
   * Get the value of etat
   */
  public function getEtat()
  {
    return $this->etat;
  }

  /**
   * Set the value of etat
   *
   * @return  self
   */
  public function setEtat($etat)
  {
    $this->etat = $etat;

    return $this;
  }

  /**
   * Get the value of mode
   */
  public function getMode()
  {
    return $this->mode;
  }

  /**
   * Set the value of mode
   *
   * @return  self
   */
  public function setMode($mode)
  {
    $this->mode = $mode;

    return $this;
  }

  /**
   * Get the value of id_client
   */
  public function getId_client()
  {
    return $this->id_client;
  }

  /**
   * Set the value of id_client
   *
   * @return  self
   */
  public function setId_client($id_client)
  {
    $this->id_client = $id_client;

    return $this;
  }

  /**
   * Get the value of id_transporteur
   */
  public function getId_transporteur()
  {
    return $this->id_transporteur;
  }

  /**
   * Set the value of id_transporteur
   *
   * @return  self
   */
  public function setId_transporteur($id_transporteur)
  {
    $this->id_transporteur = $id_transporteur;

    return $this;
  }
}
