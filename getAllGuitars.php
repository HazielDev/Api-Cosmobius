<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    require_once 'default.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {die("Error al conectar a la base de datos: " . mysqli_connect_error());}
    
    header("Content-Type: application/json");

    $guitars = [];
    $allGuitars = $conn->prepare("SELECT * FROM Guitarra");
    if($allGuitars->execute()){
        $guitarRes = $allGuitars->get_result(); 
        if($guitarRes->num_rows > 0){
            while ($guitar = $guitarRes->fetch_assoc()) {
                $guitars[] = $guitar;
            }
            echo json_encode($guitars);
        }
    }


}

?>