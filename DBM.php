<?php
    $servername = "den1.mysql2.gear.host";
    $username = "tecommerce";
    $password = "pE>C3T7fU";
    $db = "tecommerce";
    $conn = new mysqli($servername, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>