<?php 

function randomPassword($allowed_chars, $len) {
    $elementsLen = strlen($allowed_chars) - 1;
    $password = [];
    for($i = 0; $i < $len; $i++) {
        $n = rand(0, $elementsLen);
        $password[] = $allowed_chars[$n];
    }
    
    return $password;
}

if(!empty($_GET)) {
    $alphabet = "abcdefghijklmnopqrstuvwxyz";
    $alphabetUC = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numbers = "1234567890";
    $specials = "!$%&/()=?[]\{}-_";

    $len_password = (int) $_GET["password_length"] ?? 5;        
    $all_chars = $alphabet . $alphabetUC . $numbers . $specials;
    
    $generated_password = randomPassword($all_chars, $len_password);
}

/**$_SESSION['generate_password'] = $generate_password;
header("location: /show-password.php"); */
?>