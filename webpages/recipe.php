<!DOCTYPE html>
<html lang="en">
<?php

include "includes/config.php";

$recipeid = $_GET['id'];
$stmt = $conn->query("SELECT * FROM ingrec INNER JOIN ingredients ON ingrec.ingredient_id = ingredients.id INNER JOIN recipes ON recipes.id = ingrec.recept_id INNER JOIN method ON method.recept_id = recipes.id WHERE recipes.id = $recipeid");
$stmtall = $conn->query("SELECT * FROM ingrec INNER JOIN ingredients ON ingrec.ingredient_id = ingredients.id INNER JOIN recipes ON recipes.id = ingrec.recept_id INNER JOIN method ON method.recept_id = recipes.id WHERE recipes.id = $recipeid");
$recipes = $stmt->fetch();
$recipess = $stmtall->fetchAll();
?>

<head>

    <!-- Head -->
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="../css/recipe.css">
    <title>Westich Recepten - <?= $recipes['naam'] ?></title>

</head>

<body>

    <!-- Nav -->
    <?php include "includes/nav.php" ?>
    <div class="idk">
        <h1 class="recepth1"><?= $recipes['naam'] ?></h1>
        <img src="<?= $recipes['image_url'] ?>" alt="">
    </div>
    <div class="things">
        <h3 class="recepth3"> <i class="fas fa-clock"></i> <?= $recipes['bereidingstijd_minuten'] ?> minuten</h3>
        <h3 class="recepth3"> <i class="fa-sharp fa-solid fa-utensils"></i> <?= $recipes['soort'] ?> </h3>
        <h3 class="recepth3"> <i class="fa-solid fa-earth-europe"></i></i> <?= $recipes['land'] ?> </h3>
    </div>
    <?php if (isset($_SESSION["login"]) && isset($_SESSION["admin"])) { ?>
        <div class="thingsedit">
            <h3 class="deleteh3"> <a href="deleterecipe.php?id=<?= $recipes['id'] ?>"><i class="fa-solid fa-trash"></i> Verwijder recept</a></h3>
        </div>
    <?php } else { ?>
        <br>
    <?php } ?>


    <div class="container-recipe">
        <div class="method">
            <h1>Bereidingswijze</h1>
            <h3 class="recepth3"><?= $recipes['bereidingswijze'] ?></h3>
        </div>
        <div class="ingredients">
            <h1>Ingredienten</h1>
            <div class="ingredientsinput" id="test">
                <span class="next" id="next" onclick="nextNum()"></span>
                <span class="prev" id="prev" onclick="prevNum()"></span>
                <div id="box"></div>
            </div>

            <script type="text/javascript">
                var numbers = document.getElementById('box');
                for (i = 1; i < 100; i++) {
                    var span = document.createElement('span');
                    span.innerHTML = i;
                    numbers.appendChild(span);
                }
                var num = numbers.getElementsByTagName('span');
                var index = 0;

                function nextNum() {
                    num[index].style.display = 'none';
                    index = (index + 1) % num.length;
                    num[index].style.display = 'initial';
                    update();
                }

                function prevNum() {
                    num[index].style.display = 'none';
                    index = (index - 1 + num.length) % num.length;
                    num[index].style.display = 'initial';
                    update();
                }

                function update() {
                    let number = document.getElementById('numberOfIngredients').dataset.number;
                    for (i = 0; i < number; i++) {
                        let element = document.getElementById('amount' + i);
                        let amount = element.dataset.amount;
                        console.log(amount);
                        element.innerHTML = Math.round((amount * (index + 1)) * 100) / 100;
                    }
                }
            </script>

            <div style="display:none" id="numberOfIngredients" data-number="<?php echo count($recipess); ?>"></div>

            <?php for ($i = 0; $i < count($recipess); $i++) { ?>
                <div class="ingredientsdir">
                    <h3>-&nbsp;</h3>
                    <?php
                    if ($recipess[$i]['hoeveelheid'] == "") {
                    ?>
                        <h3 class="recepth3" id="amount<?php echo $i; ?>" data-amount="<?php echo round($recipess[$i]['hoeveelheid'], 2) ?>"> <?= round($recipess[$i]['hoeveelheid'], 2) ?></h3>
                    <?php
                    } else { ?>
                        <h3 class="recepth3" id="amount<?php echo $i; ?>" data-amount="<?php echo round($recipess[$i]['hoeveelheid'], 2) ?>"> <?= round($recipess[$i]['hoeveelheid'], 2) ?></h3>&nbsp;
                    <?php } ?>
                    <?php
                    if ($recipess[$i]['eenheid'] == "") {
                    ?>
                        <h3 class="recepth3" id="unit<?php echo $i; ?>"> <?= $recipess[$i]['eenheid'] ?></h3>
                    <?php
                    } else { ?>
                        <h3 class="recepth3" id="unit<?php echo $i; ?>"> <?= $recipess[$i]['eenheid'] ?>&nbsp;</h3>
                    <?php } ?>
                    <h3 class="recepth3" id="ingredient<?php echo $i; ?>"> <?= $recipess[$i]['ingredient'] ?>&nbsp;</h3>
                </div>
            <?php } ?>

        </div>
    </div>
    <!-- Footer -->
    <?php include "includes/footer.php" ?>

    <!-- Scripts -->
    <?php include('../js/scripts.php'); ?>


</body>

</html>