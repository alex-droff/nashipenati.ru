<? $idp = $_GET["idp"];
include('topfile.php');
if (isset($_SESSION['id'])) {}
$zip = "";
//print_r($_REQUEST);
if (isset($_REQUEST['idp']) && ($_REQUEST['idp'] >= 1)) {
	$sqlpage = "SELECT `id`, `page_name`, `page_title`, `page_url`, `is_footer`, `is_login`, `page_content`, `created`, `pub`, `id_parentmenu`, `order_menu`, `show_top`, `page_type` FROM  `page` WHERE id= ? ;";
	$zip .= $_REQUEST['idp'];
} else {
	$sqlpage = "SELECT `id`, `page_name`, `page_title`, `page_url`, `is_footer`, `is_login`, `page_content`, `created`, `pub`, `id_parentmenu`, `order_menu`, `show_top`, `page_type` FROM  `page` WHERE page_url= ? ;";
	$zip .= $_REQUEST['urlpage'];
}
//$sqlpage = "SELECT Name, CountryCode FROM City WHERE Zip = ? AND Population > ?";
//echo $sqlpage." +++ ".$zip."   333";

function getlevelsproduct($ids, $idtabl, $mysqli)
{
	if ($ids != 0) {
		$sql1 = "SELECT id, page_name, page_url FROM `page` WHERE id_parentmenu =" . (int)$ids . " and pub = 1;";
		//	echo $sql1;		
		$result1 = $mysqli->query($sql1);
		$o = 0;
		while ($dirnames1 = $result1->fetch_object()) {
			if ($o == 0) {
				$o++; ?>
				<ul id="sec_nav">
				<? } ?>
				<li>
					<a href="<?= $dirnames1->page_url; ?>" id="nested-link"><?= $dirnames1->page_name; ?></a>
					<? getlevelsproduct($dirnames1->id, $idtabl, $mysqli);?>
				</li>
		<? }
		if ($o == 1) { ?>
			</ul>
		<? }
	}
}

if ($stmt = $mysqli->prepare($sqlpage)) {
	$stmt->bind_param('s', $zip);
	$stmt->execute();
	$stmt->bind_result($id, $page_name, $page_title, $page_url, $is_footer, $is_login, $page_content, $created, $pub, $id_parentmenu, $order_menu, $show_top, $page_type);
	$stmt->fetch();
	$stmt->close();
}

if ($id >= 1) {
} else {
	header("Location: /404.php");
}
$title = $mpaget->page_name; 
require_once "topfile-head.php";
?>

<body <? if ($idp) echo 'class="page-' . $idp . '"'; ?>>
		
	<!-- Google Tag Manager -->
		<? require_once "counters-gtm.php"; ?>
	<!-- End Google Tag Manager -->

		<div id="wrap" class="boxed">
			<? require_once "header.php"; ?>

			<!-- PAGE TITLE -->

			<!-- CONTENT  -->
			<?
			$needlofin = true;
			//echo $is_login;
			if ($is_login == 1) {
				$needlofin = false;
			}
			if (isset($_SESSION['id'])) {
				$needlofin = true;
			}

			if ($needlofin == true) {
				$sidemenu = false;
				$showlogoff = $id;
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
						$showlogoff = $id_parentmenu;
					}
				}

				if ($sidemenu) { ?>

					<div class="container container-main">
						<div class="main_field">
							<!-- BLOG ITEM -->
							<div class="blog-item m-bot-35 clearfix">
								<!-- <div class="hover-item"><br><br></div> -->
								<div class="blog-item-text-container">
									<? if($page_title) echo '<h3>'.$page_title.'</h3>'; ?>
									<?  $str = str_replace("<p>", '<p class="p1">', $page_content);
										$str = str_replace('\"', '"', $page_content);
										echo $str;
									?>
								</div>

								<ul id="files">
									<?
									$sql = "SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='" . $id . "' AND typephoto='pages'  ORDER BY `id`;";
									$result = $mysqli->query($sql);
									while ($myrow = $result->fetch_object()) {
									?>
										<li data-imf="<?= $myrow->id_img; ?>"><a href="/ckfinder/userfiles/images/<?= $myrow->photo; ?>" rel="gall" class="fancybox"><img src="/ckfinder/userfiles/images/thumbnail/<?= $myrow->photo; ?>"></a><i class="icon-trash"></i></li>
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
							<!-- BLOG ITEM -->

						</div>

						<!-- SIDEBAR -->
						<div class="sidebar">
							<!-- WIDGET -->
							<div class="sidebar-item  m-bot-35">
								<? $result44 = $mysqli->query($sql44);
								$dirnames44 = $result44->fetch_object(); ?>
								<div class="caption-container-main">
									<div class="caption-text-container"><?= $dirnames44->page_name; ?></div>
									<div class="content-container-white caption-bg "></div>
								</div>

								<div>
									<ul class="blog-categories">

										<? $result4 = $mysqli->query($sql4);
										$o = 0;
										while ($dirnames4 = $result4->fetch_object()) { ?>
											<? if ($dirnames4->is_login == 0) { ?>
												<li <? if ($dirnames4->id == $id) {
														echo 'class="active"';
													} ?>><a href="<? if (strlen($dirnames4->page_url) >= 1) { ?><?= $dirnames4->page_url; ?><? } else { ?>/page.php?idp=<?= $dirnames4->id; ?> <? } ?>"><span class="blog-cat-icon"></span> <?= $dirnames4->page_name; ?></a>
													<? //	getlevelsproduct ($dirnames4->id, $idt, $mysqli); 
													?> </li> <? } elseif (isset($_SESSION['id'])) { ?>
												<li <? if ($dirnames4->id == $id) {
													echo 'class="active"';
													} ?>><a href="<? if (strlen($dirnames4->page_url) >= 1) { ?><?= $dirnames4->page_url; ?><? } else { ?>/page.php?idp=<?= $dirnames4->id; ?> <? } ?>"><span class="blog-cat-icon"></span> <?= $dirnames4->page_name; ?></a>
													<? //	getlevelsproduct ($dirnames4->id, $idt, $mysqli); 
													?> 
												</li>
											<? } ?>
										<? } ?>

										<?

										if (isset($_SESSION['id']) && ($showlogoff == 40)) { ?>
											<li><a href="/logoff/"><span class="blog-cat-icon"></span> Выйти</a></li>
										<? } ?>
									</ul>

								</div><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnashipenati%2F&tabs=timeline&width=270&height=350&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="270" height="350" style="border:none;overflow:hidden"></iframe>
							</div>
							<div><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcitrusmontessorischool%2F&tabs=timeline&width=270&height=350&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="270" height="350" style="border:none;overflow:hidden"></iframe></div>

						</div>
					</div>

				<? } else { ?>

					<div class="container m-bot-35 clearfix">

						<div class="four columns">
							<div class="img-about">
								<? if ($_REQUEST['idp'] == 19) { ?> <br><br>
									<!-- <script src="//api-maps.yandex.ru/services/constructor/1.0/js/?sid=PecjnLtnQx5HXhtFWh1esYaONl0fSx-x&width=460&height=450"></script> -->
									<!--<iframe src="https://yandex.ru/map-widget/v1/?z=12&ol=biz&oid=1090036814" width="420" height="420" frameborder="0"></iframe>-->
									<br>

								<? } else { ?>
									<img class="" alt="about" src="/images/content/about.jpg">
								<? } ?>
							</div>
						</div>
						<div class="eight columns">

							<div class="caption-container-main m-bot-30">
								<div class="caption-text-container"><?= $page_title; ?></div>
								<div class="content-container-white caption-bg "></div>
							</div>
							<? $str = str_replace("<p>", '<p class="p1">', $page_content);
							$str = str_replace('\"', '"', $page_content);
							echo $str;
							?>
						</div>

					</div>

				<? } ?>

			<? } else { ?>
				<div class="container m-bot-100 m-top-80 clearfix">
					<div class="two columns ">

						<div class="error404-numb">

						</div>

					</div>
					<div class="eight columns ">

						<div class="error404-text">
							НЕТ ДОСТУПА,<br>ОШИБКА!<br>
							<a href="/student/" style=" font-size:18px; line-height:40px;">Войти на сайт, указать логин / пароль</a>
						</div>

					</div>
				</div>

			<? } ?>

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
<script src="/js/jquery.fancybox-1.3.4.pack.js"></script>
<script src="/js/jQuery.BlackAndWhite.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>
<script src="/js/jflickrfeed.min.js"></script>
<script src="/js/jquery.quicksand.js"></script>
<script src="/js/main.js"></script>
<script src="/js/jquery-cookie.js"></script>

<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<!-- JS end -->

</body>

</html>