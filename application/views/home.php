<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 06/10/2015
 * Time: 17:26
 */
session_start()
?>
<!DOCTYPE html>
<html>
<head lang="pt-br">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BGfitness - Vendas Online</title>
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url() . 'assets/css/font-awesome.min.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url() . 'assets/css/pacto.css' ?>" rel="stylesheet"/>
    <link href="<?php echo base_url() . 'assets/css/customizar.css' ?>" rel="stylesheet"/>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>

     <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('../fonts/glyphicons-halflings-regular.eot');
            src: url('../fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), url('../fonts/glyphicons-halflings-regular.woff2') format('woff2'), url('../fonts/glyphicons-halflings-regular.woff') format('woff'), url('../fonts/glyphicons-halflings-regular.ttf') format('truetype'), url('../fonts/glyphicons-halflings-regular.svg#glyphicons_halflingsregular') format('svg');
            font-family: 'neo sans';
            font-style: normal;
            src: url('../fonts/Neo%20Sans%20Std%20Italic.otf') format("opentype");
            src: url('../fonts/Neo%20Sans%20Std%20Regular.otf') format("opentype");
            font-family: 'oxygen';
            src: url('../fonts/Oxygen-Bold.ttf') format('truetype');
            src: url('../fonts/Oxygen-Light.ttf') format('truetype');
            src: url('../fonts/Oxygen-Regular.ttf') format('truetype');
        }

        .corpo h3 {
            font-family: "neo sans", sans-serif;
            font-size: 22px !important;
            margin-top: 20px !important;
            padding-bottom: 20px !important;
              /**background: url("<?php echo base_url() . '/assets/img/vendas_barra_planos_divisao.png'?>") no-repeat bottom center;*/
        }

        .VendasOnline_Plano_Texto_Geral ul {

        }

        .VendasOnline_Plano_Texto_Geral li {

        }

        .VendasOnline_Plano_Texto_Geral li:first-child {

        }

        .VendasOnline_Plano_Texto_Geral li:last-child {

        }

        .VendasOnline_Plano_Condicoes_Texto_Geral td {
            font-family: 'Oxygen', sans-serif;
            font-size: 12px !important;
            padding: 0 10px !important;
            margin: 0 !important;

        }

        .VendasOnline_Plano_Condicoes_Texto_Geral tr:last-child {
            padding-bottom: 20px !important;
             /** background: url("<?php echo base_url() . 'assets/img/vendas_barra_planos_divisao.png'?>") no-repeat bottom center !important;*/
        }

        .VendasOnline_Plano_Condicoes_Texto_Geral td:last-child {
            padding-bottom: 10px !important;
        }

        .VendasOnline_Plano_Condicoes_Texto_Geral i {
            color: #1DC359;
        }

        .divinfopreco p {
            height: 15px !important;
        }

        .info p {
            font-style: italic;
        }

        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            padding: 8px;
            line-height: 20px;
            vertical-align: top;
            border: none !important;
        }

        .local_info_local {
            list-style-type: none;
            padding: 10px 0 10px 0;
            margin: 0px 10px 0px 10px;
            background: url("<?php echo base_url() . 'assets/img/vendas_barra_planos_divisao.png'?>") no-repeat bottom;
            bottom: 10px;
            
        }

        .local_info_local li {
            list-style-type: none;
            padding: 5px 0 5px 0;
            font-family: 'Oxygen', sans-serif;
        }
        
        .local_info_local h5 {
            margin: -10px;
            font-family: : 'Oxygen', sans-serif;
            color: f#F58220;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            font-size: 25px
        }
        
        .local_info_local h1 {
            margin: -35px;
            font-family: : 'Oxygen', sans-serif;
            text-align: center;
            text-transform: uppercase;
            
        }
        
        
        .local_info_local li:first-child {
            font-family: 'Oxygen', sans-serif;
            font-size: 18px;
            font-weight: bold;
            
        }

        /**
        Div que controla o endereço
        */
        .local_info_endereco {
            list-style-type: none;
            font-family: 'Oxygen', sans-serif;
            font-size: 14px;
            list-style-type: none;
            padding: 10px 0px 10px 0px;
            margin: 0px 10px 0px 10px;
            background: url("<?php echo base_url() . 'assets/img/vendas_barra_planos_divisao.png'?>") no-repeat bottom;
            bottom: 10px;
          
        }

        .local_info_endereco li {
            list-style-type: none;
            text-align: center;
            
        }

        .local_info_horario {
            list-style-type: none;
            font-family: 'Oxygen', sans-serif;
            font-size: 14px;
            text-align: center;
            list-style-type: none;
            padding: 40px 0px 40px 0px;
            margin: 0px 10px 0px 10px;
            bottom: 10px;
            
        }

        .imagem_academia01 {
            margin-left: -15px;
            margin-top: -30px;
            width: 350px;
            height: 250px;
            background: url("<?php echo base_url() . 'assets/img/academia01.jpg'?>") no-repeat center;
        }
         
         
        .imagem_academia02 {
            margin-left: -15px;
            margin-top: -30px;
            width: 350px;
            height: 250px;
            background: url("<?php echo base_url() . 'assets/img/academia02.png'?>") no-repeat center;
        }

        .imagem_academia03 {
            margin-left: -15px;
            margin-top: -30px;
            width: 350px;
            height: 250px;
            background: url("<?php echo base_url() . 'assets/img/academia03.jpg'?>") no-repeat center;
        }


       

    </style>

</head>
<body>

<?php include_once('includes/include_navbar_simples.php'); ?>

<div class="container-fluid" style="height: 100%; min-height: 100%; position: relative">

    <div class="row passo-0 contem-planos">
        <!--container geral-->
        <div class="container-fluid" style="background-color: #ffffff;">
            <!--banner topo-->
            <div class="vendas_fase1"></div>


            <div class="listagem-planos container-fluid" style="display: flex;justify-content: center;">

                <!-- Edite as informacoes da academia aqui, altere o nome, endereco e horarios da academia. Para adicionar uma nova unidade, basta copiar a div: "col-md-4 modelo plano" e adicionar-la no final da pagina -->
                
                <div class="col-md-4 modelo plano" style="width: 370px; height: auto; ">
                    <form action="<?php echo base_url() . 'index.php/PlanoController/show' ?>" method="post">
                        <div class="corpo">
                            <!-- Insira aqui a imagem da unidade 1, resolucao recomendada: 280x161-->
                            <div class="imagem_academia01">
                            
                            </div>

                            <!-- Unidade 1 -->
                            <ul class="local_info_local">
                                <h1>Unidade</h1>
                                <h5>BG Praia</h5>
                                <h1>Jatiúca, Maceió - AL</h1>
                            </ul>

                            <ul class="local_info_endereco">
                                <li>Rua Marechal Antônio Guedes Muniz, 112</li>
                            </ul>
                            <ul class="local_info_horario">
                            <p>Seg à Sex: 05:00 às 23:00</p>
                            <p>Sáb: 08:00 às 14:00</p>
                            <p>Dom: 09:00 às 13:00</p>
                        
                            </ul>
                            <div style="width: 100%; display: block; text-align: center; padding: 10px 0 10px 0;">
                                <input type="hidden" name="chave" value="968853053284c17b342086c9adfa2abf">
                                <input type="hidden" name="codEmpresa" value="1">
                                <button type="submit" name="singlebutton"
                                        class="btn  btn-home btn-primary btn-contratar">
                                    Ver Planos <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
                
                <div class="col-md-4 modelo plano" style="width: 370px; height: auto;  ">
                    <form action="<?php echo base_url() . 'index.php/PlanoController/show' ?>" method="post">
                        <div class="corpo">
                            <!-- Insira aqui a imagem da unidade 1, resolucao recomendada: 280x161-->
                            <div class="imagem_academia02">
                            
                            </div>

                            <!-- Unidade 2 -->
                            <ul class="local_info_local">
                                <h1>Unidade</h1>
                                <h5>BG Farol</h5>
                                <h1>Farol, Maceió - AL</h1>
                            </ul>

                            <ul class="local_info_endereco">
                                <li>Avenida Fernandes Lima, 3204</li>
                            </ul>
                            <ul class="local_info_horario">
                                <p>Seg à Sex: 05:00 às 23:00</p>
                                <p>Sáb: 08:00 às 14:00</p>
                                <p>Dom: 09:00 às 13:00</p>
                        
                            </ul>
                            <div style="width: 100%; display: block; text-align: center; padding: 10px 0 10px 0;">
                                <input type="hidden" name="chave" value="968853053284c17b342086c9adfa2abf">
                                <input type="hidden" name="codEmpresa" value="2">
                                <button type="submit" name="singlebutton"
                                        class="btn  btn-home btn-primary btn-contratar">
                                    Ver Planos <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 modelo plano" style="width: 370px; height: auto;  ">
                    <form action="<?php echo base_url() . 'index.php/PlanoController/show' ?>" method="post">
                        <div class="corpo">
                            <!-- Insira aqui a imagem da unidade 3, resolucao recomendada: 280x161-->
                            <div class="imagem_academia03">
                            
                            </div>

                            <!-- Unidade 3 -->
                            <ul class="local_info_local">
                                <h1>Unidade</h1>
                                <h5>BG Biu</h5>
                                <h1>Benedito Bentes, Maceió - AL</h1>
                            </ul>

                            <ul class="local_info_endereco">
                                <li>Avenida Cachoeira do Meirim, 33</li>
                            </ul>
                            <ul class="local_info_horario">
                                <p>Seg à Sex: 05:00 às 23:00</p>
                                <p>Sáb: 08:00 às 14:00</p>
                                <p>Dom: 09:00 às 13:00</p>
                        
                            </ul>
                            <div style="width: 100%; display: block; text-align: center; padding: 10px 0 10px 0;">
                                <input type="hidden" name="chave" value="968853053284c17b342086c9adfa2abf">
                                <input type="hidden" name="codEmpresa" value="3">
                                <button type="submit" name="singlebutton"
                                        class="btn  btn-home btn-primary btn-contratar">
                                    Ver Planos <i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
            
            </div>
            <!-- Listagem planos -->
            
            
        </div>
    </div>
</div>
    <!-- footer -->

    <nav class="navbar-bottom navbar-default navbar-fixed-bottom">

    </nav>

    <script src="<?php echo base_url() . 'assets/js/jquery-1.11.2.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/card.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.mask.min.js' ?>"></script>
</body>
</html>