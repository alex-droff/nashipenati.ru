<? require("base.php"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Новости | ОАО "Первый объединенный банк" (Первобанк)</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.png" type="image/png">
<link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="/js/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
<link href="/style.css" rel="stylesheet" type="text/css" />
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
<div class="main">
<div class="header"> 
	<? require ("header.php");?>
	<? require ("lang.php");?>
	<div class="logo"><a href="/"><img src="/images/logo.png" width="225" height="57" border="0" alt="" /></a></div>
	<div class="menu">
		<? require ("menu.php");?>
	</div>
</div>
<div class="clr"></div>
<div class="body"> 
<script>
			jQuery(function() { 	


	$('.linkmore').toggle(function () {
		$(this).html('скрыть');
		 $(this).prev().toggle(); $(this).next().toggle('fade');
	}, function () {
		$(this).html('показать');
		 $(this).prev().toggle(); $(this).next().toggle('fade');
	});
	
	
	 });			</script>
	<div class="innertext">
		<div class="subpagemenu" style="padding:10px ;"><ul id="sec_nav">
	<li>
					<a href="/news/year/2013" class="navr">Новости за 2013 год</a>
				</li>
	
							<li>
					<a href="/news/year/2012" class="navr">Новости за 2012 год</a>
				</li>
							<li>
						<a href="/news/year/2011" class="navr">Новости за 2011 год</a>
				</li>
							<li>

						<a href="/news/year/2010" class="navr">Новости за 2010 год</a>
				</li>
							<li>
						<a href="/news/year/2009" class="navr">Новости за 2009 год</a>
				</li>
				<li>
						<a href="/news/year/2008" class="navr">Новости за 2008 год</a>
				</li>
				<li>
						<a href="/news/year/2007" class="navr">Новости за 2007 год</a>
				</li></ul></div>
	
			
			
	<div style="padding-right:200px;">
    
<? 	$month = array ("января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"); 
			
					if (isset($_REQUEST['id'])) { $sql="SELECT * FROM `News` WHERE ItemID=".(int)$_REQUEST['id']." ORDER BY PPK ";  } else { 
							$sql="SELECT * FROM `News` WHERE VST = 0  order by PPK LIMIT 0,30"; }
			//echo $sql;
				$result = mysql_query($sql);
		$o=0;
		
			if (isset($_REQUEST['y'])) {  ?> <h1>НОВОСТИ ЗА <?=htmlspecialchars($_REQUEST['y']);?> ГОД</h1>	<? }
		 
		while ($dirnames1 = mysql_fetch_object($result)) { if ($o==0) { $o++; ?>
						
							<? } ?>
					
						<div class="newsItem">
							<h1>
								<?=$dirnames1->ItemName;?>
								</h1>
								<p class="date"><?=substr($dirnames1->Date,8,2)." ".$month[intval(substr($dirnames1->Date,5,2))-1]." ".substr($dirnames1->Date,0,4);?></p>
							<div  >	
							<? if ($dirnames1->FullDescr!="") { ?>
							<?=$dirnames1->FullDescr;?> <? } else {?><?=$dirnames1->ShortDescr;?> <? }?>
							</div>
							</div>
							<? } 
		?>
			
		</div>
		<br clear="all" />
		<br clear="all" />
	</div>

	<div class="clr"></div>
	
	<div class="clr"></div>
</div>
<br clear="all" />
<? require ("footer.php"); ?>
</div>
</body>
</html>