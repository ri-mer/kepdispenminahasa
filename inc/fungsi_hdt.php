<?php
function sukses_masuk($username,$pass){
	// Apabila username dan password ditemukan
	$login=mysql_query("SELECT * FROM user WHERE user='$username' AND pass='$pass' AND blokir='N'");
	$ketemu=mysql_num_rows($login);
	$r=mysql_fetch_array($login);
	if ($ketemu > 0){
	  session_start();
	  include "timeout.php";
		$_SESSION['id']     = $r['id_user']; 
		$_SESSION['username']     = $r['user']; 
		$_SESSION['passuser']     = $r['pass'];
		$_SESSION['level']    = $r['level'];
		$_SESSION['nama']    = $r['nama'];

		
if ($r['level'] == "admin")
{  header('location:admin/?module=home');
}
else if ($r['level'] == "hrd")
{ header('location:hrd/?module=home'); 
}
else if ($r['level'] == "gm")
{ header('location:gm/?module=home'); 
}
		// session timeout
		$_SESSION['login'] = 1;
		timer();
		
	}
	return false;
}

function msg(){
header("Location: index.php");
}

function salah_blokir($username){
header("Location: index.php");
}

function salah_username($username){
header("Location: index.php");
}

function salah_password(){
header("Location: index.php");
}

function blokir($username){
header("Location: index.php");
}    

?>