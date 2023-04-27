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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">

<!--    <link href="css/style.css" rel="stylesheet"> -->

<body>
    <div id="page" class="site" itemscope itemtype="http://schema.org/LocalBusiness">
        <header class="site-header" id="inicio">
            <div class="top-header">
                <div class="container row">
                    <div class="top-header-left">
                        <div class="top-header-block">
                            <a href="mailto:info@educationpro.com" itemprop="email"><i class="fas fa-envelope"></i> piensadiferente@educationpro.com</a>
                        </div>
                        <div class="top-header-block">
                            <a href="tel:+59177547082" itemprop="telephone"><i class="fas fa-phone"></i> +591 77547082</a>
                        </div>
                    </div>
                    <div class="top-header-right">
                        <p class="text-white">Instituto Matemático <span class="font-weight-bold text-white">Piensa Diferente</span></p>
                    </div>

                </div>
            </div>
            <!-- Top header Close -->
            <div class="main-header">
                <div class="container col-2" style="margin-bottom: 0; padding-bottom: 0; padding-top: 0;">
                    <div class="logo-wrap" itemprop="logo">
                        <img src="<?php echo "assest/dist/img/webAcademico/logo-letras.png" ?>" alt="Logo Image" width="45%">
                        <!-- <h1>Education</h1> -->
                    </div>
                    <div class="nav-wrap col-8">
                        <nav class="nav-desktop">
                            <ul class="menu-list">
                                <li><a href="./#inicio">Inicio</a></li>
                                <li> <a href="./#cursos"> Inf. Cursos</a></li>
                                <li><a href="./#noticias">Noticias</a></li>
                                <li><a href="./#contacto">Contácto</a></li>
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

        <!-- Carousel Start -->

        <div class="hold-transition login-page" style="font-size: 14px;">
            <!-- <div id="back"></div> -->
            <div class="login-box" >
                <div class="login-logo" >
                    <a href="../../index2.html" class="text-white" style="font-size: 28px;"><b>WEB</b> ACADÉMICO</a>
                </div>
                <!-- /.login-logo -->
                <div class="card" style="border-radius: 20px; background-color:#a1a5b159; box-shadow: 10px 5px 5px #000000a6;">
                    <div class="card-body login-card-body" style="border-radius: 20px; background-color:#a1a5b159; box-shadow: 10px 5px 5px #000000a6;">
                        <p class="login-box-msg text-white">Ingrese sus credenciales</p>

                        <form action="" method="post">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Login de Usuario" style="font-size: 14px;">
                                <div class="input-group-append">
                                    <div class="input-group-text text-black">
                                        <span class="fas fa-user "></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3 pb-3">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" style="font-size: 14px;">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-8">
                                    <dt><a href="inicio" class="btn btn-danger text-white" style="font-size: 12px;">Cancelar</a></dt>
                                </div>
                                <!-- /.col -->
                                <div class="col-4">
                                    <button type="submit" class="btn btn-xl btn-primary btn-block" style="font-size: 12px;">Iniciar Sesión</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            <?php
                            $login = new ControladorUsuario();
                            $login->ctrIngresoUsuario();
                            ?>
                        </form>

                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->

            <!-- jQuery -->
            <script src="assest/plugins/jquery/jquery.min.js"></script>
            <!-- Bootstrap 4 -->
            <script src="assest/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- AdminLTE App -->
            <script src="assest/dist/js/adminlte.min.js"></script>

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