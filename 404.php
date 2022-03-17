<? include('topfile.php'); if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
   // header("location: index.php");
}
?><!DOCTYPE html>
<? 
$sqlpage="SELECT * FROM  `page` WHERE id=".(int)$_REQUEST['idp'].";";
$respage = $mysqli->query($sqlpage);
		if ($respage->num_rows>=1) { 
		$mpaget = $respage->fetch_object();
		}
?>
<html lang="ru">
 	<head>
		<title><?=$mpaget->page_name;?>ЧОУ СОШ «Наши Пенаты»</title>
		<meta charset=UTF-8 >
		
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="404" > 
		<meta name="description" content="" > 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="/favicon.ico">
<!-- CSS begin -->

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css" >
		<link rel="stylesheet" type="text/css" href="/css/skeleton.css" >
		<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox-1.3.4.css">  
		<link rel="stylesheet" href="/css/layout/wide.css" id="layout">
		<link rel="stylesheet" href="/css/colors/red.css" id="colors">
		<!-- flexslider slider CSS -->
		<link rel="stylesheet" type="text/css" href="/css/flexslider.css"  >
        <!--end flexslider slider CSS -->
		
<!-- CSS end -->
		
	</head>
	<body>
	
<div id="wrap" class="boxed">
<div class="grey-bg"> <!-- Grey bg  -->	
	
<!-- HEADER -->
		<header id="header" >
			<div class="container clearfix">
				<div class="sixteen columns">
						<div class="header-container m-top-30 clearfix">
				
							<div class="header-logo-container ">
								<div class="logo-container">	
									<a href="/" class="logo" rel="home" title="Home">
										<img src="/images/logo.png" alt="логотип" >
                                        <div>наши Пенаты<br><span>
 
Частная школа и детский сад</span></div>
									</a>
								</div>
							</div>

							<div class="header-menu-container right">
								<!-- TOP MENU -->
								<? require_once 'menu.php'; ?>
								
								<!--div class="search-container ">
									<form action="#" class="search-form">
										<input type="text" name="search-form-txt" class="search-text" >
										<input type="submit" value="" class="search-submit" name="submit">
									</form>
								</div-->
								
							</div>
							
						</div>
				</div>
			</div>
		</header>

<!-- PAGE TITLE -->
	<div style=" height:57px;  " >
	</div>	
	
</div>	<!-- Grey bg end -->	
<div style="background:#fff; height:20px;"></div>
<!-- CONTENT -->
	
<!-- 404 -->
	<div class="container m-bot-100 m-top-80 clearfix">
		<div class="eight columns ">
		
			<div class="error404-numb">
				404
			</div>
			
		</div>
		<div class="eight columns ">
		
			<div class="error404-text">
				СТРАНИЦА<br>НЕ НАЙДЕНА,<br>ОШИБКА!
			</div>
			
		</div>
	</div>
<!-- LATEST WORK -->
<!-- OUR PROJECTS End -->
<!-- NEWS LETTER -->
<!-- OUR CLIENTS -->
	
 <div class="footer">
           	<? require_once 'footer.php'; ?>
           </div> 
             
<!-- FOOTER -->
	<footer>
		<div class="footer-content-bg">
			
		</div>
		<div class="footer-copyright-bg">
			<div class="container ">
				<div class="sixteen columns clearfix">
					<div class="footer-menu-container">
						<nav class="clearfix" id="footer-nav">
							<ul class="footer-menu">
								<li><a  target="_blank" title="Twitter" href="http://twitter.com/"><i class="fa fa-twitter-square fa-2x"></i></a></li>
								<li><a target="_blank" title="Facebook" href="https://www.facebook.com/nashipenati?fref=ts"><i class="fa fa-facebook-square fa-2x"></i></a></li>
								<li><a target="_blank" title="Instagram" href="http://instagram.com/"><i class="fa fa-instagram fa-2x"></i></a></li>
								<li><a  target="_blank" title="VKontakte" href="https://vk.com/nashipenaty"><i class="fa fa-vk fa-2x"></i></a></li>
								
							</ul>
						</nav>
					</div>	
					<div class="footer-copyright-container right-text">
					&copy; 2021 Наши Пенаты - все права защищены. При использовании материалов ссылка на сайт обязательна. 
					</div>
				</div>
				
			</div>
		</div>
	</footer>	
		<p id="back-top">
			<a href="#top" title="Вверх"><span></span></a>
		</p>
</div><!-- End wrap -->
<!-- JS begin -->
		<script src="/js/jquery-1.11.2.min.js"></script>
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
		<script src="/js/jquery.easing.1.3.js"></script>
		<script src="/js/superfish.js"></script>
		<script src="/js/jquery-ui.min.js"></script>
		<!-- Flex Slider  -->
		<script src="/js/jquery.flexslider.js"></script> 
		<script src="/js/flex-slider.js"></script> 
		<!-- end Flex Slider -->
		<script src="/js/jquery.jcarousel.js"></script>
		<script src="/js/jquery.fancybox-1.3.4.pack.js"></script>
		<script src="/js/jQuery.BlackAndWhite.min.js"></script>
		<script src="/js/jquery.validate.min.js"></script>
		<script src="/js/jflickrfeed.min.js"></script>
		<script src="/js/jquery.quicksand.js"></script>
		<script src="/js/main.js"></script>
		<script src="/js/jquery-cookie.js"></script>  
<!-- JS end -->
		
	</body>
</html>		