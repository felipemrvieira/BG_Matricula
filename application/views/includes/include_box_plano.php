<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 09/10/2015
 * Time: 16:43
 */
?>

<div style="width:315px;height:750px;float:left;margin: -20px auto 0 0;background: #ffffff center;">
    <script type="text/html" id="templatett">
        {{#return}}
        <div class="col-md-4 modelo plano" style="width: 300px; height: auto;">
            <div class="corpo">
                <h3 class="text-center">{{descricao}}</h3>

                <h1 class="text-center" style="font-size: 5px;">{{descricaoEncantamento}}</h1>

                <div class="VendasOnline_Plano_Condicoes_container"
                     style="text-align:left; height: 150px; margin: 10px 10px;overflow-y:scroll; ">
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


                <div class="VendasOnline_Plano_Custos_container" style="margin: 10px 0px;">

                    <p style="padding: 10px 0px 0px 0px;">

                    <div style="display: none;">
                        <small class="adesao"></small>
                    </div>
                    <small class="adesao">
                        <div class="texto_12px" style="float: left; padding: 0px 10px">Adesão:</div>
                        <div class="alohao texto_18px" style="float: right; padding: 0px 10px"> R$
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
                        <div class="texto_12px" style="float: left; padding: 0px 10px"><p
                                style="height: auto; margin: 0px; padding: 0px;">Manutenção anual:</p>

                            <p style="height: auto; margin: 0px; padding: 0px;font-size: 9px; color: rgba(86, 86, 86, 0.78);"
                               id="demo">vencimento em {{mesAnuidade}}</p></div>
                        <div class="alohao texto_18px" style="float: right; padding: 0px 10px"> R$
                            {{valorAnuidade}}
                        </div>
                    </small>
                    </p>

                </div>
                <div class="divinfopreco" style="margin-bottom: -15px;">

                    <p>
                        <small class="alohao detalhes">R$&nbsp;{{valorMensal}}</small>
                    </p>
                    <p>
                        <small class="info">por mês</small>
                    </p>
                </div>
            </div>
        </div>
        {{/return}}
    </script>

    <div id="containertrololoa" style="float: right;"></div>
</div>