<?php
include_once 'config.php';
/********
	include() bisa memanggil file yang sama beberapa kali
	include_once() memanggil file yang sama hanya sekali
*********/

class User
{
	//database connect
	public function __construct(){
		$db = new DB_class();
	}
	
	//registration process
	public function register_user($nip, $username, $password, $email, $level){
		$password = md5($password);
		$sql = mysql_query("SELECT id_user from user WHERE nama_user='$username' or nip='$nip'");
		$rows = mysql_num_rows($sql);
		
		if($rows == 0){
			$result = mysql_query("INSERT INTO user(nip, nama_user, pass, email, level) 
									values 
								 ('" . mysql_real_escape_string($nip)."',
								  '" . mysql_real_escape_string($username)."',
								  '" . mysql_real_escape_string($pass)."',
								  '" . mysql_real_escape_string($email)."',
								  '" . mysql_real_escape_string($level)."'
								  )")or die(mysql_error());
			return $result;
		}else{
			return false;
		}
	}
	
	//login process
	public function check_login($username, $password){
		$password = sha1(md5($password));
		$result = mysql_query("SELECT id_user from user WHERE nama_user = '$username' and pass='$password'")or die(mysql_error());
		$user_data = mysql_fetch_array($result);
		$rows = mysql_num_rows($result);
		if($rows == 1){
			$_SESSION['login'] = true;
			$_SESSION['id_user'] = $user_data['id_user'];
			$_SESSION['level'] = $user_data['level'];
			return TRUE;
		}else{
			return FALSE;
		}
	}
	
	public function logout(){
		if(!$_SESSION['login']) {
			die("You are not logged in.");
		}else{
			session_start();
			$_SESSION = array();
			session_destroy();
			redirect("index.php");
			die();
		}
	}		
	
	public function menu($level){
		$menu="SELECT * FROM menu WHERE level='$level'";
		$ext = mysql_query($menu)or die(mysql_error());
        $data = array();
		while($hasil = mysql_fetch_object($ext))
		{
			$data[$hasil->parent_menu][] = $hasil;
		}
		/*
		echo "<pre>";
		var_dump($data);
		echo "</pre>";
		*/
		return $data;
		
	}	
}
//$start = new User();
?>