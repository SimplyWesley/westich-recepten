<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="../css/navfoot.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-9lF+Nu6E3rV7lI6O+U6/BzZOdJ0H0zj1BXeJhE/sH/JFmj+vf8gxoZlCJE7YnQ1T8LFVHhNcxB1ejBg+xJxjw==" crossorigin="anonymous" />
    <link href="../fontawesome-free-6.2.1-web/css/fontawesome.css" rel="stylesheet">
    <link href="../fontawesome-free-6.2.1-web/css/brands.css" rel="stylesheet">
    <link href="../fontawesome-free-6.2.1-web/css/solid.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/63e3b55288.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>

<body>
    <?php
    include("../webpages/includes/nav.php");
    if (isset($_POST["signup"])) {
        echo "<a>Account bestaat al</a>" . "<br><br>";
    }
    ?>
    <div class="all">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="includes/signup.php" method="POST">
                    <h1>Account Aanmaken</h1>
                    <input type="text" name="user" autocomplete="off" placeholder="Naam" required />
                    <input type="password" name="password" autocomplete="off" placeholder="Wachtwoord" required />
                    <button>Aanmaken</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form action="includes/login.php" method="POST">
                    <h1>Inloggen</h1>
                    <input type="text" name="user" autocomplete="off" placeholder="Naam" required />
                    <input type="password" name="password" autocomplete="off" placeholder="Wachtwoord" required />
                    <button>Log in</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welkom terug!</h1>
                        <p>Om meer functionaliteiten te hebben op de website, login.</p>
                        <button class="ghost" id="signIn">Inloggen</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hallo!</h1>
                        <p>Voer je gebruikersnaam en wachtwoord in om een account aan te maken.</p>
                        <button class="ghost" id="signUp">Account maken</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("./includes/footer.php"); ?>

    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add("right-panel-active");
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove("right-panel-active");
        });
    </script>
</body>

</html>