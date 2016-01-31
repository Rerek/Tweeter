<?php
require_once ("./src/connectPHP.php");

if ($_SERVER["REQUEST_METHOD"] === 'POST'){
    $user = User::Register($_POST['name'], $_POST['email'], $_POST['password1'], $_POST['password2'], $_POST['description']);

    if($user !== false){
        session_start();
        $_SESSION['userID'] = $user->getId();
        header("location: main.php");
    }else{
        echo("zle dane rejestracji...");
    }
}
?>


<form action = "register.php" method="post">
    <label>
        Email:
        <input type="email" name="email">
    </label>
    </br>
    <label>
        Name:
        <input type="text" name="name">
    </label>
    <br>
    <label>
        Password 1:
        <input type="password" name="password1">
    </label>
    <br>
    <label>
        Password 2:
        <input type="password" name="password2">
    </label>
    <br>
    <label>
       Description:
        <input type="text" name="description">
    </label>
    <br>
    <input type="submit">
</form>
