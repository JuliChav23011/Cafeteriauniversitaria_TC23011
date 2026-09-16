<?php

    $Productos = [
        ["bebidas" => ["nombre" => "cafe", "precio" => 2.5],
                ["nombre" => "soda", "precio" => 1.0],
                ["Nombre" => "jugo", "precio" => 0.5]],
        ["alimentos"=> ["nombre"=> "churro", "precio"=> 1.25],
                    ["nombre" => "pan", "precio" => 1.5]],
        ["postes"=> ["nombre"=> "chaseecake", "precio" => 3.5],
                    ["nombre" => "flan", "precio" => 2.5]]
        
    ];

    $mostrarDatos = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = $_POST["nombre"];
        $Cantidad = $_POST["cantidad"];
        $producto = $Productos[$_POST["Nombre"]];
        $precio = $producto["precio"];

        $totalpagar = $precio * $Cantidad;
        $mostrarDatos = true;
        $descuento = 0;

        if($totalpagar >= 20){
            $descuento = $totalpagar * 0.05;
            $totalpagar = $descuento -$totalpagar;
        }

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
                        <?php foreach($value as $clave => $valor) : ?>
                            <option value="<?= $clave?>"><?= $valor["nombre"]?> $<?= $valor["precio"]?></option>
                        <?php endforeach?>
                    <?php endforeach?>
                </select>
                <br><br>
                <label for="">cantidad</label>
                <input type="number" name="cantidad">
                <br><br>
                <button>Enviar</button>
    </div>
    <div>
        <?php if($mostrarDatos):?>
            <h2>datos enviados</h2>
            <table border="1">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                        <th>Descuento</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $nombre?></td>
                        <td><?= $producto["nombre"]?></td>
                        <td><?= $Cantidad?></td>
                        <td><?= $precio["precio"]?></td>
                        <td><?= $descuento?></td>
                        <td><?= $totalpagar?></td>
                    </tr>
                </tbody>

            </table>
        <?php endif?>
    </div>
</body>
</html>