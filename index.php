<? $idp = $_GET["idp"];
include('topfile.php');
require_once "topfile-head.php"; ?>

<body class="home">
	<!-- Google Tag Manager -->
	<? require_once "counters-gtm.php"; ?>
	<!-- End Google Tag Manager -->

	<div id="wrap" class="boxed">

		<? require_once "header.php"; ?>
		<div class="hero">
			<!-- DIRECTIONS -->
			<div class="directions">
				<div class="kd">
					<div class="preview">
						<a href="https://nashipenati.ru/kidsgarden/">детский сад</a>
					</div>
					<div class="ani">
						<div class="info">
							<h5>монтессори-сад и&nbsp;подготовка к&nbsp;школе</h5>
						</div>
						<div class="request">
							<?/*<a href="http://form.testinggo.ru/" target="_blank">оставить<br>заявку</a> */?>
							<a href="formrequest.php" class="iframe">оставить<br>заявку</a>
						</div>
					</div>
				</div>
				<div class="ps">
					<div class="preview">
						<a href="https://nashipenati.ru/elementary/">младшая школа</a>
					</div>
					<div class="ani">
						<div class="info">
							<h5>начальное монтессори-образование</h5>
						</div>
						<div class="request">
							<?/*<a  href="http://01form.testinggo.ru/"  target="_blank">оставить<br>заявку</a> */?>
							<a href="formrequest.php" class="iframe">оставить<br>заявку</a>
						</div>
					</div>
				</div>
				<div class="hs">
					<div class="preview">
						<a href="https://nashipenati.ru/highschool/">cредняя школа</a>
					</div>
					<div class="ani">
						<div class="info">
							<h5>аттестат государственного образца</h5>
						</div>
						<div class="request">
							<?/*<a href="http://02form.testinggo.ru/" target="_blank">оставить<br>заявку</a>*/?>
							<a href="formrequest.php" class="iframe">оставить<br>заявку</a>
						</div>
					</div>
				</div>
			</div>
			<!-- /DIRECTIONS -->
			<!-- SLIDER desktop-->
			<div class="slider-1 sl_dsk">
				<div class="flex-container">
					<div class="flexslider loading">
						<ul class="slides">
							<? for($i=1;$i<=4;$i++){?>
							<li style="background-image:url(images/sliders/mshso0822/mshso0822-0<?=$i?>.png);"></li>
							<?}?>
						</ul>
					</div>
				</div>
			</div><!-- End slider desktop -->
			<!-- SLIDER mobile-->
			<div class="slider-1 sl_mob">
				<div class="flex-container">
					<div class="flexslider loading">
						<ul class="slides">
							<? for($i=1;$i<=4;$i++){?>
							<li style="background-image:url(images/sliders/mshso0822/mshso0822-0<?=$i?>-m.png);"></li>
							<?}?>
						</ul>
					</div>
				</div>
			</div><!-- End slider desktop -->

			<? /* ?>
			<!-- mobile slider -->
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img class="d-block w-100" src="images/kindergarden2.jpg" alt="slide 1">
						<div class="carousel-caption d-md-block">
							<h5 class="h5_class_kindgarden">Монтессори сад</h5><br>
							<a class="btn btn-outline-dark btn-sm" href="/kidsgarden/">Перейти</a>
							<a class="btn btn-secondary btn-sm" href="http://form.testinggo.ru/">Записаться</a>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/penaty_5.jpg" alt="slide 2">
						<div class="carousel-caption d-md-block">
							<h5 class="h5_class_element">Начальная Монтессори-школа</h5><br>
							<a class="btn btn-outline-dark btn-sm" href="/elementary/">Перейти</a>
							<a class="btn btn-secondary btn-sm" href="http://01form.testinggo.ru/">Записаться</a>
						</div>
					</div>
					<div class="carousel-item">
						<img class="d-block w-100" src="images/penaty_6.jpg" alt="slide 3">
						<div class="carousel-caption d-md-block">
							<h5 class="h5_class_school">Средняя и старшая школа</h5><br>
							<a class="btn btn-outline-dark btn-sm" href="/highschool/">Перейти</a>
							<a class="btn btn-secondary btn-sm" href="http://02form.testinggo.ru/">Записаться</a>
						</div>
					</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Вперед</span>
				</a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Назад</span>
				</a>
			</div>
			<!-- mobile slider end -->
			<? */ ?>

		</div><!-- /SLIDER -->

		<!-- BUY NOW -->
		<div class="zao_edu">
			<div class="container clearfix">
				<a href="http://distnashipenati.ru/" target="_blank">
					<div class="buy-text-container">
						<div class="buy-text">
							<h2>заочное<br>отделение</h2>
						</div>
					</div>
					<div class="arr-l"></div>
				</a>
			</div>
		</div>

		<!-- /command block -->
		<div class="container-column green container-column-command">
			<div class="container-column-intro">
				<div class="title-block-text">
					<a href="/teachers.php">КОМАНДА</a>
				</div>
			</div>
			<? if (!isset($_REQUEST['table'])) { ?>
				
				<?
				$sql = "SELECT id_service	, service_pr FROM `service_pr` WHERE parent_id=172;";
				//echo $sql;
				$result1 = $mysqli->query($sql);
				?>

				<div class="container-command">
					<? $com_counter = 1;
					while ($dep = $result1->fetch_object()) {
						$qq = 0; ?>
						<div class="sttab sttab-<? if ($com_counter < 10) echo '0'?><?= $com_counter ?><? if ($com_counter == 1) echo ' active' ?>">
							<h2 class="titlestuff">
								<?= $dep->service_pr; ?>
							</h2>
							<?
							$sql2 = "SELECT `stw_employee`.*  FROM  `stw_employee`  WHERE `stw_employee`.department_id=" . $dep->id_service . "  ORDER BY list_order;";
							$result2 = $mysqli->query($sql2);
							?>
							<div class="stuff-grid">
								<? while ($item = $result2->fetch_object()) {
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
									<div class="stuff-item">
										<a href="teacher.php?idt=<?= $item->id; ?>" class="iframe">
											<div class="stuff-thumbnail" style="background:<? if (strlen($itemview) >= 1) echo "url('/ckfinder/userfiles/images/employee/" . $itemview . "')";else echo "url('/images/preview.png')"; ?> center top no-repeat;background-size:cover">
											</div>
											<div class="stuff-name">
												<span><?= $item->last_name; ?></span><br>
												<?= $item->name . " " . $item->middle_name; ?>
											</div>
											<div class="stuff-position">
												<?= $item->position; ?>
											</div>
										</a>
										<div class="itembg"></div>
									</div>
								<? } ?>
							</div>
						</div>
					<? $com_counter++;
					} ?>

<?
					$sql_t = "SELECT id_service	, service_pr FROM `service_pr` WHERE parent_id=172;";
					//echo $sql;
					$result2 = $mysqli->query($sql_t);

					$tab_counter = 1; ?>
					<div class="switcher-wrapper">
					<div class="switcher-grid">
						<? while ($switch = $result2->fetch_object()) { ?>
							<div class="tab-switch tab-switch-<? if ($tab_counter < 10) echo '0'?><?= $tab_counter ?><? if ($tab_counter == 1) echo ' active' ?>">
								<div><?= $switch->service_pr; ?></div>
								<img src="/images/i-2021/border_hmd_wht.png">
							</div>
						<? $tab_counter++;
						} ?>
					</div>
					</div>
					

				</div>

			<? } else {  ?>
				<section id="portfolio" class="portfolio">

					<!-- Title -->
					<!-- For Project Expander -->
					<div class="project-end-pos"></div>

					<!-- Portfolio Filters -->
					<div class="portfolio-filter row" data-animation="fadeIn">
						<div class=" title">
							<a class="current" data-filter="*">Наш коллектив <span><i class="fa fa-caret-up"></i></span></a>
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

						<?

						$whiis = array(1 => "website", 2 => "illustration", 3 => "photo", 4 => "movie",);

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

													<h4 style=" font-size:18px; line-height:28px;"><?= $item->name . "<br>" . $item->middle_name; ?> <br>
														<?= $item->last_name; ?></h4>
													<span><?= $item->position; ?></span>

												</div>
												<!-- Project Thumb -->
												<? if (strlen($itemview) >= 1) { ?>
													<img src="/ckfinder/userfiles/images/employee/<?= $itemview; ?>" style="width:160px;">
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
		<!-- /command block -->

		

<? /*?>		<div class="container-column-full">
			<!-- SLIDER -->
			<div class="slider-home">
				<div class="flex-container-home">
					<div class="flexslider-home">
						<ul class="slides">
							<li style="background-image:url(images/sliders/slider-1/kid_img.jpg);"></li>
							<li style="background-image:url(images/sliders/slider-1/primary_img.jpg);"></li>
							<li style="background-image:url(images/sliders/slider-1/high_img_cr.jpg);"></li>
						</ul>
					</div>
				</div>
			</div><!-- End slider -->
			
		</div> <? */ ?>

		<!-- LATEST NEWS -->
		<div class="container clearfix news-block">
			<div class="carousel-intro container-column-intro">

				<div class="caption-container m-bot-20">
					<div class="title-block-text">
						<a href="/news/">НОВОСТИ</a>
					</div>

					<div class="carousel-navi jcarousel-scroll">
						<div class="jcarousel-prev"></div>
						<div class="jcarousel-next"></div>
					</div>
				</div>

			</div>

			<div class="jcarousel latest-posts-jc">
				<ul class="clearfix">
					<!-- LATEST NEWS ITEM -->
					<? $sql = "SELECT * FROM `stw_novost` WHERE parent_pub=0 ORDER BY date DESC LIMIT 0,9 "; 	//echo $sql;
					$result = $mysqli->query($sql);
					$month = array("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря");

					while ($news = $result->fetch_object()) { ?>
						<?
						$sql3 = "SELECT * FROM `tbl_gallery_photo` WHERE `gallery_id` ='" . $news->id . "' AND typephoto='news'  ORDER BY `id` LIMIT 0,1;";
						$result3 = $mysqli->query($sql3);
						$myrow3 = $result3->fetch_object();
						?>

						<li class="four columns carousel_item">
							<div class="hover-item">
								<div class="view view-first">
									<? if (strlen($myrow3->photo) >= 1) { ?>
										<a class="a-invert" href="news/<?= $news->id ?>/"><img src="/ckfinder/userfiles/images/news/<?= $myrow3->photo; ?>" id="novost_<?= $news->id ?>_preview" alt="news" title="Citrus Montessori School"></a>
									<? } else { ?> <a class="a-invert" href="news/<?= $news->id ?>/"><img src="/images/news.jpg" id="novost_<?= $news->id ?>_preview" alt="news" title="Citrus Montessori School"></a>
									<? } ?>
								</div>
								<div class="lp-item-caption-container">

									<div class="lp-item-container-border clearfix">
										<div class="lp-item-info-container">
											<?= substr($news->date, 8, 2) . " " . $month[intval(substr($news->date, 5, 2)) - 1] . " " . substr($news->date, 0, 4); ?>
										</div>
									</div>
									<a class="a-invert" href="news/<?= $news->id ?>/"><?= implode(' ', array_slice(explode(' ', $news->name), 0, 12)); ?><br>&nbsp;</a>
								</div>
							</div>
							<? /*?><div class="lp-item-text-container" style="padding: 10px 0; height:90px;">
								<a class="a-invert" href="news/<?= $news->id ?>/"><?= implode(' ', array_slice(explode(' ', strip_tags($news->text_short)), 0, 22));
																				echo "...";	?></a>
							</div><? */ ?>
						</li>

					<? } ?>

				</ul>
			</div>
			<!-- jCAROUSEL End -->
		</div>
		<!-- OUR NEWS End -->

		<!-- partners -->
		<? require_once("partners.php");?>
		<!-- /partners -->

		
		<? require_once 'footer.php'; ?>


		
	</div><!-- End wrap -->
	<style>
		.fa-eye {
			width: 30px;
			height: 25px;
			text-align: center;
			border: solid 1px #d44b38;
			color: #ffffff;
			background-color: #d44b38;
			font-size: 18px;
			position: absolute;
			display: none;
		}
	</style>
	<!-- JS -->

	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="https://code.jquery.com/jquery-migrate-1.2.1.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/superfish.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<!-- Flex Slider  -->
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/flex-slider.js"></script>
	<!-- end Flex Slider -->
	<script src="js/jquery.jcarousel.js"></script>
	<script src="js/jquery.fancybox-1.3.4.pack.js"></script>
	<script src="js/jQuery.BlackAndWhite.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/jflickrfeed.min.js"></script>
	<script src="js/jquery.quicksand.js"></script>
	<script src="js/main.js"></script>
	<script src="js/jquery-cookie.js"></script>

	<!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
	</script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
	</script>
	<!-- JS end -->


</body>

</html>