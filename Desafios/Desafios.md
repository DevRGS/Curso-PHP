# Desafios de PHP Moderno - Módulo 1

Este arquivo contém os 5 desafios propostos para praticar os conceitos iniciais de PHP moderno.

---

## Desafio 01: Antecessor e Sucessor

* **🎯 Objetivo:** Criar um programa que leia um número inteiro e mostre na tela o seu sucessor e seu antecessor.
* **⚙️ Funcionalidades:**
    1.  Um formulário simples que pede um número ao usuário.
    2.  Um botão "Calcular".
    3.  Ao clicar no botão, o programa deve processar o número e exibir uma mensagem como: "O número escolhido foi **X**, o seu antecessor é **Y** e o seu sucessor é **Z**".
* **💡 Dica:** Este é o desafio mais simples, ideal para treinar a passagem de dados de um formulário para o PHP e realizar operações aritméticas básicas (`+1` e `-1`).

---

## Desafio 02: Sorteador de Números

* **🎯 Objetivo:** Desenvolver um gerador de números aleatórios.
* **⚙️ Funcionalidades:**
    1.  A página deve exibir um título como "Trabalhando com números aleatórios".
    2.  Abaixo, deve haver um botão "Gerar outro".
    3.  Cada vez que o botão for clicado (ou a página for recarregada), o programa deve gerar e exibir um novo número aleatório entre 0 e 100.
* **💡 Dica:** Pesquise sobre as funções `rand()` e `mt_rand()` do PHP. O professor indica que existem várias maneiras de fazer isso e que a pesquisa faz parte do desafio.

---

## Desafio 03: Conversor de Moedas Simples (v1.0)

* **🎯 Objetivo:** Criar um conversor de moedas que transforme Reais (R$) em Dólares (US$).
* **⚙️ Funcionalidades:**
    1.  Um formulário onde o usuário pode digitar um valor em Reais (ex: `150,75`).
    2.  Ao submeter, o PHP deve calcular o valor correspondente em dólares.
    3.  Exibir o resultado de forma clara, por exemplo: "Seus R$ 150,75 equivalem a US$ 28,99".
* **💡 Dica:** Para este desafio, utilize uma **cotação fixa** para o dólar. Pesquise o valor atual do dólar no Google e insira-o diretamente no seu código como uma constante ou variável.

---

## Desafio 04: Conversor de Moedas com API (v2.0)

* **🎯 Objetivo:** Evoluir o conversor anterior para buscar a cotação do dólar em tempo real de uma fonte externa.
* **⚙️ Funcionalidades:**
    1.  O sistema deve se conectar à **API do Banco Central do Brasil** para obter a cotação do dia.
    2.  O usuário informa o valor em Reais.
    3.  O programa utiliza a cotação obtida pela API para realizar a conversão e exibir o resultado.
* **💡 Dica:** Este é o desafio mais complexo. Você precisará pesquisar sobre:
    * Como consumir APIs em PHP (a função `file_get_contents` pode ser um ponto de partida).
    * Como decodificar dados em formato JSON (função `json_decode`).
    * O endereço (endpoint) correto da API de cotações do Banco Central. O professor menciona o vídeo em que ele mostra como fazer isso.

---

## Desafio 05: Analisador de Número Real

* **🎯 Objetivo:** Criar um programa que receba um número real e separe-o em sua parte inteira e sua parte fracionária.
* **⚙️ Funcionalidades:**
    1.  O usuário informa um número real (com vírgula ou ponto, ex: `7469.254`).
    2.  O programa deve analisar o número e exibir:
        * A parte inteira do número.
        * A parte fracionária (decimal) do número.
    3.  O resultado deve ser formatado em uma lista HTML (`<ul>` e `<li>`).
* **💡 Dica:** Pesquise sobre funções de manipulação de números em PHP, como `intval()`, `floor()`, e `fmod()`, ou pense em como você pode usar type casting e aritmética para separar as duas partes.