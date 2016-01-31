<?php
require_once("./src/connectPHP.php");
if (!isset($_SESSION['userID'])) {
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
} else {
    $userId = $_SESSION['userID'];
}


$userToShow = User::getUserById($userId);

if ($userToShow !== false) {
    echo("<h1>Uzytkownik: {$userToShow->getName()}</h1>");
    if ($userToShow->getId() !== $_SESSION['userID'] && $_SESSION['userID']) {
        echo("

        <form action='showUsers.php?userId={$userToShow->getId()}' method='post'>
        <label>
            <textarea type='text' name='wiadomosc' cols='50' rows='10'> Wprowadz tekst swojej wiadomosci </textarea>
        </label>
            <input type='submit'>
        </form>
        ");
    }
} else {
    echo("Nie znaleziono takiego użytkownika");
}

?>