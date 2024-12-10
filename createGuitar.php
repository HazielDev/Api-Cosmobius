<?php 

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include 'default.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Error al conectar a la base de datos: " . mysqli_connect_error());}
    
    $newGuitar = $conn->prepare("INSERT INTO Guitarra (Nombre, )");

}

?>