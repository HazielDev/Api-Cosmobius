<?php 

include 'default.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {die("Error al conectar a la base de datos: " . mysqli_connect_error());}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    header("Content-Type: application/json");

    $catID = $_GET['catId'];
    $getCats = $conn->prepare("SELECT * FROM Instrumento WHERE catId = ?");
    $getCats->bind_param("i",$catID);
    if($getCats->execute()){
        $catList = [];
        $catsRes = $getCats->get_result(); 
        if($catsRes->num_rows > 0){
            while ($cat = $catsRes->fetch_assoc()) {
                $catList[] = $cat;
            }
            echo json_encode($catList);
        }else{
            echo json_encode(['message' => 'No se encontro ningun instrumento']);
        }
    }
}


?>