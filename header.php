<?php 
	session_start();
	require_once('config.php');

	$email_status =  Student('is_email_verified',$_SESSION['st_loggedin'][0]['id']); 
	$mobile_status =  Student('is_mobile_verified',$_SESSION['st_loggedin'][0]['id']); 

	if(!isset($_SESSION['st_loggedin']) OR $email_status != 1 OR $mobile_status != 1){
    	header('location:login.php'); 
	}
?>	
	
	<!-- Header Top ==== -->
    <header class="header rs-nav">
		<div class="top-bar">
			<div class="container">
				<div class="row d-flex justify-content-between">
					<div class="topbar-left">
						<ul>
							<li><a href="faq-1.html"><i class="fa fa-question-circle"></i>Ask a Question</a></li>
							<li><a href="javascript:;"><i class="fa fa-envelope-o"></i>hello@coderitsoluton.com</a></li>
						</ul>
					</div>
					<div class="topbar-right">
						<ul>
							<?php if(isset($_SESSION['st_loggedin'])) : ?>
								<li><a href="dashboard/index.php"><h6><?php echo Student('name', $_SESSION['st_loggedin'][0]['id']) ; ?>&nbsp<i style="color:green" class="fas fa-user"></i></h6></a></li>
							<?php else : ?>
								<li><a href="login.php">Login</a></li>
								<li><a href="registration.php">Register</a></li>
							<?php endif; ?>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-header navbar-expand-lg">
            <div class="menu-bar clearfix">
                <div class="container clearfix">
					<!-- Header Logo ==== -->
					<div class="menu-logo">
						<a href="index.php"><img src="assets/images/logo.png" alt=""></a>
					</div>
					<!-- Mobile Nav Button ==== -->
                    <button class="navbar-toggler collapsed menuicon justify-content-end" type="button" data-toggle="collapse" data-target="#menuDropdown" aria-controls="menuDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					<!-- Author Nav ==== -->
                    <div class="secondary-menu">
                        <div class="secondary-inner">
                            <ul>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-facebook"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="javascript:;" class="btn-link"><i class="fa fa-linkedin"></i></a></li>
								<!-- Search Button ==== -->
								<li class="search-btn"><button id="quik-search-btn" type="button" class="btn-link"><i class="fa fa-search"></i></button></li>
							</ul>
						</div>
                    </div>
					<!-- Search Box ==== -->
                    <div class="nav-search-bar">
                        <form action="#">
                            <input name="search" value="" type="text" class="form-control" placeholder="Type to search">
                            <span><i class="ti-search"></i></span>
                        </form>
						<span id="search-remove"><i class="ti-close"></i></span>
                    </div>
					<!-- Navigation Menu ==== -->
                    <div class="menu-links navbar-collapse collapse justify-content-start" id="menuDropdown">
						<div class="menu-logo">
							<a href="index.html"><img src="assets/images/logo.png" alt=""></a>
						</div>
                        <ul class="nav navbar-nav">	
							<li class="active"><a href="index.php">Home</a>
							</li>
							<li><a href="javascript:;">Pages <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="javascript:;">About<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="about-1.html">About 1</a></li>
											<li><a href="about-2.html">About 2</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Event<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="event.html">Event</a></li>
											<li><a href="events-details.html">Events Details</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">FAQ's<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="faq-1.html">FAQ's 1</a></li>
											<li><a href="faq-2.html">FAQ's 2</a></li>
										</ul>
									</li>
									<li><a href="javascript:;">Contact Us<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="contact-1.html">Contact Us 1</a></li>
											<li><a href="contact-2.html">Contact Us 2</a></li>
										</ul>
									</li>
									<li><a href="portfolio.html">Portfolio</a></li>
									<li><a href="profile.html">Profile</a></li>
									<li><a href="membership.html">Membership</a></li>
									<li><a href="error-404.html">404 Page</a></li>
								</ul>
							</li>
							<li class="add-mega-menu"><a href="javascript:;">Our Courses <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu add-menu">
									<li class="add-menu-left">
										<h5 class="menu-adv-title">Our Courses</h5>
										<ul>
											<li><a href="courses.html">Courses </a></li>
											<li><a href="courses-details.html">Courses Details</a></li>
											<li><a href="profile.html">Instructor Profile</a></li>
											<li><a href="event.html">Upcoming Event</a></li>
											<li><a href="membership.html">Membership</a></li>
										</ul>
									</li>
									<li class="add-menu-right">
										<img src="assets/images/adv/adv.jpg" alt=""/>
									</li>
								</ul>
							</li>
							<li><a href="javascript:;">Blog <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="blog-classic-grid.html">Blog Classic</a></li>
									<li><a href="blog-classic-sidebar.html">Blog Classic Sidebar</a></li>
									<li><a href="blog-list-sidebar.html">Blog List Sidebar</a></li>
									<li><a href="blog-standard-sidebar.html">Blog Standard Sidebar</a></li>
									<li><a href="blog-details.html">Blog Details</a></li>
								</ul>
							</li>
							<li class="nav-dashboard"><a href="dashboard/index.php">Student Dashboard</a></li>
						</ul>
						<div class="nav-social-link">
							<a href="javascript:;"><i class="fa fa-facebook"></i></a>
							<a href="javascript:;"><i class="fa fa-google-plus"></i></a>
							<a href="javascript:;"><i class="fa fa-linkedin"></i></a>
						</div>
                    </div>
					<!-- Navigation Menu END ==== -->
                </div>
            </div>
        </div>
    </header>
    <!-- Header Top END ==== -->