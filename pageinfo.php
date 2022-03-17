<? require("base.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?
	function getlevelsproduct ($ids, $idtabl) { 
	if ($ids!=0) { 
		$sql1="SELECT ItemID, ItemName, Url FROM `SecCat` WHERE ItemParent =".(int)$ids." and VST = 0 order by PPK";
		//echo $sql1;
		
		$result1 = mysql_query($sql1);
		$o=0;
		while ($dirnames1 = mysql_fetch_object($result1)) { if ($o==0) { $o++; ?>
<ul id="sec_nav">
	<? } ?>
	<li><a href="<?=$dirnames1->Url;?>" id="nested-link">
		<?=$dirnames1->ItemName;?>
		</a>
		<? 
		getlevelsproduct ($dirnames1->ItemID,$idtabl); 
		?>
	</li>
	<? } 
		if ($o==1) { ?>
</ul>
<? } 
	}
} 

function getpathpage ($ids, $idtabl) { 

 global $tpath;
if ($idtabl =="MiF") { } else {
		$sql1="SELECT ItemName, ItemID, ItemParent, Url  FROM `$idtabl` WHERE ItemID =".$ids." and VST = 0 ";
		//echo $sql1;
		
		$result1 = mysql_query($sql1);
		$o=0;
		while ($dirnames1 = mysql_fetch_object($result1)) { if ($o==0) { $o++; ?>
<? } 

			if ($dirnames1->Url!="") { $tpath='<a href="'.$dirnames1->Url.'" id="nested-link">'.$dirnames1->ItemName.'</a> | '.$tpath;} else {
						$tpath='<a href="/pageinfo.php?id='.$dirnames1->ItemID.'&idt='.$idtabl.'" id="nested-link">'.$dirnames1->ItemName.'</a> | '.$tpath; }
							 
		getpathpage ($dirnames1->ItemParent,$idtabl); 
		?>
<? } 
		if ($o==1) { ?>
<? }  }
					
} 

	if(isset($_REQUEST[idt])) { 	$idt =mysql_real_escape_string(trim($_REQUEST[idt])); }  else { $idt ="SecCat";}
if(isset($_REQUEST[id])) { 	$pgid =mysql_real_escape_string((int)$_REQUEST[id]); }  else { $pgid =0;   }

	if (($_REQUEST[idt]=='InvestCat')&&( $pgid ==0)) {
	
	$sqltr="SELECT 	ItemID,	ItemParent,	ItemName, FullDescr, ShortDescr, Title, KeyWords, Description FROM `MiF` WHERE ItemID = '145'  and (VST = 0 or VST = 2); ";
	
	  } else { 				
	
	
	$sqltr="SELECT 	ItemID,	ItemParent,	ItemName, FullDescr, ShortDescr, Title, KeyWords, Description   FROM `$idt` WHERE ItemID = '".(int)$pgid."'  and (VST = 0 or VST = 2); ";
	
	//echo $sqltr;
	
	  }
	  
	  $resultrt = mysql_query($sqltr);
		$dirna = mysql_fetch_object($resultrt);
	$num_rowsdirna = mysql_num_rows($resultrt);
?>
<title>
<? if ($dirna->Title!="") {echo $dirna->Title; } else {echo $dirna->ItemName; }?>
</title>
<meta name="keywords" content="<? if ($dirna->KeyWords!="") {echo $dirna->KeyWords; } ?>">
<meta name="description" content="<? if ($dirna->Description!="") {echo $dirna->Description; } ?>">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />

<!--
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,700italic,400,300,700&subset=latin,cyrillic'     rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
	<script src="/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
	<link rel="stylesheet" href="/css/pervo/jquery-ui-1.7.2.custom.css" media="all" type="text/css">

	<link href="/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
//-->

<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/img/favicon.png" type="image/png">
<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Cabin' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="/fancybox/jquery.fancybox.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="/js/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/jquery.cycle.all.js"></script>

<!--script type="text/javascript"src="js/lib.js"></script-->
<script type="text/javascript" src="/fancybox/jquery.fancybox.js?v=2.0.6"></script>
<script src="/js/jquery.easing.1.3.js" type="text/javascript"></script>

<!--[if IE]><script src="js/excanvas.compiled.js" type="text/javascript"></script><![endif]-->
<!-- must have -->
<script src="/js/index1.js"></script>
<link rel="stylesheet" href="/css/pervo/jquery-ui-1.7.2.custom.css" media="all" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,700italic,400,300,700&subset=latin,cyrillic'     rel='stylesheet' type='text/css'>
<link href="/style.css" rel="stylesheet" type="text/css" />
<script src="/js/jquery.touchwipe.js"></script>
<script src="/js/jquery.tinyscrollbar.js"></script>
<script>
  $(document).ready(function(){
     $('#scrollbar1').tinyscrollbar();
  });
</script>






<? if($_REQUEST[id]==5) { ?>
<script src="http://api-maps.yandex.ru/2.0/?load=package.full&mode=debug&lang=ru-RU&coordorder=longlat" type="text/javascript"></script>
<script type="text/javascript">
            /* При успешной загрузке API выполняется
               соответствующая функция */
            ymaps.ready(function () {
				
			var myMap = new ymaps.Map("YMapsID", {
        // Центр карты
        center: [ 50.162797,53.21681],
        // Коэффициент масштабирования
        zoom: 15,
        // Тип карты
        type: "yandex#map"    });	
		
		
		  myMap.controls
                // Кнопка изменения масштаба
                .add('zoomControl')
                // Список типов карты
               // .add('typeSelector')
                // Кнопка изменения масштаба - компактный вариант
                // Расположим её справа
                //.add('smallZoomControl', { right: 5, top: 75 })
                // Стандартный набор кнопок
                .add('mapTools');

            // Также в метод add можно передать экземпляр класса, реализующего определенный элемент управления.
            // Например, линейка масштаба ('scaleLine')
            myMap.controls
                .add(new ymaps.control.ScaleLine());
                // В конструкторе элемента управления можно задавать расширенные
                // параметры, например, тип карты в обзорной карте
              //  .add(new ymaps.control.MiniMap({
              //      type: 'yandex#map'
               // }));

 var  cluster = new ymaps.Clusterer(),
                // Создаем коллекцию геообъектов
                collection = new ymaps.GeoObjectCollection();
				
      			var countOfMarkers = 100,
                    placemark,
                    geometry = [],
                    placemarks = [],
                    bounds = myMap.getBounds(), // определение области просмотра карты
                    span = [bounds[1][0] - bounds[0][0], bounds[1][1] - bounds[0][1]], // протяженность области просмотра в градусах
                    clusterOptions = {}, // опции кластера
                    useCluster = true, // флаг, показывающий, установлен ли режим кластеризации
                    sizeCluster = 70; // размер кластера, заданный пользователем
		
				 cluster.options.set({  gridSize: sizeCluster  });

       placemark = new ymaps.Placemark(       
        [50.162797,53.21681], {            
            iconContent: "",           
            balloonContent: ""
        }, {      preset: 'twirl#blueStretchyIcon'   }
    );

// Добавление метки на карту

   cluster.add(placemark);
                  // Добавляем кластер на карту.
                    myMap.geoObjects.add(cluster);

       }
);	
	
             
       
    </script>
<? } ?>
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

<body oncopy="return false">
	
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TRM52FG" 
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page">
	<? require ("header.php");?>
	<div class="nav-bar">
		<div class="container">
			<h2>
				<? if ($dirna->Title!="") {echo $dirna->Title; } else {echo $dirna->ItemName; }?>
			</h2>
			<?
		  if ($dirna->ItemParent==0 ) { 
		$sql="SELECT * FROM `SecCat` WHERE ItemParent = '".(int)$pgid."' and VST = 0  order by PPK"; } else { $sql="SELECT * FROM `SecCat` WHERE ItemParent = '".(int)$dirna->ItemParent."' and VST = 0  order by PPK"; }
			//echo $sql;
				$result = mysql_query($sql);
		$o=0;
		while ($dirnames1 = mysql_fetch_object($result)) { if ($o==0) { $o++; ?>
			<ul id="sec_nav">
				<? } ?>
				<li><a href="<?=$dirnames1->Url;?>" class="<? if ($dirnames1->ItemID==$pgid) { echo "itemhilited";  } ?>">
					<?=$dirnames1->ItemName;?>
					</a>
					<? 
		getlevelsproduct ($dirnames1->ItemID, $idt); 
		?>
				</li>
				<? } 
		if ($o==1) { ?>
			</ul>
			<? } ?>
		</div>
	</div>
	<div class="grey-block">
		<div class="container">
			<div class="columns">
				<h1>
					<?=$dirna->ItemName;?>
				</h1>
				<div style="padding:0 10px;">
					<?=$dirna->FullDescr;?>
				</div>
			</div>
		</div>
	</div>
</div>
<? require ("footer.php"); ?>
</body>
</html>