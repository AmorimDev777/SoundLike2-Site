<?php

$dbHost = 'localhost';
$dbUser = 'root';
$dbPassword = '';
$dbName = 'soundlike';

$conexao = new mysqli($dbHost,$dbUser,$dbPassword,$dbName);

//if ($conexao->connect_errno) {
//    echo "erro";
//}
//else {
//    echo "Tudo certo 👍🏿";
//};
?>