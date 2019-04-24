<?php $this->layout('template') ?>
<div class="appContainer">
<div class="header">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <div class="container">
        <a class="navbar-brand" href="index.php">Issue Tracking</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="targetMe">
            <ul class="navbar-nav">
            <li class="nav-item <?= $this->e($activeSubmit) ?>">
                <a class="nav-link" href="./new-issue.php">Issue Submission</a>
            </li>
            <li class="nav-item <?= $this->e($activeTracking) ?>">
                <a class="nav-link" href="./track-issues.php">Issue Tracking</a>
            </li>
            </ul>
            </div>
        </div>
    </div>
</nav>
</div>