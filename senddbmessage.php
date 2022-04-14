<?php
	
	$mysqli = new mysqli("cmsch.mysql", "cmsch_mysql", "cT-jsv1C", "cmsch_db");
	
		$result = $mysqli->query("set names 'utf8'");
		$mysqli->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");


	date_default_timezone_set('Europe/Moscow');
 
	//0 = письмо с сайта с главной
	//1=Заявка Торговое финансирование;
	//2=заявка на инкассацию
	//3=заявка на кредит  (корпоративн)
	//4-заявка на БГ(корпоративн)
	//5=заявка на зарплатный проект(корпоративн)
	//6-заявка на ВЭД
	// 7 -Таможенные гарантии
	// 8 -Потребительский кредит
	// 9 -Ипотека
	// 10 -Автокредит
	// 11 - Пластиковая карта
	// 12 - Вклад
	// 13 - Кредитование малого и среднего бизнеса
	// 14 - Размещение денежных средств
	$usermail = $_POST['email'];
	$username = $_POST['fio'];
	$usercity = $_POST['city'];
	$useroffice = $_POST['office'];
	$userphone = $_POST['phone'];
	$content  = nl2br($_POST['msg']);
	$direction = $_POST['direction'];
	$sub = $_POST['prodsub'];
	$idsub = $_POST['prodid'];
	$subid = $_POST['subid'];


// Адрес получателя заявки
$sendto   = "kotoffsfamily@gmail.com,n.ilinsky@iblschool.ru,a.belova@nashipenati.ru,a.sokolova@nashipenati.ru"; 
// Адрес получателя заявки

$subject  = "Письмо-заявка с сайта nashipenati.ru, ".$sub.". ".$usercity;
//$headers  = "From: " . strip_tags($usermail) . "\r\n";
//$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
$headers  = "From: info@nashipenati.ru \r\n";
$headers .= "Reply-To:  info@nashipenati.ru  \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html;charset=utf-8 \r\n";

$msg  = "<html><body style='font-family:Arial,sans-serif;'>";
$msg .= "<h2 style='font-weight:bold;border-bottom:1px dotted #ccc;'>Письмо с сайта nashipenati.ru, ".$sub." </h2>\r\n";
$msg .= "<p><strong>Имя:</strong> ".$username."</p>\r\n";
if ($_POST['prodid']==18) {$msg .= "<p><strong>Компания:</strong> ".$_POST['comp']."</p>\r\n"; } 
if ($_POST['prodid']==0) {$msg .= "<p><strong>Сообщение:</strong> ".$_POST['city']."</p>\r\n"; } else { $msg .= "<p><strong>Сообщение:</strong> ".$usercity."</p>\r\n"; }
if($direction){$msg .= "<p><strong>Направление:</strong> ".$direction."</p>\r\n";}
$msg .= "<p><strong>Email:</strong> ".$usermail."</p>\r\n";
$msg .= "<p><strong>Телефон:</strong> ".$userphone."</p>\r\n";

if($content){$msg .= "<p><strong>Сообщение:</strong> ".$content."</p>\r\n";}
$msg .= "</body></html>";

$sql="INSERT INTO  `siterequest` (
`id_req` ,
`req_email` ,
`req_mess` ,
`req_fio` ,
`prod_id` ,
`req_city` ,
`req_phone` ,
`prod_udes` 
)
VALUES (
NULL ,
'".$_POST['email']."' ,
'".$_POST['msg']."' ,
'".$_POST['fio']." ".$_POST['comp']."' ,
'".$_POST['prodid']."' ,
'".$_POST['city']." ".$_POST['office']."' ,
'"."+7 (".$_POST['prefix'].")".$_POST['phone']."' ,
'".$_POST['prodsub']."' 
);";
//echo $sql; 
$result = $mysqli->query($sql);
echo "true";
 if(@mail($sendto, $subject, $msg, $headers)) {
	echo "true";
} else {
	echo "false";
}


?>