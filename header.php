<?php
echo "<!DOCTYPE html>\n";
echo "<html>\n\n";
echo "<head>\n";
echo "\t<title>E3 Printing</title>\n";
echo "\t<link rel=\"stylesheet/less\" type=\"text/css\" href=\"".WEB."styles/styles.php\" />\n";
echo "\t<script type=\"text/javascript\" src=\"".WEB."libs/less.js\"></script>\n";
echo "\t<script type=\"text/javascript\" src=\"".WEB."libs/jq.js\"></script>\n";
echo "\t<script type=\"text/javascript\" src=\"".WEB."js/js.js\"></script>\n";
echo "</head>\n\n\n";
echo "<body>\n";
echo "<div class=\"TopBanner\" align=\"center\">";
echo "<div class=\"Logo\"></div>";
echo "<div class=\"nav\">";
	echo "<a href=\"".WEB."user/login\">Login</a>";
	echo "<a href=\"#\">Create an Account</a>";
	echo "<a href=\"#\">Contact Us</a>";
echo "</div>";
echo "</div>";
?>