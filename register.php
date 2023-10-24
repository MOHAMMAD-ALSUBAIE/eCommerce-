<?php
require_once "tamplates/header.php";
require 'databases/conaction.php';
if ($_SESSION['login'] === true) { // if the user alread logined , then he should not alowed to access to this page
    header('location:http://localhost/COLLAGE_PROJECT/indxe.php');
}
$emailErorr = '';
$errorMasage = false;
$usernamer = $email = $password = $confrimPassword = "";
if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'] && !empty($_POST['ConfrimPassword']))) {

    $usernamer = filter_var($_POST['username'], FILTER_SANITIZE_STRING); //function to remove all HTML tags from a string to avoid XSS
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $confrimPassword = filter_var($_POST['ConfrimPassword'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //// Remove all illegal characters from email
    if ($usernamer !== $_POST['username']) {
        $errorMasage = true;

    } else if ($password !== $confrimPassword) {
        $errorMasage = true;

    } else if ($password !== $_POST['password']) {
        $errorMasage = true; // if the enterd password not same sanitize $password  , then errorMasage= true , to disply error massage

    } else if ($email !== $_POST['email']) {
        $errorMasage = true; // if the enterd email not same sanitize $email  , then errorMasage= true , to disply error massage
    } else if (filter_var($email, FILTER_SANITIZE_EMAIL)) { // after sanitize , check the input is email
        try {
            $stmt = $conn->prepare("select email from user where email=? limit 1");
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $emailFromDatabases = $stmt->get_result()->fetch_assoc()['email'];
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!empty($emailFromDatabases)) {
            $errorMasage = true;
            $emailErorr = "<p>This email alread used.</p>";
        }

    } else {
        $errorMasage = true;
    }
    // after validate the inputs of user , and there are no wrong with them, we should send it to database, to create new account
    if (!$errorMasage) {
        try {
            $stmt = $conn->prepare("insert into user(name,email,password) value(?,?,?)"); // we will use prepare insted of query to avoid sqlinjection
            $stmt->bind_param('sss', $usernamer, $email, $password);
          //  $_SESSION['userID'] = $stmt->insert_id;
         //   $_SESSION['login'] = true;
            $stmt->execute();
            header('location:http://localhost/COLLAGE_PROJECT/login.php');
        } catch (Exception $e) {
            $e->getMessage();
        }
    }

}

?>
<section class='formRigster'>
    <div class='ErrorMassage <?php echo $errorMasage ? "ErrorMassageDisplay" : "" ?>'>
        <p>There somthing wrong with inputs data</p>
        <?php echo $emailErorr ?>
    </div>
    <div class="h1SignUpSignIn">
        <h1>Sign up</h1>
    </div>
    <!-- FORM -->
    <form class="FormInputsRegister" method="post">
        <div class="inputs">
            <label>Name:</label>
            <input id="name" type="text" name="username">
        </div>
        <div class="inputs">

            <label>Email:</label>

            <input id='email' type="text" name="email">
        </div>
        <div class="inputs">
            <label>Password:</label>

            <input id="password" type="password" name="password">
        </div>
        <div class="inputs">
            <label>Confirm password:</label>
            <input id="ConfirmPassword" type="password" name="ConfrimPassword">
        </div>
        <p>Do you have an account? <a href="http://localhost/COLLAGE_PROJECT/login.php">Sign in</a></p>
        <div class="inputs">
            <input class="buttonSubmit" type="submit" value="Sign up">

        </div>

    </form>
    <!-- End FORM -->
</section>

<?php
require_once "tamplates/footer.php"; ?>