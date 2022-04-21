<?php
require_once "ConnexionBdd.php";


class ModelProduct
{
    private $id;
    private $nom;
    private $ref;
    private $description;
    private $quantite;
    private $prix;
    private $photo;
    private $logo;

    public function __construct($id = null, $nom = null, $ref = null, $description = null, $quantite = null, $prix = null, $photo = null, $logo = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->ref = $ref;
        $this->description = $description;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->photo = $photo;
        $this->logo = $logo;
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
        }
    }

    public function addCategorie($newCategorie)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        INSERT INTO `category`(`id`, `nom`) VALUES (null,?)");

        return $requete->execute(array($newCategorie));
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

    public function getTransporteur($transporteur = null)
    {
        $idcon = connexion();

        if ($transporteur) {
            $requete = $idcon->prepare("
            SELECT * FROM `transporteur` WHERE nom = ?
        ");
            $requete->execute(array($transporteur));

            return $requete->fetch(PDO::FETCH_ASSOC);
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
     * Get the value of ref
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set the value of ref
     *
     * @return  self
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of quantite
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

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
