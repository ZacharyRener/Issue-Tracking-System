<?php 

require 'vendor/autoload.php';
$templates = new League\Plates\Engine('templates/');

echo $templates->render('header', [
    'activeSubmit' => '',
    'activeTracking' => ''
]);
echo '<div class=\'container secondary\'>';
echo $templates->render('register');
echo '</div>';
echo $templates->render('footer');

?>