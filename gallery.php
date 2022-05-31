<? include('topfile.php'); if (isset($_SESSION['id'])) {
    // Redirection to login page twitter or facebook
   // header("location: index.php");
}
$zip="";
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
$title ="Фотогалерея";
require_once "topfile-head.php";
?>

<body class="gallery">
<!-- Google Tag Manager -->
<? require_once "counters-gtm.php"; ?>
<!-- End Google Tag Manager -->

<div id="wrap" class="boxed">
	<? require_once "header.php"; ?>
	<div class="container filter-portfolio container-main">
<? if (isset($_REQUEST['idp'])&&($_REQUEST['idp']>=1)) { ?>
		<div class="main_field">
	<?  $sql2="SELECT * FROM `tbl_gallery` WHERE `id` ='".(int)$_REQUEST['idp']."' ;";			
		$result2 = $mysqli->query($sql2);
		$num_rows = $result2->num_rows;
		if ($num_rows>=1) { 
		$myrow2 =$result2->fetch_object();
	?>
		<h1 class="pagename"><?=$myrow2->name; ?></h1>
		<style>
			.fancybox {
				opacity: 1;
			}

			.fancybox:hover {
				opacity: .8;
			}
		</style>
		<? } else { ?>
		<h1 class="page-title">Фотогалерея</h1>
		<? }?>

		<ul id="portfolio">

		<?
		$sql1="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".(int)$_REQUEST['idp']."' AND typephoto='gallery'   ORDER BY `id` ;";
		//echo $sql1;
		$result1 = $mysqli->query($sql1);
		$num_rows = $result1->num_rows;
		if ($num_rows>=1) { ?>

				<? while ($myrow =$result1->fetch_object()) { ?>
				<li data-id="id-2" data-type="category2">
					<div class="hover-item">
						<div class="view view-first">
							<a href="/ckfinder/userfiles/images/gallery_photos/<?=$myrow->photo;?>" class="fancybox"
								rel="gallery1"
								style=" display:block;width:100%;height:300px;  background: url('/ckfinder/userfiles/images/gallery_photos/<?=$myrow->photo;?>') center center;  background-size:cover;"></a>
						</div>
					</div>
				</li>

				<? } ?>
				<? } else { ?>
				<? } ?>

			</ul>
		</div>

	<? } else { ?>

		
		<div class="main_field">
		<h1 class="pagename">Фотогалерея</h1>	
				<ul id="portfolio">
					<!-- PORTFOLIO ITEM -->
			<?  $sql2="SELECT * FROM `tbl_gallery` ORDER BY id DESC;";		
				$result2 = $mysqli->query($sql2);
				$num_rows = $result2->num_rows;
				while ($myrow2 =$result2->fetch_object()) { 
					$sql1="SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='".$myrow2->id."' AND typephoto='gallery' ORDER BY id;";
					//echo $sql1;
					$result1 = $mysqli->query($sql1);
					$num_rows = $result1->num_rows;
					$myrow =$result1->fetch_object();
			?>

					<li data-id="id-1" data-type="category1" class="gallery-item">
						<div class="hover-item">
							<div class="view view-first">
								<a href="/gallery/<?=$myrow2->id;?>/"
									style="background:#fafafa url('/ckfinder/userfiles/images/gallery_photos/<?=$myrow->photo;?>') center center;  background-size:cover;">
								</a>
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="/gallery/<?=$myrow2->id;?>/">
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold"><?=$myrow2->name;?></span>
										</div>
									</div>
								</a>
								<div class="item-caption"><?=$myrow2->node_key;?></div>
							</div>
						</div>
					</li>
			<? } ?>
				</ul>

		</div><!-- end main_field -->
			

	<? } ?>
		<div class="sidebar">
			<!-- WIDGET -->
			<div class="sidebar-item  m-bot-35">

				<div class="caption-container-main m-bot-30">
					<div class="caption-text-container">фотогалерея</div>
					<div class="content-container-white caption-bg "></div>
				</div>

				<div>
					<ul class="blog-categories">

						<? 
				$sql2="SELECT * FROM `tbl_gallery`  ORDER BY id DESC;";
	
			$result4 =$mysqli->query($sql2);
			$o=0;
			while ($dirnames4 = $result4->fetch_object()) { ?>
						<li><a href="/gallery/<?=$dirnames4->id;?>/" <? if
								($dirnames4->id==(int)$_REQUEST['idp']) { echo 'class="active"'; } ?>><span
									class="blog-cat-icon"></span> <?=$dirnames4->name;?></a>
						</li>
						<? } ?>

					</ul>
				</div>
			</div>

		</div>
	</div>

	</div>

	<!-- partners -->
	<? require_once("partners.php");?>
	<!-- /partners -->

	<? require_once 'footer.php'; ?>
	
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

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
	integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
	integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>

<!-- JS end -->

</body>

</html>