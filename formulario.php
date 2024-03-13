<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moneda</title>
</head>
<body>
    <h2>Conversor de Moneda</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="cantidad">Cantidad:</label>
        <input type="number" id="cantidad" name="cantidad" required>
        
        <label for="moneda-entrada">Moneda de entrada:</label>
        <select id="moneda-entrada" name="moneda-entrada">
            <option value="USD">Dólares estadounidenses (USD)</option>
            <option value="EUR">Euros (EUR)</option>
            <option value="GBP">Libras esterlinas (GBP)</option>
        </select>
        
        <label for="moneda-salida">Moneda de salida:</label>
        <select id="moneda-salida" name="moneda-salida">
            <option value="USD">Dólares estadounidenses (USD)</option>
            <option value="EUR">Euros (EUR)</option>
            <option value="GBP">Libras esterlinas (GBP)</option>
        </select>
        
        <input type="submit" name="submit" value="Convertir">
    </form>

    <div id="resultado">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cantidad = $_POST['cantidad'];
        $monedaEntrada = $_POST['moneda-entrada'];
        $monedaSalida = $_POST['moneda-salida'];

        // Definir tasas de conversión (ejemplo)
        $tasas = array(
            'USD' => array('USD' => 1, 'EUR' => 0.83, 'GBP' => 0.73),
            'EUR' => array('USD' => 1.20, 'EUR' => 1, 'GBP' => 0.88),
            'GBP' => array('USD' => 1.37, 'EUR' => 1.13, 'GBP' => 1)
        );

        // Calcular resultado
        $resultado = $cantidad * $tasas[$monedaEntrada][$monedaSalida];

        // Mostrar resultado
        echo $cantidad . ' ' . $monedaEntrada . ' es equivalente a ' . number_format($resultado, 2) . ' ' . $monedaSalida;
    }
    ?>
    </div>
</body>
</html>
