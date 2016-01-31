<?php

require_once ("./src/connectPHP.php");

$allUsers = User::getAllUsers();

foreach($allUsers as $userToShow){
    echo("<h1>{$userToShow->getName()}</h1><br>");
    echo("<a href='showUsers.php?userId={$userToShow->getId()}'>Show</a><br>");
}


?>