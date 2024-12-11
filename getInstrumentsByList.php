<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    require_once 'default.php';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }
    
    header("Content-Type: application/json");

    $instrumentos = [];

    if (isset($_GET['favList'])) {
        $ids = json_decode($_GET['favList'], true);

        if (is_array($ids) && count($ids) > 0) {
            $placeholders = implode(',', array_fill(0, count($ids), '?'));
            $sql = "SELECT * FROM Instrumento WHERE id IN ($placeholders)";
            $stmt = $conn->prepare($sql);
            
            $types = str_repeat('i', count($ids)); // Asumiendo que los IDs son enteros
            $stmt->bind_param($types, ...$ids);

            if ($stmt->execute()) {
                $resultado = $stmt->get_result();
                if ($resultado->num_rows > 0) {
                    while ($instrumento = $resultado->fetch_assoc()) {
                        $instrumentos[] = $instrumento;
                    }
                    echo json_encode($instrumentos);
                } else {
                    echo json_encode(['message' => 'No se encontraron instrumentos con esos IDs']);
                }
            } else {
                echo json_encode(['message' => 'Error al ejecutar la consulta']);
            }
        } else {
            echo json_encode(['message' => 'Parámetro "ids" no válido']);
        }
    } else {
        $allInstrumento = $conn->prepare("SELECT * FROM Instrumento");
        if($allInstrumento->execute()){
            $intrumentoRes = $allInstrumento->get_result(); 
            if($intrumentoRes->num_rows > 0){
                while ($instrumento = $intrumentoRes->fetch_assoc()) {
                    $instrumentos[] = $instrumento;
                }
                echo json_encode($instrumentos);
            }else{
                echo json_encode(['message' => 'No se encontró ningún instrumento']);
            }
        }
    }
}
?>
