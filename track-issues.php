<?php

require 'vendor/autoload.php';
$templates = new League\Plates\Engine('templates/');

echo $templates->render('header', [
    'activeSubmit' => '',
    'activeTracking' => 'active'
]);
echo '<div class=\'container secondary\'>';
echo $templates->render('trackIssues');
echo '</div>';
echo $templates->render('footer');

?>