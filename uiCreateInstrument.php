<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        form{
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 16px;
        }

        input{
            border-radius: 5px;
            text-indent: 8px;
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>
    <form action="createInstrumentPost.php" method="POST">
        <input type="text" name="nombre" placeholder="nombre">
        <input type="text" name="descr" placeholder="descr">
        <input type="text" name="modelo" placeholder="modelo">
        <input type="text" name="marca" placeholder="marca">
        <input type="text" name="tipo" placeholder="tipo">
        <input type="text" name="imagen" placeholder="imagen">
        <button type="submit">Subir Producto</button>
    </form>
</body>
</html>