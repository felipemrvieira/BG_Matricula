<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 07/10/2015
 * Time: 11:18
 */
?>
<!DOCTYPE html>
<html>
<head lang="pt-br">
    <?php include_once('includes/include_head.php'); ?>

    <style type="text/css">
        .containerprod {
            width: 840px;
            position: absolute;
            overflow-y: scroll;
            height: 203px;
        }

        .containerprod tr {
            width: 100%;
        }

        .containerprod td:nth-child(1) {
            width: 5% !important;
            text-align: left !important;
        }

        .containerprod td:nth-child(2) {
            width: 5% !important;
            text-align: left !important;
        }

        .containerprod td:nth-child(3) {
            width: 5% !important;
            text-align: left !important;
        }

        .containerprod td:nth-child(4) {
            width: 5% !important;
            text-align: center !important;
        }

        .containerprod td:nth-child(5) {
            width: 5% !important;
            text-align: center !important;
        }

        .containerprod td:nth-child(6) {
            width: 5% !important;
            text-align: right !important;
        }

        .containerprod td:nth-child(7) {
            width: 5% !important;
            text-align: right !important;
        }

        .plano .corpo {
            margin: 90px 0 0 -70px;
        }

        .modal-login {
            float: none;
            margin: 0 auto;
            border-radius: 15px;
            padding: 17px 15px 0 15px;
            background-color: #ffffff;
            box-sizing: 5px;
          
            width: 527px;
        }

        .input-modal-login {
            background-color: #f6f1f1;
            margin-left: -15px;
            margin-top: 30px;
            padding: 19px 20px 25px 20px !important;
            width: 527px;
            display: block;
        }

        .botao-modal-login {
            background-color: #F7961F;
            border-color: white;
            height: 26px;
            font-size: 12px;
            padding: 3px 31px 22px!important;
        }
        
         .botao-modal-login:hover {
            background-color: #E67312;
            border-color: white;
            height: 26px;
            font-size: 12px;
            padding: 3px 31px 22px!important;
        }

        .loginInvalido {
            border-color: #ffcc00;
            background: #ffcc00;
            color: #a76400;
        }

        .erroLogin {
            border-color: #B63E5A;
            background: #E24542;
            color: #fff;
        }
    </style>

</head>
<body>
<?php include_once('includes/include_navbar_simples.php'); ?>

<!-- tela de login: modal simples--------------------------------------------------------------------------------------- -->
<!-- info: para vizualizar esse conteudo, retire a classe css "escondido"-------------------------------------------- -->
 </br>
    <div class="row sucesso passo-2bb modali escondido">
    <?php
    $classeCss = '';
    if (isset($erro) && strpos($erro, 'Inválido') !== false) {
        $classeCss = 'loginInvalido';
    } else if (isset($erro)) {
        $classeCss = 'erroLogin';
    }
    echo '<div class="form-group col-sm-4 modal-login ' . $classeCss . '" style="height: 270px;">';
    ?>
    <fieldset>
       

        <!-- Form Name -->
        <?php if (isset($erro)) {
            echo '<p class="pull-left" style="padding: 6px 0 0 9px;">' . $erro . '</p>';
        } else {
            echo '<p class="pull-left" style="padding: 6px 0 0 9px;">Login</p>';
        } ?>
        <a class="pull-right"
           href="<?php echo base_url() . 'index.php/PlanoController/voltar' ?>"
           style="cursor: pointer; padding: 0 4px 0 0; margin-top: -6px; color: #101010;">
            <i class="fa fa-times-circle fa-2x"></i>
        </a>

        <form class="form-horizontal" id="form-logar" name="form-logar"
              action="<?php echo base_url() . 'index.php/ClienteController/show' ?>" method="post">
            <!-- Text input-->
            <div class="input-modal-login">
                <div class="control-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="emaillog" id="emaillog"
                                   placeholder="E-mail">
                        </div>
                    </div>
                </div>

                <!-- Password input-->
                <div class="control-group">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" class="form-control" name="senhalog" id="senhalog"
                                   placeholder="Senha">
                        </div>
                    </div>
                </div>

                <div class="control-group">

                    <div class="pull-left">
                        <a style="cursor: pointer" onclick="enviarSenha(); return false;">Esqueceu ou não possui
                            senha?</a>
                    </div>

                    <div class="pull-right">
                        <input type="submit" id="singlebutton" name="singlebutton" style="margin-top: -10px"
                               class="btn btn-primary botao-modal-login" value="Entrar">
                    </div>
                </div>
            </div>
        </form>
        <!-- Button -->
        <div style="clear: both;margin: 0 auto; width: 487px;">
            <div class="control-group text-center" style="padding: 20px 0 0 0;">
                <p>Ainda não é um aluno?</p>
            </div>
            <div class="control-group text-center">
                <form class="form-horizontal" id="form-cadastrar" name="form-logar"
                      action="<?php echo base_url() . 'index.php/ClienteController/novo' ?>" method="post">
                    <button type="submit" class="btn btn-primary botao-modal-login">
                        Cadastre-se
                    </button>
                </form>
            </div>
        </div>
    </fieldset>

    <?php
    echo '</div>'
    ?>

</div>

<!-- tela de envio de senha: modal simples--------------------------------------------------------------------------- -->
<!-- info: para vizualizar esse conteudo, retire a classe css "escondido"-------------------------------------------- -->

<div class="row sucesso passo-2bb lembrar-senha escondido">
    <div class="form-group col-sm-4 modal-login" style="height: 195px">
        <form class="form-horizontal" id="form-logar" name="form-logar">
            <fieldset>
                <!-- Form Name -->
                <p class="pull-left" style="padding: 6px 0 0 9px;">Digite seu e-mail abaixo: Sua senha será enviada em
                    instantes! </p>
                <a class="pull-right"
                   href=" <?php echo base_url() . 'index.php/PlanoController/voltar' ?>"
                   style="cursor: pointer; padding: 0 4px 0 0; margin-top: -6px; color: #101010;">
                    <i class="fa fa-times-circle fa-2x"></i>
                </a>

                <!-- Text input-->
                <div class="input-modal-login">
                    <div class="control-group">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form-control" name="email-lembrar" id="email-lembrar"
                                       placeholder="E-mail">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button -->
                <div class="control-group pull-left" style="padding: 20px 15px 0px 0px;">
                    <p>Ainda não é um aluno? <a href="novocadastro.html">Cadastre-se</a></p>
                </div>
                <div class="control-group pull-right">
                    <label class="control-label" for="singlebutton"></label>

                    <div class="controls">
                        <button id="singlebutton" name="singlebutton" class="btn btn-primary botao-modal-login"
                                onclick="lembrasenha(); return false;">
                            Enviar
                        </button>
                    </div>
                </div>

            </fieldset>
        </form>
    </div>


</div>

<nav class="navbar-bottom navbar-default navbar-fixed-bottom">

</nav>

<?php include_once('includes/include_scripts.php'); ?>


<script>
var mensagemerro = 'Login Inválido! Tente Novamente!';

$(document).ready(function () {
    $(".modali").removeClass("escondido");
    $(".contem-cliente-pergunta").addClass("escondido");
});

function lembrasenha() {
    var emaillembrar = $('#email-lembrar').val();
    var paramsRequest = {
        "controle": "cliente",
        "operacao": "recuperarUsuarioMovel",
        "chave": "<?php echo $_COOKIE['chave']?>",
        "parametros": [
            {
                "email": emaillembrar
            },
            {
                "empresa": "<?php echo $_COOKIE['codEmpresa']?>"
            }
        ]
    };
    paramsRequest = JSON.stringify(paramsRequest);
    $.ajax("<?php echo site_url('index.php/Api')?>", {
        type: 'POST',
        dataType: "json",
        data: {json: paramsRequest},
        xhrFields: {withCredentials: true}
    }).success(function (data) {
        if (data.erro != undefined) {
            alert(data.erro);
        } else {
            alert("E-mail enviado com sucesso!");
            location.reload();
        }
    }).error(function (data) {
        alert(JSON.stringify(data.erro));
    });
}

function enviarSenha() {
    $(".modali").addClass("escondido");
    $(".lembrar-senha").removeClass("escondido");
}

function sair() {
    $.removeCookie('idcliente');
    $.removeCookie('mailcadsess');
    $.removeCookie('senhacadsess');
    location.href = 'mostracliente.html';
}

function mostra_login() {
    $(".modali").removeClass("escondido");
}

function logarou() {
    $(".contem-logar").removeClass("escondido");
    $(".contem-cliente-pergunta").addClass("escondido");
}

function voltarcadastro() {
    $(".contem-cliente-pergunta").addClass("escondido");
}

function fechamodali() {
    $(".modali").addClass("escondido");
    location.href = 'mostraplanos.html';
}

function listandocontrato() {
    var codCliente = window.codigo;
    var a = {
        "controle": "cliente",
        "operacao": "consultarContratos",
        "parametros": [
            {
                "cliente": codCliente
            },
            {
                "registros": "1"
            }
        ]
    };
    a = JSON.stringify(a);
    $.ajax("api.php", {
        type: 'POST',
        dataType: "json",
        data: {json: a},
        xhrFields: {withCredentials: true}
    }).success(function (data) {
        window.sessionStorage.setItem('conck', a);
        var datamm = data,
        //get a reference to our HTML template
            template = $('#template').html(),
        //tell Mustache.js to iterate through the JSON and insert the data into the HTML template
            output = Mustache.render(template, datamm);
        $('#containercont').append(output);
    }).error(function (data) {
        alert("Erro de login: Confira seus dados e tente novamente.");
        location.href = 'mostracliente.html';
    });
}

function listandoprodutoscli() {
    var codCliente = window.codigo;
    var a = {
        "controle": "cliente",
        "operacao": "consultarProdutosCliente",
        "parametros": [
            {
                "cliente": codCliente
            },
            {
                "registros": "15"
            }
        ]
    };
    a = JSON.stringify(a);
    $.ajax("api.php", {
        type: 'POST',
        dataType: "json",
        data: {json: a},
        xhrFields: {withCredentials: true}
    }).success(function (data) {
        window.sessionStorage.setItem('prock', a);
        var datamm = data,
        //get a reference to our HTML template
            template = $('#templates').html(),
        //tell Mustache.js to iterate through the JSON and insert the data into the HTML template
            output = Mustache.render(template, datamm);
        //append the HTML template to the DOM
        $('#containerprod').append(output);
        $(".modali").addClass("escondido");
        $(".cliente-logado").removeClass("escondido");
        $(".botao-sair").removeClass("escondido");
        listandoplanos();
    }).error(function (data) {
        console.log("Erro de login: Confira seus dados e tente novamente.");
    });
}

function checkcobra() {
    var codCliente = window.codigo;
    var a = {
        "controle": "cliente",
        "operacao": "consultarAutorizacaoCobranca",
        "parametros": [
            {
                "cliente": codCliente
            }
        ]
    };
    a = JSON.stringify(a);
    $.ajax("api.php", {
        type: 'POST',
        dataType: "json",
        data: {json: a},
        xhrFields: {withCredentials: true}
    }).success(function (data) {
        if (data.erro != undefined) {
            alert("Cartão não cadastrado! Cadastre seu cartão antes de finalizar a venda!");
            $.removeCookie('idcliente');
            $.removeCookie('mailcadsess');
            $.removeCookie('senhacadsess');
            setTimeout(function () {
            }, 3000);
            var codigotrp = window.codigo;
            var senhatrp = window.senha;
            var mailtrp = window.maillog;
            $.cookie('idcliente', codigotrp, {expires: 1, path: '/'});
            $.cookie('mailcadsess', mailtrp, {expires: 1, path: '/'});
            $.cookie('senhacadsess', senhatrp, {expires: 1, path: '/'});
            setTimeout(function () {
            }, 1000);
            location.href = 'novocadastrofinan.html';
        } else {
            finaldevenda();
        }
    }).error(function (data) {
        alert(JSON.stringify(data));
        return false;
    });
}

function finaldevenda() {
    var planoid = ($.cookie('plano'));
    var codCliente = window.codigo;
    var a = {
        "controle": "negociacao",
        "operacao": "gravarContrato",
        "parametros": [
            {
                "plano": planoid
            },
            {
                "cliente": codCliente
            }
        ]
    };
    a = JSON.stringify(a);
    $.ajax("api.php", {
        type: 'POST',
        dataType: "json",
        data: {json: a},
        xhrFields: {withCredentials: true}
    }).success(function (data) {
        if (data.erro != undefined) {
            alert(JSON.stringify(data.erro));
            return false;
        }
        else {
            $.removeCookie('idcliente');
            $.removeCookie('mailcadsess');
            $.removeCookie('senhacadsess');
            setTimeout(function () {
            }, 3000);
            var codigotrp = window.codigo;
            var senhatrp = window.senha;
            var mailtrp = window.maillog;
            $.cookie('idcliente', codigotrp, {expires: 1, path: '/'});
            $.cookie('mailcadsess', mailtrp, {expires: 1, path: '/'});
            $.cookie('senhacadsess', senhatrp, {expires: 1, path: '/'});
            setTimeout(function () {
            }, 1000);
            alert("Compra do plano Realizada!");
            location.href = 'mostraclientesessaosc.html';
        }
    }).error(function (data) {
        alert(JSON.stringify(data));
        return false;
    });
}

</script>

</body>
</html>