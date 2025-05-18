<?php
include 'header.php';
include 'fonctions.php';

if (!isset($_GET['id'])) {
    echo "<p>Catégorie non spécifiée.</p>";
    include 'footer.php';
    exit;
}

$categorieId = intval($_GET['id']);
$articles = getArticleByCategorie($categorieId);
?>

<div class="container mt-5">
    <h2 class="mb-4">Articles de la catégorie</h2>
    <div class="row">
        <?php foreach ($articles as $article): ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <img src="img/téléchargement.jpg" class="card-img-top" alt="Image de l'article">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($article['titre']) ?></h5>
                        <p class="card-text"><?= substr($article['contenu'], 0, 50) ?>...</p>
                        <a href="detailArticle.php?id=<?= $article['id'] ?>" class="btn btn-primary">Lire la suite</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
