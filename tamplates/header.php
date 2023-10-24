<?php
session_start();
empty($_SESSION['login']) ? $_SESSION['login'] = false : '';
if (isset($_POST['logout'])) {
    $_POST['logout'] ? $_SESSION['login']= false  : ""; // if the user cilk logout button ,then user will logout
    $_POST['logout'] ? $_SESSION['userID']='' : ""; // if the user cilk logout button ,then user will logout

}
    ?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/style.css">
    <script  src="https://kit.fontawesome.com/39d16187ad.js" crossorigin="anonymous"></script>
</head>

<body style="margin:0">
    <!-- make navbar in the top of the page that help user to  discover parts of the website -->
    <nav id='navBar' class="container">
        <!-- <div> -->

            <ul>
                <li><a href='http://localhost/COLLAGE_PROJECT/indxe.php'>Home</a></li>
                <li><a href='http://localhost/COLLAGE_PROJECT/indxe.php#Products'>Products</a></li>
                <li>About us</li>
            </ul>
            <h1>TechTrends</h1>
            <?php if (!$_SESSION['login']): ?>
                <a href='register.php'><button class="buttonNavbar">Join Us</button></a>
            <?php endif ?>
            <?php if ($_SESSION['login']): ?>
                <form method="post">
                    <input type="text" value="Logout" name="logout" style="display: none;" />
                    <input class="buttonNavbar" type="submit" value="Logout">
                </form>
            <?php endif ?>
        <!-- </div> -->
    </nav>