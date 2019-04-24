<?php

    $name       = $_POST['name'];
    $userName   = $_POST['userName'];
    $pass       = $_POST['pass'];
    $email      = $_POST['email'];

    $loadMessage = '';

    $link = mysqli_connect("localhost", "root", "", "issuetracking");
    if(!$link):
        echo "Connection dropped.";
        echo mysqli_connect_errno() . '<br/>';
    endif;

    $sql = "
        select * from `users` 
        where userName = '$userName'
    ";

    $existingUsers = mysqli_query($link, $sql);
    $userExists = false;

    if(mysqli_num_rows($existingUsers) == 0)
        $userExists = false;
    else 
        $userExists = true;
    
    if(!$userExists){
        $pass = md5($pass);
        $sql = "
        insert into users
        values ('$name','$userName','$pass','$email')
        ";

        $loadMessage = (!$link->query($sql))
            ? 'Fail'
            : 'Success';

    } else {
        $loadMessage = 'UsernameTaken';
    }

    header("Location: index.php?response=$loadMessage");

?>