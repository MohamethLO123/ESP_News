<?php
    include "header.php";
    include 'fonctions.php';
    $articles = getDerniersArticles(6);
?>

<main>
    <div class="container">
        <div class="jumbotron text-center bg-light p-5">
            <h1 class="display-4">Bienvenue sur le site des Actualités de l'ESP</h1>
            <p class="lead">Retrouvez toutes les actualités et les informations importantes de notre école.</p>
            <a href="categories.php" class="btn btn-primary btn-lg">Voir les Catégories</a>
        </div>

        <!-- Derniers articles -->
        <h2 class="text-center my-4">Derniers Articles</h2>
        <div class="row">
        <div class="container mt-5">
    <h2>Dernières publications</h2>
    <div class="row">
        <?php 
        foreach ($articles as $article): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/téléchargement.jpg" class="card-img-top" alt="Image de l'article">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($article['titre']) ?></h5>
                        <p class="card-text">
                            <?= htmlspecialchars(substr($article['contenu'], 0, 120)) ?>...
                        </p>
                        <a href="detailArticle.php?id=<?= $article['id'] ?>" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
        
        </div>
</main>

<?php
    include "footer.php";
?>