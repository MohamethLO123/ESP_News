<?php
include 'header.php';
include 'fonctions.php';

if (!isset($_GET['id'])) {
    echo "<p>Article non spécifié.</p>";
    include 'footer.php';
    exit;
}

$articleId = intval($_GET['id']);
$article = getArticleById($articleId);

if (!$article) {
    echo "<p>Article introuvable.</p>";
    include 'footer.php';
    exit;
}
?>

<div class="container mt-5">
    <h2><?= htmlspecialchars($article['titre']) ?></h2>
    <p><strong>Catégorie :</strong> <?= htmlspecialchars($article['categorie']) ?></p>
    <p><strong>Publié le :</strong> <?= $article['dateCreation'] ?></p>
    <hr>
    <p><?= nl2br(htmlspecialchars($article['contenu'])) ?></p>
</div>

<?php include 'footer.php'; ?>
