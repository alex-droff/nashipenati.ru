<? include('topfile.php');
$title = "Контакты"; 
require_once "topfile-head.php";
?>


<body>

<!-- Google Tag Manager -->
<? require_once "counters-gtm.php"; ?>
	<!-- End Google Tag Manager -->

<div id="wrap" class="boxed">
<? require_once "header.php"; ?>


<!-- PAGE TITLE -->
	<div class="container">
		<div class="sixteen columns">
			<div class="page-title-container clearfix">
				<h1 class="pagemane">CONTACT</h1>
			</div>	
		</div>
	</div>	
		

<!-- CONTENT -->
	<div class="clearfix">
		<div class="m-bot-10">
				<!-- Google Maps -->
					<section class="google-map-container">
					</section>
				<!-- Google Maps / End -->
		</div>
	</div>
	<!-- CONTACT FORM-->
<div class="container clearfix">
		<div class="twelve columns  m-bot-35">
			<div class="caption-container-main m-bot-30">
				<div class="caption-text-container"><span class="bold">SEND</span> US A MESSAGE</div>
				<div class="content-container-white caption-bg "></div>
			</div>
		
		
			<div class="contact-form-container">
				<form action="send.php" id="contact-form" method="post" class="clearfix">			
					<fieldset class="field-1-3 left">
						<label>Name</label>
						<input type="text" name="name" id="Myname" onblur="if(this.value=='')this.value='Your name...';" onfocus="if(this.value=='Your name...')this.value='';" value="Your name..." class="text requiredField m-bot-20" >
					</fieldset >
					<fieldset class="field-1-3 left">
						<label>Email</label>	
						<input type="text" name="email" id="myemail"   onblur="if(this.value=='')this.value='Your email...';" onfocus="if(this.value=='Your email...')this.value='';" value="Your email..."  class="text requiredField email m-bot-20" >
					</fieldset>
					<fieldset class="field-1-3 left">
						<label>Subject</label>	
						<input type="text" name="subject" id="mySubject"  onblur="if(this.value=='')this.value='Subject...';" onfocus="if(this.value=='Subject...')this.value='';" value="Subject..." class="text requiredField subject m-bot-20" >
					</fieldset>	
					<fieldset class="field-1-1 left">
						<label>Message</label>
						<textarea name="message" id="Mymessage" rows="5" cols="30" class="text requiredField" onblur="if(this.value=='')this.value='Your message...';" onfocus="if(this.value=='Your message...')this.value='';"   >Your message...</textarea>
					</fieldset>
					<fieldset class="right m-t-min-1">
						<input name="Mysubmitted" id="Mysubmitted" value="SEND" class="button medium" type="submit" >
					</fieldset>
				</form>
			</div>
		</div>
		

<!-- SIDEBAR -->
		<div class="four columns  m-bot-25">
			
			<div class="caption-container-main m-bot-30">
				<div class="caption-text-container"><span class="bold">CONTACT</span> INFO</div>
				<div class="content-container-white caption-bg "></div>
			</div>
			
			<div class="">
					<ul class="contact-list">
						<li class="contact-loc ">
							Corporation, Inc. 123 Aolsom Ave, Suite 700, New York
						</li>
						<li class="contact-phone ">
							(123) 456-7890<br>(123) 987-6540
						</li>
						<li class="contact-mail ">
							<a href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel">email@felius.com</a><br>
							<a href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel">email@optimas.com</a>
						</li>
					</ul>				
			</div>		
		</div>
		
</div>	

	
<!-- LATEST WORK -->
	<div class="container clearfix m-top-30">
		<div class="four columns carousel-intro m-bot-33">

						<div class="caption-container m-bot-20">
							<div class="title-block-text">
								THIS IS THE LIST OF<br>
								OUR RECENT<br>
								<strong>WORKS</strong>
							</div>
							
							<div class="carousel-navi jcarousel-scroll">
								<div class="jcarousel-prev"></div>
								<div class="jcarousel-next"></div>
							</div>
						</div>
			
		</div>

		
		<!-- jCAROUSEL -->
		<div class="jcarousel latest-work-jc m-bot-30" >
			<ul class="clearfix">
				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class="hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-1.jpg" alt="Ipsum" >
								<div class="mask"></div>	
								<div class="abs">
									<a href="images/content/port-2-1.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
				</li>

				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class=" hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-2.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-2.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">photography</div>
							</div>
						</div>
				</li>

				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class=" hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-3.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-3.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">illustration</div>
							</div>
						</div>
				</li>

				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class="hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-4.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-4.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
				</li>

				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class=" hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-5.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-5.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
				</li>

				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class=" hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-6.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-6.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
				</li>
				
				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class=" hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-7.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-7.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
				</li>

				<!-- LATEST WORK ITEM -->
				<li class="four columns">
						<div class=" hover-item">
							<div class="view view-first">
								<img src="images/content/port-2-8.jpg" alt="Ipsum" >
								<div class="mask"></div>
								<div class="abs">
									<a href="images/content/port-2-8.jpg" class="lightbox zoom info"></a><a href="portfolio-single.html" class="link info"></a>
								</div>	
							</div>
							<div class="lw-item-caption-container">
								<a class="a-invert" href="portfolio-single.html" >
									<div class="item-title-main-container clearfix">
										<div class="item-title-text-container">
											<span class="bold">Lorem</span> Ipsum
										</div>
									</div>
								</a>
								<div class="item-caption">web design</div>
							</div>
						</div>
				</li>
			</ul>
		</div>
		<!-- jCAROUSEL End -->
	</div>	
<!-- OUR PROJECTS End -->


<!-- NEWS LETTER -->
<div class="dark-grey-bg">
	<div class="container m-bot-20 clearfix">
		<div class="sixteen columns">
			<div class="newsletter-container clearfix">
				<div class="nl-img-container">
					<img src="images/icon-mail.png" alt="mail">
				</div>
				<div class="nl-text-container clearfix">
					<div class="caption">
						<span class="bold">NEWS</span> LETTER
					</div>
					<div class="nl-text">Stay up-to date with the latest news and other stuffs, Sign Up today!</div>
					<div class="nl-form-container">
						<form class="newsletterform" method="post" action="#">
							<input type="text" onblur="if(this.value=='')this.value='Your email here...';" onfocus="if(this.value=='Your email here...')this.value='';" value="Your email here..." name="email"><button class="nl-button">SIGN UP</button>
						</form>
					</div>	
				</div>
			</div>
		</div>
	</div>
</div>
	
<!-- OUR CLIENTS -->
	<div class="container clearfix">
		<div class="sixteen columns m-bot-20">
			<ul class="our-clients-container clearfix ">
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="images/logo1.png" alt="client" >
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="images/logo2.png" alt="client" >
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="images/logo3.png" alt="client">
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="images/logo4.png" alt="client" >
						</div>
					</a>
				</li>
				<li class="">
					<a href="">
						<div class="bw-wrapper">
							<img src="images/logo5.png" alt="client" >
						</div>
					</a>
				</li>
            </ul>
		</div>	
	</div>
<!-- FOOTER -->
	<footer>
		<div class="footer-content-bg">
			<div class="container clearfix">
				<div class="one-third-footer-spec column omega">

						<div class="logo-footer-container">	
							<a href="index.html" class="logo" rel="home" title="Home">
								<img src="images/logo-retina.png" alt="solana" >
							</a>
						</div>
				</div>
				<div class="two-thirds-footer-spec column alpha">


					<p class="footer-content-container m-none">WE PROVIDE AWESOME DIGITAL <strong>SERVICES</strong></p>

				</div>
			</div>
			<div class="container clearfix">
				<div class="one-third column">
					<div class="footer-social-text-container">
						<p class="title-font-24">SAY <strong>HELLO</strong></p>
						<p class="title-font-12">WE'D LOVE HEARING FROM YOU</p>
					</div>
					<div class="footer-social-links-container">	
						<ul class="social-links clearfix">
							<li><a class="facebook-link" target="_blank" title="Facebook" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="skype-link" target="_blank" title="Skype" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="twitter-link" target="_blank" title="Twitter" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="flickr-link" target="_blank" title="Flickr" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="vimeo-link" target="_blank" title="Vimeo" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="linkedin-link" target="_blank" title="linkedin" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="pintrest-link" target="_blank" title="pintrest" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
							<li><a class="googleplus-link" target="_blank" title="googleplus" href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel"></a></li>
						</ul>
					</div>
					
					
				</div>
				<div class="one-third column ">
					<h3 class="caption footer-block">LATEST <span class="bold">POST</span></h3>
					<ul class="latest-post">
						<li class="standart-post">
							<h4 class="title-post-footer"><a href="blog-single.html">Donec id elit</a></h4>
							<h4 class="date-post-footer">July 10, 2013</h4>
						</li>
						<li class="image-post">
							<h4 class="title-post-footer"><a href="blog-single.html">Donec id elit</a></h4>
							<h4 class="date-post-footer">July 10, 2013</h4>
						</li>
						<li class="video-post">
							<h4 class="title-post-footer"><a href="blog-single.html">Donec id elit</a></h4>
							<h4 class="date-post-footer">July 10, 2013</h4>
						</li>
					</ul>
				</div>
				<div class="one-third column ">
					<h3 class="caption footer-block">CONTACT <span class="bold">INFO</span></h3>
					<ul class="footer-contact-info">
						<li class="footer-loc">
							Corporation, 123 Some Ave, Suite 700,  New York
						</li>
						<li class="footer-phone">
							(123) 456-7890<br>(123) 987-6540
						</li>
						<li class="footer-mail">
							<a href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel">email@felius.com</a><br>
							<a href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel">email@optimas.com</a>
						</li>
					</ul>
					 
				</div>
			</div>
		</div>
		<div class="footer-copyright-bg">
			<div class="container ">
				<div class="sixteen columns clearfix">
					<div class="footer-menu-container">
						<nav class="clearfix" id="footer-nav">
							<ul class="footer-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="elements.html">Features</a></li>
								<li><a href="portfolio.html">Portfolio</a></li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="#/item/solana-responsive-html5-template/5590059?ref=abcgomel">Purchase</a></li>
							</ul>
						</nav>
					</div>	
					<div class="footer-copyright-container right-text">
					&copy; Solan<span class="yellow">a</span> - Build with Passion by <a class="author" href="#/user/abcgomel/portfolio">AbcGomel</a>
					</div>
				</div>
				
			</div>
		</div>
	</footer>	
		<p id="back-top">
			<a href="#top" title="Back to Top"><span></span></a>
		</p>
</div><!-- End wrap -->
<!-- JS begin -->

		<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
		<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
		<script type="text/javascript" src="js/superfish.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>

		<script type="text/javascript" src="js/jquery.jcarousel.js"></script>
		<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>
		<script type="text/javascript" src="js/jQuery.BlackAndWhite.min.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/jflickrfeed.min.js"></script>
		<script type="text/javascript" src="js/jquery.quicksand.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="js/jquery-cookie.js"></script>  
		<script src="js/styleswitcher.js"></script>
		<div class="switcher"></div>
		

<!-- JS end -->
		
	</body>
</html>		
