<?php 
include 'header.php'; 
require_once 'fonctions.php'; 
$articles = getArticles();
?>

<div class="container">
    <div class="row">
        <?php foreach ($articles as $article): ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img src="img/téléchargement.jpg" class="card-img-top" alt="Image de l'article">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($article['titre']) ?></h5>
                        <p class="card-text">
                            <?= htmlspecialchars(substr($article['contenu'], 0, 40)) ?>...
                            <span><a href="detailArticle.php?id=<?= $article['id'] ?>">Lire la suite</a></span>
                        </p>
                        </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>