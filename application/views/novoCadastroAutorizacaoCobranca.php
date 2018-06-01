<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 09/10/2015
 * Time: 13:48
 */
?>
<!DOCTYPE html>
<html>
<head lang="pt-br">
    <?php include_once('includes/include_head.php'); ?>
    <style>
        .plano .corpo {
            margin: 66px 0 0 -33px;
        }
    </style>
</head>
<body>

<?php include_once('includes/include_navbar_sair.php'); ?>

<div class="container-fluid">

    <?php include_once('includes/include_carregando.php'); ?>
    <div class="row carregando escondido">
        <div class="col-sm-4 col-sm-offset-4 text-center" style="padding-top: 15px;">
            <i class="fa fa-circle-o-notch fa-5x fa-spin"></i>

            <h3 class="text-center">Carregando Dados</h3>
        </div>
    </div>

    <!-- tela de cadastro: formulario de compra---------------------------------------------------------------------------------------------  -->

    <div class="formulario-cadastro passo-1 contem-cadastro">

        <div class="vendas_fase3">

        </div>

        <div style="width: 100%; height: auto; text-align: center; ">
            <div class="vendaCadastroInternoContainer" style="background-color:#ff6d5a;">
                <div
                    style="width:615px;float: left; background-color:#ffffff; margin: -20px auto 0;height: 750px;padding: 10px 10px 10px 20px;">
                    <div class="col-md-12" style="float: left;">
                        <div class="col-md-12" style="float:left;">
                            <div class="col-md-12">
                                <h2 style="text-align: left;">Dados de Pagamento</h2>
                            </div>

                            <?php if (isset($erro) !== false) {
                                echo '<h5 class="texto" style="color: red">' . $erro . '</h5>';
                            } ?>

                            <?php if (count($convenios) === 0) { ?>
                                <h5 class="texto" style="color: red">
                                    Não há formas de pagamentos cadastradas nesta empresa.
                                </h5>
                            <?php } ?>

                            <div class="form-group" <?php if ($apresentarOpcoes !== true) echo 'hidden' ?>>
                                <div class="col-sm-12">
                                    <label class="radio-inline">
                                        <input type="radio" class="form-control" name="formapagamento" id="opcao1"
                                               value="dcc" checked="true">
                                        Cartão de Crédito
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" class="form-control" name="formapagamento" id="opcao2"
                                               value="dco">
                                        Débito em Conta
                                    </label>
                                </div>
                            </div>

                            <form id="formdcc"
                                  action="<?php echo base_url() . 'index.php/NegociacaoController/finalizarNegociacao' ?>"
                                  method="post"

                                <?php if (($qtdDCC === 0 && $qtdDCO >= 1) || ($apresentarOpcoes === 1)) echo 'hidden' ?>>
                                <div class="form-horizontal form-cartao">
                                    <div class="col-md-12">
                                        <div class="contem-cartao"></div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group" style="margin-left: 0; margin-bottom: 0">
                                            <input id="num-cartao" type="hidden" name="nome-cartao"
                                                   value="<?php if (isset($params['operadoraCartao']) !== false) {
                                                       echo $params['operadoraCartao'];
                                                   } ?>"/>

                                            <input id="num_cart" type="text" name="number" class="form-control"
                                                   placeholder="Número do Cartão"
                                                   value="<?php if (isset($params['numeroCartao']) !== false) {
                                                       echo $params['numeroCartao'];
                                                   } ?>"/>

                                            <p class="log"></p>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group" style="margin-left: 0;">
                                            <input id="expiry" type="text" name="expiry" class="form-control"
                                                   placeholder="Vencimento: mm/aa"
                                                   value="<?php if (isset($params['validadeCartao']) !== false) {
                                                       echo $params['validadeCartao'];
                                                   } ?>"/>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="codConvenio"
                                       value="<?php if ($qtdDCC >= 1 && $qtdDCO === 0) {
                                           echo $convenios[0]->codigoConvenio;
                                       } ?>"/>

                                <input type="hidden" name="tipoConvenio" value="DCC"/>
                                <input type="hidden" name="cadastrarConvenio" value="true"/>

                                <div class="col-sm-9" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary"
                                            onclick="if (!valida()) {return false;}"
                                            style="padding: 7px 60px">
                                        Finalizar
                                    </button>
                                </div>
                            </form>

                            <form id="formdco"
                                  action="<?php echo base_url() . 'index.php/NegociacaoController/finalizarNegociacao' ?>"
                                  method="post"
                                <?php if (($qtdDCC >= 1 && $qtdDCO === 0) || ($apresentarOpcoes !== 1)) echo 'hidden' ?>>
                                <div class="form-horizontal" style="padding-left: 15px; margin-top: 12px">

                                    <div class="form-group">
                                        <div class="col-md-8">
                                            <select class="form-control" id="banco" name="banco" <?php if ($qtdDCO === 1) echo 'disabled' ?>>
                                                <?php foreach($convenios as $convenio) {
                                                    if ($convenio->tipoConvenio == 'DCO') {
                                                        echo '<option value="' . $convenio->codBanco . '|' . $convenio->codigoConvenio . '">' . $convenio->banco . '</option>';
                                                    }
                                                }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <input id="agencia" type="text" name="agencia" class="form-control"
                                                   placeholder="Agência"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <input id="contacorrente" type="text" name="contacorrente"
                                                   class="form-control"
                                                   placeholder="Conta Corrente (com dígito)"/>
                                        </div>

                                        <div id="grpOperacao" class="col-md-4" <?php if ($qtdDCO === 1 && strpos(strtolower($convenios[0]->banco), 'caixa') === false) echo 'hidden'?>>
                                            <input id="operacao" type="text" name="operacao"
                                                   class="form-control"
                                                   placeholder="Operação"/>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="codConvenio"
                                       value="<?php if ($qtdDCO >= 1 && $qtdDCC === 0) {
                                           echo $convenios[0]->codigoConvenio;
                                       } ?>"/>

                                <input type="hidden" name="tipoConvenio" value="DCO"/>
                                <input type="hidden" name="cadastrarConvenio" value="true"/>
                                <input type="hidden" name="codBanco" value=""/>

                                <div class="col-sm-12" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary"
                                            onclick="if (!valida()) {return false;}">
                                        Finalizar
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>


                </div>
                <?php include_once('includes/include_box_plano.php'); ?>
            </div>
        </div>
    </div>
</div>

<nav class="navbar-bottom navbar-default navbar-fixed-bottom">

</nav>

<?php include_once('includes/include_scripts.php'); ?>
<script src="<?php echo base_url() . 'assets/js/jquery.creditCardValidator.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/card.js' ?>"></script>
<script src="<?php echo base_url() . 'assets/js/jquery.mask.min.js' ?>"></script>
<script>

    $(document).ready(function () {
        <?php echo "listandoplanos('".$_COOKIE['chave']."',".$_COOKIE['codEmpresa'].",".$_COOKIE['codPlano'].");\n"?>

        $("div.form-cartao").card({
            container: ".contem-cartao"
        });
        $("input[name*=expiry]").mask('00/00', {reverse: false});
    });

    $("input[name=formapagamento]").click(function () {
        var opcaoEscolhida = this.value;
        if (opcaoEscolhida === 'dcc') {
            $('#formdcc').removeAttr('hidden');
            $('#formdco').attr('hidden', 'true');
        } else if (opcaoEscolhida === 'dco') {
            $('#formdco').removeAttr('hidden');
            $('#formdcc').attr('hidden', 'true');
        }

    });

    $("select[name=banco]").click(function () {
        var opcaoEscolhida = this.text().toLowerCase().trim();
        if (opcaoEscolhida.indexOf('caixa') > -1) {
            $('#grpOperacao').removeAttr('hidden');
        } else {
            $('#grpOperacao').attr('hidden', 'true');
        }
    });

    function valida() {
        var opcaoEscolhida = $("input[name=formapagamento]").value;
        var codBancoEscolhido = $("select[name=banco]").val();
        var bancoEscolhido = $("select[name=banco]").text().toLowerCase().trim();

        if (opcaoEscolhida === 'dcc' && ($.trim($("#num_cart").val()) === "" || $.trim($("#expiry").val()) === "")) {
            alert('Preencha o formulário corretamente e tente novamente.');
            return false;
        } else if (opcaoEscolhida === 'dco' &&
            ($.trim($("#agencia").val()) === "" ||
            $.trim($("#contacorrente").val()) === "" ||
            (bancoEscolhido.indexOf('caixa') > -1 && $.trim($("#operacao").val()) === ""))) {
            alert('Preencha o formulário corretamente e tente novamente.');
            return false;
        }

        console.log(codBancoEscolhido);
        if (codBancoEscolhido.trim() !== '') {
            var codigos = codBancoEscolhido.split('|');
            console.log(codigos);
            var codBanco = codigos[0];
            var codConvenio = codigos[1];

            $("input[name=codBanco]").attr('value', codBanco);
            $("input[name=codConvenio]").attr('value', codConvenio);
        }
        return true;
    }
</script>

</body>
</html>