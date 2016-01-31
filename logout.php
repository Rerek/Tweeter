<?php
require_once ("./src/connectPHP.php");

unset($_SESSION['userID']);
header("Location:login.php");