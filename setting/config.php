<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'absensi');

class DB_class{
	function __construct(){
		$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD)
					  or die('Oop kata emprit koneksi error dengan keterangan '.mysql_error());
		mysql_select_db(DB_DATABASE)or die('Database error.'.mysql_error());
	}
}
?>