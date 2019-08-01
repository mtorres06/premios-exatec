<?php	
if(!defined('environment')) {
    define('environment','DEV'); // 
}
if(!defined('devURL')) {
    define('devURL','http://localhost/premios-exatec/'); // 
}
if(!defined('prodURL')) {
    define('prodURL','https://premiosexatec.xperienciaweb.com/'); // 
}

if(!defined('MYSQL_SERVER')) {
    define('MYSQL_SERVER', 'localhost');
}
if(!defined('MYSQL_PORT')) {
    define('MYSQL_PORT', '3306');
}
if(!defined('DB')) {
    define('DB', 'premiosdb');
}
if(!defined('MYSQL_USER')) {
    define('MYSQL_USER', 'root');
}
if(!defined('MYSQL_PASS')) {
    define('MYSQL_PASS', '');
}
?>