<link rel="stylesheet" type="text/css" href="assest/portada/css/all.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/all.min.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/lightbox.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/flexslider.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="assest/portada/css/jquery.rateyo.css" />
<!-- <link rel="stylesheet" type="text/css" href="css/jquery.mmenu.all.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="css/meanmenu.min.css"> -->
<link rel="stylesheet" type="text/css" href="assest/portada/inner-page-style.css">
<link rel="stylesheet" type="text/css" href="assest/portada/style2.css">
<link rel="stylesheet" type="text/css" href="assest/portada/style.css">

<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">

   <!-- Google Web Fonts -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assest/dist/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
 <!--    <link href="css/style.css" rel="stylesheet"> -->

<body>
	<div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness" >
		<header class="site-header" id="inicio">
			<div class="top-header">
				<div class="container">
					<div class="top-header-left">
						<div class="top-header-block">
							<a href="mailto:info@educationpro.com" itemprop="email"><i class="fas fa-envelope"></i> piensadiferente@educationpro.com</a>
						</div>
						<div class="top-header-block">
							<a href="tel:+59177547082" itemprop="telephone"><i class="fas fa-phone"></i> +591 77547082</a>
						</div>
					</div>
					<div class="top-header-right">
						<div class="login-block button btn btn-default  rounded" >
							<a href="login" style="color: black;">Iniciar Sesión</a>
						</div>
					</div>
				</div>
			</div>
			<!-- Top header Close -->
			<div class="main-header">
				<div class="container col-2" style="margin-bottom: 0; padding-bottom: 0;">
					<div class="logo-wrap" itemprop="logo">
						<img src="<?php echo "assest/dist/img/webAcademico/logo-letras.png" ?>" alt="Logo Image" width="45%">
						<!-- <h1>Education</h1> -->
					</div>
					<div class="nav-wrap col-8" >
						<nav class="nav-desktop">
							<ul class="menu-list">
								<li><a href="#inicio">Inicio</a></li>
								<li class="menu-parent">Inf. Cursos
									<ul class="sub-menu">
										<?php
										$materias = ControladorMateria::ctrInfoMaterias();
										foreach ($materias as $value) {
										?>

											<li><a href="#"><?php echo $value["nombre_materia"]; ?></a></li>

										<?php
										}
										?>
									</ul>
								</li>
								<li><a href="login">Sistema Académico</a></li>
								<li><a href="#contacto">Contácto</a></li>
							</ul>
						</nav>
						<div id="bar">
							<i class="fas fa-bars"></i>
						</div>
						<div id="close">
							<i class="fas fa-times"></i>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header Close -->
		<!-- <div class="banner">
			<div class="owl-four owl-carousel" itemprop="image">
				<img src="images/page-banner.jpg" alt="Image of Bannner">
				<img src="images/page-banner2.jpg" alt="Image of Bannner">
				<img src="images/page-banner3.jpg" alt="Image of Bannner">
			</div>
			<div class="container" itemprop="description">
				<h1>welcome to education pro</h1>
				<h3>With our advance search feature you can now find the trips for you...</h3>
			</div>
			<div id="owl-four-nav" class="owl-nav"></div>
		</div> -->
		<!-- <div class="banner">
			<div class="owl-five owl-carousel owl-theme">
	            <div class="item-video">
            		<iframe width="100%" height="450" src="https://www.youtube.com/embed/ENVW3uZ3a-4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            		</iframe>
	            </div>
	            <div class="item-video">
	            	<iframe width="100%" height="450" src="https://www.youtube.com/embed/0bfk90rWV9U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	            </div>
	            <div class="item-video">
	            	<iframe width="100%" height="450" src="https://www.youtube.com/embed/ktvTqknDobU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	            </div>
	            <div class="item-video">
            		<iframe width="100%" height="450" src="https://www.youtube.com/embed/ENVW3uZ3a-4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
            		</iframe>
	            </div>
	            <div class="item-video">
	            	<iframe width="100%" height="450" src="https://www.youtube.com/embed/0bfk90rWV9U" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	            </div>
	            <div class="item-video">
	            	<iframe width="100%" height="450" src="https://www.youtube.com/embed/ktvTqknDobU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	            </div>
          </div>
		</div> -->

 <!-- Carousel Start -->
 <div class="container-fluid">
        <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#header-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#header-carousel" data-slide-to="1"></li>
                <li data-target="#header-carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="min-height: 300px;">
                    <img class="position-relative w-100" src="assest/dist/img/uni1.webp" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Instituto Matemático</h5>
                            <h1 class="display-2 text-white mb-md-4">No pares de aprender y Piensa Diferente</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="assest/dist/img/carousel-2.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-md-3">Instituto Matemático</h5>
                            <h1 class="display-2 text-white mb-md-4">CURSOS VIRTUALES</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" style="min-height: 300px;">
                    <img class="position-relative w-100" src="assest/dist/img/carousel-3.jpg" style="min-height: 300px; object-fit: cover;">
                    <div class="carousel-caption d-flex align-items-center justify-content-center">
                        <div class="p-5" style="width: 100%; max-width: 900px;" style=" background-color: black;">
                            <h5 class="text-white text-uppercase mb-md-3">Instituto Matemático</h5>
                            <h1 class="display-2 text-white mb-md-4">CURSOS PREFAS</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

		<!-- Banner Close -->
		<div class="page-heading">
			<div class="container">
				<h2>CURSOS POPULARES</h2>
			</div>
		</div>
		<!-- Popular courses End -->
		<div class="learn-courses">
			<div class="container">
				<div class="courses post-holder">
					<div class="owl-one owl-carousel info-post">
						<?php
						$materias = ControladorMateria::ctrInfoMaterias();
						foreach ($materias as $value) {
							$cadena = $value['contenido_materia'];
							$separador = "-";
							$separada = explode($separador, $cadena);
							/* var_dump($separada); */
						?>
							<div class="box-wrap" itemprop="event" itemscope itemtype=" http://schema.org/Course">
								<div class="img-wrap img-holder" itemprop="image" style="width: 360px; height: 260px; margin-left: 4px;"><img src="assest/dist/img/materias/<?php echo $value['img_materia'] ?>" alt="courses picture"></div>
								<a href="#" class="learn-desining-banner" itemprop="name">Más Información>>></a>
								<div class="box-body" itemprop="description">
									<p style="padding-bottom: 1px; margin-bottom: 0px; margin-top: 0;"><?php echo "- " . $separada[1] ?></p>
									<p style="padding-bottom: 1px; margin-bottom: 0px; margin-top: 0;"><?php echo "- " . $separada[2] ?></p>
									<p style="padding-bottom: 1px; margin-bottom: 0px; margin-top: 0;"><?php echo "- " . $separada[3] ?></p>
									<section itemprop="time" style="margin-top: 5px;">
										<p><span>Duración</span> 3 meses</p>
										<p><span>Horarios:</span> 6am-12am / 11am-5pm</p>
										<p><span>Costo:</span> 4,00,000</p>
									</section>
								</div>
							</div>
						<?php
						}
						?>

					</div>
				</div>
			</div>
		</div>

<!-- About Start -->
<!-- <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-4 mb-lg-0" src="assest/dist/img/avatar.png" alt="">
                </div>
                <div class="col-lg-7">
                    <div class="text-left mb-4">
                        <h5 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">About Us</h5>
                        <h1>Innovative Way To Learn</h1>
                    </div>
                    <p>Aliquyam accusam clita nonumy ipsum sit sea clita ipsum clita, ipsum dolores amet voluptua duo dolores et sit ipsum rebum, sadipscing et erat eirmod diam kasd labore clita est. Diam sanctus gubergren sit rebum clita amet, sea est sea vero sed et. Sadipscing labore tempor at sit dolor clita consetetur diam. Diam ut diam tempor no et, lorem dolore invidunt no nonumy stet ea labore, dolor justo et sit gubergren diam sed sed no ipsum. Sit tempor ut nonumy elitr dolores justo aliquyam ipsum stet</p>
                    <a href="" class="btn btn-primary py-md-2 px-md-4 font-weight-semi-bold mt-2">Learn More</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- About End -->

		<!-- Learn courses End -->
		<section class="whyUs-section">
			<div class="container">
				<div class="featured-points">
					<ul>
						<li><i class="fas fa-book"></i> free books for students</li>
						<li><i class="fas fa-money-check-alt"></i> affordable fees</li>
						<li><i class="fas fa-chalkboard-teacher"></i> experienced teachers</li>
						<li> <i class="fas fa-book"></i> free books for students</li>
					</ul>
				</div>
				<div class="whyus-wrap">
					<h1>why us?</h1>
					<p itemprop="description">Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsumLorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum Lorem Ipsum lorem ipsum</p>

					<a href="#" class="read-more-btn">read more</a>
				</div>
			</div>
		</section>
		<!-- Closed WhyUs section -->
		<section class="page-heading">
			<div class="container">
				<h2>gallery</h2>
			</div>
		</section>
		<section class="gallery-images-section" itemprop="image" itemscope itemtype=" http://schema.org/ImageGallery">
			<div class="gallery-img-wrap">
				<a href="images/gallery-img1.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img1.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img2.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img2.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img3.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img4.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img4.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img5.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img5.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img6.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img6.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img7.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img7.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img8.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img8.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img9.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img9.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img10.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img10.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img11.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img11.jpg" alt="gallery-images">
				</a>
			</div>
			<div class="gallery-img-wrap">
				<a href="images/gallery-img12.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
					<img src="images/gallery-img12.jpg" alt="gallery-images">
				</a>
			</div>
		</section>
		<!-- End of gallery Images -->
		<section class="page-heading">
			<div class="container">
				<h2>upcomming events</h2>
			</div>
		</section>
		<section class="events-section" itemprop="event" itemscope itemtype=" http://schema.org/Event">
			<div class="container">
				<div class="event-wrap">
					<div class="img-wrap" itemprop="image">
						<img src="images/events.jpg" alt="event images">
					</div>
					<div class="details">
						<a href="">
							<h3 itemprop="name">Orientation Programme for new Students.</h3>
						</a>
						<p itemprop="description">Orientation Programme for new sffs Students. Orientation Programme for new sffs Students. Orientation Programme for new sffs Students.</p>

						<h5 itemprop="startDate"><i class="far fa-clock"></i> Dec 30,2018 | 11am</h5>
						<h5 itemprop="location"><i class="fas fa-map-marker-alt"></i> Hotel Malla, Lainchaur</h5>
					</div>
				</div>

				<div class="event-wrap">
					<div class="img-wrap" itemprop="image">
						<img src="images/events.jpg" alt="event images">
					</div>
					<div class="details">
						<a href="">
							<h3 itemprop="name">Orientation Programme for new Students.</h3>
						</a>
						<p itemprop="description">Orientation Programme for new sffs Students. Orientation Programme for new sffs Students. Orientation Programme for new sffs Students.</p>

						<h5 itemprop="startDate"><i class="far fa-clock"></i> Dec 30,2018 | 11am</h5>
						<h5 itemprop="location"><i class="fas fa-map-marker-alt"></i> Hotel Malla, Lainchaur</h5>
					</div>
				</div>
			</div>
		</section>
		<!-- End of Events section -->
		<section class="what-other-say">
			<!-- <div class="container">
				<div class="wrap-others-say" itemprop="review" itemscope itemtype="http://schema.org/ReviewAction">
					<h1>what other say about us</h1>
					<div id="carousel" class="flexslider">
						<ul class="slides">
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="hidden">
										<h3>Sagar Sapkota</h3>
										<h4>UI Designer</h4>
									</figcaption>
								</figure>
							</li>
							<li class="img-wrap">
								<figure itemprop="image">
									<img src="images/review-big-img.jpg" alt="Person Image">
									<figcaption class="fig">
										<h3 class="hidden">Sagar Sapkota</h3>
										<h4 class="hidden">UI Designer</h4>
									</figcaption>
								</figure>
							</li>
						</ul>
					</div>

					<div id="slider" class="flexslider">
	  					<ul class="slides">
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">Amazing service and amazing team. Thank you!</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">Very Satisfaied with their service</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">Quick, efficient and meets your expectations</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">The website was according our imagination</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">Amazing service and amazing team. Thank you!</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">Very Satisfaied with their service</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">Quick, efficient and meets your expectations</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
						    <li>
						    	<div class="testimonial-holder" itemprop="description">
						    		<strong class="title">The website was according our imagination</strong>
						    		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tristique fer-<br/>mentum mauris, non tincidunt arcu venenatis vel. Nam et vehicula turpis. Ut nunc purus, mattis eu odio a, egestas facilisis nibh. Mauris magna diam, iaculis vitae sapien non, pharetra congue purus. Phasellus in odio purus.</p>
						    		<div class="rateYo"></div>
						    	</div>
						    </li>
	  					</ul>
					</div>
				</div>
			</div> -->
			<div class="container">
				<h4 class="article-subtitle">Get to Know</h4>
				<h2 class="head">what our customer say</h2>
				<div class="three owl-carousel owl-theme">
					<div class="customer-item" itemscope itemtype="http://schema.org/Rating">
						<div class="border">
							<div class="customer">
								<figure>
									<img class="customer-img" src="images/customer-img.jpg" alt="Person image">
									<figcaption>
										<span itemprop="author">SAGAR KUMAR SAPKOTA</span>
										<div class="rateYo" itemprop="ratingValue"></div>
									</figcaption>
								</figure>
							</div>
							<div class="customer-review">
								<p itemprop="description">
									"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non"
								</p>
							</div>
						</div>
					</div>
					<div class="customer-item" itemscope itemtype="http://schema.org/Rating">
						<div class="border">
							<div class="customer">
								<figure>
									<img class="customer-img" src="images/customer-img.jpg" alt="Person image">
									<figcaption>
										<span itemprop="author">SAGAR KUMAR SAPKOTA</span>
										<div class="rateYo" itemprop="ratingValue"></div>
									</figcaption>
								</figure>
							</div>
							<div class="customer-review">
								<p itemprop="description">
									"22222Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
									tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
									quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non"
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End of Others talk -->
		<section class="page-heading">
			<div class="container">
				<h2>latest news</h2>
			</div>
		</section>
		<section class="latest-news">
			<div class="container" itemprop="event" itemscope itemtype=" http://schema.org/Event">
				<div class="owl-two owl-carousel">
					<div class="news-wrap" itemprop="event">
						<div class="news-img-wrap" itemprop="image">
							<img src="images/latest-new-img.jpg" alt="Latest News Images">
						</div>
						<div class="news-detail" itemprop="description">
							<a href="">
								<h1>Orientation Programme for new Students.</h1>
							</a>
							<h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

							<p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students.. Orientatin Programmes for new Students</p>
						</div>
					</div>

					<div class="news-wrap" itemprop="event">
						<div class="news-img-wrap" itemprop="image">
							<img src="images/latest-new-img.jpg" alt="Latest News Images">
						</div>
						<div class="news-detail" itemprop="description">
							<a href="">
								<h1>Orientation Programme for new Students.</h1>
							</a>
							<h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

							<p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students.. Orientatin Programmes for new Students</p>
						</div>
					</div>

					<div class="news-wrap" itemprop="event">
						<div class="news-img-wrap" itemprop="image">
							<img src="images/latest-new-img.jpg" alt="Latest News Images">
						</div>
						<div class="news-detail" itemprop="description">
							<a href="">
								<h1>Orientation Programme for new Students.</h1>
							</a>
							<h2 itemprop="startDate">By Admin | 20 Dec. 2018</h2>

							<p>Orientation Programme for new sffs Students. Orientatin Programmes for new Students.. Orientatin Programmes for new Students</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Latest News CLosed -->
		<section class="query-section text-center">
			<div class="container">
				<p>¿Tienes alguna consulta?<a href="tel:+59177547082"><i class="fas fa-phone"></i> +591 77547082</a></p>
			</div>
		</section>
		<!-- End of Query Section -->
		<footer class="page-footer" itemprop="footer" itemscope itemtype="http://schema.org/WPFooter" id="contacto">
			<div class="footer-first-section">
				<div class="container">
					<div class="box-wrap" >
						<header>
							<h1>Encuéntranos en:</h1>
						</header>
						<div class="recent-course-wrap">
							<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1378.8439736231924!2d-68.19687648168131!3d-16.496414191535596!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sbo!4v1681182517903!5m2!1ses!2sbo" width="500" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
					</div>

					<div class="box-wrap" itemprop="about">
						<header>
							<h1>Dirección</h1>
						</header>
						<p>Zona Villa Tunari, C/José Manuel Cortez Nro 1044</p>

						<h4><a href="tel:+9779813639131"><i class="fas fa-phone"></i> +591 77547082</a></h4>
						<h4><a href="mailto:info@educationpro.com"><i class="fas fa-envelope"></i> piensadiferente@educationpro.com</a></h4>
						<h4><a href=""><i class="fas fa-map-marker-alt"></i>Sede Complejo, Rio Seco</a></h4>
					</div>

					<div class="box-wrap">
						<header>
							<h1>Contácto</h1>
						</header>
						<section class="quick-contact">
							<input type="email" name="email" placeholder="Tú correo electrónico*">
							<textarea placeholder="Escribe tu mensaje*" rows="8"></textarea>
							<button>enviar mensaje</button>
						</section>
					</div>

				</div>
			</div>
			<!-- End of box-Wrap -->
			<div class="footer-second-section">
				<div class="container">
					<hr class="footer-line">
					<ul class="social-list">
						<li><a href="" style="margin-left: 18px;"><i class="fab fa-facebook-square"></i></a></li>
						<li><a href=""></a></li>
						<li><a href=""><i class="fab fa-youtube"></i></a></li>
						<li><a href=""></a></li>
						<li><a href=""><i class="fab fa-instagram"></i></a></li>
					</ul>
					<hr class="footer-line">
				</div>
			</div>
			<div class="footer-last-section">
				<div class="container">
					<strong>
						<p>Copyright &copy; 2023 <a href="https://ekesoft.es"> EkeSoft</a>.<span style="font-size: 11px;">Derechos reservados.</span></p>
					</strong>
				</div>
			</div>
		</footer>
	</div>
	<script type="text/javascript" src="assest/portada/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assest/portada/js/lightbox.js"></script>
	<script type="text/javascript" src="assest/portada/js/all.js"></script>
	<script type="text/javascript" src="assest/portada/js/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="assest/portada/js/owl.carousel.js"></script>
	<script type="text/javascript" src="assest/portada/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="assest/portada/js/jquery.rateyo.js"></script>
	<!-- <script type="text/javascript" src="js/jquery.mmenu.all.js"></script> -->
	<!-- <script type="text/javascript" src="js/jquery.meanmenu.min.js"></script> -->
	<script type="text/javascript" src="assest/portada/js/custom.js"></script>

	<!-- JavaScript Libraries -->
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assest/dist/lib/easing/easing.min.js"></script>
    <script src="assest/dist/lib/owlcarousel/owl.carousel.min.js"></script>

</body>

</html>