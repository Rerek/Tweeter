<?php
require_once("./src/connectPHP.php");
if (!isset($_SESSION['userID'])) {
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");
echo("<h2>Edycja profilu</h2>");

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $oldUser = User::CheckPass($_SESSION['userID'], $_POST['oldPassword']);

    if ($oldUser !== false && $_POST['newPassword1'] === $_POST['newPassword2']) {
        $newPass = User::NewPass($_SESSION['userID'], $_POST['newPassword1'], $_POST['newPassword2']);

        echo ("zmieniono haslo");
    } else {
        echo("zle dane do zmiany hasla...");
    }

}



?>


<form action="edycja.php" method="post">
    <label>
        Podaj stare haslo:
        <br>
        <input type="password" name="oldPassword">
        <br>
    </label>
    <label>
        Podaj nowe haslo:
        <br>
        <input type="password" name="newPassword1">
        <br>
    </label>
    <label>
        Powtorz haslo:
        <br>
        <input type="password" name="newPassword2">
    </label>
    </br>
    <input type="submit">
</form>

<br>
<br>
