<?php defined('IN_IA') or exit('Access Denied');?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="key" content="<?php  echo $config['key'];?>">
        <meta name="description" content="<?php  echo $config['description'];?>">
        
        <meta name="author" content="Muhammad Morshed">
		
        <title>Meghna</title>
		
		<!-- Mobile Specific Meta
		================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="<?php  echo $_W['attachurl'];?><?php  echo $config['favicon'];?>" />
		
		<!-- CSS
		================================================== -->
		<!-- Fontawesome Icon font -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/font-awesome.min.css">
		<!-- bootstrap.min css -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/bootstrap.min.css">
		<!-- Animate.css -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/animate.css">
		<!-- Owl Carousel -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/owl.carousel.css">
		<!-- Grid Component css -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/component.css">
		<!-- Slit Slider css -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/slit-slider.css">
		<!-- Main Stylesheet -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/main.css">
		<!-- Media Queries -->
        <link rel="stylesheet" href="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/css/media-queries.css">
		
		<!-- Modernizer Script for old Browsers -->		
        <script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/modernizr-2.6.2.min.js"></script>


		
	
    </head>
	
    <body id="body" <?php  echo $_W['uniacid'];?>>
	    <!--
	    Start Preloader
	    ==================================== -->
		<div id="loading-mask">
			<div class="loading-img">
				<img alt="Meghna Preloader" src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/img/preloader.gif"  />
			</div>
		</div>
        <!--
        End Preloader
        ==================================== -->
		
        <!--
        Welcome Slider
        ==================================== -->
		<section id="home">	    
		
            <div id="slitSlider" class="sl-slider-wrapper">
				<div class="sl-slider">
					
					<!-- single slide item -->
					<?php  if(is_array($banner)) { foreach($banner as $l) { ?>
					<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner">
							<div class="bg-img" style="background-image:url(<?php  echo $_W['attachurl'];?><?php  echo $l['img'];?>)"></div>
						<div class="carousel-caption">
							<div>
								<h2 data-wow-duration="500ms"  data-wow-delay="500ms" class="heading animated fadeInRight"><?php  echo $l['title1'];?></h2>
								<h3 class="animated fadeInUp"><?php  echo $l['title2'];?></h3>
							</div>
						</div>
						</div>
					</div>
					<?php  } } ?>
					<!-- /single slide item -->
					

				</div><!-- /sl-slider -->
				
				<nav id="nav-arrows" class="nav-arrows">
					<span class="nav-arrow-prev">Previous</span>
					<span class="nav-arrow-next">Next</span>
				</nav>

				<nav id="nav-dots" class="nav-dots">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
				</nav>

			</div><!-- /slider-wrapper -->
		</section>
		<!--/#home section-->
		
        <!-- 
        Fixed Navigation
        ==================================== -->
        <header id="navigation" class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
					<!-- /responsive nav button -->
					
					<!-- logo -->
                    <a class="navbar-brand" href="#body">
						<h1 id="logo">
							<img src="<?php  echo $_W['attachurl'];?><?php  echo $config['logo'];?>" width="180" alt="Meghna" />
						</h1>
					</a>
					<!-- /logo -->
                </div>

				<!-- main nav -->
                <nav class="collapse navbar-collapse navbar-right" role="Navigation">
                    <ul id="nav" class="nav navbar-nav">
                        <li class="current"><a href="#home">首页</a></li>
                        <?php  if($nav['is_show1']) { ?><li class="current"><a href="#about"><?php  echo $nav['title1'];?></a></li><?php  } ?>
                        <?php  if($nav['is_show2']) { ?><li><a href="#services"><?php  echo $nav['title2'];?></a></li><?php  } ?>
                        <?php  if($nav['is_show3']) { ?><li><a href="#showcase"><?php  echo $nav['title3'];?></a></li><?php  } ?>
                        <?php  if($nav['is_show4']) { ?><li><a href="#our-team"><?php  echo $nav['title4'];?></a></li><?php  } ?>
                        <?php  if($nav['is_show5']) { ?><li><a href="#pricing"><?php  echo $nav['title5'];?></a></li><?php  } ?>
                        <?php  if($nav['is_show6']) { ?><li><a href="#contact-us"><?php  echo $nav['title6'];?></a></li><?php  } ?>
                        <li><a href="<?php echo $config['login_url']?$config['login_url']:'/web/index.php?c=user&a=login'?>">登录</a></li>
                        <li><a href="<?php echo $config['register_url']?$config['register_url']:'/web/index.php?c=user&a=register'?>">注册</a></li>
                    </ul>
                </nav>
				<!-- /main nav -->
				
            </div>
        </header>
        <!--
        End Fixed Navigation
        ==================================== -->
		<?php  if($nav['is_show1']) { ?>
		<!--
		Start About Section
		==================================== -->
		<section id="about" class="bg-one">
			<div class="container">
				<div class="row">
				
					<!-- section title -->
					<div class="title text-center wow fadeIn" data-wow-duration="1500ms" >
						<h2><span class="color"><?php  echo $nav['title1'];?></span></h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
					
					<!-- About item -->					
					<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" >
						<div class="wrap-about">							
							<div class="icon-box">
								<i class="fa <?php  echo $page1['icon1'];?> fa-4x"></i>
							</div>					
							<!-- Express About Yourself -->
							<div class="about-content text-center">
								<h3 class="ddd"><?php  echo $page1['title1'];?></h3>								
								<p><?php  echo $page1['content1'];?></p>
							</div>
						</div>
					</div> 
					<!-- End About item -->
					
					<!-- About item -->
					<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" >
						<div class="wrap-about">							
							<div class="icon-box">
								<i class="fa <?php  echo $page1['icon2'];?> fa-4x"></i>
							</div>					
							<!-- Express About Yourself -->
							<div class="about-content text-center">
								<h3 class="ddd"><?php  echo $page1['title2'];?></h3>								
								<p><?php  echo $page1['content2'];?></p>
							</div>
						</div>
					</div> 
					<!-- End About item -->
					
					<!-- About item -->
					<div class="col-md-4 text-center wow fadeInUp" data-wow-duration="500ms" >
						<div class="wrap-about">							
							<div class="icon-box">
								<i class="fa <?php  echo $page1['icon3'];?> fa-4x"></i>
							</div>					
							<!-- Express About Yourself -->
							<div class="about-content text-center">
								<h3 class="ddd"><?php  echo $page1['title3'];?></h3>								
								<p><?php  echo $page1['content3'];?></p>
							</div>
						</div>
					</div> 
					<!-- End About item -->
					
				</div> 		<!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->
	
		<!--
		Start Counter Section
		==================================== -->
		
		<section id="counter" class="parallax-section">
			<div class="container">
				<div class="row">
				
					<!-- first count item -->
					<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">
						<div class="counters-item">
							<div>
							    <span data-speed="3000" data-to="<?php  echo $page1['num1'];?>"><?php  echo $page1['num1'];?></span>
							</div>
							<i class="fa f<?php  echo $page1['num_icon1'];?> fa-3x"></i>
							<h3><?php  echo $page1['num_text1'];?></h3>
						</div>
					</div>
					<!-- end first count item -->
				
					<!-- second count item -->
					<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">
						<div class="counters-item">
							<div>
							    <span data-speed="3000" data-to="<?php  echo $page1['num2'];?>"><?php  echo $page1['num2'];?></span>
							</div>
							<i class="fa f<?php  echo $page1['num_icon2'];?> fa-3x"></i>
							<h3><?php  echo $page1['num_text2'];?></h3>
						</div>
					</div>
					<!-- end second count item -->
				
					<!-- third count item -->
					<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">
						<div class="counters-item">
							<div>
							    <span data-speed="3000" data-to="<?php  echo $page1['num3'];?>"><?php  echo $page1['num3'];?></span>
							</div>
							<i class="fa f<?php  echo $page1['num_icon3'];?> fa-3x"></i>
							<h3><?php  echo $page1['num_text3'];?></h3>
						</div>
					</div>
					<!-- end third count item -->
					
					<!-- fourth count item -->
					<div class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInDown" data-wow-duration="500ms">
						<div class="counters-item">
							<div>
							    <span data-speed="3000" data-to="<?php  echo $page1['num4'];?>"><?php  echo $page1['num4'];?></span>
							</div>
							<i class="fa f<?php  echo $page1['num_icon4'];?> fa-3x"></i>
							<h3><?php  echo $page1['num_text4'];?></h3>
						</div>
					</div>
					<!-- end fourth count item -->
					
				</div> 		<!-- end row -->
			</div>   	<!-- end container -->
		</section>   <!-- end section -->
		<?php  } ?>
		<?php  if($nav['is_show2']) { ?>
		<!-- Start Services Section
		==================================== -->
		
		<section id="services" class="bg-one">
			<div class="container">
				<div class="row">
					
					<!-- section title -->
					<div class="title text-center wow fadeIn" data-wow-duration="500ms">
						<h2><span class="color"><?php  echo $nav['title2'];?></span></h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
					
                    <!-- Single Service Item -->
                    <?php  if(is_array($page2)) { foreach($page2 as $l) { ?>
					<article class="col-md-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="500ms">
						<div class="service-block text-center">
							<div class="service-icon text-center">
								<i class="fa <?php  echo $l['icon'];?> fa-5x"></i>
							</div>
							<h3><?php  echo $l['title'];?></h3>
							<p><?php  echo $l['content'];?></p>
						</div>
					</article>
					<?php  } } ?>
                    <!-- End Single Service Item -->
                    
						
				</div> 		<!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->
		<?php  } ?>
		
		<!-- Start Portfolio Section
		=========================================== -->

		<?php  if($nav['is_show3']) { ?>
		<section id="showcase">
			<div class="container">
				<div class="row wow fadeInDown" data-wow-duration="500ms">
					<div class="col-lg-12">
					
						<!-- section title -->
						<div class="title text-center">
							<h2><span class="color"><?php  echo $nav['title3'];?></span></h2>
							<div class="border"></div>
						</div>
						<!-- /section title -->
					
						<!-- portfolio item filtering -->
						<!-- <div class="portfolio-filter clearfix">
							<ul class="text-center">
							    <li><a href="javascript:void(0)" class="filter" data-filter="all">All</a></li>
								<li><a href="javascript:void(0)" class="filter" data-filter=".app">Mobile App</a></li>
								<li><a href="javascript:void(0)" class="filter" data-filter=".web">Web Design</a></li>
								<li><a href="javascript:void(0)" class="filter" data-filter=".photoshop">Photoshop</a></li>
								<li><a href="javascript:void(0)" class="filter" data-filter=".illustrator">Illustrator</a></li>
							</ul>
						</div> -->
						<!--  item filtering -->
						
					</div> <!-- /end col-lg-12 -->
				</div> <!-- end row -->
			</div>	<!-- end container -->
	
			<!-- portfolio items -->
			<div class="portfolio-item-wrapper wow fadeInUp" id="team-skills" data-wow-duration="500ms">
                <ul id="og-grid" class="og-grid">
				
					<!-- single portfolio item -->
					<?php  if(is_array($page3)) { foreach($page3 as $l) { ?>
					<li class="mix app">
						<a href="<?php  echo $l['url'];?>" data-largesrc="<?php  echo $_W['siteroot'];?><?php  echo $l['img'];?>" data-title="<?php  echo $l['title'];?>" data-description="<?php  echo $l['content'];?>">
							<img src="<?php  echo $_W['attachurl'];?><?php  echo $l['img'];?>" alt="Meghna">
							<div class="hover-mask">
								<h3><?php  echo $l['title'];?></h3>
								<span>
									<i class="fa <?php  echo $l['icon'];?> fa-2x"></i>
								</span>
							</div>
						</a>
					</li>
					<?php  } } ?>
					<!-- /single portfolio item -->
					
					
				</ul> <!-- end og grid -->
			</div>  <!-- portfolio items wrapper -->
			
		</section>   <!-- End section -->
		<?php  } ?>
		<?php  if($nav['is_show4']) { ?>
		<section id="our-team">
			<div class="container">
				<div class="row">
				
					<!-- section title -->
					<div class="title text-center wow fadeInUp" data-wow-duration="500ms">
						<h2><span class="color"><?php  echo $nav['title4'];?></span></h2>
						<div class="border"></div>
					</div>
					<!-- /section title -->
					
					<!-- team member -->
					<?php  if(is_array($page4)) { foreach($page4 as $l) { ?>
					<div class="col-md-3 col-sm-6 wow fadeInDown" data-wow-duration="500ms">
                       <article class="team-mate">
							<div class="member-photo">
								<!-- member photo -->
								<img class="img-responsive" src="<?php  echo $_W['attachurl'];?><?php  echo $l['img'];?>" alt="Meghna">
								<!-- /member photo -->

							</div>
							
							<!-- member name & designation -->
							<div class="member-title">
								<h3><?php  echo $l['title'];?></h3>
							</div>
							<!-- /member name & designation -->
							
							<!-- about member -->
                           <div class="member-info">
                               <p><?php  echo $l['content'];?></p>
                           </div>
						   <!-- /about member -->
						   
                       </article>
                    </div>
                    <?php  } } ?>
					<!-- end team member -->
					
					
				</div>  	<!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->
		<?php  } ?>
		<?php  if($nav['is_show5']) { ?>
		
		<!-- Start Twitter Feed
		=========================================== -->
		
		<section id="twitter-feed" class="parallax-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
					
						<!-- twitter bird -->
						<div class="twitter-bird wow fadeInDown" data-wow-duration="500ms">
							<span>
								<i class="fa fa-twitter fa-4x"></i>
							</span>
						</div>
						<!-- /twitter bird -->
						
						<!-- fetching tweet -->
						<div class="tweet wow fadeIn" data-wow-duration="2000ms"></div>
						<!-- /fetching tweet -->
					
						
					</div>
				</div>       <!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->
		
		<!-- Start Pricing section
		=========================================== -->
		
		<section id="pricing" class="bg-one">
			<div class="container">
				<div class="row">
					
					<!-- section title -->
				    <div class="title text-center wow fadeInDown" data-wow-duration="500ms">
			        	<h2><span class="color"><?php  echo $nav['title5'];?></span></h2>
				        <div class="border"></div>
				    </div>
				    <!-- /section title -->
					
					<!-- single pricing table -->
					<?php  if(is_array($page5)) { foreach($page5 as $l) { ?>
					<article class="col-md-3 col-sm-6 col-xs-12 text-center wow fadeInUp" data-wow-duration="200ms">
						<div class="pricing">
							
							<!-- plan name & value -->
							<div class="price-title">
								<h3><?php  echo $l['title'];?></h3>
								<p><strong class="value">$<?php  echo $l['money'];?></strong></p>
							</div>
							<!-- /plan name & value -->
							
							<!-- plan description -->
							<ul>
								<li><?php  echo $l['text1'];?></li>
								<li><?php  echo $l['text2'];?></li>
								<li><?php  echo $l['text3'];?></li>
								<li><?php  echo $l['text4'];?></li>
								<li><?php  echo $l['text5'];?></li>
								<li><?php  echo $l['text6'];?></li>
							</ul>
							<!-- /plan description -->
							
							<!-- signup button -->
							<a class="btn btn-transparent" href="<?php  echo $l['url'];?>">Signup</a>
							<!-- /signup button -->
							
						</div>
					</article>
					<?php  } } ?>
					<!-- end single pricing table -->
					
				</div>       <!-- End row -->
			</div>   	<!-- End container -->
		</section>   <!-- End section -->
		<?php  } ?>
				
		
		<!-- Srart Contact Us
		=========================================== -->		
		<section id="contact-us">
			<div class="container">
				<div class="row">
					
					<!-- Contact Details -->
					<div class="contact-info col-md-6 wow fadeInUp" data-wow-duration="500ms">
						<h3>关于我们</h3>
						<p><?php  echo $config['contact'];?></p>
						<div class="contact-details">
							<div class="con-info clearfix">
								<i class="fa fa-home fa-lg"></i>
								<span><?php  echo $config['address'];?></span>
							</div>
							
							<div class="con-info clearfix">
								<i class="fa fa-phone fa-lg"></i>
								<span>Phone: <?php  echo $config['mobile'];?></span>
							</div>
							
							<div class="con-info clearfix">
								<i class="fa fa-fax fa-lg"></i>
								<span>Fax: <?php  echo $config['fax'];?></span>
							</div>
							
							<div class="con-info clearfix">
								<i class="fa fa-envelope fa-lg"></i>
								<span>Email: <?php  echo $config['email'];?></span>
							</div>
						</div>
					</div>
					<!-- / End Contact Details -->
						
					<!-- Contact Form -->
					<div class="contact-form col-md-6 wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
						<div class="copyright text-center">
							<div style="padding:20px 0;">
								<img src="<?php  echo $_W['attachurl'];?><?php  echo $config['ewm'];?>" style="width:200px;" alt="Meghna" /> 
							</div>
							<br />
							
						</div>
					</div>
					<!-- ./End Contact Form -->
					
				</div> <!-- end row -->
			</div> <!-- end container -->
			<div class="copyright text-center">
							<p><?php  echo $config['copyright'];?></p>
						</div>
			
			
		</section> <!-- end section -->
		
		<!-- end Contact Area

		
		<!-- Back to Top
		============================== -->
		<a href="javascript:;" id="scrollUp">
			<i class="fa fa-angle-up fa-2x"></i>
		</a>
		
		<!-- end Footer Area
		========================================== -->
		
		<!-- 
		Essential Scripts
		=====================================-->
		
		<!-- Main jQuery -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery-1.11.0.min.js"></script>
		<!-- Bootstrap 3.1 -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/bootstrap.min.js"></script>
		<!-- Slitslider -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.slitslider.js"></script>
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.ba-cond.min.js"></script>
		<!-- Parallax -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.parallax-1.1.3.js"></script>
		<!-- Owl Carousel -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/owl.carousel.min.js"></script>
		<!-- Portfolio Filtering -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.mixitup.min.js"></script>
		<!-- Custom Scrollbar -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.nicescroll.min.js"></script>
		<!-- Jappear js -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.appear.js"></script>
		<!-- Pie Chart -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/easyPieChart.js"></script>
		<!-- jQuery Easing -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.easing-1.3.pack.js"></script>
		<!-- tweetie.min -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/tweetie.min.js"></script>

		<!-- Highlight menu item -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.nav.js"></script>
		<!-- Sticky Nav -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.sticky.js"></script>
		<!-- Number Counter Script -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.countTo.js"></script>
		<!-- wow.min Script -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/wow.min.js"></script>
		<!-- For video responsive -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/jquery.fitvids.js"></script>
		<!-- Grid js -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/grid.js"></script>
		<!-- Custom js -->
		<script src="<?php  echo $_W['siteroot'];?>addons/cds_index3/template/systemwelcome/home/js/custom.js"></script>

    </body>
</html>