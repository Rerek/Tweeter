<?php

require_once ("./src/connectPHP.php");
if(!isset($_SESSION['userID'])){
    header("Location:login.php");
}
echo("<a href='logout.php'>Wyloguj</a><br>");
echo("<a href='main.php'>Main</a><br>");
$allUsers = User::getAllUsers();
echo("<h1>Uzytkownicy servisu</h1><br>");
foreach($allUsers as $userToShow){
    echo("<hr>");
    echo("<h3>{$userToShow->getName()}</h3><br>");
    echo("<a href='showUsers.php?userId={$userToShow->getId()}'>Show</a><br>");
}


?>