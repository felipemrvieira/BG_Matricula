<?php

/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 01/05/14
 * Time: 14:37
 */
class NegociacaoController extends CI_Controller
{
    public function index()
    {
        redirect(base_url());
    }

    public function finalizarNegociacao()
    {
        set_time_limit(60);
        $this->load->model('apiModel');
        $chaveBanco = $_COOKIE['chave'];

        $cadastrarConvenio = isset($_POST['cadastrarConvenio']) && $_POST['cadastrarConvenio'] === true;

        $autorizacaoCadastrada = false;
        if (isset($_COOKIE['autorizacaoCadastrada'])) {
            $autorizacaoCadastrada = $_COOKIE['autorizacaoCadastrada'];
        }

        $vendaConcluida = false;
        if (isset($_COOKIE['vendaConcluida'])) {
            $vendaConcluida = $_COOKIE['vendaConcluida'];
        }

        if ($autorizacaoCadastrada == null || $autorizacaoCadastrada === false || $cadastrarConvenio === true) {
            if (isset($_POST['tipoConvenio']) && $_POST['tipoConvenio'] === 'DCC') {
                $autorizacaoCadastrada = $this->incluirAutorizacaoCobrancaDCC($chaveBanco);
            } else if (isset($_POST['tipoConvenio']) && $_POST['tipoConvenio'] === 'DCO') {
                $autorizacaoCadastrada = $this->incluirAutorizacaoCobrancaDCO($chaveBanco);
            } else {
                $convenios = $this->apiModel->consultarConveniosCobranca();
                $clienteLogado = json_decode($_COOKIE['clienteLogado']);
                $response = $this->apiModel->prepararInclusaoAutorizacao($clienteLogado, $convenios);

                $this->load->view('novoCadastroAutorizacaoCobranca', $response);
            }
        }

        if (($autorizacaoCadastrada == true || $autorizacaoCadastrada === 1) && $vendaConcluida == false) {
            $parametros = array(
                'plano' => $_COOKIE['codPlano'],
                'cliente' => $_COOKIE['codCliente']
            );

            $controle = 'negociacao';
            $operacao = 'gravarContrato';

            $response = $this->apiModel->doRequest($operacao, $controle, $chaveBanco, $parametros);
            $response = json_decode($response);

            $data = array();
            if (isset($response->erro) && strpos($response->erro, 'ERRO') !== false) {
                $data['erro'] = $response->erro;
                $data['params'] = $parametros;
                $data['vendaConcluida'] = false;
                $vendaConcluida = false;
                $this->input->set_cookie('vendaConcluida', false, 0);
            } else {
                $data['vendaConcluida'] = true;
                $vendaConcluida = true;
                $this->input->set_cookie('vendaConcluida', true, 0);
                delete_cookie('codPlano');
            }
        }

        if ($vendaConcluida == true) {
            $responseCliente = json_decode($_COOKIE['clienteLogado']);

            $this->apiModel->consultarContratos($responseCliente, 3);

            if (isset($_COOKIE['vendaConcluida'])) {
                $responseCliente->vendaConcluida = $_COOKIE['vendaConcluida'];
            } else if (isset($data['vendaConcluida'])) {
                $responseCliente->vendaConcluida = $data['vendaConcluida'];
            }
            $data['return'] = $responseCliente;
            $this->load->view('telaCliente', $data['return']);
        }
    }

    public function incluirAutorizacaoCobrancaDCC($chaveBanco)
    {
        $autorizacaoCadastrada = false;
        $parametros = array(
            'cliente' => $_COOKIE['codCliente'],
            'operadoraCartao' => str_replace(" ", "", $_POST['nome-cartao']),
            'numeroCartao' => str_replace(" ", "", $_POST['number']),
            'validadeCartao' => str_replace(" ", "", $_POST['expiry']),
            'convenioCobranca' => $_POST['codConvenio']
        );

        $controle = 'negociacao';
        $operacao = 'incluirAutorizacaoCobranca';

        $response = $this->apiModel->doRequest($operacao, $controle, $chaveBanco, $parametros);
        $response = json_decode($response);

        if (isset($response->erro) && strpos($response->erro, 'ERRO') !== false) {
            $convenios = $this->apiModel->consultarConveniosCobranca();
            $clienteLogado = json_decode($_COOKIE['clienteLogado']);

            $resposta = $this->apiModel->prepararInclusaoAutorizacao($clienteLogado, $convenios);
            $resposta['erro'] = $response->erro;
            $resposta['params'] = $parametros;

            $this->load->view('novoCadastroAutorizacaoCobranca', $resposta);
        } else {
            $this->input->set_cookie('autorizacaoCadastrada', true, 0);
            $autorizacaoCadastrada = true;
        }
        return $autorizacaoCadastrada;
    }

    public function incluirAutorizacaoCobrancaDCO($chaveBanco)
    {
        $autorizacaoCadastrada = false;
        $parametros = array(
            'cliente' => $_COOKIE['codCliente'],
            'agencia' => str_replace(" ", "", $_POST['agencia']),
            'contaCorrente' => str_replace(" ", "", $_POST['contacorrente']),
            'codigoOperacao' => str_replace(" ", "", $_POST['operacao']),
            'banco' => str_replace(" ", "", $_POST['codBanco']),
            'convenioCobranca' => $_POST['codConvenio']
        );

        $controle = 'negociacao';
        $operacao = 'incluirAutorizacaoCobrancaDCO';

        $response = $this->apiModel->doRequest($operacao, $controle, $chaveBanco, $parametros);
        $response = json_decode($response);

        if (isset($response->erro) && strpos($response->erro, 'ERRO') !== false) {
            $convenios = $this->apiModel->consultarConveniosCobranca();
            $clienteLogado = json_decode($_COOKIE['clienteLogado']);

            $resposta = $this->apiModel->prepararInclusaoAutorizacao($clienteLogado, $convenios);
            $resposta['erro'] = $response->erro;
            $resposta['params'] = $parametros;

            $this->load->view('novoCadastroAutorizacaoCobranca', $resposta);
        } else {
            $this->input->set_cookie('autorizacaoCadastrada', true, 0);
            $autorizacaoCadastrada = true;
        }
        return $autorizacaoCadastrada;
    }

}