<?php 

header("Content-Type: application/json");

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    include 'default.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Error al conectar a la base de datos: " . mysqli_connect_error());}
    $nombre = $_POST['nombre'];
    $descr = $_POST['descr'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $tipo = $_POST['tipo'];
    $imagen = $_POST['imagen'];

    header("Content-Type: application/json");

    $newGuitar = $conn->prepare("INSERT INTO Instrumento (nombre, descr, marca, modelo, tipo, imagen) VALUES (?,?,?,?,?,?)");
    $newGuitar->bind_param("ssssss",$nombre, $descr, $marca, $modelo, $tipo, $imagen);
    if($newGuitar->execute()){
        $message = ['message' => "Se registro el instrumento con exito"];
        echo json_encode($message);
    }
}

?>