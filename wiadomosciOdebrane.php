<?php

require_once ("./src/connectPHP.php");

if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");

$user = User::getUserById($_SESSION['userID']);

echo ("<h1>Odebrane</h1><br>");
$messages = Message::loadAllReceivedMessages($user->getId());
foreach($messages as $messageToShow){
    echo("<hr>");
    echo("{$messageToShow->getDataWyslania()}<br>");
    echo("<h2>{$messageToShow->getFirstThirtyChar()}</h2>");
    if(($messageToShow->getStatusPrzeczytania()) == 1){
        echo("Nieprzeczytana<br>");
    }else{
        echo("Przeczytana<br>");
    }

    echo("Nadawca: {$messageToShow->getSendId()}<br>");
    echo("<a href='showMessage.php?messageId={$messageToShow->getId()}'>Pokaz cala wiadomosc</a><br>");


}

?>