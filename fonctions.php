<?php
    require_once "connectionDB.php";

        // ----------------------- Categories ----------------------

    // Fonction qui permet d'ajouter une categorie
    function ajouterCategorie($nom)
    {
        global $pdo;
        $sql = "INSERT INTO categorie (nom) VALUES (:nom)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["nom" => $nom]);
    }

    // Fonction qui permet de lister tous les categories
    function getCategories()
    {
        global $pdo;
        $sql = "SELECT * FROM categorie";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

        // ----------------------- Articles ----------------------
   
    // Fonction qui permet d'ajouter un article
    function ajouterArticle($titre, $contenu, $categorie)
    {
        global $pdo;
        $sql = "INSERT INTO article (titre, contenu, categorie) VALUES (:titre, :contenu, :categorie)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "titre" => $titre,
            "contenu" => $contenu,
            "categorie" => $categorie
        ]);
    }

    // Fonction qui permet de recuperer tous les articles
    function getArticles()
    {
        global $pdo;
        $sql = "SELECT a.*, c.libelle AS nom_categorie FROM article a
                LEFT JOIN categorie c ON a.categorie = c.id
                ORDER BY dateCreation DESC";
        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction qui permet de mettre a jour un article
    function updateArticle($id, $titre, $contenu, $categorie)
    {
        global $pdo;
        $sql = "UPDATE article SET titre = :titre, contenu = :contenu, categorie = :categorie, dateModification = NOW() WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            "titre" => $titre,
            "contenu" => $contenu,
            "categorie" => $categorie,
            "id" => $id
        ]);
    }

    // Fonction qui permet de supprimer un article
    function deleteArticle($id)
    {
        global $pdo;
        $sql = "DELETE FROM article WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["id" => $id]);
    }

    // Fonction qui permet de filtrer les articles par categorie
    function getArticleByCategorie($categorieId)
    {
        global $pdo;
        $sql = "SELECT a.*, c.libelle AS nom_categorie
                FROM article a
                LEFT jOIN categorie c 
                ON a.categorie = c.id
                WHERE a.categorie = :id
                ORDER BY a.dateCreation DESC";

        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $categorieId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fonction qui permet d'afficher les six derniers acticles
    function getDerniersArticles($limite) 
    {
        global $pdo;
        $sql = "SELECT a.*, c.libelle AS nom_categorie 
                FROM article a 
                LEFT JOIN categorie c ON a.categorie = c.id 
                ORDER BY a.dateCreation DESC 
                LIMIT :limite";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limite', (int) $limite, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }