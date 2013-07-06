<?php
require './core/config.php';
$X=new X($_REQUEST);
if(!isset($_POST['AJAX'])){require DIR.'header.php';}
require DIR.'navbar.php';
if(is_file(DIR.'pages/'.$X->PAGE.'.php')){require DIR.'pages/'.$X->PAGE.'.php';}
else{require DIR.'pages/400.php';}
echo "<script type=\"text/javascript\" src=\"".WEB."js/{$X->PAGE}.js\"></script>\n";
if(!isset($_POST['AJAX'])){require DIR.'footer.php';}
//echo "<pre id=\"debug\">";print_r($X);echo "</pre>";
?>