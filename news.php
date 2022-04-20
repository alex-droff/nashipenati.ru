<? include('topfile.php'); if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
   // header("location: index.php");
}
?>
<!DOCTYPE html>
<?  $zip="";
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

if ($id>=1) {} 
else { // header("Location: /404.php");
}
$title = "Новости школы"; 
require_once "topfile-head.php";
?>

<body class="news">

	<!-- Google Tag Manager -->
	<? require_once "counters-gtm.php"; ?>
	<!-- End Google Tag Manager -->

	<div id="wrap" class="boxed">
		<? require_once "header.php";?>
		<div class="container container-main">
			<?  $month = array ("Января", "Февраля", "Марта", "Апреля", "Мая", "Июня", "Июля", "Августа", "Сентября", "Октября", "Ноября", "Декабря"); 
 	$monthshort = array ("янв", "фев", "мар", "апр", "май", "июн", "июл»", "авг", "сент", "окт", "нояб", "дек"); 
	 
if (isset($_REQUEST['idp'])&&((int)$_REQUEST['idp']>=1)) { ?>

					<?  $sql2="SELECT * FROM `stw_novost` WHERE `id` ='".(int)$_REQUEST['idp']."' AND pub=1  ;";
			
						$result2 = $mysqli->query($sql2);
						$num_rows = $result2->num_rows;
						if ($num_rows>=1) { 
						$news =$result2->fetch_object();
						$sql3="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".$news->id."' AND typephoto='news'  ORDER BY `id` LIMIT 0,1;";
						$result3 = $mysqli->query($sql3);
						$myrow3 = $result3->fetch_object();
					?>
			<div class="main_field">
				<h1 class="pagename"><?=$news->name?></h1>
				<div class="news-block">	
					
						<div class="hover-item">
							<div class="clearfix">
								<div class="blog-item-date-inf-container left">
									<div class="blog-item-date-cont">
										<div class="blog-item-date"><?=substr($news->date,8,2);?></div>
										<div class="blog-item-mounth" style="text-transform:uppercase;">
											<?=$monthshort[intval(substr($news->date,5,2))-1];?></div>
									</div>
								</div>

								<? if (strlen($myrow3->photo)>=1) { ?>
								<div class="view view-first">
									<img src="/ckfinder/userfiles/images/news/<?=$myrow3->photo;?>">
								</div>
								<? }  else { ?>

								<? } ?>
							</div>
							<div class="blog-item-caption-container">
								<strong style="color:#e74c3c; font-size:1.3em;"><?=$news->name?></strong>
								<div class="lp-item-container-border clearfix">
									<div class="blog-info-container">
										<ul class="clearfix">
											<li class="icon-calendar">
												<strong><?=substr($news->date,8,2)." ".$month[intval(substr($news->date,5,2))-1]." ".substr($news->date,0,4);?></strong>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="blog-item-text-container">
							<?=$news->text_full;?>

							<ul id="files">
								<?
									$sql="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".$news->id."' AND  typephoto='news' ORDER BY `id`;";
									
									//echo $sql;
									$result = $mysqli->query($sql);
									while ($myrow = $result->fetch_object()) {	
								?>
								<li data-imf="<?=$myrow->id;?>"><a
										href="/ckfinder/userfiles/images/news/<?=$myrow->photo;?>" rel="gall"
										class="fancybox"><img
											src="/ckfinder/userfiles/images/news/thumbnail/<?=$myrow->photo;?>"></a><i
										class="icon-trash"></i></li>
								<? } ?>
							</ul>

							<style>
								#files li {
									display: inline-block;
									margin: 5px;
									list-style: none;
									position: relative;
									height: 150px;
								}

								#files li img {
									box-shadow: 1px 1px 2px #ccc;
									border: 2px solid #fff;
									border-radius: 2px;
								}

								.icon-trash {
									width: 16px;
									height: 16px;
									background: url(assets/delete-icon.png);
									position: absolute;
									top: -8px;
									right: -8px;
									z-index: 10px;
									cursor: pointer;
								}
							</style>
						</div>

					</div>

					<? }  else { ?>
					<h1 class="pagename"><?=$title?></h1>
					<?  }?>

				</div>
				<div class="sidebar">
					<!-- WIDGET -->
					<div class="sidebar-item  m-bot-35">

						<div class="caption-container-main m-bot-30">
							<div class="caption-text-container">Новости</div>
							<div class="content-container-white caption-bg "></div>
						</div>

						<div>
							<ul class="blog-categories">

								<? 	$sql2="SELECT * FROM `stw_novost` WHERE pub=1 ORDER BY date DESC LIMIT 0,12 ;";						
									$result4 =$mysqli->query($sql2);
									$o=0;
								while ($dirnames4 = $result4->fetch_object()) { ?>
									<li><a href="/news/<?=$dirnames4->id;?>/" <? if ($dirnames4->id==(int)$_REQUEST['idp'])
											{ echo 'class="active"'; } ?>><span class="blog-cat-icon"></span>
											<?=$dirnames4->name;?><br><span>
												<?=substr($dirnames4->date,8,2)." ".$month[intval(substr($dirnames4->date,5,2))-1]." ".substr($dirnames4->date,0,4);?></span></a>
									</li>
								<? } ?>
							</ul>
						</div>
					</div>

				</div>
			</div>

<? } else { ?>
			<div class="main_field">
			<h1 class="pagename"><?=$title?></h1>
				<div class="news-block">
					<?  $sql="SELECT * FROM `stw_novost` WHERE parent_pub=0 ORDER BY date DESC LIMIT 10 "; 	//echo $sql;
						$result = $mysqli->query($sql);
						
					while ($news = $result->fetch_object()) { 
						
						$sql3="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".$news->id."' AND typephoto='news'  ORDER BY `id` LIMIT 0,1;";
						$result3 = $mysqli->query($sql3);
						$myrow3 = $result3->fetch_object();
					?>
					<div class="blog-item m-bot-35 clearfix">
						<div class="hover-item">
							<div class="clearfix">
								<div class="blog-item-date-inf-container left">
									<div class="blog-item-date-cont">
										<div class="blog-item-date"><?=substr($news->date,8,2);?></div>
										<div class="blog-item-mounth" style="text-transform:uppercase;">
											<?=$monthshort[intval(substr($news->date,5,2))-1];?></div>
									</div>

								</div>
								<? if (strlen($myrow3->photo)>=1) { ?>
								<div class="view view-first">
									<img src="/ckfinder/userfiles/images/news/<?=$myrow3->photo;?>" alt="news' photo">

								</div>
								<? }  else { ?>

								<? } ?>
							</div>
							<div class="blog-item-caption-container">
								<a class="a-invert" href="/news/<?=$news->id;?>/"><strong><?=$news->name?></strong></a>
								<div class="lp-item-container-border clearfix">
									<div class="blog-info-container">
										<ul class="clearfix">
											<li class="icon-calendar">
												<strong><?=substr($news->date,8,2)." ".$month[intval(substr($news->date,5,2))-1]." ".substr($news->date,0,4);?></strong>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="blog-item-text-container">
							<?=implode(' ', array_slice(explode(' ', strip_tags($news->text_short)), 0, 50)); echo "...";	?>
						</div>
						<div class="lp-r-m-container right">
							<a href="/news/<?=$news->id;?>/" class="button medium r-m-plus r-m-full">Читать дальше</a>
						</div>

					</div>

					<? } ?>

				</div>
				</div> <!-- end main_field -->
				<style>
					@media only screen and (min-width: 320px) and (max-width: 450px) {
						.blog-item {
							display: none;
						}
					}
				</style>
				<!-- SIDEBAR -->
				<div class="sidebar">
					<!-- WIDGET -->
					<div class="sidebar-item  m-bot-35">

						<div class="caption-container-main m-bot-30">
							<div class="caption-text-container">Новости</div>
							<div class="content-container-white caption-bg "></div>
						</div>

						<div>
							<ul class="blog-categories">

								<? 
					 $sql2="SELECT * FROM `stw_novost` WHERE pub=1 ORDER BY date DESC LIMIT 0,92 ;";
					 
					$result4 =$mysqli->query($sql2);
					$o=0;
					while ($dirnames4 = $result4->fetch_object()) { ?>
								<li><a href="/news/<?=$dirnames4->id;?>/" <? if ($dirnames4->id==(int)$_REQUEST['idp'])
										{ echo 'class="active"'; } ?>><span class="blog-cat-icon"></span>
										<?=$dirnames4->name;?><br><span>
											<?=substr($dirnames4->date,8,2)." ".$month[intval(substr($dirnames4->date,5,2))-1]." ".substr($dirnames4->date,0,4);?></span></a>
								</li>
								<? } ?>
								<a class="archive_news" href="https://penates.mskobr.ru/novosti/" target="_blank"><i
										class="fa fa-archive" aria-hidden="true"></i>
									Архив новостей</a>

							</ul>
						</div>
					</div>

				</div>
			</div>
			<? } ?>

		</div>
	</div><!-- end container-main -->
	<!-- partners -->
	<? require_once("partners.php");?>
	<!-- /partners -->

	<? require_once 'footer.php'; ?>

	</div><!-- End wrap -->
	<!-- JS begin -->

	<script src="/js/jquery-1.11.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
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

	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>

	<script src="/js/jquery-cookie.js"></script>
	<!-- JS end -->

</body>

</html>