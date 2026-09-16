<?php

    $Productos = [
        "bebidas" => [["nombre" => "cafe", "precio" => 2.5],
                ["nombre" => "soda", "precio" => 1.0],
                ["Nombre" => "jugo", "precio" => 0.5]],
        "alimentos"=> [["nombre"=> "churro", "precio"=> 1.25],
                    ["nombre" => "pan", "precio" => 1.5]],
        "postes"=> [["nombre"=> "chaseecake", "precio" => 3.5],
                    ["nombre" => "flan", "precio" => 2.5]]
        
    ];

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $Cantidad = $_POST["cantidad"];
        $producto = $Productos[$_POST["Nombre"]];
        $precio = $producto["precio"];

        $totalpagar = $precio * $Cantidad;
        
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h2>Datos a ingresar</h2>
        <form action="" method="POST">
                <label for="">Nombre del cliente</label>
                <input type="text" name="nombre">
                <br><br>
                <label for="">alimento a seleccionar</label>
                <select name="producto" id="">
                    <?php foreach($Productos as $key => $value) : ?>
                        <option value="<?= $key?>"><?= $value["nombre"]?></option>
                    <?php endforeach?>
                </select>
                <br><br>
                <label for="">cantidad</label>
                <input type="number" name="cantidad">
                <br><br>
                <button>Enviar</button>
    </div>
</body>
</html>