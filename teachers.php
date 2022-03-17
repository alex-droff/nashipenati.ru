<? include('topfile.php');
if (isset($_SESSION['id'])) {
	// Redirection to login page twitter or facebook
	// header("location: index.php");
}
?>

<? $zip = "";
//print_r($_REQUEST);

$sqlpage = "SELECT `id`, `page_name`, `page_title`, `page_url`, `is_footer`, `is_login`, `page_content`, `created`, `pub`, `id_parentmenu`, `order_menu`, `show_top`, `page_type` FROM  `page` WHERE id= ? ;";
$zip .= 26;

//$sqlpage = "SELECT Name, CountryCode FROM City WHERE Zip = ? AND Population > ?";

//echo $sqlpage." +++ ".$zip."   333";

if ($stmt = $mysqli->prepare($sqlpage)) {
	$stmt->bind_param('s', $zip);
	$stmt->execute();
	$stmt->bind_result($id, $page_name, $page_title, $page_url, $is_footer, $is_login, $page_content, $created, $pub, $id_parentmenu, $order_menu, $show_top, $page_type);
	$stmt->fetch();
	$stmt->close();
}


if ($id >= 1) {
} else { // header("Location: /404.php");
}

$title ="Преподавательский состав";
require_once "topfile-head.php";
?>

<body>
<!-- Google Tag Manager -->
<? require_once "counters-gtm.php"; ?>
<!-- End Google Tag Manager -->

	<div id="wrap" class="boxed">
		<? require_once "header.php"; ?>

		<div class="container filter-portfolio container-main">

			<div class="main_field">
			<? if (!isset($_REQUEST['table'])) { ?>
				<? $sql = "SELECT id_service	, service_pr FROM `service_pr` WHERE parent_id=172;";
					//echo $sql;
					$result1 = $mysqli->query($sql);
				while ($dep = $result1->fetch_object()) {
						$qq = 0; 
				?>

				<h3 class="stuff-group"><?= $dep->service_pr; ?></h2>

				<?
					$sql2 = "SELECT `stw_employee`.*  FROM  `stw_employee`  WHERE `stw_employee`.department_id=" . $dep->id_service . "  ORDER BY list_order  ;";
					//$sql="SELECT `stw_employee`.*, `tbl_gallery_photo`.photo ph FROM  `stw_employee` left join `tbl_gallery_photo` on `stw_employee`.id=`tbl_gallery_photo`.gallery_id WHERE `stw_employee`.department_id=".$dep->id."  AND `stw_employee`.team=".$tid."  AND  `tbl_gallery_photo`.typephoto='team' ORDER BY priority ;"; 
					//echo $sql;
					$result2 = $mysqli->query($sql2);
				?>

				<div class="staff_grid">
					<?
					while ($item = $result2->fetch_object()) {
						$q = 0; 
						$sql3 = "SELECT `tbl_gallery_photo`.photo FROM  `tbl_gallery_photo`  WHERE `tbl_gallery_photo`.typephoto='team'   AND  `tbl_gallery_photo`.gallery_id=" . $item->id . " limit 0,1 ;";
						//echo $sql3;
						$result3 = $mysqli->query($sql3);
						$num_rows3 = $result3->num_rows;
						if ($num_rows3 >= 1) {
							$item3 = $result3->fetch_object();
							$itemview = $item3->photo;
						} else {
							$itemview = "";
						} 
					?>

						<div class="staff-item">
								<? if (strlen($itemview) >= 1) { 
									$staff_pic_url = "/ckfinder/userfiles/images/employee/".$itemview;
								 } else {
									$staff_pic_url = "/images/preview.png";
								 } ?> 
							<a href="teacher.php?idt=<?= $item->id; ?>" class="iframe staff_pic" style="background:url('<?=$staff_pic_url?>') center center no-repeat;background-size:cover"></a> 
							<a href="teacher.php?idt=<?= $item->id; ?>" class="iframe staff-name"> 
								<? if ($item->number != 0) { ?>
								<span>№ <?= $item->number; ?></span>
								<? } ?>
								<?= $item->last_name; ?>
								<br>
								<?= $item->name . " " . $item->middle_name; ?>
							</a> 
						</div>
					<? } ?>
				</div>

			<? } ?>


			<? } else {  ?>
				<section id="portfolio" class="portfolio">
					<!-- For Project Expander -->
					<div class="project-end-pos"></div>

					<!-- Portfolio Filters -->
					<div class="portfolio-filter row" data-animation="fadeIn">
						<div class=" title">
							<a class="current" data-filter="*">Наш коллектив <span><i
										class="fa fa-caret-up"></i></span></a>
							<a data-filter=".website">Руководство <span><i class="fa fa-caret-up"></i></span></a>
							<a data-filter=".illustration">Детский сад <span><i class="fa fa-caret-up"></i></span></a>
							<a data-filter=".photo">Монтесорри <span><i class="fa fa-caret-up"></i></span></a>
							<a data-filter=".movie">Учителя <span><i class="fa fa-caret-up"></i></span></a>
						</div>
					</div>

					<!-- For Project Expander -->
					<div class="project-beg-pos"></div>

					<!-- Project Page Holder-->
					<div id="project-box"></div>
					<!--/Project Page Holder-->

					<!-- Portfolio Grid -->
					<div id="portfolio-grid" class="portfolio-grid row">


				<?  $whiis = array(1 => "website", 2 => "illustration", 3 => "photo", 4 => "movie",);
					$sql = "SELECT id_service	, service_pr FROM `service_pr` WHERE parent_id=172;";
					//echo $sql;
					$result1 = $mysqli->query($sql);
					while ($dep = $result1->fetch_object()) {
						$qq = 0;
						$sql2 = "SELECT `stw_employee`.*  FROM  `stw_employee`  WHERE `stw_employee`.department_id=" . $dep->id_service . "  ORDER BY rand() ;";
						$result2 = $mysqli->query($sql2);
						while ($item = $result2->fetch_object()) {
							$q = 0;
							$sql3 = "SELECT `tbl_gallery_photo`.photo FROM  `tbl_gallery_photo`  WHERE `tbl_gallery_photo`.typephoto='team'   AND  `tbl_gallery_photo`.gallery_id=" . $item->id . " limit 0,1 ;";
							//echo $sql3;
							$result3 = $mysqli->query($sql3);
							$num_rows3 = $result3->num_rows;
							if ($num_rows3 >= 1) {
								$item3 = $result3->fetch_object();
								$itemview = $item3->photo;
							} else {
								$itemview = "";
							} ?>

						<!-- Project Item -->
						<div class="portfolio-item <?= $whiis[rand(1, 4)]; ?> <?= $whiis[rand(1, 4)]; ?>">
							<div class="item-image">
								<div class="open-project-link">
									<!-- Project Link -->
									<a class="open-project" href="teachers.php">
										<div class="item-overlay"></div>
										<div class="item-details">

											<h4 style=" font-size:18px; line-height:28px;">
												<?= $item->name . "<br>" . $item->middle_name; ?> <br>
												<?= $item->last_name; ?></h4>
											<span><?= $item->position; ?></span>

										</div>
										<!-- Project Thumb -->
										<? if (strlen($itemview) >= 1) { ?>
										<img src="/ckfinder/userfiles/images/employee/<?= $itemview; ?>"
											style="width:160px;">
										<? } else { ?>

										<img src="/images/preview.png" style="width:160px;">

										<? } ?>
									</a>
								</div>
							</div>
						</div>

						<? } ?>
					<? } ?>
					</div>
				</section>

			<? } ?>
			</div>
			<div class="sidebar">
				<?
				$sidemenu = false;

				$sql4 = "SELECT * FROM `page` WHERE id_parentmenu = '" . (int)$id . "' and pub = 1  order by order_menu";
				$result4 = $mysqli->query($sql4);
				if ($result4->num_rows >= 1) {
					$sidemenu = true;
					$haschilds = 1;
					$sql4 = "SELECT * FROM `page` WHERE id_parentmenu = '" . (int)$id . "' and pub = 1  order by order_menu";
					$sql44 = "SELECT * FROM `page` WHERE id = '" . (int)$id . "' and pub = 1  order by order_menu";
				} else {
					$haschilds = 0;
					if ($id_parentmenu != 0) {
						$sidemenu = true;
						$sql4 = "SELECT * FROM `page` WHERE id_parentmenu = '" . (int)$id_parentmenu . "' and pub = 1  order by order_menu";
						$sql44 = "SELECT * FROM `page` WHERE id = '" . (int)$id_parentmenu . "' and pub = 1  order by order_menu";
					}
				}

				?>
				<!-- WIDGET -->
				<div class="sidebar-item  m-bot-35">
					<? $result44 = $mysqli->query($sql44);
					$dirnames44 = $result44->fetch_object(); ?>
					<div class="caption-container-main">
						<div class="caption-text-container">О школе</div>
					</div>

						<div>
							<ul class="blog-categories">
							<? $result4 = $mysqli->query($sql4);
							$o = 0;
							while ($dirnames4 = $result4->fetch_object()) {
								if ($o == 0) {
									$o++; ?>
								<ul id="sec_nav">
								<? } ?>
								
								<li <? if ($dirnames4->id == $id) {
									echo 'class="active"';
									} ?>><a
										href="<? if (strlen($dirnames4->page_url) >= 1) { ?><?= $dirnames4->page_url; ?><? } else { ?>/page.php?idp=<?= $dirnames4->id; ?> <? } ?>"><span
											class="blog-cat-icon"></span> <?= $dirnames4->page_name; ?></a>
									<? //	getlevelsproduct ($dirnames4->id, $idt, $mysqli); 
										?>
								</li>
								<? } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->

		<!-- partners -->
		<? require_once("partners.php");?>
		<!-- /partners -->

		<? require_once 'footer.php'; ?>

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

	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
		integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>

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
	<script src="js22/scripts.js"></script>

	<script>
		//FANCYBOX-------------------------------------------------------
		(function () {
			jQuery(document).ready(function () {



				jQuery(".fancybox").fancybox({
					openEffect: 'none',
					closeEffect: 'none',
					prevEffect: 'fade',
					nextEffect: 'fade',
				});

				jQuery("a.iframe").fancybox(

					{
						'titleShow': true,
						'autoDimensions': true,
						'width': 800,
						'height': 450,
						'autoScale': true,
						'type': 'iframe'

					});

			});
		})();
	</script>
	<!-- JS end -->

</body>

</html>