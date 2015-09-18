<?php 

define('HOSTNAME', 'localhost');
define('DBNAME', 'nested_menu');
define('USERNAME', 'root');
define('PASSWORD', '');

try {
    $db = new PDO('mysql:host='.HOSTNAME.';dbname='.DBNAME.';charset=utf8', USERNAME, PASSWORD);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>
