<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="resources/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <title>Resultados de la búsqueda | T-e-commerce</title>
</head>
<body>
    <?php
        session_start(); 
        include_once("DBM.php");
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
                        <li class="nav-active">Tienda</li>
                    </a>
                    <a href="blog.php">
                        <li>Blog</li>
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
        <button id="shopping-cart-button" class="btn-float"><i class="i-shop"></i></button>
        <div class="shopping-cart display-none" id="shopping-cart">
            <div class="modal-shadow"></div>
            <div class="shopping-cart-container">
                <div class="shopping-cart-title">
                    <div class="row">
                        <div class="col-xs-10 col-md-11">
                            <h2 class="centered-text">Carrito de Compras</h2>
                        </div>
                        <div class="col-xs-2 col-md-1 centered-text">
                            <button class="close-shopping-cart" id="close-shopping-cart">
                                <i class="i-close"></i>
                            </button>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="shopping-cart-body">
                    <h3 class="centered-text">Productos en espera: </h3>
                    <?php
                        $rows = 0;
                        if(isset($_SESSION["sCart"]) && is_array($_SESSION["sCart"])){
                            $sCar = $_SESSION["sCart"];
                            $query = "SELECT name, price FROM products WHERE id IN (";
                            for($i = 0; $i < count($sCar); $i++){
                                if($i == (count($sCar)-1)){
                                    $query .= $sCar[$i].")";
                                }else{
                                    $query .= $sCar[$i].",";
                                }
                            }
                            $result = $conn->query($query);
                            $total = 0;
                            $rows = $result->num_rows;
                            if($rows > 0 ){
                                while($row = $result->fetch_assoc()){
                                    $itemPrice = $row["price"]+($row["price"]*0.5);
                                    echo("<div class='shopping-item'><h5> Nombre: ".$row["name"]."</h5>
                                            <p> Precio: &cent; ".$itemPrice."</p></div>");
                                    $total = $itemPrice+$total;
                                }
                                echo("<h4 class='centered-text'> Precio Total a Pagar: &cent; ".$total."</h4>");
                            }else{
                                echo("No existen productos en el carrito de compras");
                            }
                        }else{
                            echo("No existen productos en el carrito de compras");
                        }
                        if($rows > 0){
                            echo("<div class='centered-text'><button type='submit' class='btn bg-green'><i class='i-credit-card'></i> Pagar</button></div>");
                        }
                    ?>
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
                    <hr />
                    T-e-commerce&reg; es una marca registrada de Aure Software Ltd. Todos los derechos reservados
                    2019&copy;
                </div>
            </div>
        </footer>
    </div>
    <script src="js/responsive.js"></script>
    <script src="js/shopping-cart.js"></script>
</body>
</html>