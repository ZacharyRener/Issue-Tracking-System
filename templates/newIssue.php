<?php

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ 
    if (isset($_GET['response'])){
        switch($_GET['response']){
            case('Success'):
                echo '<div class="alert alert-success" role="alert">';
                echo 'Your issue has been submitted successfully. Your ticket number is ' . $_GET['ticketnumber'] . '. <a href="track-issues.php">Click here</a> to view your ticket status.';
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
<h1>Record an Issue</h1>
<em>Logged in user: <?= $_SESSION['userName'] ?></em><br/>
<em><a href="./logout.php">Log out</a></em> - <em><a href="./index.php">Return Home</a></em>

<div class="jumbotron mt-5 issueTron">
    <form action="handleNewIssue.php" method="post" class="issueForm">
        <input placeholder="Issue title" type="text" name="title" id="title"><br/>
        <textarea placeholder="Issue description" name="description" id="description" cols="30" rows="10"></textarea><br/>
        <input type="submit" id="loginButton" value="Submit Issue">
    </form>
</div>

<?php } else {
    $loadMessage = 'Prevented';
    header("Location: index.php?response=$loadMessage");
}

?>

