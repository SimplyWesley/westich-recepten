<!DOCTYPE html>
<html lang="en">
<?php

include "includes/config.php";

$stmt = $conn->query("SELECT * FROM recipes ORDER BY naam ASC");

$recipes = $stmt->fetchAll();
?>

<head>

    <!-- Head -->
    <?php include "includes/head.php" ?>
    <title>Westich Recepten - Recepten</title>

</head>

<body>

    <!-- Nav -->
    <?php include "includes/nav.php" ?>

    <div class="title">
        <h1 class="section">Over onze recepten</h1>
        <div class="onsrecept-container">
            <img src="https://img.freepik.com/free-photo/front-view-happy-family-cooking-together_23-2148625936.jpg?w=2000" width="25%" alt="">
            <p>Onze recepten zijn speciaal ontwikkeld om de smaakpapillen te verwennen en tegelijkertijd gezonde en voedzame maaltijden op tafel te zetten. We geloven dat eten niet alleen voor de voeding is, maar ook voor het plezier en de beleving.
                Daarom bieden wij een grote variëteit aan recepten, van klassiekers tot moderne gerechten, van eenvoudige tot uitgebreidere gerechten.
                Onze recepten zijn gemakkelijk te volgen en de ingrediënten zijn gemakkelijk te vinden in de supermarkt. We gebruiken zo veel mogelijk verse en seizoensgebonden ingrediënten, zodat je altijd de beste smaak en kwaliteit krijgt.
                Of je nu een beginner of een gevorderde kok bent, onze recepten zijn geschikt voor iedereen die houdt van lekker eten. Probeer ze uit en verras je gezin en vrienden met heerlijke maaltijden.</p>
        </div>
    </div>

    <!-- Receipes -->
    <h1 class="section">Alle recepten</h1>
    <form onsubmit="return false;" autocomplete="off" class="searchbar">
        <input type="search" placeholder="Zoek een recept..." id="searchbar" class="searchbar-input">
        <button type="button"><i class="fas fa-search"></i></button>
        <?php if (isset($_SESSION["login"]) && isset($_SESSION["admin"])) { ?>
            <button type="button" onclick="location.href='addrecipe.php'" title="Voeg een recept toe"><i class="fa-solid fa-circle-plus"></i></button>
        <?php } else { ?>
            <br>
        <?php } ?>

    </form>
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
    <?php include "includes/footer.php" ?>

    <!-- Scripts -->
    <?php include('../js/scripts.php'); ?>

</body>

</html>