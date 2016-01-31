<?php

require_once ("./src/connectPHP.php");

if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");

$user = User::getUserById($_SESSION['userID']);

echo ("<h1>Wyslane</h1><br>");
$messages = Message::loadAllSendMessages($user->getId());
foreach($messages as $messageToShow){
    echo("<hr>");
    echo("{$messageToShow->getDataWyslania()}<br>");
    echo("<h2>{$messageToShow->getFirstThirtyChar()}</h2><br>");
    echo("Wyslano do: {$messageToShow->getReceiveId()}<br>");
    echo("<a href='showMessage.php?messageId={$messageToShow->getId()}'>Pokaz Wiadomosc</a><br>");
}

?>