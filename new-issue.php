<?php

require 'vendor/autoload.php';
$templates = new League\Plates\Engine('templates/');

echo $templates->render('header', [
    'activeSubmit' => 'active',
    'activeTracking' => ''
]);
echo '<div class=\'container secondary\'>';
echo $templates->render('newIssue');
echo '</div>';
echo $templates->render('footer');

?>