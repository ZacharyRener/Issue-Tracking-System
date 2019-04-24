<?php

    session_start();
    $title       = $_POST['title'];
    $description = $_POST['description'];
    $user        = $_SESSION['userName'];

    $loadMessage = '';

    $link = mysqli_connect("localhost", "root", "", "issuetracking");
    if(!$link):
        echo "Connection dropped.";
        echo mysqli_connect_errno() . '<br/>';
    endif;

    $currentTime = date("Y-m-d H:i:s");

    $sql = "
    insert into `issues`
    values ('', '$user','$title','$description', '$currentTime','false')
    ";

    if (!$link->query($sql)){
        echo 'data insertion failed: ' . $link->error . '<br/>';
        $loadMessage = 'Failed';
    }else{
        echo 'data inersted successfully' . '<br/>';
        $loadMessage = 'Success';
    }

    $sql = "
        select TicketNumber from `issues` where userName = '$user' and timeStamp = '$currentTime' 
    ";
    $ticketNumberSQL = mysqli_query($link, $sql);
    $ticketArray = mysqli_fetch_assoc($ticketNumberSQL);
    $ticketNumber = $ticketArray['TicketNumber'];

    header("Location: new-issue.php?response=$loadMessage&ticketnumber=$ticketNumber");

?>