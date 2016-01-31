<?php
require_once ("./src/connectPHP.php");
if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $tweet = Tweet::Create($_SESSION['userID'], $_POST['trescTweeta']);
}
$user = User::getUserById($_SESSION['userID']);
echo ("<h1>Jestes zalogowany jako: {$user->getName()}</h1>");

echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='wiadomosciOdebrane.php'>Wiadomosci odebrane</a><br>");
echo("<a href='wiadomosciWyslane.php'>Wiadomosci wyslane</a><br>");
echo("<a href='showAllUsers.php'>Pokaz wszystkich uzytkownikow</a><br>");
echo("<a href='edycja.php'>Edytuj profil</a><br><br>");

?>


<form action = "main.php" method="post">
    <label>
        Dodaj post:
        <br>
        <input type="text" name="trescTweeta">
    </label>
    </br>

    <input type="submit">
</form>

<?php
$allTweets = $user->loadAllTweets();
foreach($allTweets as $tweetsToShow){
    echo("<hr>");
    echo("{$tweetsToShow->getDataDodania()}");
    echo("<h3>{$tweetsToShow->getText()}</h3>");
    echo("<a href='showTweet.php?tweetId={$tweetsToShow->getId()}'>Show</a><br>");

}

?>