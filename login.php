<?php
require_once ("./src/connectPHP.php");


if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $user = User::LogInUser($_POST['email'], $_POST['password']);

    if($user !== false){
        session_start();
        $_SESSION['userID'] = $user->getId();
        header("location: main.php");
    }else{
        echo("zle dane logowania...");
    }
}

?>


<form action="login.php" method="post">
    <label>
        Email:
        <input type="email" name="email">
    </label>
    </br>
    <label>
        Password:
        <input type="password" name="password">
    </label>
    <br>
    <input type="submit" value="Zaloguj">
    <br><br>

    Jesli nie posiadasz jeszcze konta to

    <a href='register.php'>Zarejestruj sie</a><br>
</form>