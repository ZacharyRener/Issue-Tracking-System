<?php $this->layout('template', ['title' => 'Issue Tracking']) ?>
<h1>Issue Tracking System</h1>
<em>Please Login or Register</em>
<div class="jumbotron homeJumbo mt-5">
    <h3>Register</h3>
    <form action="./handleRegistration.php" method="post" class="loginForm mt-2">
        <input placeholder="Name" type="text" name="name" id="name" class="mb-1 mt-1"><br/>
        <input placeholder="Username" type="text" name="userName" id="userName" class="mb-1"><br/>
        <input placeholder="Password" type="password" name="pass" id="pass" class="mb-1"><br/>
        <input placeholder="Email" type="text" name="email" id="email"><br/>
        <input type="submit" id="loginButton" value="Login" class="mt-1">
    </form>
    ...or <a href='index.php'>login</a>
</div>