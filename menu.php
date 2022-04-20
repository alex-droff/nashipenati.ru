<nav id="main-navigation">
	<ul class="top_nav">
		<? $sql = "SELECT *  FROM `page` WHERE `id_parentmenu` =0  AND pub=1 AND show_top=1  ORDER BY `order_menu`";
		//echo $sql;
		$result =  $mysqli->query($sql);
		while ($dirnames = $result->fetch_object()) { ?>
			<? $sql2 = "SELECT * FROM `page` WHERE `id_parentmenu`={$dirnames->id}  AND pub=1 AND show_top=1  ORDER BY `order_menu`";
			//echo $sql2;
			$result2 = $mysqli->query($sql2);
			$num_rows = $result2->num_rows;
			?>
			<li>
				<a href="<? if (strlen($dirnames->page_url) >= 1) { ?><?= $dirnames->page_url; ?><? } else { ?>/page.php?idp=<?= $dirnames->id;?><? } ?>"<? if($dirnames->id == $idp) echo ' class="idp-'.$idp.'"';?>><?= $dirnames->page_name; ?></a>
				<? if ($num_rows >= 1) {?>
					<div class="show_ul"></div>
					<ul class="submenu">
						<? while ($dir3 = $result2->fetch_object()) { 
							if ($dir3->is_login == 0) { ?>
								<li>
									<a href="<? if (strlen($dir3->page_url) >= 1) { ?><?= $dir3->page_url; ?><? } else { ?>/page.php?idp=<?= $dir3->id; ?><? } ?>" class="menu-link"><?= $dir3->page_name; ?></a>
								</li> 
							<? } elseif (isset($_SESSION['id'])) { ?>
								<li>
									<a href="<? if (strlen($dir3->page_url) >= 1) { ?><?= $dir3->page_url; ?><? } else { ?>/page.php?idp=<?= $dir3->id; ?> <? } ?>" class="menu-link"><?= $dir3->page_name; ?></a>
								</li>
							<? } 
						} ?>
					</ul>
				<? } ?> 
			</li>
		<? } ?>
		<li class="nd"><a class="head_request" href="/formrequest.php" class="iframe"></a></li>
	</ul>
</nav>