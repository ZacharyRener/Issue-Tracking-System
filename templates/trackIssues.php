<?php

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ 
    if (isset($_GET['response'])){
        switch($_GET['response']){
            case('Success'):
                echo '<div class="alert alert-success" role="alert">';
                echo 'Your issue has been submitted successfully.';
                echo '</div>';
                break;
            case('Fail'):
                echo '<div class="alert alert-danger" role="alert">';
                echo 'Your issue failed to submit. Please try again.';
                echo '</div>';
                break;
        }
    }
?>
<h1>Your Issues</h1>
<em>Logged in user: <?= $_SESSION['userName'] ?></em><br/>
<em><a href="./logout.php">Log out</a></em> - <em><a href="./index.php">Return Home</a></em>

<?php
    $link = mysqli_connect("localhost", "root", "", "issuetracking");
    if(!$link):
        echo "Connection dropped.";
        echo mysqli_connect_errno() . '<br/>';
    endif;
    $sql = 'select * from issues where userName = \'' . $_SESSION['userName'] . '\'';
    $queryResult = mysqli_query($link, $sql);
    if(mysqli_num_rows($queryResult) > 0){
        while($row = mysqli_fetch_assoc($queryResult)){
            $resolved = ($row['resolved'] == 0) 
                ? 'No'
                : 'Yes';
            echo '
            <div class="jumbotron mt-5 issueTron">
                <h2>'.$row['title'].'</h2>
                <em>Ticket number: '.$row['TicketNumber'].'</em><br/>
                <em>Resolved: '.$resolved.'</em>
                <p class="mt-3">'.$row['description'].'</p>
            </div>
            ';
        }
    } else {
        echo '<p class="mt-5">You have zero outstanding issues.</p>';
    }
?>

<?php } else {
    $loadMessage = 'Prevented';
    header("Location: index.php?response=$loadMessage");
}

?>

