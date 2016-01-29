<?php

//$salt = mcrypt_create_iv (60, MCRYPT_DEV_URANDOM);
//echo $salt. "<br>";


$options = [

    'cost' => 11,

    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),

];

$pass = "Lubieplackibardzobardzo";

$hashedPas = password_hash($pass, PASSWORD_BCRYPT, $options);

echo $hashedPas;


$result = password_verify("Lubieplackibasdfsfdrdzobardzo", $hashedPas);
var_dump($result);

$result = password_verify("Lubieplackibardzobardzo", $hashedPas);
var_dump($result);

