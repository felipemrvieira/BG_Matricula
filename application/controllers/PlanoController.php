<?php

/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 01/05/14
 * Time: 14:37
 */
class PlanoController extends CI_Controller
{
    public function index()
    {
        $this->load->view('planos');
    }

    public function show()
    {
        $this->input->set_cookie('codEmpresa', $_POST['codEmpresa'], 0);
        $this->input->set_cookie('chave', $_POST['chave'], 0);
        delete_cookie('codPlano');

        $data['codEmpresa'] = $_POST['codEmpresa'];
        $data['chave'] = $_POST['chave'];
        $this->load->view('planos', $data);
    }

    public function voltar()
    {
        $data['codEmpresa'] = $_COOKIE['codEmpresa'];
        $data['chave'] = $_COOKIE['chave'];
        $this->load->view('planos', $data);
    }

}