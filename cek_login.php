<?php
include "inc/inc.koneksi.php";
include "inc/fungsi_hdt.php";

function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}
$username= anti_injection($_POST['username']);
$pass	 = anti_injection($_POST['password']);
#$pass = anti_injection($_POST['password']);
// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
//  echo "Sekarang loginnya tidak bisa di injeksi lho.";
header("Location: index.php");
?>
<?php
}else{
	$login	=mysql_query("SELECT * FROM user WHERE user='$username'");
	$ketemu	=mysql_num_rows($login);
	if ($ketemu>0){
		$r		=mysql_fetch_array($login);
		$pwd	=$r['pass'];
		if ($r['blokir'] == 'Y'){
			salah_blokir($username);
			return false;
		}
		if ($pwd==$pass){
			sukses_masuk($username,$pass);
		}else{
			session_start();
			$salah =1;
			$_SESSION['salah']=$_SESSION['salah']+$salah;
			if ($_SESSION['salah']>=3){
				blokir($username);
			}
			salah_password();
		}
	}else{
		salah_username($username);
	}
}
?>
