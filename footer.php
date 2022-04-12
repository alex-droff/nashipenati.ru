<div class="footer">
	<div class="container">
		<?	$sql="SELECT *  FROM `page` WHERE `id_parentmenu` =0  AND pub=1 AND is_footer=1  ORDER BY `order_menu`";
		//echo $sql;
		$result =  $mysqli->query($sql);
			
			?>
		<?
			while ($dirnames = $result->fetch_object()) { ?>
		<?	$sql2="SELECT * FROM `page` WHERE `id_parentmenu`={$dirnames->id}  AND pub=1  AND is_footer=1  ORDER BY `order_menu`";
		//echo $sql2;
		$result2 = $mysqli->query($sql2);	
		$num_rows = $result2->num_rows;
		?>

		<div class="footer-grid">
			<h3><a
					href="<? if (strlen($dirnames->page_url)>=1) {?><?=$dirnames->page_url;?><? } else { ?>page.php?idp=<?=$dirnames->id;?> <? }?>"><?=$dirnames->page_name;?></a>
			</h3>

			<?
		if ($num_rows>=1) {	?>
			<ul class="list1">
				<?
			while ($dir3= $result2->fetch_object()) { ?>

				<li><a href="<? if (strlen($dir3->page_url)>=1) {?><?=$dir3->page_url;?><? } else { ?>page.php?idp=<?=$dir3->id;?> <? }?>"
						class="menu-link"><?=$dir3->page_name;?></a></li>
				<? } ?>
			</ul>
			<? } ?>
		</div>
		<? } ?>

		<div class="footer-grid last_grid">
			<h3><a href="/contact/">Контактная информация</a></h3>
			<ul class="footer-contact-info">
				<li class="footer-loc">
					Москва, ЮЗАО,<br>
					ул.&nbsp;Профсоюзная,&nbsp;д.&nbsp;92, <br>
					<a href="http://maps.yandex.ru/?text=%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F%2C%20%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%20%D0%9F%D1%80%D0%BE%D1%84%D1%81%D0%BE%D1%8E%D0%B7%D0%BD%D0%B0%D1%8F%20%D1%83%D0%BB%D0%B8%D1%86%D0%B0%2C%2092&sll=37.528433%2C55.649108&ll=37.528433%2C55.649108&spn=0.035770%2C0.013481&z=16&l=map"
						target="_blank">на карте</a>
				</li>
				<li class="footer-phone">
					8 (495) 150-51-92<br>
				</li>
				<li class="footer-mail">
					<a href="mailto:nashipenati@gmail.com">nashipenati@gmail.com</a><br>
				</li>
			</ul>

		</div>
	</div>
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
							<!--<li><a  target="_blank" title="Twitter" href="https://twitter.com/SchoolPenates/"><i class="fa fa-twitter-square fa-2x"></i></a></li>-->
							<!--<li><a target="_blank" title="Facebook"
									href="https://www.facebook.com/nashipenati?fref=ts"><i
										class="fa fa-facebook-square fa-2x"></i></a></li>
							<li><a target="_blank" title="Instagram"
									href="https://www.instagram.com/citrus_montessori/?igshid=jdfzx6i9i5na"><i
										class="fa fa-instagram fa-2x"></i></a></li>-->
							<li><a target="_blank" title="VKontakte" href="https://vk.com/nashipenati"><i
										class="fa fa-vk fa-2x"></i></a></li>

						</ul>
					</nav>
				</div>
				<div class="footer-copyright-container right-text">
					&copy; 2022 ЧОУ ОО "МШСО" - все права защищены. При использовании материалов ссылка на сайт
					обязательна.
				</div>
			</div>

		</div>
	</div>
</footer>
<p id="back-top">
	<a href="#top" title="Вверх"><span></span></a>
</p>