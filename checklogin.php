<?	
session_start();

function generatePassword ($length = 8)
{

  // start with a blank password
  $password = "";

  // define possible characters
   $possible = "0123456789abcdfghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ"; 
  // set up a counter
  $i = 0; 
    
  // add random characters to $password until $length is reached
  while ($i < $length) { 

    // pick a random character from the possible ones
    $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);
        
    // we don't want this character if it's already in the password
    if (!strstr($password, $char)) { 
      $password .= $char;
      $i++;
    }

  }

  // done!
  return $password;

}	
/* check connection
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
} */

		$mysqli = new mysqli("cmsch.mysql", "cmsch_mysql", "/cD7EWLG", "cmsch_db");
	
		$result = $mysqli->query("set names 'utf8'");
		$mysqli->query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
		
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
//print_r($_POST);

$data2 = array( 'status' => 'false', 'date' => '' );
$option = 2; 

 
if(isset($_SESSION['id'])) {
	header('Content-type: application/json');
 echo json_encode( $data2 ); exit;  } else { 

if($_POST['chechks']=='login')
{
	// Checking whether the Login form has been submitted
	
	$err = array();
$_POST['email'] = $mysqli->real_escape_string($_POST['email']);
		$_POST['password'] = $mysqli->real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];
		
		// Escaping all input data

		$sql="SELECT id,username,email, names,	secondname, avatar, countlogin, statuser, statuser, is_student	 FROM users WHERE email='{$_POST['email']}' AND password='".md5($_POST['password'])."' and allowname=0";
		$result = $mysqli->query($sql); 

		if ($result->num_rows>=1){ 
			$data2['status']='suxx';
			$data2['date']=$hh;
		} else {
			$data2['status']='error';
			$data2['date']='students not find';
		}
//echo $sql;

 
 
} 

if($_POST['chechks']=='regist')
{
	// Checking whether the Login form has been submitted
	
	$err = array();
$_POST['email'] = $mysqli->real_escape_string($_POST['email']);
		$_POST['password'] = $mysqli->real_escape_string($_POST['password']);
		$_POST['rememberMe'] = (int)$_POST['rememberMe'];
		
		// Escaping all input data

		$sql="SELECT id,username,email, names,	secondname, avatar, countlogin, statuser, statuser, is_student	 FROM users WHERE email='{$_POST['email']}'";
		$result = $mysqli->query($sql); 

		if ($result->num_rows>=1){ 
			$data2['status']='error';
			$data2['date']="Email is taken";
		} else {
			$data2['status']='suxx';
			$data2['date']='Email is allowed';
		}
//echo $sql;

 
 
} 

if($_POST['chechks']=='fgtpsw')
{
	
	
	$err = array();
	
	 if (isset($_POST['emailforgot'])) {
		 $pse= $mysqli->real_escape_string($_POST['emailforgot']);
		$sql="SELECT id, email FROM `users` where email = '".$pse."';";
		//echo $sql;
		$result = $mysqli->query($sql); 
		if ($result->num_rows>=1){ 
			$data2['status']='suxx';
			$data2['date']=$hh;
			$myemail = $result->fetch_object();
		} else {
			$data2['status']='error';
			$data2['date']='students not find';
		}
				
		
	 if ($myemail->id) {
	 
			$newpsw=generatePassword();
			$mdnewpsw=md5($mysqli->real_escape_string($newpsw));
			$sql="UPDATE `users` SET `pass` = '$mdnewpsw' WHERE  `id` =".$myemail->id." LIMIT 1 ;";
			//echo $sql; 
			$result = $mysqli->query($sql); 
				 
			$email =$myemail->email;
			$eol="\r\n";
			$mime_boundary=md5(time());

			  # Common Headers
			  $headers = "From: Robot <info@cmsch.ru> ".$eol;
			  $headers .= "Reply-To: info@cmsch.ru".$eol;
			  $headers .= "Return-Path: ".$eol;    // these two to set reply address
			  $headers .= "Message-ID: <".time()."-".$_POST['email'].">".$eol;
			  $headers .= "X-Mailer: PHP v".phpversion().$eol;          // These two to help avoid spam-filters
			  $headers .= "Content-Type: text/html;charset=utf-8 \r\n".$eol; 
			
			  # Boundry for marking the split & Multitype Headers
			  $headers .= 'MIME-Version: 1.0'.$eol.$eol;

				$subject="Cайт cmsch.ru восстановление пароля.";
				$mtext="Письмо с сайта Йоди.ру восстановление пароля ".$eol." Логин ".$myemail->email.$eol." Пароль ".$newpsw.$eol;
				if(mail($email,$subject, $mtext,  $headers)) $stext="<span style='color:#990000; font-weight:bold;'>Сообщение отправлено!</span>";
				else  $stext="<span style='color:#990000; font-weight:bold;'>Error! Сообщение не отправлено!!</span>";
				 
	
	
	}
	}
	

}

}



header('Content-type: application/json');
 echo json_encode( $data2 );
//echo $prof ;










