<?php 

function randomPassword($allowed_chars, $len, $allow_repetitions) {
    $elementsLen = strlen($allowed_chars) - 1;
    $password = "";
    for($i = 0; $i < $len; $i++) {
        $n = rand(0, $elementsLen);

        if($allow_repetitions || !str_contains($password, $allowed_chars[$n])) {  //se le ripetizioni sono ammesse o se il carattere non si trova in $password
            $password .= $allowed_chars[$n];
        }
    }
    
    return $password;
}

?>