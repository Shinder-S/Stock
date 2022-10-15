<?php
    $hash = password_hash("deposit", PASSWORD_DEFAULT);
    echo "Hash: " . $hash;

?>