<? require "topfile.php";?>
<!DOCTYPE html>
<html>

<head>
	<title>ЧОУ СОШ «Наши Пенаты»</title>
	<meta charset=UTF-8>

	<meta name="robots" content="index, follow">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="/favicon.ico">
	<!-- CSS begin -->

	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<link rel="stylesheet" type="text/css" href="/css/skeleton.css">

	<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox-1.3.4.css">

	<link rel="stylesheet" href="/css/layout/wide.css" id="layout">
	<link rel="stylesheet" href="/css/colors/red.css" id="colors">

	<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="css/style-ie.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="css/ei8fix.css" ><![endif]-->

	<!-- flexslider slider CSS -->

	<script src="/js/jquery-1.11.2.min.js"></script>
	<script src="/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<!--end flexslider slider CSS -->

	<!-- CSS end -->

	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

</head>

<body>

	<script>
		function validateEmail($email) {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			if (!emailReg.test($email)) {
				return false;
			} else {
				return true;
			}
		}
		$(document).ready(function () {

			//$("#contact").submit(function() { return false; });

			$("#send").on("click", function () {

				// if both validate we attempt to send the e-mail
				// first we hide the submit btn so the user doesnt click twice
				$("#send").replaceWith("<h2 style='text-align:center;margin-top:2rem'>Успешно!</h2><p style='text-align:center'><strong> Ваше сообщение было отправлено, спасибо!</strong></p>");

				$.ajax({
					type: 'POST',
					url: '/senddbmessage.php',
					data: $("#contact").serialize(),
					success: function (data) {
						console.log(data);
						if (data == "true") {
							$("#contact").fadeOut("fast", function () {
								$(this).before(
									"<br><br><br><br><br><br><br><h1>Успешно!</h1><p><strong> Ваше сообщение было отправлено, спасибо!</strong></p>"
								);
								setTimeout("$.fancybox.close( true )", 1000);
							});
						}
					}
				});

			});
		});
	</script>

	<? //0 = письмо с сайта с главной?>
	<style>
		.request_form {
			padding: 3rem 0 0;
			width:100%;
		}

		.request_form h2{
			text-align: center;
			margin-bottom: 1rem;
		}

		.formrequest{
			max-width: 550px;
			margin: 0 auto;
		}

		.formrequest input,
		.formrequest textarea,
		.formrequest select{
			width:100%;			
			padding: 5px 10px;
			background: #fcfcfc;
			border: 1px solid #c3b6b6;
		}

		.formrequest select{
			max-width: 580px;
		}

		.formrequest>div{
			margin-bottom: 1rem;
			display:flex;
			width:100%;
			max-width: 550px;
		}

		.formrequest>div label{
			min-width: 100px;
		}

	</style>
	<div class="container clearfix request_form">
		<h2>Заявка на запись в школу</h2></br>

		<form id="contact" name="contact" class="formrequest" action="#" method="post">
			<input type="hidden" id="prodsub" name="prodsub" value="Заявка на запись в школу">
			<input type="hidden" id="prodid" name="prodid" value="17">
			<input type="hidden" id="subid" name="subid" value="<?=$_REQUEST['lp'];?>">

			<div>
				<label for="fio"><strong>Ваше имя</strong>*</label>
				<input type="text" id="fio" name="fio" class="txt requiredField">
			</div>
			<p class="errname" style="display:none;">Неправильно заполнено поле "Ваше имя"</p>
			
			<div>
				<label for="kid_name"><strong>Имя ребенка</strong>*</label>
				<input type="text" id="kid_name" name="kid_name" class="txt">
			</div>
			<p class="errname" style="display:none;">Неправильно заполнено поле "Имя ребенка"</p>
			
			<div>			
				<label for="email"><strong>E-mail</strong>*</label>
				<input type="text" id="email" name="email" class="txt  requiredField">
			</div>
			<p class="erremail" style="display:none;">Неправильно заполнено поле "E-mail"</p>
			
			<div>
				<label for="phone"><strong>Телефон</strong>*</label>
				<input type="phone" id="phone" name="phone" class="txt" placeholder="+7XXX-XXXXXXX">
			</div>
			<p class="errephone" style="display:none;">Неправильно заполнено поле Телефон</p>

			<div>
				<label for="direction"><strong>Направление</strong>*</label>
				<select name="direction" id="direction">
					<option disabled selected>Выберите направление</option>
					<option value="Детский сад">Детский сад</option>
					<option value="Младшая школа">Младшая школа</option>
					<option value="Средняя/старшая школа">Средняя/старшая школа</option>
				</select>
			</div>
			
			<div>
				<label for="msg"><strong>Сообщение</strong></label>
				<textarea id="msg" name="msg" placeholder="Ваше сообщение..." style="height:110px" class="txt"></textarea>
			</div>
			<p class="errname" style="display:none;">Неправильно заполнено поле "Сообщение"</p>

			<div>
				<label>&nbsp;</label>
				<div>
					<p>* - Поля обязательны для заполнения</p>
					<p><button id="send" class="button medium red">Отправить сообщение</button></p>
				</div>
			</div>
			
		</form>
	</div>
</body>

</html>