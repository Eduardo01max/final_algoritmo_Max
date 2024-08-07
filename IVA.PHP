<!DOCTYPE html>  
<html lang="es">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Calculadora de IVA</title>  
</head>  
<body>  
    <h1>Calculadora de IVA</h1>  
    <form method="post" action="">  
        <label for="monto">Monto de la factura (en €): </label>  
        <input type="number" id="monto" name="monto" step="0.01" required>  
        <br><br>  
        <label for="iva">Tasa de IVA (en %): </label>  
        <input type="number" id="iva" name="iva" step="0.01" required>  
        <br><br>  
        <input type="submit" value="Calcular">  
    </form>  

    <?php  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
        // Obtener los datos del formulario  
        $monto = $_POST['monto'];  
        $iva = $_POST['iva'];  

        // Validar que el monto y la tasa sean números válidos y positivos  
        if (is_numeric($monto) && is_numeric($iva) && $monto > 0 && $iva >= 0) {  
            // Calcular el monto del IVA y el monto total  
            $montoIVA = $monto * ($iva / 100);  
            $montoTotal = $monto + $montoIVA;  

            // Mostrar el resultado  
            echo "<h2>Resultados:</h2>";  
            echo "Monto de la factura: €" . number_format($monto, 2) . "<br>";  
            echo "IVA: €" . number_format($montoIVA, 2) . "<br>";  
            echo "Monto total: €" . number_format($montoTotal, 2) . "<br>";  
        } else {  
            echo "<h2 style='color:red;'>Por favor, ingresa valores válidos y positivos.</h2>";  
        }  
    }  
    ?>  
</body>  
</html>  