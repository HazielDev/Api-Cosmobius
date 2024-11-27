<?php 

    header("Content-Type: application/json");
    $mensaje = [
        "mensaje" => "hola"
    ];
    echo json_encode($mensaje)

?>

