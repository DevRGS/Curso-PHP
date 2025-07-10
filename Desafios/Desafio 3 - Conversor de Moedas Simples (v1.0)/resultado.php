<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Conversor de Moedas</h1>
    </header>
    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $valor = (float)$_POST['valor'];
            $moeda = $_POST['moeda'];
            $taxas = [
                "dolar" => 5.25,
                "euro" => 5.80,
                "libra" => 6.50
            ];
            if (array_key_exists($moeda, $taxas)) {
                $resultado = $valor / $taxas[$moeda];
                echo "<h2>Resultado da Conversão:</h2>";
                echo "<p>$valor Reais = $resultado $moeda</p>";
            } else {
                echo "<p>Moeda não suportada.</p>";
            }
        }
        ?>
        <a href="javascript:history.back()">Voltar</a>
    </main>
</body>
</html>