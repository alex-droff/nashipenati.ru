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
	<link rel="stylesheet" type="text/css" href="/css/style-2021.css">
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
			text-align: left;
			max-width: 550px;
			margin: 0 auto 1rem;
			font-family: 'Phenomena';
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

		.formrequest button#send {
			padding: 0 30px;
			height: 40px;
			display: flex;
			font-family: 'Phenomena';
			letter-spacing: .02em;
			font-size: 1.7rem;
			border-radius: 15px;
			background-color: #b48f97;
			line-height:1;
			align-items:center;
			flex-wrap:wrap;
			color:white;
			transition:all .3s ease;
		}

		.formrequest button#send:hover{
			transform:scale(1.05);
		}

		@media all and (max-width:768px){
			.request_form {
				padding: 3rem 1rem 0;
				width: 90% !important;
				margin: 0 auto;
			}

			.formrequest {
				max-width: 100%;
				margin: 0 auto;
			}
		}

	</style>
	<div class="container clearfix request_form">
		<h2>Заявка на запись в школу</h2></br>
		<h4>Внимание! Это заявка на очное обучение. Если вы собираетесь поступать на заочное, перейдите по этой <a href="http://distnashipenati.ru/page.php?idp=198">ссылке</a></h4>

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
				<label for="eduform"><strong>Форма обучения</strong>*</label>
				<select name="eduform" id="eduform">
					<option disabled selected>Выберите форму обучения</option>
					<option value="Очная">Очная</option>
					<option value="Заочная">Заочная</option>
				</select>
			</div>
			<p class="erreduform" style="display:none;">Выберите форму обучения</p>

			<!-- <div>
				<label for="direction"><strong>Направление</strong>*</label>
				<select name="direction" id="direction">
					<option disabled selected>Выберите направление</option>
					<option value="Детский сад">Детский сад</option>
					<option value="Младшая школа">Младшая школа</option>
					<option value="Средняя/старшая школа">Средняя/старшая школа</option>
				</select>
			</div> -->
			
			<div>
				<label for="msg"><strong>Сообщение</strong></label>
				<textarea id="msg" name="msg" placeholder="Ваше сообщение..." style="height:110px" class="txt"></textarea>
			</div>
			<p class="errname" style="display:none;">Неправильно заполнено поле "Сообщение"</p>

			<div>
				<label>&nbsp;</label>
				<div>
					<p>* - Поля обязательны для заполнения</p>
					<p><button id="send">отправить</button></p>
				</div>
			</div>
			
		</form>
	</div>
</body>

</html>