<?php

require '../autoloader.php';

use OpenBoleto\Banco\Sicoob;
use OpenBoleto\Agente;

$sacado = new Agente('Fernando Maia', '023.434.234-34', 'ABC 302 Bloco N', '72000-000', 'Brasília', 'DF');
$cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');

$boleto = new Sicoob(array(
    // Parâmetros obrigatórios
    'dataVencimento' => new DateTime('2015-10-06'),
    'valor' => 3.00,
    'sacado' => $sacado,
    'cedente' => $cedente,
    'agencia' => 4480, // Até 4 dígitos
    'carteira' => '1', // 1, 2 e 3
    'modalidade' => '02', // 01, 02 e 05
    'conta' => 28037, // Até 10 dígitos
    'convenio' => 12345, // Até 5 dígitos
    'sequencial' => '2002', // Até 10 dígitos

    // Parâmetros recomendáveis
    //'logoPath' => 'http://empresa.com.br/logo.jpg', // Logo da sua empresa
    // 'contaDv' => 2,
    // 'agenciaDv' => 1,
    'descricaoDemonstrativo' => array( // Até 5
        'Compra de materiais cosméticos',
        'Compra de alicate',
    ),
    'instrucoes' => array( // Até 8
        'Após o dia 30/11 cobrar 2% de mora e 1% de juros ao dia.',
        'Não receber após o vencimento.',
    ),

    // Parâmetros opcionais
    //'resourcePath' => '../resources',
    //'moeda' => BancoDoBrasil::MOEDA_REAL,
    //'dataDocumento' => new DateTime(),
    //'dataProcessamento' => new DateTime(),
    //'contraApresentacao' => true,
    //'pagamentoMinimo' => 23.00,
    //'aceite' => 'N',
    //'especieDoc' => 'ABC',
    //'numeroDocumento' => '123.456.789',
    //'usoBanco' => 'Uso banco',
    //'layout' => 'layout.phtml',
    //'logoPath' => 'http://boletophp.com.br/img/opensource-55x48-t.png',
    //'sacadorAvalista' => new Agente('Antônio da Silva', '02.123.123/0001-11'),
    //'descontosAbatimentos' => 123.12,
    //'moraMulta' => 123.12,
    //'outrasDeducoes' => 123.12,
    //'outrosAcrescimos' => 123.12,
    //'valorCobrado' => 123.12,
    //'valorUnitario' => 123.12,
    //'quantidade' => 1,
));

echo $boleto->getOutput();
