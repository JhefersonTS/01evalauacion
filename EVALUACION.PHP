<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda en linea</title>
    <link rel="stylesheet" href="css/estilo.css" />
</head>
<body>
<h1>CALCULA TU COMPRA</h1>
    <div class="contenedor">
        <form id="formulario" method="post" class="formulario">
            <div class="productos">
                <div class="producto">
                    <h3>Producto 1</h3>
                    <label for="precio1">Precio:</label>
                    <input type="number" step="0.01" id="precio1" name="precio1" required><br>
                    <label for="cantidad1">Cantidad:</label>
                    <input type="number" id="cantidad1" name="cantidad1" required><br>
                </div>

                <div class="producto">
                    <h3>Producto 2</h3>
                    <label for="precio2">Precio:</label>
                    <input type="number" step="0.01" id="precio2" name="precio2" required><br>
                    <label for="cantidad2">Cantidad:</label>
                    <input type="number" id="cantidad2" name="cantidad2" required><br>
                </div>

                <div class="producto">
                    <h3>Producto 3</h3>
                    <label for="precio3">Precio:</label>
                    <input type="number" step="0.01" id="precio3" name="precio3" required><br>
                    <label for="cantidad3">Cantidad:</label>
                    <input type="number" id="cantidad3" name="cantidad3" required><br>
                </div>
            </div>

            <div class="acciones">
                <button type="submit" id="calcular" onclick="cambiarBoton()">Calcular</button>
                <button type="button" id="nuevaCompra" style="display: none;" onclick="nuevaCompra()">Nueva Compra</button>
            </div>
        </form>

        <div id="resultado" class="resultado">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Recibe los datos del formulario
                $precio1 = floatval($_POST['precio1']);
                $cantidad1 = intval($_POST['cantidad1']);
                
                $precio2 = floatval($_POST['precio2']);
                $cantidad2 = intval($_POST['cantidad2']);
                
                $precio3 = floatval($_POST['precio3']);
                $cantidad3 = intval($_POST['cantidad3']);

                // Calcular el subtotal
                $subtotal = ($precio1 * $cantidad1) + ($precio2 * $cantidad2) + ($precio3 * $cantidad3);

                // Calcular el impuesto (10%)
                $impuesto = $subtotal * 0.10;

                // Calcular el descuento (5%)
                $descuento = $subtotal * 0.05;

                // Calcular el total
                $total = $subtotal + $impuesto - $descuento;

                // Mostrar los resultados
                echo "<h2>Resumen de la compra:</h2>";
                echo "<p>Subtotal: $" . number_format($subtotal, 2) . "</p>";
                echo "<p>Impuesto (10%): $" . number_format($impuesto, 2) . "</p>";
                echo "<p>Descuento (5%): -$" . number_format($descuento, 2) . "</p>";
                echo "<p><strong>Total Final: $" . number_format($total, 2) . "</strong></p>";
            }
            ?>
        </div>
    </div>
</body>
</body>
</html>