<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Sorteio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1 id="resultado-sorteio">Resultado do Sorteio</h1>
    </header>
    <main>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $min = (int)$_POST['min'];
            $max = (int)$_POST['max'];
            $sorteado = rand($min, $max);
            echo "<h2 id=\"numero-sorteado\">Número Sorteado:</h2>";
            echo "<p>$sorteado</p>";
        }
        ?>
        <a href="javascript:history.back()">Voltar</a>
    </main>
</body>
</html>