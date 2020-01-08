<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="resources/logo.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Creador de Productos | T-e-commerce</title>
</head>
<body>
<?php 
    $servername = "den1.mysql2.gear.host";
    $username = "tecommerce";
    $password = "pE>C3T7fU";
    $db = "tecommerce";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $query = "Select * From categories";
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
            <h2 style="text-align:center;margin-top:70px;">Crea tu producto</h2>
            <form action="products-creator.php" method="post">
                <div class="form-group">
                    <label for="name">Nombre del Producto</label>
                    <input type="text" name="name" id="name">
                </div>
                <div class="form-group">
                    <label for="short-desc">Descripción Corta</label> <br>
                    <input type="text" name="short-desc" id="short-desc">
                </div>
                <div class="form-group">
                    <label for="long-desc">Descripción extensa</label>
                    <textarea name="long-desc" id="long-desc" cols="50" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="quantity">Cantidad</label> <br>
                    <input type="number" name="quantity" id="quantity">
                </div> 
                <div class="form-group">
                    <label for="price">Precio</label> <br>
                    <input type="number" name="price" id="price">
                </div>
                <div class="form-group">
                    <label for="category">Categoría</label><br>
                    <select name="category" id="category">
                    <?php
                        while ($row = $result->fetch_assoc()) {
                            echo("<option value='".$row["id"]."'>".$row["categoria"]."</option>");
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="imgUri">Seleccionar Imagen</label> <br>
                    <select name="imgUri" id="imgUri">
                        <?php 
                            $images = scandir("./resources/Products/");
                            foreach($images as $key => $value){
                                if(!in_array($value, array(".",".."))){
                                    echo("<option value='".$value."'>".$value."</option>");
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="centered-text">
                    <br>
                    <input type="submit" value="Crear" name="send" class="btn bg-black">
                </div>
            </form>
            <?php
                $action = false; 
                if(isset($_POST["send"])){
                    $name = $_POST["name"];
                    $short_desc = $_POST["short-desc"];
                    $long_desc = $_POST["long-desc"];
                    $quantity = (int)$_POST["quantity"];
                    $price = (double)$_POST["price"];
                    $category = (int)$_POST["category"];
                    $imgUri = $_POST["imgUri"];

                    $query = "INSERT INTO products(name,short_desc,long_desc,quantity,price,categoryId,imgUri) VALUES(?,?,?,?,?,?,?)";
                    $preparedQuery = $conn -> prepare($query);
                    $preparedQuery -> bind_param("sssidis", $name, $short_desc, $long_desc, $quantity, $price, $category, $imgUri);
                    $action = $preparedQuery -> execute();
                }
                if($action == true){
                    echo("<br><h3 style='text-align:center;'>El producto ha sido creado con éxito.</h3>");
                }
            ?>
        </div>
    </div>
</body>
</html>