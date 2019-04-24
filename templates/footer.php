<?php $this->layout('template') ?>
<footer>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ ?>
            <span class="navbar-brand mb-0"><a href='logout.php'>Log Out</a></span>
            <?php } else { ?>
                <span class="navbar-brand mb-0"><a href='index.php'>Log In</a></span>
            <?php } ?>
        </div>
    </nav>
</footer>
</div>