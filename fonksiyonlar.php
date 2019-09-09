<?php 


function oturumkontrol(){
	if (!isset($_SESSION['kul_mail']) OR !isset($_SESSION['kul_isim'])  OR !isset($_SESSION['kul_id'])) {
		session_destroy();
		header("location:login.php");
		exit;
	}
}


function kisalinkuret()
{
	$karakterler = "1234567890abcdefghijuvwxyzklmnopqrst0987654321";
	$link = '';
	for($i=0;$i<5;$i++)                   
	{
		$link .= $karakterler{rand() % 46};  
	}
	return $link;      
}


function uzunlinkuret()
{
	$karakterler = "1234567890abcdefghijuvwxyzklmnopqrst0987654321";
	$link = '';
	for($i=0;$i<30;$i++)                   
	{
		$link .= $karakterler{rand() % 46};  
	}
	return $link;      
}



function yetkikontrol()
{
	if (@$_SESSION['kul_yetki']==1) {
		return TRUE;
	} else {
		return FALSE;
	}
}


function guvenlik($gelen)
{
	$giden=strip_tags($gelen);
	$giden=htmlentities($giden);
	return $giden;
}










?>