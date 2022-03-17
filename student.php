<? include('topfile.php'); if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
   // header("location: index.php");
}
?><!DOCTYPE html><?  $zip="";
//print_r($_REQUEST);
if (isset($_REQUEST['urlpage']))  {  
	$sqlpage="SELECT `id`, `page_name`, `page_title`, `page_url`, `is_footer`, `is_login`, `page_content`, `created`, `pub`, `id_parentmenu`, `order_menu`, `show_top`, `page_type` FROM  `page` WHERE page_url= ? ;"; $zip.=$_REQUEST['urlpage'];
} else { 
	$sqlpage="SELECT `id`, `page_name`, `page_title`, `page_url`, `is_footer`, `is_login`, `page_content`, `created`, `pub`, `id_parentmenu`, `order_menu`, `show_top`, `page_type` FROM  `page` WHERE id= ? ;";  $zip.=$_REQUEST['idp'];
}

//$sqlpage = "SELECT Name, CountryCode FROM City WHERE Zip = ? AND Population > ?";

//echo $sqlpage." +++ ".$zip."   333";


if ($stmt = $mysqli->prepare($sqlpage)) {
    $stmt->bind_param('s', $zip);
    $stmt->execute();
    $stmt->bind_result($id, $page_name, $page_title, $page_url, $is_footer, $is_login, $page_content, $created, $pub, $id_parentmenu, $order_menu, $show_top, $page_type);
  	$stmt->fetch();
    $stmt->close();
}


		if ($id>=1) { 
	
		} else { // header("Location: /404.php");
		}
?>
<html lang="ru">
 	<head>
		<title><?=$mpaget->page_name;?>Наши Пенаты - личный кабинет ученика</title>
		<meta charset=UTF-8 >
		
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="" > 
		<meta name="description" content="" > 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="/favicon.ico">
<!-- CSS begin -->
 <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/css/style.css" >
		<link rel="stylesheet" type="text/css" href="/css/skeleton.css" >

		<link rel="stylesheet" type="text/css" href="/css/jquery.fancybox-1.3.4.css"  >
	 
		<link rel="stylesheet" href="/css/layout/wide.css" id="layout">
		<link rel="stylesheet" href="/css/colors/red.css" id="colors">
<!-- Sequence slider CSS -->
		<link rel="stylesheet" type="text/css" href="/css/sequencejs-theme.modern-slide-in.css" >
		<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="/css/sequencejs-theme.modern-slide-in.ie.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/scss/sequencejs-theme.modern-slide-in.ie8.css" ><![endif]-->
		
        <!--end Sequence slider CSS -->
		
		<!-- flexslider slider CSS -->

		<link rel="stylesheet" type="text/css" href="/css/flexslider.css"  >
		
        <!--end flexslider slider CSS -->
		

<!-- Optional theme -->

<style type="text/css">
   
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
</style>
<!-- CSS end -->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(39452070, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/39452070" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TRM52FG');</script>
<!-- End Google Tag Manager -->

	</head>
	<body>
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRM52FG" 
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="wrap" class="boxed">
<div class="grey-bg"> <!-- Grey bg  -->	

<!-- HEADER -->
		<header id="header" >
			<div class="container clearfix">
				<div class="sixteen columns">
						<div class="header-container m-top-30 clearfix">
				<div class="secondlabellogo">IBLS - International Blended Learning School</div> 
							<div class="header-logo-container ">
								<div class="logo-container">	
									<a href="/" class="logo" rel="home" title="Citrus Montessori School">
										<img src="/images/logo.png" alt="logo" >
                                        <div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Наши Пенаты<br><span>
 
Частная школа и детский сад</span></div>
									</a>
								</div>
							</div>

							<div class="header-menu-container right">
								<!-- TOP MENU -->
								<? require_once 'menu.php'; ?>
								
							</div>
							
						</div>
				</div>
			</div>

		</header>

<!-- PAGE TITLE -->
	<div style=" height:55px;  " >
	</div>	
	
</div>	<!-- Grey bg end -->	
<div style="background:#fff; height:20px;"></div>
<div class="container m-bot-35 clearfix">

<? if (isset($_SESSION['id'])) { ?>  
<div class="eleven columns m-bot-25">
<div class="blog-item m-bot-35 clearfix">
						<div class="hover-item"><br><br>
							<!--div class="clearfix">
								
								<div class="view view-first">
									<img src="/images/content/post-2-1.jpg" alt="Ipsum" >
									<div class="mask"></div>	
									<div class="abs">
										<a href="images/content/post-2-1.jpg" class="lightbox zoom info"></a><a href="blog-single.html" class="link info"></a>
									</div>	
								</div>
							</div-->	
							
						</div>
						<div class="blog-item-text-container">
                        <h3 style="color:#588a10; font-size:1.3em; font-weight:bold;">Личный кабинет Ученика</h3>
							

						</div>


</div>
</div>
<? }  else { ?>

  <div class="col-md-8 " style="padding-top:30px;">
     <h3 class="text-center" >Войти на сайт<!--, <small>Первый раз? <a  data-dialog="open" data-url="/users/sign_up" href="#"><i class="icon-unlock-alt"></i> Зарегистрироваться.</a></small>--></h3>
	  <? if (isset($err)) { echo '<div class="alert alert-warning"><strong>'.$err[0].'</strong></div>'; } ?>
    <div class="row">
	<div class="col-md-6 col-lg-5">
     <form class="form-signin"  id="formsignin"  method="post">
     <div class="errdiv"></div>
	     <div class="form-group">
          <input type="hidden"  name="chechks"  id="chechks" value="login">
          <input type="text" class="form-control" name="email" placeholder="Электронная почта"  id="email">
        </div>
        <div class="form-group">
		    <input type="password" class="form-control"name="password" id="password" placeholder="Пароль" >
        </div>
		<div  style="margin-bottom:5px;"><a class="dialog_form_a pull-right" data-dialog="open" data-url="/forgotpsw.php" href="#">Забыли пароль?</a>
<label class="form-el __label">
<div class="form-el __checkbox __fake" data-checked="false">
<input name="user[remember_me]" type="hidden" value="0"><input class="form-el __checkbox __real" id="user_remember_me" name="user[remember_me]" type="checkbox" value="1">
</div>
<span>Запомнить меня</span>
</label>
</div>
        	<input type="submit" name="submit" role="button" id="getlogin" value="Войти" class="form-el __block __btn __major __m" />
      </form>
      </div>
      
	  <div class="col-md-1 col-lg-2">
        <div class="login-or">
        <hr class="hr-or">
        <span class="span-or">или</span>
      	</div>
      
      </div>
      <div class="col-md-5 col-lg-5">
	 
      <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-12">
          <a  href="?login&oauth_provider=facebook"class="btn btn-block btn-social btn-facebook">
        <i class="fa fa-facebook"></i> Facebook
      </a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12">
         <a href="?login&oauth_provider=vk"  class="btn btn-block btn-social btn-vk">
        <i class="fa fa-vk"></i> ВКонтакте
      </a>
        </div>
      </div>
	   <div class="alert alert-info">
       Используте для входа ваш профиль в фейсбуке или  вконтакте
	</div>
      </div>
    </div>
  </div>


     
   <?  } ?>   

    <style>
	
    </style> 
    
 <?
				
				if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
   // header("location: index.php");

					 $sidemenu=false;
		 			 
					  $sql4="SELECT * FROM `page` WHERE id_parentmenu = '".(int)$id."' and pub = 1  order by order_menu";
					  $result4 =$mysqli->query($sql4);
					  if ($result4->num_rows>=1) { $sidemenu=true; 	$haschilds=1; $sql4="SELECT * FROM `page` WHERE id_parentmenu = '".(int)$id."' and pub = 1  order by order_menu"; 
					   $sql44="SELECT * FROM `page` WHERE id = '".(int)$id."' and pub = 1  order by order_menu"; 
						} else {  $haschilds=0; if ($id_parentmenu!=0 ) {  $sidemenu=true; $sql4="SELECT * FROM `page` WHERE id_parentmenu = '".(int)$id_parentmenu."' and pub = 1  order by order_menu";  
						$sql44="SELECT * FROM `page` WHERE id = '".(int)$id_parentmenu."' and pub = 1  order by order_menu";  }  }
					  
					
			
				 if ($sidemenu) { ?>
    

    <div class="five columns ">
		<!-- WIDGET -->
			<div class="sidebar-item  m-bot-35">
			<? $result44 =$mysqli->query($sql44); $dirnames44 = $result44->fetch_object();?>
				<div class="caption-container-main m-bot-30">
					<div class="caption-text-container"><?=$dirnames44->page_name;?></div>
					<div class="content-container-white caption-bg "></div>
				</div>

				<div>
                	<ul class="blog-categories">
                   	
					<? $result4 =$mysqli->query($sql4);
					$o=0;
					while ($dirnames4 = $result4->fetch_object()) { ?>
					<li <? if ($dirnames4->id==$id) { echo 'class="active"';  } ?>><a href="<? if (strlen($dirnames4->page_url)>=1) {?><?=$dirnames4->page_url;?><? } else { ?>/page.php?idp=<?=$dirnames4->id;?> <? }?>" ><span class="blog-cat-icon"></span> 	<?=$dirnames4->page_name;?></a>
					<? //	getlevelsproduct ($dirnames4->id, $idt, $mysqli); ?>	</li>
					<? } ?>
					
                    
 
					<li><a  href="/logoff/" ><span class="blog-cat-icon"></span> Выйти</a></li>
					</ul>
				</div>
			</div>	
		
			<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<div class="row">
		<div class="col-lg-3 col-sm-6">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                   <? if (strlen($_SESSION['avatar'])>=1) { ?> <img src='/asset/avatar/<?=$_SESSION['id']?>/m/<?=$_SESSION['avatar']?>' class='ui-avatar_img' width="64" />   <? } elseif (strlen($_SESSION['oauth_id'])>=1) {  ?>  <img src='https://graph.facebook.com/<?=$_SESSION['oauth_id'];?>/picture?<? //width=9999; ?>' class='ui-avatar_img'  width="64" /> <? } else {  ?>
<img alt="a4471" class="ui-avatar_img" height="64" src="/assets/avatar-4a19c2d8486cd569c6e47918f9a27f37.svg" width="64"> <? }   ?>
                </div>
                <div class="info">
                    <div class="title">
                        <a target="_blank" href="/student/"><?=$_SESSION[username]; ?></a>
                    </div>
                    <div class="desc">Ученик класса</div>
                    
                </div>
                
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                        href="#">
                        <i class="fa fa-vk"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                        href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                        href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    
                </div>
            </div>

        </div>

	</div>
</div>
		</div>
        <? } ?>
       <? }  else { ?> 
       
        <div class="five columns ">
		<!-- WIDGET -->
			<div class="sidebar-item  m-bot-35">
			
				<div class="caption-container-main m-bot-30">
					<div class="caption-text-container">Личный кабинет ученика</div>
					<div class="content-container-white caption-bg "></div>
				</div>

				<div>
                	<ul class="blog-categories">
                   	
											
					<li><a href="">Регистрация учеников</a></li>
					<li><a href="">Вход для учеников</a></li>
					
					
					</ul>
				</div>
			</div>	
		
			
		</div>
       <? } ?>
		</div>
        
	</div>


<!-- OUR CLIENTS -->
	<div class="container clearfix">
		<div class="sixteen columns m-bot-20">
			<ul class="our-clients-container clearfix ">
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="/images/logo1.png" alt="client" >
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="/images/logo2.png" alt="client" >
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="/images/logo3.png" alt="client">
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="/images/logo4.png" alt="client" >
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="/images/logo5.png" alt="client" >
						</div>
					</a>
				</li>
            </ul>
		</div>	
	</div>
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
					&copy; 2018 Citrus Montessori School - все права защищены. При использовании материалов ссылка на сайт обязательна
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
<!-- Add jQuery library -->


	<!-- Add mousewheel plugin (this is optional) -->
	<script src="/lib/jquery.mousewheel.pack.js?v=3.1.3"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script src="/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/source/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script src="/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script src="/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script src="/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
		<script src="/js/jQuery.BlackAndWhite.min.js"></script>
		<script src="/js/jquery.validate.min.js"></script>
		<script src="/js/jflickrfeed.min.js"></script>
		<script src="/js/jquery.quicksand.js"></script>
		<script src="/js/main.js"></script>
		<script src="/js/jquery-cookie.js"></script>  

<!-- JS end -->
		
	</body>
</html>			


<style>
   
@import url(//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css);
/*
 * Social Buttons for Bootstrap
 *
 * Copyright 2013 Panayiotis Lipiridis
 * Licensed under the MIT License
 *
 * https://github.com/lipis/bootstrap-social
 */

.btn-social{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.btn-social :first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
.btn-social.btn-lg{padding-left:61px}.btn-social.btn-lg :first-child{line-height:45px;width:45px;font-size:1.8em}
.btn-social.btn-sm{padding-left:38px}.btn-social.btn-sm :first-child{line-height:28px;width:28px;font-size:1.4em}
.btn-social.btn-xs{padding-left:30px}.btn-social.btn-xs :first-child{line-height:20px;width:20px;font-size:1.2em}
.btn-social-icon{position:relative;padding-left:44px;text-align:left;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;height:34px;width:34px;padding-left:0;padding-right:0}.btn-social-icon :first-child{position:absolute;left:0;top:0;bottom:0;width:32px;line-height:34px;font-size:1.6em;text-align:center;border-right:1px solid rgba(0,0,0,0.2)}
.btn-social-icon.btn-lg{padding-left:61px}.btn-social-icon.btn-lg :first-child{line-height:45px;width:45px;font-size:1.8em}
.btn-social-icon.btn-sm{padding-left:38px}.btn-social-icon.btn-sm :first-child{line-height:28px;width:28px;font-size:1.4em}
.btn-social-icon.btn-xs{padding-left:30px}.btn-social-icon.btn-xs :first-child{line-height:20px;width:20px;font-size:1.2em}
.btn-social-icon :first-child{border:none;text-align:center;width:100% !important}
.btn-social-icon.btn-lg{height:45px;width:45px;padding-left:0;padding-right:0}
.btn-social-icon.btn-sm{height:30px;width:30px;padding-left:0;padding-right:0}
.btn-social-icon.btn-xs{height:22px;width:22px;padding-left:0;padding-right:0}

.btn-facebook{color:#fff;background-color:#3b5998;border-color:rgba(0,0,0,0.2)}.btn-facebook:hover,.btn-facebook:focus,.btn-facebook:active,.btn-facebook.active,.open .dropdown-toggle.btn-facebook{color:#fff;background-color:#30487b;border-color:rgba(0,0,0,0.2)}
.btn-facebook:active,.btn-facebook.active,.open .dropdown-toggle.btn-facebook{background-image:none}
.btn-facebook.disabled,.btn-facebook[disabled],fieldset[disabled] .btn-facebook,.btn-facebook.disabled:hover,.btn-facebook[disabled]:hover,fieldset[disabled] .btn-facebook:hover,.btn-facebook.disabled:focus,.btn-facebook[disabled]:focus,fieldset[disabled] .btn-facebook:focus,.btn-facebook.disabled:active,.btn-facebook[disabled]:active,fieldset[disabled] .btn-facebook:active,.btn-facebook.disabled.active,.btn-facebook[disabled].active,fieldset[disabled] .btn-facebook.active{background-color:#3b5998;border-color:rgba(0,0,0,0.2)}


.btn-vk{color:#fff;background-color:#587ea3;border-color:rgba(0,0,0,0.2)}.btn-vk:hover,.btn-vk:focus,.btn-vk:active,.btn-vk.active,.open .dropdown-toggle.btn-vk{color:#fff;background-color:#4a6a89;border-color:rgba(0,0,0,0.2)}
.btn-vk:active,.btn-vk.active,.open .dropdown-toggle.btn-vk{background-image:none}
.btn-vk.disabled,.btn-vk[disabled],fieldset[disabled] .btn-vk,.btn-vk.disabled:hover,.btn-vk[disabled]:hover,fieldset[disabled] .btn-vk:hover,.btn-vk.disabled:focus,.btn-vk[disabled]:focus,fieldset[disabled] .btn-vk:focus,.btn-vk.disabled:active,.btn-vk[disabled]:active,fieldset[disabled] .btn-vk:active,.btn-vk.disabled.active,.btn-vk[disabled].active,fieldset[disabled] .btn-vk.active{background-color:#587ea3;border-color:rgba(0,0,0,0.2)}




  .login-or {
    position: relative;
    font-size: 18px;
    color: #aaa;
    margin-top: 30px;
            margin-bottom: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
  }
  .span-or {
    display: block;
    position: absolute;
    left: 50%;
    top: -2px;
    margin-left: -25px;
    background-color: #fff;
    width: 50px;
    text-align: center;
  }
  .hr-or {
    background-color: #cdcdcd;
    height: 1px;
    margin-top: 0px !important;
    margin-bottom: 0px !important;
  }

  .btn {
margin-bottom: 19px;

}

    </style>


  <script>
    // When the server is ready...
    $(document).ready(function() {
        
$('body').on("click", '#getlogin', function (event) {

	    var $form = $(this).closest('form'); // get the form element this button belongs to
	    var theData = $form.serialize(); // generates the data string
		var tht = false;
		//alert(theData);
	    $.ajax({
	        type: 'POST',
	        url: '/checklogin.php',
	        data: theData,
			global: false,
		    async:false,
			//dataType: 'json',
	        success: function (aaa) {
	            // append return data to the current form
	           
	            console.log(aaa);
				   
				 if (aaa.status=='suxx'){ 
				
				 //
				 //alert(1);
				   document.forms["formsignin"].submit();  $(".form-signin" ).submit(); 
				  $form.hide('fade'); tht=true; $form.replaceWith('<div class="dialog_b">	<div class="forsyu"> <div style="text-align:center; color:#9063f1; font-size: 54px;"><i class="fa fa-check fa-6"></i></div> </div> </div>');
				
				   setTimeout(function() { $('.dialog_close').click(); }, 5000);  } 
				  
				   else { $('.errdiv').html('<div class="forError">Ошибка! Логин или пароль не верный, попробуйте еще раз, у вас получиться. </div>'); return false; }
	            
	            
	        } // end success
	    }); // end ajax
	    if (tht==true) {   } else {  return false;} 
	});
  	});
	
	</script>