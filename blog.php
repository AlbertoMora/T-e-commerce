<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="resources/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/blog.css">
    <title>T-e-commerce | Blog</title>
</head>
<body>
<?php
    include_once("DBM.php");
    $query = "Select * From blog_posts";
    $result = $conn->query($query);
?>
    <nav>
        <div class="nav-body">
            <div class="nav-logo">
                <a href="#">
                    <img src="resources/logo.png" alt="T-e-commerce logo">
                    <h1>T-e-commerce</h1>
                </a>
            </div>
            <div class="sm-button-container d-lg-none d-xl-none">
                <div id="btn-nav-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="nav-items d-none d-md-none">
                <ul>
                    <a href="index.html">
                        <li>Inicio</li>
                    </a>
                    <a href="tienda.php">
                        <li>Tienda</li>
                    </a>
                    <a href="#">
                        <li class="nav-active">Blog</li>
                    </a>
                    <a href="about.html">
                        <li>Acerca de</li>
                    </a>
                    <a href="contact.php">
                        <li>Contactanos</li>
                    </a>
                </ul>
            </div>
    </nav>
    <div class="content-container">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-3 col-lg-3 col-xl-2 d-none ">
                    <div class="most-visited">
                        <h3>Los más visitados</h3>
                        <hr>
                        <a href="#">Primer post de T-e-commerce</a>
                        <a href="#">¿Cómo ser un socio T-e-commerce?</a>
                        <a href="#">Comprá lo que buscás en sólo 3 pasos</a>
                        <a href="#">Shopping en línea: El futuro de las compras</a>
                        <a href="#">Actualidad CR</a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-9 col-lg-9 col-xl-8">
                    <?php
                    try {
                        $images = array(
                            0 => "shop-square.jpg",
                            1 => "post2.jpg",
                            2 => "post3.jpg",
                            3 => "post4.jpg",
                            4 => "post5.jpg"
                        );   
                        while($row = $result->fetch_assoc()){
                            echo("<div class='blog-post'>
                                    <div class='row'>
                                        <div class='col-xs-12 col-md-3'>
                                            <img src='resources/".$images[mt_rand(0,4)]."' alt='' class='rounded-post-img' />
                                        </div>
                                        <div class='col-xs-12 col-md-9'>
                                            <h2 class='centered-text left-md-text'>".$row["title"]."</h2>
                                            <div class='row post-data'>
                                                <div class='col-xs-4'>
                                                    <i class='i-calendar'></i> ".mt_rand(1,28)."/".mt_rand(1,12)."/2019
                                                </div>
                                                <div class='col-xs-4'>
                                                    <i class='i-tag'></i> General
                                                </div>
                                                <div class='col-xs-4'>
                                                    <i class='i-like'></i> ".mt_rand(1,500)." likes
                                                </div>
                                            </div>
                                            <div class='row post-data'>
                                                <div class='col-xs-6'>
                                                    <i class='i-comments'></i> ".mt_rand(3,100)." comentarios
                                                </div>  
                                                <div class='col-xs-6'>
                                                    <i class='i-share'></i> ".mt_rand(3,100)." vez compartido
                                                </div>
                                            </div>
                                            <p class='centered-text left-md-text'>
                                                ".$row["caption"]."
                                            </p>
                                            <a href='blog/post.php?id=".$row["id"]."' class='centered-text left-md-text classic-link'>Leer más ></a>
                                        </div>
                                    </div>
                                </div>"     
                            );
                        }
                    }catch (Exception $e){
                        echo($e);
                    }
                    ?>  
                </div>
                <div class="col-xl-2 d-none d-md-none d-lg-none">
                    <div class="most-visited">
                        <h3 class="right-md-text">Quizá te podría interesar</h3>
                        <hr>
                        <a href="#" class="right-md-text">Otro link que dirige a un blog</a>
                        <a href="#" class="right-md-text">Otro link que dirige a un blog 2</a>
                        <a href="#" class="right-md-text">Otro link que dirige a un blog 3</a>
                        <a href="#" class="right-md-text">Otro link que dirige a un blog 4</a>
                        <a href="#" class="right-md-text">Otro link que dirige a un blog 5</a>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="row">
                <div class="col-md-4 centered-text left-md-text col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="blog.html">Blog</a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#">Socios T-e-commerce</a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#">Reclutá a un compa</a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#">Responsabilidad Social</a>
                        </div>
                        <div class="col-xs-12">
                            <a href="#">Terminos y Condiciones</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 centered-text">
                    <div class="row">

                        <div class="col-xs-12">
                            <a href="www.facebook.com">
                                <i class="i-fb"></i> Seguinos en Facebook
                            </a>
                        </div>
                        <div class="col-xs-12">
                            <a href="www.twitter.com">
                                <i class="i-twitter"></i> Seguinos en Twitter
                            </a>
                        </div>
                        <div class="col-xs-12">
                            <a href="www.instagram.com">
                                <i class="i-instagram"></i> Seguinos en Instagram
                            </a>
                        </div>

                    </div>
                </div>
                <div class="col-md-4 col-xs-12 d-none right-text">
                    <div class="row">
                        <div class="col-xs-12">
                            <a href="about.html">Conocé nuestras instalaciones</a>
                        </div>
                        <div class="col-xs-12">
                            <a href="about.html">¿Quiénes Somos?</a>
                        </div>
                        <div class="col-xs-12">
                            <a href="index.html#reviews">Historias de éxito</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 centered-text">
                    <hr/>
                    T-e-commerce&reg; es una marca registrada de Aure Software Ltd. Todos los derechos reservados 2019&copy;
                </div>
            </div>
        </footer>
    </div>
    <script src="js/responsive.js" type="text/javascript"></script>
</body>

</html>