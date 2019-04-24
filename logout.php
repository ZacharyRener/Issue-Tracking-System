<?php

    session_start();
    $_SESSION['loggedin'] = false;
    unset($_SESSION['userName']);
    $loadMessage = 'LoggedOut';
    header("Location: index.php?response=$loadMessage");

?>