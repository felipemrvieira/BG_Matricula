<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 28/06/2015
 * Time: 12:01
 */

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json; charset=utf-8');

set_time_limit(120);

$pkey = "VendasOnline";
$urlIntegracao = URL_API;

$jsonParam = $_POST["json"];
$jsonParam = json_decode($jsonParam, true);


$operacao = $jsonParam['operacao'];
$controle = $jsonParam['controle'];
$parametros = $jsonParam['parametros'];
$parametrosSubmit = array();


$posicoes = array_keys($parametros);
foreach ($posicoes as $posicao) {
    $chaves = array_keys($parametros[$posicao]);
    foreach ($chaves as $chave) {
        $parametrosSubmit[$chave] = $parametros[$posicao][$chave];
    }
}

$context = stream_context_create(
    array('http' =>
        array(
            'method' => 'POST',
            'header' => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query(
                $parametrosSubmit
            )
        )
    ));


$jsonData = file_get_contents($urlIntegracao . '/' . $controle . '/' . $pkey . '/' . $operacao, true, $context);
$jsonData = iconv(mb_detect_encoding($jsonData, mb_detect_order(), true), "UTF-8", $jsonData);
$jsonData = json_decode($jsonData);
//$jsonData = $jsonData->return;

echo(json_encode($jsonData));