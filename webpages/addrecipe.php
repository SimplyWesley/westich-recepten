<?php
include "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Westich Recepten - Recept toevoegen</title>
    <link rel="stylesheet" href="../css/addrecipe.css">
</head>

<body>

    <div id="overlay">
        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/2796ed81999693.5d10c0872415e.gif" alt="Loading" />
        <h3>Admin-rechten verifiëren...</h3>
    </div>

    <script type="text/javascript">
        function fadeOutEffect() {
            var fadeTarget = document.getElementById("overlay");
            var fadeEffect = setInterval(function() {
                if (!fadeTarget.style.opacity) {
                    fadeTarget.style.opacity = 1;
                }
                if (fadeTarget.style.opacity > 0) {
                    fadeTarget.style.opacity -= 0.01;
                } else {
                    clearInterval(fadeEffect);
                    fadeTarget.style.display = "none";
                }
            }, 5);
        }
        setTimeout(() => {
            document.getElementById("overlay").addEventListener("DOMContentLoaded", fadeOutEffect())
        }, 2000);
    </script>

    <?php if (!isset($_SESSION["login"]) && !isset($_SESSION["admin"])) { ?>
        <div class="error">
            <h2>Error: geen toegang</h2>
            <h2>Je hebt geen toegang tot deze pagina. Log in als admin om deze pagina te kunnen bekijken.</h2>
            <h2><a href="./loginpage.php">Inloggen</a></h2>
        </div>
    <?php } else { ?>



        <div class="addrecipe">
            <h2>Nieuw recept</h2>
            <form method="post" autocomplete="off">
                <p>Naam recept</p>
                <input type="text" name="name" placeholder="bijv. Oma's gehaktballen" required>
                <p>Land van herkomst</p>
                <input type="text" name="country" placeholder="bijv. Duitsland" required>
                <p>Soort gerecht</p>
                <select id="meal" name="meal" required>
                    <option value="" disabled selected>Maak een keuze...</option>
                    <option value="Ontbijt">Ontbijt</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Voorgerecht">Voorgerecht</option>
                    <option value="Hoofdgerecht">Hoofdgerecht</option>
                    <option value="Nagerecht">Nagerecht</option>
                    <option value="Snack">Snack</option>
                    <option value="Gebak">Gebak</option>
                    <option value="Drinken">Drinken</option>
                </select>
                <p>Bereidingstijd (min)</p>
                <input type="number" name="preperation_time" placeholder="bijv. 60" required>
                <p>Afbeeldingslink</p>
                <input type="text" name="imglink" placeholder="bijv. https://www.imgur.com/abcdef" required>
                <p>Aantal personen</p>
                <input type="number" name="pers" placeholder="bijv. 5" required>
                <p>Ingrediënten</p>


                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        // Get the button and the ingredient list element
                        const addIngredientButton = document.getElementById("add-ingredient");
                        const SubmitIngredientButton = document.getElementById("submit-ingredient");
                        const ingredientList = document.getElementById("ingredient-list");

                        // Create an ingredients array to store the input values
                        let ingredients = [];

                        // Add an event listener to the button
                        addIngredientButton.addEventListener("click", function(event) {

                            // Create a new div element for the ingredient
                            const newIngredient = document.createElement("div");
                            newIngredient.classList.add("ingredient");

                            // Create input fields for the ingredient name and amount
                            const ingredientInput = document.createElement("input");
                            ingredientInput.type = "text";
                            ingredientInput.name = "ingredient[]";
                            ingredientInput.placeholder = "Ingrediënt";

                            const amountInput = document.createElement("input");
                            amountInput.type = "number";
                            amountInput.name = "amount[]";
                            amountInput.placeholder = "Hoeveelheid";

                            const UnitInput = document.createElement("input");
                            UnitInput.type = "text";
                            UnitInput.name = "unit[]";
                            UnitInput.placeholder = "Eenheid";

                            // Append the input fields to the new ingredient div
                            newIngredient.appendChild(ingredientInput);
                            newIngredient.appendChild(amountInput);
                            newIngredient.appendChild(UnitInput);

                            // Append the new ingredient div to the ingredient list
                            ingredientList.appendChild(newIngredient);
                        });

                    });
                </script>


                <div class="ingredient">
                    <div id="ingredient-list">
                        <input type="text" name="ingredient[]" id="ingredient" placeholder="Ingrediënt"><input type="number" name="amount[]" id="amount" placeholder="Hoeveelheid" step="0.1"><input type="text" name="unit[]" id="unit" placeholder="Eenheid">
                    </div>
                    <button class="addrecipebutton" type="button" id="add-ingredient">Voeg een ingredient toe</button>
                </div>
                <p>Bereidingswijze</p>
                <textarea name="method" id="method" cols="80" rows="10" maxlength="10000" required placeholder="Type hier hoe het gerecht gemaakt wordt..."></textarea><br>
                <button class="addrecipebutton" type="button" onclick="location.href='recipes.php'" value="Terug">Terug</button>
                <button class="addrecipebutton" id="submit" value="Opslaan">Opslaan</button>
            </form>


            <?php
            if (!isset($_POST['name'])) {
                return;
            }

            $namenew = $_POST['name'];
            $countrynew = $_POST['country'];
            $sortnew = $_POST['meal'];
            $prepnew = $_POST['preperation_time'];
            $linknew = $_POST['imglink'];
            $persnew = $_POST['pers'];
            $method = $_POST['method'];

            // Insert general properties

            try {
                $query = "INSERT INTO `recipes` (`naam`, `land`, `soort`, `bereidingstijd_minuten`, `image_url`) VALUES
                (:namenew, :countrynew, :sortnew, :prepnew, :linknew)";
                $statement = $conn->prepare($query);

                $data = [
                    ':namenew' => $namenew,
                    ':countrynew' => $countrynew,
                    ':sortnew' => $sortnew,
                    ':prepnew' => $prepnew,
                    ':linknew' => $linknew
                ];
                $query_execute = $statement->execute($data);

                if ($query_execute) {
                    $_SESSION['message'] = "Updated Successfully";
                } else {
                    $_SESSION['message'] = "Not Updated";
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            function searchr($namenew)
            {
                global $conn;
                $stmtn = $conn->prepare("SELECT * FROM recipes WHERE naam = :namenew");
                $stmtn->execute(
                    [
                        ":namenew" => $namenew
                    ]
                );

                $row = $stmtn->fetch();

                if ($row != false) {
                    return $row['id'];
                } else {
                    return false;
                }
            }
            $recipe_id = searchr($namenew);


            try {
                $querym = "INSERT INTO `method` (`bereidingswijze`, `recept_id`) VALUES
        (:method, :recipe_id)";
                $statementm = $conn->prepare($querym);

                $datam = [
                    ':method' => $method,
                    ':recipe_id' => $recipe_id
                ];
                $querym_execute = $statementm->execute($datam);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            // Insert ingredients

            function search($arr_ing)
            {
                global $conn;
                $stmt = $conn->prepare("SELECT * FROM ingredients WHERE ingredient = :arr_ing");
                $stmt->execute(
                    [
                        ":arr_ing" => $arr_ing
                    ]
                );

                $row = $stmt->fetch();

                if ($row != false) {
                    return $row['id'];
                } else {
                    return false;
                }
            }

            $array_ingredient = $_POST['ingredient'];
            $array_eenheid = $_POST['unit'];
            $array_hoeveelheid = $_POST['amount'];

            $stmti = $conn->prepare("INSERT INTO `ingredients` (eenheid, ingredient) VALUES (:unit, :ingredient)");
            $stmta = $conn->prepare("INSERT INTO `ingrec` (recept_id, ingredient_id, hoeveelheid) VALUES (:recipe_id, :ingredient_id, :hoeveelheid)");

            for ($i = 0; $i < count($array_ingredient); $i++) {
                $id = search($array_ingredient[$i]);
                if ($id == false) {
                    $stmti->execute([
                        ':ingredient' => $array_ingredient[$i],
                        ':unit' => $array_eenheid[$i]
                    ]);
                    $id = search($array_ingredient[$i]);
                }
                $stmta->execute([
                    ':recipe_id' => $recipe_id,
                    'ingredient_id' => $id,
                    ':hoeveelheid' => round($array_hoeveelheid[$i] / $persnew, 2)
                ]);
            }
            ?>
        </div>
    <?php } ?>

</body>

</html>