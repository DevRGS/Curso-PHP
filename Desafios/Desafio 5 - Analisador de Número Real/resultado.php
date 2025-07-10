<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Analisador</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
    <h1>Resultado do Analisador de Número Real</h1>
</header>
<main>
    
    <?php
    // Recebe o número informado e troca vírgula por ponto
    $numero = str_replace(',', '.', $_POST['numero']);
    $numero = floatval($numero);
    
    $parte_inteira = intval($numero);
    $parte_fracionaria = $numero - $parte_inteira;
    $parte_fracionaria = abs($parte_fracionaria); // Garante valor positivo
    
    echo "<ul>";
    echo "<li><strong>Parte inteira:</strong> $parte_inteira</li>";
    echo "<li><strong>Parte fracionária:</strong> $parte_fracionaria</li>";
    echo "</ul>";
    ?>
    <p><a href="index.html">Voltar</a></p>
</main>
<body>
    
</body>
</html>
