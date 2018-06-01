<!DOCTYPE html>
<html>
<head lang="pt-br">
    <?php include_once('includes/include_head.php'); ?>

    <style type="text/css">
        .controlelt {
            width: 300px !important;
        }
    </style>
</head>
<body>

<?php include_once('includes/include_navbar_completa.php'); ?>

<!-- tela inicial - listar planos--------------------------------------------------------------------------------------- -->
<!-- info: para vizualizar esse conteudo, retire a classe css "escondido"-------------------------------------------- -->

<div class="container-fluid">

    <div class="row carregando">
        <div class="col-sm-4 col-sm-offset-4 text-center" style="padding-top: 15px;">
            <i class="fa fa-circle-o-notch fa-5x fa-spin"></i>

            <h3 class="text-center">Carregando Dados</h3>
        </div>
    </div>

    <!-- mostra planos---------------------------------------------------------------------------------------------  -->

    <div class="row passo-0 contem-planos escondido">
        <div class="vendas_fase2">

        </div>
        <div class="container" style="background-color: #ffffff;margin-top: -20px;">

            <div id="googlemaps"
                 style="width: 930px; height: 460px; padding: 0; margin: 0 0 0 -15px; float: left; display: none; position: absolute;text-align: center;z-index: 1000;">
                <!-- Altere no iframe o src para a localizacao no mapa da unidade pela api do google maps-->
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.383581623954!2d-35.70509958520874!3d-9.648228393092879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x70145b685ae8985%3A0x6af0cbeaeb36fd17!2sBG+FITNESS!5e0!3m2!1spt-BR!2sbr!4v1462826936809" width="930" height="460" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

            <div style="width: 930px; height: 460px; padding: 0; margin: 0 0 0 -15px;">


                <div id="myCarousel" class="carousel slide" data-interval="3000" data-ride="carousel">
                    <!-- Carousel indicators -->
                    <ol class="carousel-indicators" style="margin-bottom: 400px; margin-left: 140px;">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                         <li data-target="#myCarousel" data-slide-to="3"></li>

                    </ol>
                    <!-- Carousel items -->
                    <div class="carousel-inner">
                        <div class="active item"
                             style="width: 100%; height: 100%; background-image: url(<?php echo base_url() . 'assets/img/carousel01.jpg' ?>); background-size: 100% auto; ">

                        </div>
                        <div class="item"
                             style="width: 100%; height: 100%; background-image: url(<?php echo base_url() . 'assets/img/carousel02.jpg' ?>); background-size: 100% auto; ">


                        </div>
                        <div class="item"
                             style="width: 100%; height: 100%; background-image: url(<?php echo base_url() . 'assets/img/carousel03.jpg' ?>); background-size: 100% auto; ">


                        </div>
                        <div class="item"
                             style="width: 100%; height: 100%; background-image: url(<?php echo base_url() . 'assets/img/carousel04.jpg' ?>); background-size: 100% auto; ">


                        </div>
                       
                    </div>
                    <!-- Carousel nav -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>

            </div>

            <div style="width: 930px; height: 42px;margin: 0 0 0 -15px;">
                <div class="vendas_carrosel_container_esq" id="vendas_carrosel_container_esq01">
                    <a href="#" style="text-decoration:none" onclick="toggle_visibility('googlemaps');"><p style="font-size: 16px ">Veja a nossa localização 
                            <i class="fa fa-plus-circle""></i>
                        </p></a>
                </div>
                <div class="vendas_carrosel_container_esq escondido" id="vendas_carrosel_container_esq02">
                    <a href="#" onclick="toggle_visibility('googlemaps');"><p>Veja nossas fotos <i
                                class="fa fa-plus-circle"></i></p></a>
                </div>
                <div class="vendas_carrosel_container_dir">
                    <p><i class="fa fa-map-marker"></i> Rua Marechal Antônio Guedes Muniz, 112, Maceió - AL</p>
                </div>
            </div>


            <div class="horarios_carrosel">
                <div
                    style="width: 100%; height: 75px; background-color: #101010; opacity: 0.5; position: absolute; bottom: 0; left: 0;">
                    <ul class="carrousel_empresa_horarios">
                        <li>Horários:</li>
                        <li>Semana: 05:00 as 22:00</li>
                        <li>Sábados: 08:00 as 14:00</li>
                        <li>Domingos: 09:00 as 13:00</li>
                  
                    </ul>
                </div>
            </div>

            <div style="padding: 5px 0px 5px 0px">

            </div>
            <script type="text/html" id="template">
                {{#return}}
                <div class="col-md-4 controlelt modelo plano" style="width: 300px; height: auto;">
                    <form action="<?php echo base_url() . 'index.php/ClienteController/contratar' ?>" method="post">
                        <input type="hidden" name="chave" value="<?php echo $chave ?>">
                        <input type="hidden" name="codEmpresa" value="<?php echo $codEmpresa ?>">
                        <input type="hidden" name="codPlano" value="{{codigoPlano}}">

                        <div class="corpo">
                            <h3 class="text-center">{{descricao}}</h3>

                            <h1 class="text-center" style="font-size: 5px;">{{descricaoEncantamento}}</h1>

                            <div class="VendasOnline_Plano_Condicoes_container"
                                 style="height: 150px; margin: 10px 10px;overflow-y:scroll; ">
                                <table class="table beneficios">
                                    <tbody class="VendasOnline_Plano_Condicoes_Texto_Geral">
                                    {{#modalidades}}
                                    <tr>
                                        <td><i class="fa fa-check-circle-o"></i>&nbsp;&nbsp;{{modalidade}}</td>
                                    </tr>
                                    {{/modalidades}}
                                    </tbody>
                                </table>

                            </div>


                            <div class="VendasOnline_Plano_Custos_container" style="margin: 10px 0;">

                                <p style="padding: 10px 0 0 0;">

                                <div style="display: none;">
                                    <small class="adesao"></small>
                                </div>
                                <small class="adesao">
                                    <div class="texto_12px" style="float: left; padding: 0 10px">Adesão:</div>
                                    <div class="alohao texto_18px" style="float: right; padding: 0 10px"> R$
                                        {{taxaAdesao}}
                                    </div>
                                </small>
                                </p>
                                <div style="display: none;"><p></p></div>
                                <p>

                                <div style="display: none;">
                                    <small class="anuidade"></small>
                                </div>
                                <small class="anuidade">
                                    <div class="texto_12px" style="float: left; padding: 0 10px"><p
                                            style="height: auto; margin: 0; padding: 0;">Manutenção anual:</p>

                                        <p style="height: auto; margin: 0; padding: 0;font-size: 9px; color: rgba(86, 86, 86, 0.78);"
                                           id="demo">vencimento em {{mesAnuidade}}</p></div>
                                    <div class="alohao texto_18px" style="float: right; padding: 0 10px"> R$
                                        {{valorAnuidade}}
                                    </div>
                                </small>
                                </p>

                            </div>
                            <div class="divinfopreco">
                                <p>
                                    <small class="alohao" id="aloha">R$&nbsp;{{valorMensal}}</small>
                                </p>
                                <p>
                                    <small class="info">por mês</small>
                                </p>
                            </div>
                            <p class="text-center">
                                <input type="submit" name="comprarPlano" class="btn btn-home btn-primary btn-contratar"
                                       value="Compre Agora!">
                            </p>
                        </div>
                    </form>
                </div>
                {{/return}}
            </script>

            <div id="containertrololo">

            </div>
        </div>
    </div>

    <nav class="navbar-bottom navbar-default navbar-fixed-bottom">

    </nav>

</div>

<?php include_once('includes/include_scripts.php'); ?>

<script>
    $(document).ready(function () {
        $(".carregando").delay(500).fadeIn('normal');
        listandoplanos();
    });

    function listandoplanos() {
        var paramsRequest = {
            "controle": "negociacao",
            "operacao": "consultarPlanos",
            "chave": "<?php echo $chave?>",
            "parametros": [
                {
                    "empresa": "<?php echo $codEmpresa?>"
                },
                {
                    "codigoPlano": "0"
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
                console.log(data.erro);
                alert('Não foi possível obter comunicação com o servidor, por favor, volte mais tarde.');
                $(".carregando").fadeOut('normal');
                $(".contem-planos").delay(500).fadeIn('normal');
            } else {
                var datamm = data,
                //get a reference to our HTML template
                    template = $('#template').html(),
                //tell Mustache.js to iterate through the JSON and insert the data into the HTML template
                    output = Mustache.render(template, datamm);
                //append the HTML template to the DOM
                $('#containertrololo').append(output);
                $(".carregando").fadeOut('normal');
                $(".contem-planos").delay(500).fadeIn('normal');
                passavalorpara();
            }
        }).error(function (data) {
            alert(JSON.stringify(data.erro));
        });
    }

</script>

</body>
</html>