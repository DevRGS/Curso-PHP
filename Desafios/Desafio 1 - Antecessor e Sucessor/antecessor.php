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