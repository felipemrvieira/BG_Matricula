<?php

/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 03/05/14
 * Time: 11:40
 */
class apiModel extends CI_Model
{
    function doRequest($operacao, $controle, $chaveBanco, $parametros)
    {
        $context = stream_context_create(
            array('http' =>
                array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query(
                        $parametros
                    )
                )
            ));


        $jsonData = file_get_contents(URL_API . '/' . $controle . '/' . $chaveBanco . '/' . $operacao, true, $context);
        $jsonData = iconv(mb_detect_encoding($jsonData, mb_detect_order(), true), "UTF-8", $jsonData);
        $jsonData = json_decode($jsonData);

        return json_encode($jsonData);
    }

    public function logarCliente($email, $senha, $loginManual, $qtdContratos)
    {
        $parametros = array(
            'email' => $email,
            'senha' => $senha
        );

        $controle = 'cliente';
        $operacao = 'logar';

        $chaveBanco = $_COOKIE['chave'];

        $this->load->model('apiModel');
        $response = $this->doRequest($operacao, $controle, $chaveBanco, $parametros);
        $response = json_decode($response);

        if (!isset($response->erro)) {
            if ($loginManual == false) {
                $this->input->set_cookie('codCliente', $response->return->codigo, 0);
                $this->input->set_cookie('clienteLogado', json_encode($response->return), 0);
            } else {                
                $this->input->set_cookie('codCliente', $response->return->codigo, 0);
                $this->input->set_cookie('clienteLogado', json_encode($response->return), 0);
            }
        
            if ($qtdContratos > 0) {
                $this->consultarContratos($response->return, $qtdContratos);
            }
        }
        return $response;
    }

    /**
     * @param $qtdContratos
     * @param $response
     */
    public function consultarContratos($response, $qtdContratos)
    {
        $parametros = array(
            'cliente' => $response->codigo,
            'registros' => $qtdContratos
        );

        $controle = 'cliente';
        $operacao = 'consultarContratos';

        $chaveBanco = $_COOKIE['chave'];

        $response->contratos = array();
        $response->contratos = $this->doRequest($operacao, $controle, $chaveBanco, $parametros);
        $response->contratos = json_decode($response->contratos);
    }

    public function consultarConveniosCobranca()
    {
        $parametros = array(
            'empresa' => $_COOKIE['codEmpresa']
        );

        $operacao = 'consultarConvenios';
        $controle = 'negociacao';

        $chaveBanco = $_COOKIE['chave'];

        $convenios = $this->apiModel->doRequest($operacao, $controle, $chaveBanco, $parametros);
        return json_decode($convenios);
    }

    public function consultarAutorizacaoCobranca($response)
    {
        $parametros = array(
            'cliente' => $response->codigo
        );

        $controle = 'cliente';
        $operacao = 'consultarAutorizacaoCobranca';

        $chaveBanco = $_COOKIE['chave'];

        $response->autorizacoes = array();
        $response->autorizacoes = $this->doRequest($operacao, $controle, $chaveBanco, $parametros);
        $response->autorizacoes = json_decode($response->autorizacoes);
    }

    public function prepararInclusaoAutorizacao($clienteLogado, $convenios)
    {
        $response['cliente'] = $clienteLogado;
        $response['convenios'] = $convenios->return;

        $qtdDCC = 0;
        $qtdDCO = 0;
        foreach ($response['convenios'] as $convenio) {
            if ($convenio->tipoConvenio === 'DCC') {
                $qtdDCC = $qtdDCC + 1;
            } else if ($convenio->tipoConvenio === 'DCO') {
                $qtdDCO = $qtdDCO + 1;
            }
        }

        $response['qtdDCC'] = $qtdDCC;
        $response['qtdDCO'] = $qtdDCO;
        $response['apresentarOpcoes'] = ($qtdDCC > 0 && $qtdDCO > 0);
        return $response;
    }

}