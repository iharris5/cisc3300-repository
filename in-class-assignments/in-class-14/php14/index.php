<?php

require 'class/Cookie.php';

use php14\class\Cookie;

$cookie = new Cookie('Chocolate', 10.25);

echo $cookie->cookieInfo();
?>
