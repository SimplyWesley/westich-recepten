<nav>
    <div class="logo">
        <a href="../webpages/index.php"><img src="../img/logo.png" alt=""></a>
    </div>
    <div class="logotext">
        <a href="index.php">Westitch Recepten</a>
    </div>
    <div class="icon">
        <span class="toggle">☰</span>
    </div>
    <ul class="list-item">
        <li><a href="../webpages/index.php"><i class="fas fa-house"></i> Home</a></li>
        <li><a href="../webpages/recipes.php"><i class="fas fa-list-ul"></i> Recepten</a></li>
        <?php
        if (isset($_SESSION["login"])) {
        ?>
            <li><a href="includes/logout.php"><i class="fa-solid fa-user"></i> Uitloggen - <?php if (isset($_SESSION["user"])) {
                                                                                                echo $_SESSION["user"];
                                                                                            }  ?></a></li>
        <?php
        } else {
        ?>
            <li><a href="loginpage.php"><i class="fa-solid fa-user"></i> Inloggen</a></li>
        <?php
        }
        ?>
    </ul>
</nav>