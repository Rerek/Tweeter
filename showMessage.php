<?php
require_once("./src/connectPHP.php");
if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");
if (isset($_GET['messageId'])) {
    $messageId = $_GET['messageId'];
}else{
    header("Location:login.php");
}
$message = Message::getMessageById($messageId);
$message->setStatusPrzeczytania(0);
$message->saveToDB();
echo("{$message->getText()} <br>")

?>