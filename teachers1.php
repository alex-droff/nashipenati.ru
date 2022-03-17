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
<html>
 	<head>
		<title><?=$mpaget->page_name;?>НОУ СОШ «Наши Пенаты»</title>
		<meta charset=UTF-8 >
		
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="" > 
		<meta name="description" content="" > 
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="shortcut icon" href="/favicon.ico">
<!-- CSS begin -->

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
		
		<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/css/ie-warning.css" ><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="/css/style-ie.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/css/ei8fix.css" ><![endif]-->
		
		<!-- flexslider slider CSS -->

		<link rel="stylesheet" type="text/css" href="/css/flexslider.css"  >
		
        <!--end flexslider slider CSS -->
		
 
<!-- CSS end -->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
	</head>
	<body>
	
<div id="wrap" class="boxed">
<div class="grey-bg"> <!-- Grey bg  -->	
	
	
	<!--[if lte IE 7]>
	<div id="ie-container">
		<div id="ie-cont-close">
			<a href='#' onclick='javascript&#058;this.parentNode.parentNode.style.display="none"; return false;'><img src='images/ie-warning-close.jpg' style='border: none;' alt='Close'></a>
		</div>
		<div id="ie-cont-content" >
			<div id="ie-cont-warning">
				<img src='images/ie-warning.jpg' alt='Warning!'>
			</div>
			<div id="ie-cont-text" >
				<div id="ie-text-bold">
					You are using an outdated browser
				</div>
				<div id="ie-text">
					For a better experience using this site, please upgrade to a modern web browser.
				</div>
			</div>
			<div id="ie-cont-brows" >
				<a href='http://www.firefox.com' target='_blank'><img src='images/ie-warning-firefox.jpg' alt='Download Firefox'></a>
				<a href='http://www.opera.com/download/' target='_blank'><img src='images/ie-warning-opera.jpg' alt='Download Opera'></a>
				<a href='http://www.apple.com/safari/download/' target='_blank'><img src='images/ie-warning-safari.jpg' alt='Download Safari'></a>
				<a href='http://www.google.com/chrome' target='_blank'><img src='images/ie-warning-chrome.jpg' alt='Download Google Chrome'></a>
			</div>
		</div>
	</div>
	<![endif]-->
	
<!-- HEADER -->
		<header id="header" >
			<div class="container clearfix">
				<div class="sixteen columns">
						<div class="header-container m-top-30 clearfix">
				
							<div class="header-logo-container ">
								<div class="logo-container">	
									<a href="/" class="logo" rel="home" title="Home">
										<img src="/images/logo.png" alt="логотип" >
                                        <div>Цитрус Монтессори Скул<br><span>
 
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
<div class="container m-bot-35 clearfix">
		<div class="sixteen columns">
			<div class="page-title-container clearfix">
				<h1 class="page-title">PORTFOLIO</h1>
				<ul id="filter"> 
					<li class="current all"><a href="#">All</a></li> 
					<li class="category1"><a href="#">Web</a></li> 
					<li class="category2"><a href="#">Tehnology</a></li> 
					<li class="category3"><a href="#">Photo</a></li> 
				</ul>
			</div>	



		</div>
	</div>
    <style>
	/*------------ Portfolio Section ------------*/

.portfolio {
	position: relative;
	padding: 80px 0 100px 0;
}

.portfolio > .row.portfolio-grid {
	width: 100%;
}

.portfolio-filter {
	text-align: center;
	padding: 15px 0 25px 0;
}

.portfolio-filter a {
	color: #1a1a1a;
	cursor: pointer;
	font-weight: 300;
	text-transform: uppercase;
	position: relative;
	margin-bottom: 25px;
	margin: 0 11px;
	letter-spacing: 0.5px;
	display: inline-block;
}

.portfolio-filter a span {
	position: relative;
	top: 4px;
	display: block;
	opacity: 0;
	-webkit-transition: all .2s linear;
	-moz-transition: all .2s linear;
	-ms-transition: all .2s linear;
	-o-transition: all .2s linear;
	transition: all .2s linear;
	border-bottom: 1px solid;
}

.portfolio-filter a:hover span , .portfolio-filter a.current span {
	opacity: 1;
	top: 0;
}

.portfolio-filter a span i {
	margin: 0 0 -5px 0;
	display: block;
}


/* Portfolio items */
.portfolio-item {
	position: relative;
}

.item-image {
	overflow: hidden;
	position: relative;
}

.item-image .item-overlay {
	position: absolute;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	opacity: 0;
	z-index: 61;
	-webkit-transition: all .3s linear;
	-moz-transition: all .3s linear;
	-ms-transition: all .3s linear;
	-o-transition: all .3s linear;
	transition: all .3s linear;
}

.item-image:hover .item-overlay, .item-image .open-project-link.active .item-overlay {
	opacity: .9;
}

.item-image .item-details {
	position: absolute;
	top: 42%;
	left: 0;
	width: 100%;
	opacity: 0;
	z-index: 62;
	padding: 30px 25px;
	-webkit-transform: translateY(-50%);
	-moz-transform: translateY(-50%);
	-ms-transform: translateY(-50%);
	-o-transform: translateY(-50%);
	transform: translateY(-50%);
	-webkit-transition: all .4s linear;
	-moz-transition: all .4s linear;
	-ms-transition: all .4s linear;
	-o-transition: all .4s linear;
	transition: all .4s linear;
}

.item-image:hover .item-details, .item-image .open-project-link.active .item-details {
	opacity: 1;
	top: 46%;
}

.item-details .open-icon {
	margin-bottom: 8px;
}

.item-details .open-icon i.fa {
	color: #fff;
	width: 38px;
	height: 38px;
	line-height: 36px;
	display: inline-block;
	border-radius: 50%;
	border: 2px solid #fff;
}

.item-details h4 {
	color: #fff;
	font-weight: 400;
}

.item-details span {
	color: #fff;
	display: block;
	font-weight: 300;
	letter-spacing: 1px;
	margin-bottom: 8px;
}

.item-details p {
	color: rgba(255,255,255,.8);
	margin: 0;
}

.item-image img {
	z-index: 60;
	display: block;	
	-webkit-transition: all .3s linear;
	-moz-transition: all .3s linear;
	-ms-transition: all .3s linear;
	-o-transition: all .3s linear;
	transition: all .3s linear;
}

.item-image:hover img {
	-webkit-filter: grayscale(50%); 
	-webkit-transition: all .3s linear;
	-moz-transition: all .3s linear;
	-ms-transition: all .3s linear;
	-o-transition: all .3s linear;
	transition: all .3s linear;
}

.isotope-item {
    z-index: 2;
}

.isotope-hidden.isotope-item {
    pointer-events: none;
    z-index: 1;
}

.isotope, .isotope .isotope-item {
    -webkit-transition-duration: 0.8s;
    -moz-transition-duration: 0.8s;
    transition-duration: 0.8s;
}

.isotope {
    -webkit-transition-property: height, width;
    -moz-transition-property: height, width;
    transition-property: height, width;
}

.isotope .isotope-item {
    -webkit-transition-property: -webkit-transform, opacity;
    -moz-transition-property: -moz-transform, opacity;
    transition-property: transform, opacity;
}

.project-details h3 {
	margin-bottom: 5px;
}

    </style>
    
<div class="container filter-portfolio clearfix">
		<section id="portfolio" class="portfolio">
            
            <!-- Title -->
            <div class="row">
                <div class="ten columns offset-by-one title" data-animation="fadeIn">
                    <h1>Portfolio</h1>
                    <h2>Showcase Your Works</h2>
                    <hr>
                </div>
            </div>
            
            <!-- For Project Expander -->
            <div class="project-end-pos"></div>    
            
            <!-- Portfolio Filters -->
            <div class="portfolio-filter row" data-animation="fadeIn">
                <div class="ten columns offset-by-one title">
                    <a class="current" data-filter="*">Show all <span><i class="fa fa-caret-up"></i></span></a>
                    <a data-filter=".website">websites <span><i class="fa fa-caret-up"></i></span></a>
                    <a data-filter=".illustration">illustrations <span><i class="fa fa-caret-up"></i></span></a>
                    <a data-filter=".photo">photographs <span><i class="fa fa-caret-up"></i></span></a>
                    <a data-filter=".movie">movies <span><i class="fa fa-caret-up"></i></span></a>
                </div>
            </div>
            
            <!-- For Project Expander -->
            <div class="project-beg-pos"></div>
            
            <!-- Project Page Holder-->
            <div id="project-box"></div>
            <!--/Project Page Holder-->
    
            <!-- Portfolio Grid -->
            <div id="portfolio-grid" class="portfolio-grid row">
            
                <!-- Project Item -->
                <div class="portfolio-item website photo">
                    <div class="item-image">
                        <div class="open-project-link">
                        	<!-- Project Link -->
                            <a class="open-project" href="image-project.html">
                                <div class="item-overlay"></div>
                                <div class="item-details">
                                	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                	<h4>Project Name</h4>
                                    <span>Project Category</span>
                                    <p>Sed ut perspiciatis unde omnis natus error sit volupt accusant dolorem laudantium, totam...</p>
                                </div>
                                <!-- Project Thumb -->
                                <img src="image22s/portfolio-pics/golf-01.jpg" alt="">
                             </a>
                         </div>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item illustration movie">
                    <div class="item-image">
                        <div class="open-project-link">
                        	<!-- Project Link -->
                            <a class="open-project" href="slider-project.html">
                                <div class="item-overlay"></div>
                                <div class="item-details">
                                	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                	<h4>Project Name</h4>
                                    <span>Project Category</span>
                                </div>
                                <!-- Project Thumb -->
                                <img src="image22s/portfolio-pics/footage-01.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item photo website">
                    <div class="item-image">
                        <div class="open-project-link">
                        	<!-- Project Link -->
                            <a class="open-project" href="vimeo-project.html">
                                <div class="item-overlay"></div>
                                <div class="item-details">
                                	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                	<h4>Project Name</h4>
                                    <span>Project Category</span>
                                </div>
                                <!-- Project Thumb -->
                                <img src="image22s/portfolio-pics/fonelink-01.jpg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item movie illustration website">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/baseball-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/baseball-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item photo website">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/timeline-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                                <p>Sed ut perspiciatis unde omnis natus error sit volupt accusant dolorem laudantium, totam...</p>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/timeline-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item illustration photo">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/voycee-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/voycee-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item photo movie">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/pancake-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                                <p>Sed ut perspiciatis unde omnis natus error sit volupt accusant dolorem laudantium, totam...</p>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/pancake-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item website illustration">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/snorelab-01.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <img src="image22s/portfolio-pics/snorelab-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item illustration">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/fonelink-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                                <p>Sed ut perspiciatis unde omnis natus error sit volupt accusant dolorem laudantium, totam...</p>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/fonelink-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item illustration website">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/magazine-mockup.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/magazine-mockup.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item website photo">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" title="Open Project" href="image22s/portfolio-pics/bookshelves-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                                <p>Sed ut perspiciatis unde omnis natus error sit volupt accusant dolorem laudantium, totam...</p>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/bookshelves-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item movie illustration">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/globe-ui-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/globe-ui-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item website">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/weather-ui-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                                <p>Sed ut perspiciatis unde omnis natus error sit volupt accusant dolorem laudantium, totam...</p>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/weather-ui-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item illustration movie">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/switch-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/switch-01.jpg" alt="">
                        </a>
                    </div>
                </div>
                
                <!-- Project Item -->
                <div class="portfolio-item photo">
                    <div class="item-image">
                    	<!-- Project Link (Lightbox) -->
                        <a class="lightbox" href="image22s/portfolio-pics/mobile-display-mock-up-02.jpg">
                            <div class="item-overlay"></div>
                            <div class="item-details">
                            	<div class="open-icon"><i class="fa fa-arrows-alt"></i></div>
                                <h4>Project Name</h4>
                                <span>Project Category</span>
                            </div>
                            <!-- Project Thumb -->
                            <img src="image22s/portfolio-pics/mobile-display-mock-up-01.jpg" alt="">
                        </a>
                    </div>
                </div>
    
            </div>
            
            <a href="#our-team" class="next-section"><i class="fa fa-angle-double-down"></i></a>
        </section>
        <ul id="portfolio" class="clearfix">
        <?
			$sql="SELECT id_service	, service_pr FROM `service_pr` WHERE parent_id=172;";
		//echo $sql;
			$result1 = $mysqli->query($sql);
  			?>
    <div class="staff-list" style=" clear:both; overflow: visible; padding-top:30px;"><a href="teacher.php?mdid=<?=$dep->id?>&tid=<?=$tid;?>"  type="button" class="btn btn-primary btn-xs"  style=" float:right; margin-bottom: -15px;  cursor:pointer;"><i class="fa fa-pencil"></i>добавить  учителя </a> </div>
    <?
			 
			while ($dep = $result1->fetch_object()) {$qq=0; ?>
    <h2 class="titlestuff" >
      <?=$dep->service_pr;?>
    </h2>
    <? 		
			$sql2="SELECT `stw_employee`.*  FROM  `stw_employee`  WHERE `stw_employee`.department_id=".$dep->id_service."  ORDER BY id desc ;"; 
			//$sql="SELECT `stw_employee`.*, `tbl_gallery_photo`.photo ph FROM  `stw_employee` left join `tbl_gallery_photo` on `stw_employee`.id=`tbl_gallery_photo`.gallery_id WHERE `stw_employee`.department_id=".$dep->id."  AND `stw_employee`.team=".$tid."  AND  `tbl_gallery_photo`.typephoto='team' ORDER BY priority ;"; 
			//echo $sql;
			$result2 = $mysqli->query($sql2);
  			?>
                <div style="margin: 20px 50px; float: left; width: 100%;">
    <? 
			while ($item = $result2->fetch_object()) {$q=0; ?>
         
    <?
			$sql3="SELECT `tbl_gallery_photo`.photo FROM  `tbl_gallery_photo`  WHERE `tbl_gallery_photo`.typephoto='team'   AND  `tbl_gallery_photo`.gallery_id=".$item->id." limit 0,1 ;"; 
			//echo $sql3;
			$result3 = $mysqli->query($sql3);
  			$num_rows3 = $result3->num_rows;
			if ($num_rows3>=1) {	$item3 = $result3->fetch_object(); $itemview=$item3->photo; }  else { $itemview="";} ?>
    <div style=" float:left; width:50%; margin-top:20px;"> <a href="teacher.php?idt=<?=$item->id;?>" style=" display:block; float:left; text-align:center; width:40px; margin-right:5px; height:40px; ">
      <? if (strlen($itemview)>=1) { ?>
      <img src="/ckfinder/userfiles/images/employee/<?=$itemview;?>" name="aboutme"   border="0"  style=" max-width:40px; max-height:40px; margin-right: 5px;">
      <? } else { ?>
      <span  class="img-thumbnail" style="display:block; float:left; margin-right: 5px; width:40px; height:40px; background:url(/images/preview.png) no-repeat center center; "></span>
      <? } ?>
      </a> <a href="teacher.php?idt=<?=$item->id;?>"> <span style="text-transform:uppercase;   font-weight:bold;">
      <? if ($item->number!=0) { ?>
      <span style="color:#900;">№
      <?=$item->number;?>
      </span>
      <? } ?>
      <?=$item->last_name;?>
      </span><br>
      <?=$item->name." ".$item->middle_name;?>
      </a> </div>
    

    
    <? } ?>
    </div>
  
    <? } ?>
    </div>
		<!-- PORTFOLIO ITEM -->
		<!--	<li data-id="id-1" data-type="category1" class="four columns m-bot-35">
						<div class="hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-1.jpg" alt="Ipsum" >
								<div class="mask"></div>	
								<div class="abs">
									<a href="images/content/port-2-1.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
			</li> -->
		<!-- PORTFOLIO ITEM -->
        	<?
			$sql1="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".(int)$_REQUEST['idp']."' AND typephoto='gallery'   ORDER BY `id` ;";
			//echo $sql1;
			$result1 = $mysqli->query($sql1);
			$num_rows = $result1->num_rows;
			if ($num_rows>=1) { ?>
			
			
			<? while ($myrow =$result1->fetch_object()) { ?> 
            <li data-id="id-2" data-type="category2" class="four columns m-bot-35">
						<div class="hover-item">
							<div class="view view-first">
								<img src="/ckfinder/userfiles/images/gallery_photos/<?=$myrow->photo;?>" alt="Ipsum" style="width:220px; height:146px;">
								<div class="mask"></div>	
								<div class="abs">
									<a href="/ckfinder/userfiles/images/gallery_photos/<?=$myrow->photo;?>"  class="lightbox zoom info" rel="one"></a>
								</div>	
							</div>
							
						</div>
			</li>
             
             
			 <? } ?>
 		<? }?>		
		
		
		
			
		
		</ul>
	</div>

<!-- SLIDER -->
	<!-- Основной текст -->
		<div style=" 	margin: 10px 0 7px; overflow:auto; border-top: 1px dotted  #aaa;"  class="newsShortText">
	
		<div id="shownews<?=$news->gallery_id;?>"><br>
					<h4 id="pageName" style="font-size:14px;"><a href="gallery.php?mdid=<?=$news->id?>"><?=$news->name?></a></h4>
			
			
			
  
		
			
		
		
		
		
		
		
	
<!-- 3 BLOCKS ( ver 1 black) -->
	
	

        <div class="container m-bot-35 clearfix">
		
		
		
		<!-- jCAROUSEL -->
		<div class="jcarousel latest-work-jc m-bot-30" >
			<ul class="clearfix">
				<!-- LATEST WORK ITEM -->
			<? 
				$sql="SELECT * FROM `tbl_gallery` ORDER BY rand()  LIMIT 0,12; "; 	//echo $sql;
				$result = $mysqli->query($sql);
				 while ($news = $result->fetch_object()) { ?> 
			<?
			$sql1="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".$news->id."' AND typephoto='gallery'   ORDER BY rand() LIMIT 0,1 ;";
			//echo $sql1;
			$result1 = $mysqli->query($sql1);
			$num_rows = $result1->num_rows;
			$myrow =$result1->fetch_object();?>	
				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class="hover-item">
							<div class="view view-first">
								<a href="/gallery/<?=$news->id;?>/"><img src="/ckfinder/userfiles/images/gallery_photos/<?=$myrow->photo;?>" alt="Ipsum"  style="width:220px; height:146px;"></a>
								
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="/gallery/<?=$news->id;?>/" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<?=$news->name;?>
										</div>
									</div>
								</a>
								<div class="item-caption"><?=$news->node_key;?></div>
							</div>
						</div>
				</li>
<? } ?>
				
			</ul>
		</div>
		<!-- jCAROUSEL End -->
	</div>	
<!-- OUR PROJECTS End -->
<div class="sidebar-item  m-bot-35">
				<div class="caption-container-main m-bot-30">
					<div class="caption-text-container">FLICKR WIDGET</div>
					<div class="content-container-white caption-bg "></div>
				</div>

					<ul id="flickrfeed" class="clearfix"><li><a class="lightbox" rel="colorbox" href="http://farm9.staticflickr.com/8345/8284272962_9acc1cdddc.jpg" title="Squirrel"><img src="http://farm9.staticflickr.com/8345/8284272962_9acc1cdddc_s.jpg" alt="Squirrel"></a></li><li><a class="lightbox" rel="colorbox" href="http://farm9.staticflickr.com/8348/8284272900_3d86d8ed10.jpg" title="Squirrel 2"><img src="http://farm9.staticflickr.com/8348/8284272900_3d86d8ed10_s.jpg" alt="Squirrel 2"></a></li><li><a class="lightbox" rel="colorbox" href="http://farm9.staticflickr.com/8342/8284272860_e664e7a1d0.jpg" title="Squirrel 3"><img src="http://farm9.staticflickr.com/8342/8284272860_e664e7a1d0_s.jpg" alt="Squirrel 3"></a></li><li><a class="lightbox" rel="colorbox" href="http://farm9.staticflickr.com/8490/8283213165_913047d552.jpg" title="Squirrel 4"><img src="http://farm9.staticflickr.com/8490/8283213165_913047d552_s.jpg" alt="Squirrel 4"></a></li><li><a class="lightbox" rel="colorbox" href="http://farm9.staticflickr.com/8348/8283192651_5555855060.jpg" title="Car"><img src="http://farm9.staticflickr.com/8348/8283192651_5555855060_s.jpg" alt="Car"></a></li><li><a class="lightbox" rel="colorbox" href="http://farm9.staticflickr.com/8078/8284251058_be90b62fdc.jpg" title="Blue sky"><img src="http://farm9.staticflickr.com/8078/8284251058_be90b62fdc_s.jpg" alt="Blue sky"></a></li></ul>

			</div>

<!-- NEWS LETTER -->
<!-- <div class="dark-grey-bg">
	<div class="container m-bot-20 clearfix">
		<div class="sixteen columns">
			<div class="newsletter-container clearfix">
				<div class="nl-img-container">
					<img src="/images/icon-mail.png" alt="mail">
				</div>
				<div class="nl-text-container clearfix">
					<div class="caption">
						<span class="bold">NEWS</span> LETTER
					</div>
					<div class="nl-text">Stay up-to date with the latest news and other stuffs, Sign Up today!</div>
					<div class="nl-form-container">
						<form class="newsletterform" method="post" action="#">
							<input type="text" onblur="if(this.value=='')this.value='Your email here...';" onfocus="if(this.value=='Your email here...')this.value='';" value="Your email here..." name="email"><button class="nl-button">SIGN UP</button>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
-->	
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
					&copy; Citrus Montessori School - разработано в студии <a class="author" href="http://promoshine.ru/" target="_blank">Промошайн</a>
					</div>
				</div>
				
			</div>
		</div>
	</footer>	
		<p id="back-top">
			<a href="#top" title="Back to Top"><span></span></a>
		</p>
</div><!-- End wrap -->
<!-- JS begin -->

	  <script src="js22/jquery-1.10.2.min.js"></script>
        <script src="js22/modernizr.js"></script>
    
      <script src="js22/easing.js"></script>
        <script src="js22/jquery.fitvids.js"></script>
        <script src="js22/jquery.easypiechart.min.js"></script>
        <script src="js22/prettyphoto.js"></script>
        <script src="js22/pace.js"></script>
        <script src="js22/jquery.countTo.js"></script>
        <script src="js22/contact.form.js"></script>
        <script src="js22/owl.carousel.min.js"></script>
        <script src="js22/jquery.nicescroll.min.js"></script>
        <script src="js22/jquery.appear.js"></script>
        <script src="js22/jquery.superslides.min.js"></script>
        <script src="js22/jquery.isotope.js"></script>
        <script src="js22/jquery.parallax.js"></script>
     
        <script src="js22/scripts.js"></script>
    
    
		

<!-- JS end -->
		
	</body>
</html>			
