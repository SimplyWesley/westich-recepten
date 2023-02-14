<!DOCTYPE html>
<html lang="en">
<?php

include "includes/config.php";

$stmt = $conn->query("SELECT * FROM recipes ORDER BY id DESC LIMIT 6");

$recipes = $stmt->fetchAll();
?>

<head>
    <!-- Head -->
    <?php include('includes/head.php'); ?>
    <title>Westich Recepten - Home</title>
</head>

<body>
    <!-- Navbar -->
    <?php include('includes/nav.php'); ?>
    <div class="titel">
        <h1>Home</h1>
    </div>
    <?php include('includes/info.php'); ?>
    <h1 class="section">Laatste recepten</h1>
    <div class="recipes">
        <?php foreach ($recipes as $recipe) : ?>
            <a href="recipe.php?id=<?= $recipe['id'] ?>" class="recipe-div backgroundoverlay shadow" style="background-image:url('<?= $recipe['image_url'] ?>')">
                <h1 class="recepth1"><?= $recipe['naam'] ?></h1>
                <h3 class="recepth3"> <i class="fas fa-clock"></i> <?= $recipe['bereidingstijd_minuten'] ?> minuten</h3>
                <h3 class="recepth3"> <i class="fa-sharp fa-solid fa-utensils"></i> <?= $recipe['soort'] ?> </h3>
                <h3 class="recepth3"> <i class="fa-solid fa-earth-europe"></i></i> <?= $recipe['land'] ?> </h3>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Footer -->
    <?php include('includes/footer.php'); ?>

    <!-- Scripts -->
    <?php include('../js/scripts.php'); ?>

</body>

</html>