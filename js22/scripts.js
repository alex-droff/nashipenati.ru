(function(){
	jQuery(document).ready(function(){
		
		
		// Fullscreen Slider
		$('#slider-home').superslides({
			animation: 'fade',
			play: 8000
		});
		
		
		
		
		// Nice Scroll Plugin
		jQuery("html").niceScroll({
			scrollspeed: 60,
			mousescrollstep: 40,
			cursorwidth: 7,
			cursorborder: "1px solid rgba(0,0,0,0)",
			cursorcolor: '#000000',
			cursorborderradius: 10,
			horizrailenabled: false,
			zindex: 94000
		});
		
		
		
		
		// SliderCaptions
		function elePos(){
			$('.slider-captions').each(function(){
				var windowHeight = ($(window).height()/2),
					windowWidth = ($(window).width()/2),
					captionHeight = ($('.slider-captions').height()/2),
					captionWidth = ($('.slider-captions').width()/2),
					nextSectionLink = ($('.next-section').width());
				
				$('#slider-home').css({'height': (windowHeight * 2 ) + 'px' });
				$('#slider-home li').css({'width': $(window).width() + 'px' });
				$('.slider-captions').css({'top': (windowHeight - captionHeight ) - 20 + 'px' });
				$('.slider-captions').css({'left': (windowWidth - captionWidth ) + 'px' });
				$('.next-section').css({'left': (windowWidth - (nextSectionLink / 2) ) + 'px' });
			});
		};
		elePos()
		jQuery(window).resize(elePos);
		
		
		
		
		// Next Section Link
		$('.next-section').on('click',function (e) {
			e.preventDefault();
			var target = this.hash,
	    	$target = $(target);
			$('html, body').stop().animate({ 'scrollTop': $target.offset().top}, 900, 'easeOutCubic', function () {window.location.hash = target;});
		});
		
		
		
		
		// Show Header Link
		jQuery('#show-header').click(function(){
			if(jQuery(this).hasClass('show-header')) {
				jQuery('#header').css({'left': 0});
				jQuery('#show-header').removeClass('show-header');
				jQuery('#show-header').addClass('hide-header');
			}else if(jQuery(this).hasClass('hide-header')) {
				jQuery('#header').css({'left': '-250px'});
				jQuery('#show-header').removeClass('hide-header');
				jQuery('#show-header').addClass('show-header');
			}
		});
		
		
		
		
		// Nav Menu (current class)
		var $menuItems = $(".main-menu li a"),
			lastId,
			fromTop,
			cur,
			scrollItems = $menuItems.map(function() {
				var item = $($(this).attr("href"));
				if (item.length) return item; 
			});
			
		// click nav
		$menuItems.on('click', function(e) {
			var href  = $(this).attr("href"),
			offsetTop = $(href).offset().top  + 1 + 'px';
			$('html, body').stop().animate({scrollTop: offsetTop}, 800, 'easeOutCubic');
			e.preventDefault();
		});
		
		// add current class to menu
        $(window).scroll(function(){
			fromTop = $(this).scrollTop(),
			cur = scrollItems.map( function() {
				if ($(this).offset().top < fromTop) return this;
			});
			cur = cur[cur.length-1];
			var id = cur && cur.length ? cur[0].id : "";
			if (lastId !== id) {
				lastId = id;
				$menuItems.parent().removeClass("current").end().filter("[href=#"+id+"]").parent().addClass("current");
			} 
		});
		
		
		
		
		// prettyPhoto LightBox
		jQuery("a.lightbox").prettyPhoto({
			theme: 'dark_rounded',
			allow_resize: true,
			default_width: 690,
			default_height: 388,
			social_tools: '',
			markup: '<div class="pp_pic_holder"> \
						<div class="ppt"></div> \
							<div class="pp_details"> \
								<div class="pp_nav"> \
									<a href="#" class="pp_arrow_previous">Previous</a> \
									<p class="currentTextHolder">0/0</p> \
									<a href="#" class="pp_arrow_next">Next</a> \
								</div> \
							</div> \
							<div class="pp_content_container"> \
								<div class="pp_content"> \
									<div class="pp_fade"> \
										<div class="pp_hoverContainer"> \
											<a class="pp_next" href="#">next</a> \
											<a class="pp_previous" href="#">previous</a> \
										</div> \
										<a class="pp_close" href="#"><i class="fa fa-compress"></i></a> \
										<div id="pp_full_res"></div> \
									</div> \
								</div> \
							</div> \
						</div> \
						<div class="pp_loaderIcon"></div> \
						<div class="pp_overlay"></div>'
		});
		
		
		
		
		// Appear Animations
		$('*').each(function(){
			if(jQuery(this).attr('data-animation')) {
				var $animationName = jQuery(this).attr('data-animation');
				jQuery(this).appear(function() {
					jQuery(this).addClass('animated').addClass($animationName);
				});
			}
		});
		
		
		
		
		// Milestone Counter
		jQuery('.milestone').each(function() {
			jQuery(this).appear(function() {
				var $endNum = parseInt(jQuery(this).find('.milestone-number').text());
				jQuery(this).find('.milestone-number').countTo({
					from: 0,
					to: $endNum,
					speed: 4000,
					refreshInterval: 40,
				});
			},{accX: 0, accY: 0});
		});
		
		
		
		
		// Pie Charts
		var pieChartClass = 'pieChart',
        	pieChartLoadedClass = 'pie-chart-loaded';
		
		function initPieCharts() {
			var chart = $('.' + pieChartClass);
			chart.each(function() {
				$(this).appear(function() {
					var $this = $(this),
						chartBarColor = ($this.data('bar-color')) ? $this.data('bar-color') : "#F54F36",
						chartBarWidth = ($this.data('bar-width')) ? ($this.data('bar-width')) : 150
					if( !$this.hasClass(pieChartLoadedClass) ) {
						$this.easyPieChart({
							animate: 2000,
							size: chartBarWidth,
							lineWidth: 2,
							scaleColor: false,
							trackColor: "#eeeeee",
							barColor: chartBarColor,
						}).addClass(pieChartLoadedClass);
					}
				});
			});
		}
		initPieCharts();
		
		
		
		
		// Testimonials Carousel
		jQuery(".testimonials-slider").owlCarousel({
			stopOnHover: true,
			paginationSpeed : 400,
			singleItem:true,
			autoPlay: 3500,
			navigation : false,
			pagination : false,
			autoHeight : true,
			transitionStyle : "fadeUp"
		});
		
		
		
		
		// Team Members Carousel
		jQuery(".team-slider").owlCarousel({
			lazyLoad : true,
			slideSpeed : 300,
			stopOnHover: true,
			paginationSpeed : 400,
			autoPlay: 3500,
			navigation : false,
			pagination : false,
			autoHeight : true,
			items : 2, //10 items above 1000px browser width
			itemsDesktop : [1000,1], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,1], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false,
		});
		
		
		
		
		// Clients Carousel
		jQuery(".clients-carousel").owlCarousel({
			lazyLoad : true,
			stopOnHover: true,
			responsiveRefreshRate : 200,
			pagination : false,
			navigation : false,
			autoPlay: 3000,
			items : 4, //10 items above 1000px browser width
			itemsDesktop : [1000,3], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,2], // betweem 900px and 601px
			itemsTablet: [600,1], //2 items between 600 and 0
			itemsMobile : false,
			autoHeight : true
		});
		
		
		
		
		// Show Map Section
		$("#show-map").click(function(){
			$('.map-overlay').css({'visibility': 'hidden', 'opacity': 0 });
			$('.contact > .row').css({'visibility': 'hidden', 'opacity': 0 });
			$('#close-map').css({'visibility': 'visible', 'opacity': 1 });
		});
		$("#close-map").click(function(){
			$('.map-overlay').css({'visibility': 'visible', 'opacity': 1 });
			$('.contact > .row').css({'visibility': 'visible', 'opacity': 1 });
			$('#close-map').css({'visibility': 'hidden', 'opacity': 0 });
		});
		
		
		
		
		//Parallax Background	
		$(window).bind('load', function () {
			$('#services').parallax("30%", 0.1);
			$('#testimonials').parallax("30%", 0.1);
			$('#our-team').parallax("30%", 0.1);
		});
		
		
		
		
		// Fit Iframes
		$("body").fitVids();
		
		
		
		
		// Portfolio Isotope
		$(window).load(function(){
			var $container = $('#portfolio-grid');
			portfolioLayout = 'fitRows';
			$container.isotope({
				filter: '*',
				animationOptions: {
					duration: 750,
					easing: 'linear',
					queue: false
				},
				masonry: {}
			});
			
			$('.portfolio-filter a').click(function(){
				$('.portfolio-filter .current').removeClass('current');
				$(this).addClass('current');
				
				var selector = $(this).attr('data-filter');
				$container.isotope({
					filter: selector,
					animationOptions: {
						duration: 750,
						easing: 'linear',
						queue: false
					},
					masonry: {}
				});
				return false;
			});
			
			// Responsive Portfolio
			function getColumnNumber() {
				var winWidth = $('#portfolio-grid').width(),
				columnNumber = 1;
				if (winWidth > 1200) {
					columnNumber = 5;
				} else if (winWidth > 950) {
					columnNumber = 4;
        		} else if (winWidth > 600) {
            		columnNumber = 4;
        		} else if (winWidth > 400) {
            		columnNumber = 4;
        		} else if (winWidth > 250) {
            		columnNumber = 1;
        		}
				return columnNumber;
			}
			
			function setColumns() {
				var winWidth = $('#portfolio-grid').width(), 
            		columnNumber = getColumnNumber(), 
            		itemWidth = Math.floor(winWidth / columnNumber);
         
        		$container.find('.portfolio-item').each(function() { 
            		$(this).css( { 
                		width : itemWidth + 'px' 
            		});
        		});
    		}
			
			function setPortfolio() {
				setColumns();
    		    $container.isotope('reLayout');
			}
			
			$container.imagesLoaded(function () {
				setPortfolio();
			});
			
			$(window).on('resize', function () {
				setPortfolio();          
    		});
		});
		
		
		
		
		// Project Page Scripts (Images Slider & Fit Iframes)
		function projectScripts(){
			jQuery(".images-slider").owlCarousel({
				lazyLoad : true,
				stopOnHover: true,
				navigation : true,
				pagination : false,
				autoPlay: 3000,
				singleItem:true,
				autoHeight : true,
				lazyLoad: true,
				transitionStyle : "fadeUp"
			});
			
			$('.images-slider').each(function(){
				var sliderHeight = ($('.images-slider .item').height()/2),
				sliderNav = ($('.owl-buttons > div').height())
				$('.owl-buttons > div').css({'top': sliderHeight - sliderNav - (sliderNav/2) + 'px' });
				$( ".owl-prev" ).html( "<i class='fa fa-angle-left'></i>" );
				$( ".owl-next" ).html( "<i class='fa fa-angle-right'></i>" );
			});
			
			// Fit Iframes
			$("body").fitVids();
		};
		projectScripts();
		
		
		
		
		// Project Page Expander
		$(window).load(function() {
			(function(){
				var container = $( "#project-box" ),
					$items = $('#portfolio-grid .open-project-link'),
					$headerHeight = $('#header').height();
					
				index = $items.length;
				$('#portfolio-grid .open-project-link').click(function(){
					if ($(this).hasClass('active')){} else {
						lastIndex = index;
						index = $(this).index();
						$items.removeClass('active');
						$(this).addClass('active');
						
						var myUrl = $(this).find('.open-project').attr("href") + " .project-page";
						
						$('#project-box').animate({opacity:0}, 400,function(){
							$("#project-box").load(myUrl,function(e){  
								var $helper = $('.helper'),
									height = $helper.height();
								$('#project-box').css("min-height", height);
							});
							$('#project-box').delay(200).animate({opacity:1}, 800);
						});
						$('html, body').animate({ scrollTop: $(".project-beg-pos").offset().top}, 800);
						
						//Project Page Open
						$('#project-box').slideUp(600, function(){
							$('#project-box').css('visibility', 'visible');}).delay(400).slideDown(1200,function(){
								projectScripts();
							});
						}
						return false;
					});
					
					//Project Page Close
					$(document).on('click', '#project_close', function(event) {
						$('#project-box').animate({opacity:0}, 800,function(){
							$('#project-box').delay(400).slideUp(400);
						});
						$('html, body').delay(1000).animate({ scrollTop: $(".project-end-pos").offset().top - 15}, 800);
						$items.removeClass('active');
						return false;
					});
			})();
		});
		
		
		
		
		// Page Loader
		$(window).load(function(){
			$('#loader').fadeOut();
		});
		
		
	});
})();







