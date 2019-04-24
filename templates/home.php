<?php 

$this->layout('template', ['title' => 'Issue Tracking']) ;
session_start();

if (isset($_GET['response'])){
    switch($_GET['response']){
        case('Success'):
            echo '<div class="alert alert-success" role="alert">';
            echo 'User has been sucesfully registered. Please login';
            break;
        case('RightLogin'):
            echo '<div class="alert alert-success" role="alert">';
            echo 'You have logged in successfully.';
            break;
        case('WrongLogin'):
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Your username or password was not recognized. Please <a href=\'register.php\'>register</a> or try again.';
            break;
        case('Fail'):
            echo '<div class="alert alert-danger" role="alert">';
            echo 'User registration failed. Please try again';
            break;
        case('UsernameTaken'):
            echo '<div class="alert alert-danger" role="alert">';
            echo 'The username you provided is already being used. Please register again with a unique username.';
            break;
        case('LoggedOut'):
            echo '<div class="alert alert-primary" role="alert">';
            echo 'You have been successfully logged out.';
            break;
        case('Prevented'):
            echo '<div class="alert alert-danger" role="alert">';
            echo 'You have to be logged in for that.';
            break;
        default:
            echo '<div class="alert alert-success" role="alert">';
            break;
    }
    echo '</div>';
}
?>

<h1>Issue Tracking System</h1>

<?php if( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>

<em>Logged in user: <?= $_SESSION['userName'] ?></em><br/>
<em><a href="./logout.php">Log out</a></em>
<div class="jumbotron homeJumbo mt-5">
    <h3>What would you like to do?</h3>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm homeOption">
                <h4><a href="./new-issue.php">Submit a New Issue</a></h4>
            </div>
            <div class="col-sm homeOption">
                <h4><a href="./track-issues.php">Track an Existing Issue</a></h4>
            </div>
        </div>
    </div>
</div>

<?php else: ?>

<em>Please Login or Register</em>
<div class="jumbotron homeJumbo mt-5">
    <h3>Login</h3>
    <form action="handleLogin.php" method="post" class="loginForm mt-2">
        <input placeholder="Username" type="text" name="userName" id="userName" class="mb-1 mt-1"><br/>
        <input placeholder="Password" type="password" name="pass" id="pass"><br/>
        <input type="submit" id="loginButton" value="Login" class="mt-1">
    </form>
    ...or <a href='register.php'>register</a>
</div>

<?php endif; ?>

