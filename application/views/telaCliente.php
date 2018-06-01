<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 08/10/2015
 * Time: 10:17
 */
?>

<!DOCTYPE html>
<html>
<head lang="pt-br">
    <?php include_once('includes/include_head.php'); ?>

    <style>
        .plano .corpo {
            margin: 90px 0 0 -70px;
        }

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

        #divimpressao {
            padding: 6px 15px 5px 15px;
        }

        .circle {
            border-radius: 50%;
            width: 9px;
            height: 9px;
            display: table-cell;
            text-align: center;
            vertical-align: middle;
        }

        .vermelho {
            background-color: #E0312A;
        }

        .verde {
            background-color: #1DC359;
        }

        .btn-contrato {
            padding: 6px 20px;
            border-radius: 8px;
        }

        .vendas_naoConcomitantes {
            border-color: #ffcc00;
            background: #ffcc00;
            color: #a76400;
            margin: 0 40px 0 50px;
            border-top: 40px solid #FFF;
            padding-top: 15px;
            padding-bottom: 15px;
            font-family: "neo sans", sans-serif;
        }
    </style>

</head>
<body>

<?php include_once('includes/include_navbar_sair.php'); ?>

<div class="row contratoimp escondido" id="contratoimp" style="z-index: 999;">
    <div class="form-group col-sm-6"
         style="position: fixed; float:none;left: 50%;transform: translate(-50%, 0);border-radius: 15px; padding: 17px 0 0 0; height: 495px;background-color: #ffffff; box-shadow: #7d0001; box-sizing: 5px;box-shadow: 3px 3px 25px #888888;z-index: 9;">
        <div class="form-horizontal">
            <fieldset>
                <!-- Form Name -->
                <p class="pull-left" style="padding: 6px 0 0 9px;margin-left: 15px">Contrato</p>
                <a class="pull-right"
                   style="padding: 0 9px 0 0; color: #101010; cursor: pointer;margin-right: 15px"
                   onclick="sairprintcontrato();return false;">
                    <i class="fa fa-times-circle fa-2x"></i> </a>
                <!-- Text input-->

                <div
                    style="background-color:#f6f1f1 ;padding: 15px 10px 10px 10px !important; width: 100%; display: inline-block;">
                    <div id="modelo-contratopri" id="contratoidf">

                        <div class="contratopri" id="contratoint"
                             style="width: 100%; display: block; overflow-y: scroll; line-height: 12px; text-align: justify; height: 345px;"></div>

                    </div>
                </div>

                <div style="width: 100%; display: block; margin: 10px 0px 10px 0px;">

                    <div class="controls col-md-6" style="width: 100%; display: block;">
                        <a id="singlebuttontt" class="btn btn-primary btn-block"
                           onclick="imprimirContrato(); return false;"
                           style=" width: 150px; margin: 0 auto !important; background-color: #004472; border-color: #004472;height: 26px; font-size: 12px; padding: 3px 31px !important;">
                            <i class="fa fa-print"></i> Imprimir
                        </a>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>
</div>

<!-- tela de cliente - venda01: tela completa--------------------------------------------------------------------------- -->
<!-- info: para vizualizar esse conteudo, retire a classe css "escondido"-------------------------------------------- -->
<div class="formulario-cadastro cliente-logado ">

<?php if (isset($vendaConcluida) && $vendaConcluida == true) {
    echo '<div class="vendas_fase4"></div>';
}?>

<?php
if (isset($_COOKIE['codPlano'])) {
    if (strtolower($situacao) !== strtolower('Ativo') || ($permiteContratosConcomitante === true)) {
        echo '<div class="vendas_fase3"></div>';
    }
}
?>

<div style="width: 100%; height: 100%; text-align: center; ">
<div class="vendaCadastroInternoContainer" style="background-color:#ff6d5a;">
    <?php
    if (isset($_COOKIE['codPlano'])) {
        if (strtolower($situacao) === strtolower('Ativo')
            && $permiteContratosConcomitante === false
        ) {
            echo '<div class="vendas_naoConcomitantes">
                    <span style="font-size: 30px; font-style: italic">Não é possível contratar um novo plano</span><br/>
                    <span style="font-size: 20px;">Você possui um plano ativo.</span>
                  </div>';
        }
    }
    ?>

    <div
        style="width:615px; height: 100%; float: left; background-color:#ffffff; padding: 10px; margin: 0 auto 0 0;">

        <div style="float: left;" id="cliente-logado">
            <div class="form-horizontal" style="margin-left: 40px;">
                <div class="container_info_titulos_cliente">
                    <h3 class="supertitulo_cliente pull-left">Seu Cadastro</h3>
                </div>
                <div class="container_info_titulos_cliente">
                    <h3 class="titulo_cliente pull-left">Dados pessoais</h3>
                </div>
                <div class="container_info_titulos_cliente" id="modelo-cliente">
                    <h3 class="nomecli subtitulo_cliente pull-left"></h3>
                </div>
                <div class="container_info_cliente">
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Nome</div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px" id="modelo-nome">
                            <div class="mailcon"><?php echo $nome ?></div>
                        </div>
                    </div>
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">E-mail</div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px" id="modelo-email">
                            <div class="mailcon"><?php echo $email ?></div>
                        </div>
                    </div>
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Cpf</div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px" id="modelo-cpf">
                            <div class="mask-on-div cpfcon"><?php echo $cpf ?></div>
                        </div>
                    </div>
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Nascimento
                        </div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px"
                             id="modelo-nascimento">
                            <div class="nascicon"><?php echo $dataNascimento ?></div>
                        </div>
                    </div>
                </div>


                <div class="container_info_cliente">
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Telefone
                        </div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px"
                             id="modelo-telresi">
                            <div class="phone_with_ddd resicon"><?php echo $telResidencial ?></div>
                        </div>
                    </div>
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Celular</div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px"
                             id="modelo-telcel">
                            <div class="phone_with_ddd celcon"><?php echo $telCelular ?></div>
                        </div>
                    </div>
                </div>

                <div class="container_info_titulos_cliente">
                    <h3 class="titulo_cliente pull-left">Informações como aluno</h3>
                </div>

                <div class="container_info_titulos_cliente">
                    <h3 class="subtitulo_cliente pull-left"><?php echo $nomeEmpresa ?></h3>
                </div>

                <div class="container_info_cliente">
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Cadastrado
                            em
                        </div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px"
                             id="modelo-datacad">
                            <div class="datacadcon"><?php echo $dataCadastro ?></div>
                        </div>
                    </div>
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Situação
                        </div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px" id="modelo-situ">
                            <div class="situcon"><?php echo $situacao ?></div>
                        </div>
                    </div>
                    <div class="info_div_linha">
                        <div class="info_plano_cliente_claro" style="float: left; padding: 0 10px">Consultor
                        </div>
                        <div class="info_plano_cliente" style="float: right; padding: 0 10px" id="modelo-consu">
                            <div class="consucon"><?php echo $consultor ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_COOKIE['codPlano'])) {
        include_once('includes/include_box_plano.php');
    }
    ?>
</div>

<div class="container" style="float:none;margin:0 auto;width: 100%; background-color: #FFFFFF;">
    <div class="container_info_titulos_cliente" style="padding-left: 35px !important;">
        <h3 class="titulo_cliente pull-left">Compras</h3>
    </div>
    <div class="row col-md-12 custyle" style="background-color: #FFFFFF;padding: 10px 10px 10px 50px;">
        <table class="table table-striped custab">
            <thead>
            <tr style="background-color: #3a7dc2;color: #ffffff;">
                <th>Plano</th>
                <th>Situação</th>
                <th>Vigência</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contratos->return as $contrato) {
                echo '<tr style="text-align: left">';
                echo '    <td>' . $contrato->nomePlano . '</td>';
                echo '    <td>' . $contrato->situacao . '</td>';

                if ($contrato->porcentagemUsadaContrato === 0) {
                    $corBola1 = 'verde';
                    $corBola2 = 'verde';
                } else if ($contrato->porcentagemUsadaContrato === 100) {
                    $corBola1 = 'vermelho';
                    $corBola2 = 'vermelho';
                } else {
                    $corBola1 = 'vermelho';
                    $corBola2 = 'verde';
                }


                echo '    <td><div style="float: left;margin-right: 6px">' . $contrato->vigenciaDe . '</div>' .
                    '<div id="progressBar" style="width: 100px; position: relative; float: left; margin-top: 5px">' .
                    '   <div class="circle ' . $corBola1 . '" style="float: left;"></div>' .
                    '   <div class="barraPrincipal" style="width: 82px; border-bottom: solid #1DC359 3px; position: absolute; top: 3px; left: 9px;">' .
                    '       <div class="barraProgresso" style="width: ' . $contrato->porcentagemUsadaContrato . '%; border-bottom: solid  #E0312A 3px; position: absolute; top: 0"></div>' .
                    '   </div>' .
                    '   <div class="circle ' . $corBola2 . '" style="float: right"></div>' .
                    '   </div><div style="float:left;margin-left: 6px">' . $contrato->vigenciaAteAjustada . '</div>' .
                    '</td>';
                echo '    <td><div><a href="#" class="btn btn-primary" style="font-size: 12px" onclick="printacontrato(\'' . $contrato->codigo . '\');">Ver Contrato</a></div></td>';
                echo '</tr>';
            } ?>
            </tbody>
        </table>
    </div>
</div>

<div class="container" style="float:none;margin:0 auto;width: 100%; background-color: #FFFFFF;">
    <div class="container_info_titulos_cliente" style="padding-left: 35px !important;">

        <h3 class="titulo_cliente pull-left">Histórico de Compras</h3>

    </div>
    <div class="row col-md-12 custyle"
         style="background-color: #FFFFFF;padding: 10px 10px 10px 50px;height: 265px;">
        <table class="table table-striped custab">
            <thead>
            <tr style="background-color: #3a7dc2;color: #ffffff;">
                <th class="text-center">Produto</th>
                <th class="text-center">Lançamento</th>
                <th class="text-center">Quantidade</th>
                <th class="text-center">Valor Unit.</th>
                <th class="text-center">Desconto</th>
                <th class="text-center">Total</th>
                <th class="text-center">Situação</th>
            </tr>
            </thead>
            <script type="text/html" id="templates">
                {{#return}}
                <tr>
                    <td>{{descricao}}</td>
                    <td style="text-align: center">{{dataLancamento}}</td>
                    <td style="text-align: center">{{quantidade}}</td>
                    <td style="text-align: center">{{valorUnitarioApresentar}}</td>
                    <td style="text-align: center">{{valorDescontoApresentar}}</td>
                    <td style="text-align: center">{{valorTotalApresentar}}</td>
                    <td style="text-align: center">{{situacao}}</td>
                </tr>
                {{/return}}
            </script>
            <tbody id="containerprod" class="containerprod"></tbody>
        </table>
    </div>
    <div style="clear: both" class="row">

        <?php
        if (isset($_COOKIE['codPlano'])) {
            if ((strtolower($situacao) !== strtolower('Ativo') || ($permiteContratosConcomitante === true))
                && (!isset($vendaConcluida) || $vendaConcluida !== true)
            ) {
                echo '<form action="' . base_url() . 'index.php/NegociacaoController/finalizarNegociacao" method="post">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: 30px">
                        CONFIRMAR
                    </button>
                </form>';
            }
        } else {
            echo '<a class="btn btn-home btn-primary btn-contratar" href="' . base_url() . 'index.php/PlanoController/voltar"
   style="cursor: pointer; padding: 7px 50px; margin-bottom: 30px">
    Ver Planos
</a>';
        }
        ?>


    </div>
</div>

</div>

</div>


<nav class="navbar-bottom navbar-default navbar-fixed-bottom">

</nav>
<?php include_once('includes/include_scripts.php'); ?>

<script src="<?php echo base_url() . 'assets/js/jquery.mask.min.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/jQuery.print.js' ?>"></script>

<script>
    var contratonb = '';

    $(document).ready(function () {
        <?php
            if (isset($_COOKIE['codPlano'])) {
                echo 'listandoplanos("'.$_COOKIE["chave"].'",'.$_COOKIE["codEmpresa"].','.$_COOKIE["codPlano"].');';
            }
        ?>
        listandoprodutoscli();
    });

    function listandoprodutoscli() {
        var paramsRequest = {
            "controle": "cliente",
            "operacao": "consultarProdutosCliente",
            "chave": "<?php echo $_COOKIE['chave']?>",
            "parametros": [
                {
                    "cliente": <?php echo $codigo?>
                },
                {
                    "registros": "15"
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
            window.sessionStorage.setItem('prock', paramsRequest);
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
        }).error(function (data) {
            console.log(JSON.stringify(data));
        });
    }

    function sairprintcontrato() {
        $(".contratoimp").addClass("escondido");
    }

    function abreprintcontrato() {
        $(".contratoimp").removeClass("escondido");
    }

    function printacontrato(contrato) {
        var paramsRequest = {
            "controle": "negociacao",
            "operacao": "imprimirContrato",
            "chave": "<?php echo $_COOKIE['chave']?>",
            "parametros": [
                {
                    "contrato": contrato
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
            var datamm = data.return;
            $("#modelo-contratopri").find("div.contratopri").html(datamm);
            $("#divimpressao").css("padding: 6px 15px 5px 15px;");
            $("#divimpressao img").remove();
            $('#contratoint form input').remove();
            abreprintcontrato();
        }).error(function (data) {
            alert(JSON.stringify(data.erro));
        });
    }

    function imprimirContrato() {
        $("#divimpressao").print({
            globalStyles: true,
            mediaPrint: false,
            stylesheet: null,
            noPrintSelector: ".no-print",
            iframe: true,
            append: null,
            prepend: null,
            manuallyCopyFormValues: true,
            deferred: $.Deferred()
        });
    }

</script>
</body>
</html>