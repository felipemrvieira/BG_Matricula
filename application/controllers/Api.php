<?php

/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 07/10/2015
 * Time: 10:17
 */
class Api extends CI_Controller
{

    function index()
    {
        $jsonParam = $_POST["json"];
        $jsonParam = json_decode($jsonParam, true);

        $pkey = $jsonParam['chave'];
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

        try {
            set_time_limit(60);
            $jsonData = array();
            $jsonData = file_get_contents(URL_API . '/' . $controle . '/' . $pkey . '/' . $operacao, true, $context);
            $jsonData = iconv(mb_detect_encoding($jsonData, mb_detect_order(), true), "UTF-8", $jsonData);
            $jsonData = json_decode($jsonData);
        } catch (Exception $e) {
            $erro = explode(' of ', $e->getMessage());
            $jsonData['erro'] = $erro[1];
        }

        echo(json_encode($jsonData));
    }
}