<? include('topfile.php');
if (isset($_SESSION['id'])) {
	// Redirection to login page twitter or facebook
	// header("location: index.php");
}
?>
<!DOCTYPE html><? $zip = "";
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
				?>
<html>

<head>
	<title><?= $mpaget->page_name; ?>НОУ СОШ «Наши Пенаты»</title>
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
	<!-- Sequence slider CSS -->
	<link rel="stylesheet" type="text/css" href="/css/sequencejs-theme.modern-slide-in.css">
	<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="/css/sequencejs-theme.modern-slide-in.ie.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/scss/sequencejs-theme.modern-slide-in.ie8.css" ><![endif]-->

	<!--end Sequence slider CSS -->

	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/css/ie-warning.css" ><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" type="text/css" media="screen" href="/css/style-ie.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" type="text/css" href="/css/ei8fix.css" ><![endif]-->

	<!-- flexslider slider CSS -->

	<link rel="stylesheet" type="text/css" href="/css/flexslider.css">

	<!--end flexslider slider CSS -->


	<!-- CSS end -->

	<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function(m, e, t, r, i, k, a) {
			m[i] = m[i] || function() {
				(m[i].a = m[i].a || []).push(arguments)
			};
			m[i].l = 1 * new Date();
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
		})
		(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

		ym(39452070, "init", {
			clickmap: true,
			trackLinks: true,
			accurateTrackBounce: true,
			webvisor: true,
			trackHash: true
		});
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/39452070" style="position:absolute; left:-9999px;" alt="" /></div>
	</noscript>

	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-TRM52FG');
	</script>
	<!-- End Google Tag Manager -->
</head>

<body>
	<style>
		.frame_window{
			padding: 20px;
		}

		.frame_window h3{
			margin: 0 0 1rem;
			font-family: 'Phenomena';
			font-size: 2rem;
			line-height: 1.1;
		}

		.frame_window h4{
			margin: 0 0 1rem;
			font-family: 'RedRing';
			font-size: 1rem;
		}

		.employee-info p{
			line-height: 1.6;
			font-size: 1rem;
		}
	</style>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRM52FG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<? if (isset($_REQUEST['idt'])) { ?>

		<?
		$sql2 = "SELECT `stw_employee`.*  FROM  `stw_employee`  WHERE `stw_employee`.id=" . (int)$_REQUEST['idt'] . "   ;";
		//$sql="SELECT `stw_employee`.*, `tbl_gallery_photo`.photo ph FROM  `stw_employee` left join `tbl_gallery_photo` on `stw_employee`.id=`tbl_gallery_photo`.gallery_id WHERE `stw_employee`.department_id=".$dep->id."  AND `stw_employee`.team=".$tid."  AND  `tbl_gallery_photo`.typephoto='team' ORDER BY priority ;"; 
		//echo $sql2;
		$result2 = $mysqli->query($sql2);
		?>
		<div class="frame_window">
			<?
			while ($item = $result2->fetch_object()) {
				$q = 0; ?>

				<?
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
				<div>
					<? if (strlen($itemview) >= 1) { ?>
						<img src="/ckfinder/userfiles/images/employee/<?= $itemview; ?>" name="aboutme" border="0" style=" max-width:200px; max-height:400px; float:left; margin-right: 20px;">
					<? } else { ?>
						<img src="/images/preview.png" name="aboutme" border="0" style=" max-width:200px; max-height:400px; float:left; margin-right: 20px;">
					<? } ?>
					<h3><?= $item->last_name; ?><br><?= $item->name . " " . $item->middle_name; ?></h3>
					<h4><?= $item->position; ?></h4>
					<div class="employee-info"><?= $item->bio_full; ?></div>
				</div>



			<? } ?>
		</div>

	<? } ?>






	</div>

</body>

</html>