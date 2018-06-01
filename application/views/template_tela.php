<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 12/10/2015
 * Time: 09:22
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

<div class="container-fluid">

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
                    style="width:615px;float: left; background-color:#ffffff; margin: -20px auto 0;height: 968px;padding: 10px 10px 10px 20px;">
                    <form action="<?php echo base_url() . 'index.php/NegociacaoController/finalizarCompra' ?>" method="post">
                        <div style="float: left;">

                            <div style="float:left;">
                                <h2 style="text-align: right;padding-right: 63px;">Finalizar Compra</h2>

                                <h5 class="texto" style="color: red">
                                    <?php if (isset($erro) !== false) {
                                        echo $erro;
                                    } ?>
                                </h5>

                                <div class="form-horizontal" style="padding-left: 15px;">
                                    <div class="col-md-12">
                                        <div class="contem-cartao"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-10 col-md-offset-1">
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

                                    <div class="form-group">
                                        <div class="col-md-7 col-md-offset-1 col-sm-6">
                                            <input id="expiry" type="text" name="expiry" class="form-control"
                                                   placeholder="Vencimento: mm/aa"
                                                   value="<?php if (isset($params['validadeCartao']) !== false) {
                                                       echo $params['validadeCartao'];
                                                   } ?>"/>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-8" style="text-align: center;">
                            <button type="submit" class="btn btn-primary" onclick="if (!valida()) {return false;}">
                                Finalizar
                            </button>
                        </div>
                    </form>
                </div>
                <?php include_once('includes/include_box_plano.php'); ?>
            </div>
        </div>
    </div>
</div>

<?php include_once('includes/include_navbar_simples.php'); ?>

<!-- tela inicial - listar planos--------------------------------------------------------------------------------------- -->
<!-- info: para vizualizar esse conteudo, retire a classe css "escondido"-------------------------------------------- -->

<div class="container-fluid">

    <div class="row carregando escondido">
        <div class="col-sm-4 col-sm-offset-4 text-center" style="padding-top: 15px;">
            <i class="fa fa-circle-o-notch fa-5x fa-spin"></i>

            <h3 class="text-center">Carregando Dados</h3>
        </div>
    </div>
</div>

<nav class="navbar-bottom navbar-default navbar-fixed-bottom">

</nav>

<?php include_once('includes/include_scripts.php'); ?>
<script>

</script>

</body>
</html>