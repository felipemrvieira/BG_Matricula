<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 08/10/2015
 * Time: 18:54
 */
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">

    <?php include_once('includes/include_head.php'); ?>
    <link href="<?php echo base_url() . 'assets/css/ladda-themeless.min.css' ?>" rel="stylesheet"/>

    <style type="text/css">
        .plano .corpo {
            margin: 66px 0 0 -33px;
        }

        .navbar {
            margin-bottom: 0 !important;
        }

    </style>

</head>
<body>

<?php include_once('includes/include_navbar_simples.php'); ?>


<div class="container-fluid">

    <div class="row carregando escondido">
        <div class="col-sm-4 col-sm-offset-4 text-center" style="padding-top: 15px;">
            <i class="fa fa-circle-o-notch fa-5x fa-spin"></i>

            <h3 class="text-center">Carregando Dados</h3>
        </div>
    </div>

    <!-- tela de cadastro: formulario de compra---------------------------------------------------------------------------------------------  -->

    <div class="formulario-cadastro passo-1 contem-cadastro" id="cadastro01">

        <div class="vendas_fase3">

        </div>

        <div style="width: 100%; height: auto; text-align: center; ">

            <div class="vendaCadastroInternoContainer" style="background-color:#ff6d5a;">
                <div
                    style="width:615px;float: left; background-color:#ffffff; margin: -20px auto 0;height: 750px;padding: 10px 10px 10px 35px;">
                    <form action="<?php echo base_url() . 'index.php/ClienteController/cadastrar' ?>" method="post"
                          data-toggle="validator">
                        <div style="float: left;">

                            <div class="form-horizontal">
                                <div class="form-group">
                                    <h5 class="texto" style="color: red">
                                        <?php if (isset($erro) !== false) {
                                            echo $erro;
                                        } ?>
                                    </h5>

                                    <h3 class="texto">Formulário de Cadastro</h3>

                                    <h1 style="margin: 0 auto !important; padding: 0 !important; height: auto;display: inline-block;font-size: 11px; color: #0A88B3;">
                                        Todos os campos são obrigatórios.</h1>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="nome-completo" id="nome-completo"
                                               placeholder="Nome Completo" required
                                               value="<?php if (isset($params['nome']) !== false) {
                                                   echo $params['nome'];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" class="mask-on-div form-control" name="cpf" id="cpf"
                                               placeholder="CPF" required
                                               value="<?php if (isset($params['cpf']) !== false) {
                                                   echo $params['cpf'];
                                               } ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="date form-control" name="nascimento" id="nascimento"
                                               placeholder="Data de Nascimento" required
                                               value="<?php if (isset($params['dataNascimento']) !== false) {
                                                   echo $params['dataNascimento'];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="seu@email.com" required
                                               value="<?php if (isset($params['email']) !== false) {
                                                   echo $params['email'];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <label class="radio-inline">
                                            <input type="radio" class="form-control" name="sexo" id="sexo1" value="m"
                                                   checked="checked"> Masculino
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" class="form-control" name="sexo" id="sexo2" value="f">
                                            Feminino
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" class="phone_with_ddd form-control" name="tel1"
                                               id="telefone1"
                                               placeholder="Telefone fixo" required
                                               value="<?php if (isset($params['telResidencial']) !== false) {
                                                   echo $params['telResidencial'];
                                               } ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="phone_with_ddd form-control" name="tel2"
                                               id="telefone2"
                                               placeholder="Telefone celular" required
                                               value="<?php if (isset($params['telCelular']) !== false) {
                                                   echo $params['telCelular'];
                                               } ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="senha" name="senha"
                                               placeholder="Senha" required
                                               value="<?php if (isset($params['senha']) !== false) {
                                                   echo $params['senha'];
                                               } ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control" id="senha-conf" name="senha-conf"
                                               placeholder="Confirme a Senha" data-match="#senha"
                                               data-match-error="Whoops, as senhas não conferem!" required
                                               value="<?php if (isset($params['senha']) !== false) {
                                                   echo $params['senha'];
                                               } ?>">

                                    </div>
                                    <div>
                                        <span id="passstrength" style="font-size: 11px; color:#0A88B3"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" class="cep form-control" id="cep" name="cep"
                                               placeholder="CEP" value="<?php if (isset($params['cep']) !== false) {
                                            echo $params['cep'];
                                        } ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <button form="form-group" onclick="atualizacep()"
                                                class="btn btn-default ladda-button " data-style="expand-left"
                                                data-size="xs" style="width:100%; height:34px">
                                            <span class="ladda-label">Consultar CEP</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="endereco" id="endereco"
                                               placeholder="Endereço" required
                                               value="<?php if (isset($params['endereco']) !== false) {
                                                   echo $params['endereco'];
                                               } ?>">
                                    </div>

                                </div>

                                <!--aqui fica o cadastro de endereco novo!!!-->
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="bairro" id="bairro"
                                               placeholder="Bairro" required
                                               value="<?php if (isset($params['bairro']) !== false) {
                                                   echo $params['bairro'];
                                               } ?>">
                                    </div>

                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="numeroend" id="numeroend"
                                               placeholder="Número" required
                                               value="<?php if (isset($params['numero']) !== false) {
                                                   echo $params['numero'];
                                               } ?>">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="complemento" id="complemento"
                                               placeholder="Complemento" required
                                               value="<?php if (isset($params['complemento']) !== false) {
                                                   echo $params['complemento'];
                                               } ?>">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div id="msgErro" class="col-sm-9 avisocadastro" style="font-size: 9px; color: red;">

                        </div>

                        <div class="col-sm-9" style="text-align: center;margin-top: 5px">
                            <button type="submit" class="btn btn-primary ladda-button"
                                    data-style="expand-left" data-size="xs"
                                    onclick="if (!verificacampos()) {return false;}">
                                <span class="ladda-label">Continuar</span>
                            </button>
                        </div>

                        <div id="error" class="avisocadastro"
                             style="padding-top: 70px; text-align: right;display: none; font-size: 9px; color: red;"><p>
                                Error! Verifique seu cadastro.</p>
                        </div>
                    </form>
                </div>
                <?php include_once('includes/include_box_plano.php'); ?>
            </div>
        </div>

    </div>
</div>

<nav class="navbar-bottom navbar-default navbar-fixed-bottom">

</nav>

<script src="<?php echo base_url() . 'assets/js/jquery.mask.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/validator.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/spin.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/ladda.min.js' ?>"></script>


<?php include_once('includes/include_scripts.php'); ?>

<script>
    var erroFormulario = false;

    $('#senha').keyup(function (e) {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");
        var passstrength = $('#passstrength');
        if (false == enoughRegex.test($(this).val())) {
            passstrength.html('Senha Insegura.<br/>Adicione caracteres especiais, números ou letras maiúsculas.');
        } else if (strongRegex.test($(this).val())) {
            passstrength.html('Senha válida!');
        } else if (mediumRegex.test($(this).val())) {
            passstrength.className = 'alert';
            passstrength.html('Senha válida!');
        } else {
            passstrength.className = 'error';
            passstrength.html('Senha Inválida.<br/>Adicione caracteres especiais, números ou letras maiúsculas.');
        }
        return true;
    });

    function atualizacep(cep) {
        var cep = document.getElementById('cep').value;
        cep = cep.replace(/\D/g, "");
        url = "http://cep.correiocontrol.com.br/" + cep + ".js";
        s = document.createElement('script');
        s.setAttribute('charset', 'utf-8');
        s.src = url;
        document.querySelector('head').appendChild(s);
        var foco = document.getElementById('numeroend').focus();
    }

    function correiocontrolcep(valor) {
        if (valor.erro) {
            alert('Cep não encontrado');
            return;
        }
        document.getElementById('endereco').value = valor.logradouro;
        document.getElementById('bairro').value = valor.bairro;
        $(".ceploading").addClass("hidden");

        Ladda.stopAll();
    }

    $(document).ready(function () {
        $("input[name*=cpf]").mask('000.000.000-00', {reverse: false});
        $("input[name*=tel]").mask('(00)000000000', {reverse: false});
        $("input[name*=nascimento]").mask('00/00/0000', {reverse: false});
        $("input[name*=cep]").mask('00.000-000');
        $("#cep").focus(
            function (event) {
                $(".ceploading").removeClass("hidden");
            }
        );
        <?php if (isset($_COOKIE['codPlano'])) {
         echo "listandoplanos('".$_COOKIE['chave']."',".$_COOKIE['codEmpresa'].",".$_COOKIE['codPlano'].");\n";
        } else {
        echo "listandoplanos('".$_COOKIE['chave']."',".$_COOKIE['codEmpresa'].",".$codPlano.");\n";
        }?>
    });


    function verificacampos() {
        $('#error p').remove();
        var error = $('#error');
        var msgErro = $('#msgErro');
        var msgApresentar = '';

        var correct = true;
        if ($('#nome-completo').val() == '') {
            msgApresentar += ('<p>Preencha seu nome</p>');
            correct = false;
        }

        if ($('#cpf').val().length != 14) {
            msgApresentar += ('<p>CPF Inválido</p>');
            correct = false;
        }

        if ($('#nascimento').val().length != 10) {
            msgApresentar += ('<p>Preencha a data de Nascimento da forma correta</p>');
            correct = false;
        }

        var email = $('#email').val();
        if ((email == '') || (email.indexOf('@') == -1) || (email.lastIndexOf('.') < email.indexOf('@'))) {
            msgApresentar += ('<p>E-mail inválido</p>');
            correct = false;
        }

        var telefone1 = $('#telefone1');
        if (telefone1.val().length > 13 || telefone1.val().length < 12) {
            msgApresentar += ('<p>Telefone 1 inválido</p>');
            correct = false;
        }

        var telefone2 = $('#telefone2');
        if (telefone2.val().length > 13 || telefone2.val().length < 12) {
            msgApresentar += ('<p>Telefone 2 inválido</p>');
            correct = false;
        }

        if ($('#senha').val() == '') {
            msgApresentar += ('<p>Senha não pode ser vazia</p>');
            correct = false;
        }

        if ($('#cep').val() == '') {
            msgApresentar += ('<p>CEP não pode ser vazio</p>');
            correct = false;
        }

        if ($('#endereco').val() == '') {
            msgApresentar += ('<p>Endereço não pode ser vazio</p>');
            correct = false;
        }

        if ($('#numeroend').val() == '') {
            msgApresentar += ('<p>Número não pode ser vazio</p>');
            correct = false;
        }

        if ($('#bairro').val() == '') {
            msgApresentar += ('<p>Bairro não pode ser vazio</p>');
            correct = false;
        }

        if ($('#complemento').val() == '') {
            msgApresentar += ('<p>Complemento não pode ser vazio</p>');
            correct = false;
        }

        msgErro.html(msgApresentar);
        erroFormulario = !correct;
        return correct;
    }

    /*!
     * Ladda 0.8.0 (2013-09-05, 18:54)
     * http://lab.hakim.se/ladda
     * MIT licensed
     *
     * Copyright (C) 2013 Hakim El Hattab, http://hakim.se
     */
    (function (t, e) {
        "object" == typeof exports ? module.exports = e() : "function" == typeof define && define.amd ? define(["spin"], e) : t.Ladda = e(t.Spinner)
    })(this, function (t) {
        "use strict";
        function e(t) {
            if (t === void 0)return console.warn("Ladda button target must be defined."), void 0;
            t.querySelector(".ladda-label") || (t.innerHTML = '<span class="ladda-label">' + t.innerHTML + "</span>");
            var e = i(t), n = document.createElement("span");
            n.className = "ladda-spinner", t.appendChild(n);
            var r, a = {
                start: function () {
                    return t.setAttribute("disabled", ""), t.setAttribute("data-loading", ""), clearTimeout(r), e.spin(n), this.setProgress(0), this
                }, startAfter: function (t) {
                    return clearTimeout(r), r = setTimeout(function () {
                        a.start()
                    }, t), this
                }, stop: function () {
                    return t.removeAttribute("disabled"), t.removeAttribute("data-loading"), clearTimeout(r), r = setTimeout(function () {
                        e.stop()
                    }, 1e3), this
                }, toggle: function () {
                    return this.isLoading() ? this.stop() : this.start(), this
                }, setProgress: function (e) {
                    e = Math.max(Math.min(e, 1), 0);
                    var n = t.querySelector(".ladda-progress");
                    0 === e && n && n.parentNode ? n.parentNode.removeChild(n) : (n || (n = document.createElement("div"), n.className = "ladda-progress", t.appendChild(n)), n.style.width = (e || 0) * t.offsetWidth + "px")
                }, enable: function () {
                    return this.stop(), this
                }, disable: function () {
                    return this.stop(), t.setAttribute("disabled", ""), this
                }, isLoading: function () {
                    return t.hasAttribute("data-loading")
                }
            };
            return o.push(a), a
        }

        function n(t, n) {
            n = n || {};
            var r = [];
            "string" == typeof t ? r = a(document.querySelectorAll(t)) : "object" == typeof t && "string" == typeof t.nodeName && (r = [t]);
            for (var i = 0, o = r.length; o > i; i++)(function () {
                var t = r[i];
                if ("function" == typeof t.addEventListener) {
                    var a = e(t), o = -1;
                    t.addEventListener("click", function () {
                        a.startAfter(1), "number" == typeof n.timeout && (clearTimeout(o), o = setTimeout(a.stop, n.timeout)), "function" == typeof n.callback && n.callback.apply(null, [a])
                    }, !1)
                }
            })()
        }

        function r() {
            for (var t = 0, e = o.length; e > t; t++)o[t].stop()
        }

        function i(e) {
            var n, r = e.offsetHeight;
            r > 32 && (r *= .8), e.hasAttribute("data-spinner-size") && (r = parseInt(e.getAttribute("data-spinner-size"), 10)), e.hasAttribute("data-spinner-color") && (n = e.getAttribute("data-spinner-color"));
            var i = 12, a = .2 * r, o = .6 * a, s = 7 > a ? 2 : 3;
            return new t({
                color: n || "#fff",
                lines: i,
                radius: a,
                length: o,
                width: s,
                zIndex: "auto",
                top: "auto",
                left: "auto",
                className: ""
            })
        }

        function a(t) {
            for (var e = [], n = 0; t.length > n; n++)e.push(t[n]);
            return e
        }

        var o = [];
        return {bind: n, create: e, stopAll: r}
    });

    Ladda.bind('div:not(.progress-demo) button', {
        callback: function (instance) {
            var interval = setInterval(function () {
                if (erroFormulario == true) {
                    instance.stop();
                    clearInterval(interval);
                }
            }, 200);
        }
    });




</script>
</body>
</html>