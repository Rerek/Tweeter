<?php
require_once("./src/connectPHP.php");

if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];
} else {
    $userId = $_SESSION['userID'];
}
$userToShow = User::getUserById($userId);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['wiadomosc']) && strlen($_POST['wiadomosc'])>3){
        $wiadomka = Message::Create($_SESSION['userID'], $userToShow->getId(), $_POST['wiadomosc']);
    }
    echo ("Wyslano wiadomosc");
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

$tweets = $userToShow->loadAllTweets();
foreach ($tweets as $tweet) {
    echo("{$tweet->getText()}<br>");
    echo("<a href='showTweet.php?tweetId={$tweet->getId()}'>Show</a><br>");
}
?>