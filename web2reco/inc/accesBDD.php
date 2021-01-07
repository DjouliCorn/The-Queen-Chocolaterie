<?php
//Page unique pour un appel de BDD plus simple

define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'chocolaterie');
define('DB_DSN', 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';port=3306;charset=UTF8');
?>