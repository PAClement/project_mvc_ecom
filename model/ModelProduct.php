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

    public function __construct($id = null, $nom = null, $ref = null, $description = null, $quantite = null, $prix = null, $photo = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->ref = $ref;
        $this->description = $description;
        $this->quantite = $quantite;
        $this->prix = $prix;
        $this->photo = $photo;
    }


    //============================== Model for product ============================================

    public function getProduit($ref_produit = null, $id = null)
    {
        $idcon = connexion();

        if ($ref_produit) {
            $requete = $idcon->prepare("
            SELECT * FROM `product` WHERE ref = ?
        ");
            $requete->execute(array($ref_produit));

            return $requete->fetch(PDO::FETCH_ASSOC);
        } else {
            $requete = $idcon->prepare("
            SELECT
                p.id,
                p.nom,
                p.ref,
                p.description,
                p.quantite,
                p.prix,
                c.nom as nom_category,
                m.nom as nom_marque
            FROM
                `product` p
            INNER JOIN category c ON id_category = c.id
            INNER JOIN marque m ON id_marque = m.id

            WHERE p.id = ?
            ");

            $requete->execute(array($id));

            return $requete->fetch(PDO::FETCH_ASSOC);
        }
    }

    public function getCartProduct($cartData, $nbData)
    {
        $idcon = connexion();
        $requete = $idcon->prepare("
        SELECT
            p.id,
            p.nom,
            p.ref,
            p.prix,
            c.nom as nom_category,
            m.nom as nom_marque
        FROM
            `product` p
        INNER JOIN category c ON id_category = c.id
        INNER JOIN marque m ON id_marque = m.id

        WHERE p.id IN (" . $nbData . ")
        ");

        $requete->execute($cartData);

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNumberProduct()
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        SELECT count(id) FROM product
        ");

        $requete->execute();

        return $requete->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllProduit($start = null, $limit = null)
    {
        $idcon = connexion();

        if ($start != null && $limit != null) {
            $requete = $idcon->prepare("
            SELECT
                p.id,
                p.nom,
                p.ref,
                p.description,
                p.quantite,
                p.prix,
                c.nom as nom_category,
                m.nom as nom_marque
            FROM
                `product` p
            INNER JOIN category c ON id_category = c.id
            INNER JOIN marque m ON id_marque = m.id
            LIMIT " . $start . ", " . $limit . "
        ");
        } else {
            $requete = $idcon->prepare("
            SELECT
                p.id,
                p.nom,
                p.ref,
                p.description,
                p.quantite,
                p.prix,
                c.nom as nom_category,
                m.nom as nom_marque
            FROM
                `product` p
            INNER JOIN category c ON id_category = c.id
            INNER JOIN marque m ON id_marque = m.id
        ");
        }

        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduit($newProduct)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        INSERT INTO `product`(`id`, `nom`, `ref`, `description`, `quantite`, `prix`, `photo`, `id_category`, `id_marque`) VALUES ( NULL, ?, ?, ?, ?, ?, NULL, (SELECT id FROM category WHERE nom = ?), (SELECT id FROM marque WHERE nom = ?))
        ");

        return $requete->execute(array($newProduct['nom_produit'], $newProduct['ref_produit'], $newProduct['description_produit'], $newProduct['quantite_produit'], $newProduct['prix_produit'], $newProduct['categorie_produit'], $newProduct['marque_produit']));
    }

    public function editProduit($editProduit)
    {
        $idcon = connexion();

        $requete = $idcon->prepare("
        UPDATE `product` SET `nom`= ?,`ref`= ?,`description`= ?,`quantite`= ?,`prix`= ?,`id_category`= (SELECT id FROM category WHERE nom = ?),`id_marque`= (SELECT id FROM marque WHERE nom = ?) WHERE id = ?
        ");

        return $requete->execute(array($editProduit['nom_produit'], $editProduit['ref_produit'], $editProduit['description_produit'], $editProduit['quantite_produit'], $editProduit['prix_produit'], $editProduit['categorie_produit'], $editProduit['marque_produit'], $editProduit['id_produit']));
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
}
