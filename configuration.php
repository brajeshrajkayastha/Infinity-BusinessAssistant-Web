<?php
define('SOFTWARE_FNAME','Business Assistant');

define('SOFTWARE_SNAME','BA');

$database_system = 3;
//sqlite databases
define('SQLITE_DB_EMPLOYEE','');

define('SQLITE_DB_DATABASE','');

//sqlite3 databases
//define('SQLITE3_DB_EMPLOYEE','employee3.db');

define('SQLITE3_DB_DATABASE','');

//sql databases
define('SQL_HOST','localhost');

define('SQL_USERNAME','root');

define('SQL_PASSWORD','');

define('SQL_DATABASE','enterprises');

//Paths
define('PATH', dirname(__FILE__).'/');

define('PAATH', $_SERVER['HTTP_HOST']);

//Files Path Start
define('FILES', 'Files/');

define('OPERATORS',FILES.'operators/');

define('STYLESHEETS',FILES.'stylesheets/');

define('JAVASCRIPTS',FILES.'javascripts/');

define('ATTACHMENTS',FILES.'Attachments/');

define('IMAGES',FILES.'Images/');

//Pages Address
define('PAGES', FILES.'Pages/');

//Database Address
define('DATABASE_PATH', 'Database/');



//Page Title Arrays
//The Index of array should be in UPPERCASE

require_once(OPERATORS.'Database.php');

$database = database ();

require_once(OPERATORS.'Employee_Login.php');

$employeeLogin = new Login_Proc;


?>
