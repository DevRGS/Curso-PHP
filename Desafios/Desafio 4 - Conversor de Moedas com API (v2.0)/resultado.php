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
    $moeda_selecionada = $_POST['moeda'] ?? 'dolar';

    $moedas = [
        'dolar' => [
            'tipo' => 'direta',
            'nome' => 'dólar',
            'simbolo' => 'US$',
            'api' => "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial='%s',dataFinalCotacao='%s')?%%24top=1&%%24orderby=dataHoraCotacao%%20desc&%%24format=json",
        ],
        'euro' => [
            'tipo' => 'indireta',
            'nome' => 'euro',
            'simbolo' => '€',
            'simbolo_api' => 'EUR',
            'api' => "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaPeriodo(moeda=@moeda,dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@moeda='%s'&@dataInicial='%s'&@dataFinalCotacao='%s'&%%24top=1&%%24orderby=dataHoraCotacao%%20desc&%%24format=json",
        ],
        'libra' => [
            'tipo' => 'indireta',
            'nome' => 'libra esterlina',
            'simbolo' => '£',
            'simbolo_api' => 'GBP',
            'api' => "https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoMoedaPeriodo(moeda=@moeda,dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@moeda='%s'&@dataInicial='%s'&@dataFinalCotacao='%s'&%%24top=1&%%24orderby=dataHoraCotacao%%20desc&%%24format=json",
        ]
    ];

    $info = $moedas[$moeda_selecionada];
    
    $fim = date("m-d-Y", strtotime("-1 day"));
    $inicio = date("m-d-Y", strtotime("-8 days"));

    // Função auxiliar para fazer requisições cURL
    function fazerRequisicaoApi($url) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $dados = curl_exec($curl);
        curl_close($curl);
        return json_decode($dados, true);
    }

    $cotacao = 0; // Inicializa a variável de cotação

    if ($info['tipo'] === 'direta') {
        // --- LÓGICA PARA DÓLAR (1 CHAMADA) ---
        $url = sprintf($info['api'], $inicio, $fim);
        $json = fazerRequisicaoApi($url);
        if (isset($json["value"][0]['cotacaoCompra'])) {
            $cotacao = $json["value"][0]['cotacaoCompra'];
        }
    } else { // --- LÓGICA PARA EURO/LIBRA (2 CHAMADAS) ---
        // CHAMADA 1: Obter a paridade da moeda vs Dólar
        $url_moeda = sprintf($info['api'], $info['simbolo_api'], $inicio, $fim);
        $json_moeda = fazerRequisicaoApi($url_moeda);
        
        // CHAMADA 2: Obter a cotação do Dólar vs Real
        $url_dolar = sprintf($moedas['dolar']['api'], $inicio, $fim);
        $json_dolar = fazerRequisicaoApi($url_dolar);

        // Se ambas as chamadas foram bem-sucedidas, calcula a cotação final
        if (isset($json_moeda["value"][0]['paridadeCompra']) && isset($json_dolar["value"][0]['cotacaoCompra'])) {
            $paridade = $json_moeda["value"][0]['paridadeCompra'];
            $cotacao_dolar = $json_dolar["value"][0]['cotacaoCompra'];
            $cotacao = $paridade * $cotacao_dolar;
        }
    }
    
    // Se a cotação foi calculada com sucesso, mostra o resultado
    if ($cotacao > 0) {
        $resultado = $valor / $cotacao;
        echo "<h2>Resultado da Conversão:</h2>";
        echo "<p>" . number_format($valor, 2, ',', '.') . " BRL = <strong>{$info['simbolo']} " . number_format($resultado, 2, ',', '.') . "</strong></p>";
        echo "<p><small>Cotação do dia " . date("d/m/Y", strtotime($fim)) . " obtida do Banco Central: R$ " . number_format($cotacao, 4, ',', '.') . "</small></p>";
    } else {
        echo "<p>Não foi possível obter a cotação da moeda selecionada. A API pode não ter cotações para o período solicitado (feriados, fins de semana).</p>";
    }
}
?>
        <a href="javascript:history.back()">Voltar</a>
    </main>
</body>
</html>
