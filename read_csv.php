<?php


// Script para realizar conversão de csv para JSON

// Realiza leitura do arquivo 
echo "Lendo arquivo CSV".PHP_EOL;
$feed = "population_by_country.csv"; // Associando o nome do arquivo em uma variavel.
$data = array_map('str_getcsv', file($feed)); // Converter as linhas do CSV em Array.

array_walk($data, function(&$a) use ($data) {
    $a = array_combine($data[0], $a);
  });
array_shift($data); # remove o primeiro array do arquivo no nosso caso $data[0] que as chaves
echo "Criando e Escrevendo .JSON".PHP_EOL;

$file_open = fopen('population_by_country.json', 'w');
fwrite($file_open, json_encode($data, JSON_PRETTY_PRINT));


fclose($file_open);


echo "Processo Finalizado".PHP_EOL;