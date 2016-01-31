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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['wiadomosc']) && strlen($_POST['wiadomosc']) > 3) {
        $wiadomka = Message::Create($_SESSION['userID'], $userToShow->getId(), $_POST['wiadomosc']);
        echo("<h4>Wyslano wiadomosc</h4>");
    }
}


if ($userToShow !== false) {
    echo("<h1>Uzytkownik: {$userToShow->getName()}</h1>");
    echo("<h3>Email uzytkownia: {$userToShow->getEmail()}</h3>");
    echo("<h3>Opis: {$userToShow->getDescription()}</h3>");
    if ($userToShow->getId() !== $_SESSION['userID'] && $_SESSION['userID']) {
        echo("<a href='napiszWiadomosc.php?userId={$userToShow->getId()}'>Napisz wiadomosc do uzytkownika</a><br><br>");
    }
} else {
    echo("Nie znaleziono takiego użytkownika");
}
echo("<h3>Posty uzytkownika:</h3>");
$tweets = $userToShow->loadAllTweets();
foreach ($tweets as $tweet) {
    echo("<hr>");
    echo("{$tweet->getText()}<br>");
    echo("<a href='showTweet.php?tweetId={$tweet->getId()}'>Show</a><br>");
}
?>