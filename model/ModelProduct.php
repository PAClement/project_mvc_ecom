<?php
require_once "ConnexionBdd.php";

//$requete->debugDumpParams();


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


    //============================== Model for product ============================================

    public function getProduit($ref_produit = null)
    {
        $idcon = connexion();

        if ($ref_produit) {
            $requete = $idcon->prepare("
            SELECT * FROM `product` WHERE ref = ?
        ");
            $requete->execute(array($ref_produit));

            return $requete->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function addProduit($newProduct)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        INSERT INTO `product`(`id`, `nom`, `ref`, `description`, `quantite`, `prix`, `photo`, `id_category`, `id_marque`) VALUES ( NULL, ?, ?, ?, ?, ?, NULL, (SELECT id FROM category WHERE nom = ?), (SELECT id FROM marque WHERE nom = ?))
        ");

        return $requete->execute(array($newProduct['nom_produit'], $newProduct['ref_produit'], $newProduct['description_produit'], $newProduct['quantite_produit'], $newProduct['prix_produit'], $newProduct['categorie_produit'], $newProduct['marque_produit']));
    }

    //verifier si un produit contient la catégorie ou la marque que la personne veut supprimer
    public function supprElementProduit($action, $id)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
            SELECT * FROM `product` WHERE id_" . $action . " = ?
        ");
        $requete->execute(array($id));

        return $requete->fetchall(PDO::FETCH_ASSOC);
    }

    //============================== Model for category ============================================

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

    //============================== Model for marque ============================================

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

    //============================== Model for transporteur ============================================


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

    //============================== Model suppression & edition ============================================

    public function utilsSuppr($element, $id)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        DELETE FROM `" . $element . "` WHERE id = ?
        ");

        return $requete->execute(array($id));
    }

    public function utilsEdit($table, $ediData, $editId)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        UPDATE `" . $table . "` SET `nom`= ? WHERE id = ?
        ");

        return $requete->execute(array($ediData, $editId));
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
