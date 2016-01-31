<?php

require_once ("./src/connectPHP.php");

if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}

$user = User::getUserById($_SESSION['userID']);

echo ("<h1>Odebrane</h1><br>");
$messages = Message::loadAllReceivedMessages($user->getId());
foreach($messages as $messageToShow){
    echo("<h2>{$messageToShow->getFirstThirtyChar()}</h2><br>");
    echo("<a href='showTweet.php?tweetId={$messageToShow->getId()}'>Show</a><br>");
}

?>