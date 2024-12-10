<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once 'default.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Error al conectar a la base de datos: " . mysqli_connect_error());}
    

    $guitars = [];
    $allInstrumento = $conn->prepare("SELECT * FROM Instrumento");
    if($allInstrumento->execute()){
        $intrumentoRes = $allInstrumento->get_result(); 
        if($intrumentoRes->num_rows > 0){
            while ($instrumento = $intrumentoRes->fetch_assoc()) {
                $instrumento[] = $guitar;
            }
            echo json_encode($instrumento);
        }else{
            echo json_encode(['message' => 'No se encontro a ningun artista']);
        }
    }
}

?>