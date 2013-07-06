<?
ini_set('max_execution_time', 86400);
date_default_timezone_set('America/Los_Angeles');
ob_implicit_flush(true);
define('HOST','68.178.142.120');
define('DBUSER','e3prints');
define('DBPASS','E3printing!');
define('WEB','http://E3Prints.com/');
define('DIR','./');
define('DEBUG',true);


require DIR.'core/database.php';
require DIR.'core/core.php';
require DIR.'core/forms.php';
require DIR.'core/table.php';
?>
