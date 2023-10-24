<?php
require_once "tamplates/header.php";
require 'databases/conaction.php';
if ($_SESSION['login'] === true) { // if the user alread logined , then he should not alowed to access to this page
    header('location:http://localhost/COLLAGE_PROJECT/indxe.php');
}
$emailErorr = '';
$errorMasage = false;
$email = $password = "";
if (!empty($_POST['email']) && !empty($_POST['password'])) {

    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); //// Remove all illegal characters from email
    if ($password !== $_POST['password']) {
        $errorMasage = true; // if the enterd password not same sanitize $password  , then errorMasage= true , to disply error massage

    } else if ($email !== $_POST['email']) {
        $errorMasage = true; // if the enterd email not same sanitize $email  , then errorMasage= true , to disply error massage
    } else if (!filter_var($email, FILTER_SANITIZE_EMAIL)) { // after sanitize , check the input is email
        $errorMasage = true;

    }
    // after validate the inputs of user , and there are no wrong with them, we should send it to database, to create new account
    if (!$errorMasage) {
        try {
            $stmt = $conn->prepare("select email, password,id from user where email=? and password=? limit 1");
            $stmt->bind_param('ss', $email, $password);
            $stmt->execute();
            $user = $stmt->get_result()->fetch_assoc();

            if (isset($user)) { // the the inputs of the user match email and password in database ,then the user will login to his account
                $_SESSION['userID'] = $user['id'];
                $_SESSION['login'] = true;
                header('location:http://localhost/COLLAGE_PROJECT/indxe.php');
  
            } else {
                $errorMasage = true;

            }

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}

?>
<section class='formRigster'>
    <div class='ErrorMassage <?php echo $errorMasage ? "ErrorMassageDisplay" : "" ?>'>
        <p>Password or email is incorrect!</p>
        <?php echo $emailErorr ?>
    </div>
    <div class="h1SignUpSignIn">
        <h1>Sign in</h1>
    </div>
    <!-- FORM -->
    <form class="FormInputsLogin" method="post">

        <div class="inputs">

            <label>Email:</label>

            <input id='email' type="text" name="email" placeholder="Example@gamil.com">
        </div>
        <div class="inputs">
            <label>Password:</label>

            <input id="password" type="password" name="password" placeholder="*********">
        </div>
        <p>Don't have an account? <a href="http://localhost/COLLAGE_PROJECT/register.php">Sign up</a></p>

        <div class="inputs">
            <input class="buttonSubmit" type="submit" value="Sign in">

        </div>
    </form>
    <!-- End FORM -->
</section>

<?php
require_once "tamplates/footer.php"; ?>