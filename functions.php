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



/**$_SESSION['generate_password'] = $generate_password;
header("location: /show-password.php"); */
?>