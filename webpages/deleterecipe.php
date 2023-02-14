<?php
include "includes/config.php";

$recipeid = $_GET['id'];

if (isset($_GET['delete'])) {
    try {
        $query = "DELETE FROM `recipes` WHERE id = :recipeid";
        $statement = $conn->prepare($query);

        $data = [
            ':recipeid' => $recipeid
        ];
        $query_execute = $statement->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: ./recipes.php');
        } else {
            $_SESSION['message'] = "Not Updated";
            header('Location: ./recipes.php');
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
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

<body">

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
            <h2><a href="./loginpage.php" id="">Inloggen</a></h2>
        </div>
    <?php } else { ?>

        <div class="deleterecipe">
            <div class="popup">
                <h2>Weet je zeker dat je dit recept wilt verwijderen?</h2>
                <div class="buttons">
                    <a href="javascript:javascript:history.go(-1)">Nee, ga terug</a>
                    <a href="?id=<?php echo $recipeid; ?>&delete=ok">Ja, verwijder</a>
                </div>
            </div>
        </div>
    <?php } ?>

    </body>

</html>