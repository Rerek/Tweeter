<?php

require_once(dirname(__FILE__) . "/config.php");
require_once (dirname(__FILE__) . "/user.php");
require_once (dirname(__FILE__) . "/tweet.php");
require_once (dirname(__FILE__) . "/comment.php");
require_once (dirname(__FILE__) . "/message.php");

session_start();

$conn = new mysqli($dbHostname, $dbUsername, $dbPassword, $dbBaseName);

if($conn->connect_errno){
    die ("Połączenie do bazy danych nie udane" . $conn->connect_error);
}

User::SetConnection($conn);
Tweet::SetConnection($conn);
Comment::SetConnection($conn);
Message::SetConnection($conn);




?>