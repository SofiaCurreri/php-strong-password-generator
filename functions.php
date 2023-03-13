<?php 
$len_password = $_GET["password"];

function randomPassword($len) {
    $elements = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $elementsLen = strlen($elements) - 1;
    $password = [];
    for($i = 0; $i < $len; $i++) {
        $n = rand(0, $elementsLen);
        $password[] = $elements[$n];
    }

    print(implode($password));
}
?>