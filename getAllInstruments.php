<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once 'default.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Error al conectar a la base de datos: " . mysqli_connect_error());}
    
    header("Content-Type: application/json");
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