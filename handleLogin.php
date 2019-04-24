<?php

    session_start();

    $userName   = $_POST['userName'];
    $pass       = $_POST['pass'];

    $loadMessage = '';

    $link = mysqli_connect("localhost", "root", "", "issuetracking");
    if(!$link):
        echo "Connection dropped.";
        echo mysqli_connect_errno() . '<br/>';
    endif;
    $pass = md5($pass);
    $sql = "
        select * from `users` where userName = '$userName' 
        AND pass = '$pass'
    ";

    $existingUsers = mysqli_query($link, $sql);
    $userExists = false;

    if(mysqli_num_rows($existingUsers) == 0){
        $userExists = false;
        $loadMessage = 'WrongLogin';
    } else {
        $userExists = true;
        $loadMessage = 'RightLogin';
        $_SESSION['loggedin'] = true;
        $_SESSION['userName'] = $userName;
    }

    header("Location: index.php?response=$loadMessage");

?>