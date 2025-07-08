<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Básico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Resultado do Processamento</h1>
    </header>
    <main>
        <?php 
            $nome= $_GET["nome"];
            $sobrenome= $_GET["sobrenome"];

            echo "<p> É um prazer te conhecer $nome $sobrenome ! este é o meu site <\p> ";
        ?>
    </main>
</body>
</html>