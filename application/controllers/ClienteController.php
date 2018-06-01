<?php

/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 01/05/14
 * Time: 14:37
 */
class ClienteController extends CI_Controller
{
    public function index()
    {
        redirect(base_url());
    }

    public function logar()
    {
        $data['codEmpresa'] = $_COOKIE['codEmpresa'];
        $data['chave'] = $_COOKIE['chave'];
        $this->load->view('login', $data);
    }

    public function contratar()
    {
        $this->input->set_cookie('codPlano', $_POST['codPlano'], 0);
        delete_cookie('autorizacaoCadastrada');
        delete_cookie('vendaConcluida');
        if (PRE_VENDA) {
            $this->novoComCodigo($_POST['codPlano']);
        } else {
            $data['codPlano'] = $_POST['codPlano'];
            $data['codEmpresa'] = $_COOKIE['codEmpresa'];
            $data['chave'] = $_COOKIE['chave'];
            $this->load->view('login', $data);
        }
    }

    public function show()
    {
        if (isset($_COOKIE['chave']) == false) {
            echo 'Sua sessão expirou!';
            redirect(base_url());
        } else {
            $this->load->model('apiModel');
            $response = $this->apiModel->logarCliente($_POST['emaillog'], $_POST['senhalog'], true, 3);
            if (isset($response->erro)) {
                delete_cookie('clienteLogado');
                $this->load->view('login', $response);
            } else {
                $this->apiModel->consultarAutorizacaoCobranca($response->return);
                $this->input->set_cookie('autorizacaoCadastrada', sizeof($response->return->autorizacoes->return) > 0, 0);

                $this->load->view('telaCliente', $response->return);
            }
        }
    }

    public function novo()
    {
        delete_cookie('clienteCadastrado');
        delete_cookie('autorizacaoCadastrada');
        $this->load->view('novoCadastroCliente');
    }

    public function novoComCodigo($codPlano)
    {
        delete_cookie('clienteCadastrado');
        delete_cookie('autorizacaoCadastrada');

        $data['codPlano'] = $codPlano;
        $this->load->view('novoCadastroCliente', $data);
    }


    public function cadastrar()
    {
        $this->load->model('apiModel');

        $chaveBanco = $_COOKIE['chave'];

        $clienteCadastrado = (isset($_COOKIE['clienteCadastrado']));
        $ocorreuErro = false;

        if ($clienteCadastrado == null || $clienteCadastrado === false) {

            $operacao = 'cadastrarCliente';
            $controle = 'cliente';

            $parametros = array(
                'nome' => $_POST['nome-completo'],
                'cpf' => $_POST['cpf'],
                'email' => $_POST['email'],
                'sexo' => $_POST['sexo'],
                'dataNascimento' => $_POST['nascimento'],
                'endereco' => $_POST['endereco'],
                'complemento' => $_POST['complemento'],
                'numero' => $_POST['numeroend'],
                'bairro' => $_POST['bairro'],
                'cep' => $_POST['cep'],
                'telResidencial' => $_POST['tel1'],
                'telCelular' => $_POST['tel2'],
                'senha' => $_POST['senha'],
                'empresa' => $_COOKIE['codEmpresa']
            );


            $response = $this->apiModel->doRequest($operacao, $controle, $chaveBanco, $parametros);
            $response = json_decode($response);

            if (isset($response->erro) && strpos($response->erro, 'ERRO') !== false) {
                $data['erro'] = $response->erro;
                $data['params'] = $parametros;
                $this->load->view('novoCadastroCliente', $data);
                $ocorreuErro = true;
            } else {
                $this->input->set_cookie('clienteCadastrado', true, 0);
            }
        }

        if ($ocorreuErro === false) {
            $clienteLogado = $this->apiModel->logarCliente($_POST['email'], $_POST['senha'], false, 0);

            $convenios = $this->apiModel->consultarConveniosCobranca();
            $response = $this->apiModel->prepararInclusaoAutorizacao($clienteLogado->return, $convenios);

            $this->load->view('novoCadastroAutorizacaoCobranca', $response);
        }
    }
}