<?php include 'header.php'; ?>
<?php include 'fonctions.php'; ?>

<div class="container mt-5">
    <h2 class="mb-4">Liste des catégories</h2>
    <div class="row">
        <?php
            $categories = getCategories();
            foreach ($categories as $categorie):
        ?>
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body">
                    <h5 class="card-title">
                        <a href="articlesParCategorie.php?id=<?= $categorie['id'] ?>">
                            <?= htmlspecialchars($categorie['libelle']) ?>
                        </a>
                    </h5>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include 'footer.php'; ?>
