<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado</h1>
    </header>
    
    <main>
        <?php
        if (isset($_GET['number'])) {
            $number = (int)$_GET['number'];
            $antecessor = $number - 1;
            $sucessor = $number + 1;
            echo "<h2>Resultados:</h2>";
            echo "<p>Antecessor: $antecessor</p>";
            echo "<p>Sucessor: $sucessor</p>";
        }
        ?>
        <a href="javascript:history.back()">Voltar</a>
    </main>
    
</body>
</html>