<?php
/**
 * Created by PhpStorm.
 * User: GlaucoT
 * Date: 07/10/2015
 * Time: 10:09
 */

?>

<script>
    function logarsp() {
        location.href = 'mostraclientesp.html';
    }

    function passavalorpara() {
        $('.alohao').each(function () {
            var type = $(this).html();
            var sort = accounting.formatMoney(type);
            sort = sort.replace('$', 'R$ ');
            sort = sort.replace('.', ',');
            $(this).html(sort);
        });
    }

    function listandoplanos(chave, codEmpresa, codPlano) {
        var paramsRequest = {
            "controle": "negociacao",
            "operacao": "consultarPlanos",
            "chave": chave,
            "parametros": [
                {
                    "empresa": codEmpresa
                },
                {
                    "codigoPlano": codPlano
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
            var datamm = data,
            //get a reference to our HTML template
                template = $('#templatett').html(),
            //tell Mustache.js to iterate through the JSON and insert the data into the HTML template
                output = Mustache.render(template, datamm);
            //append the HTML template to the DOM
            $('#containertrololoa').append(output);
            passavalorpara();
        }).error(function (data) {
            alert(JSON.stringify(data));
        });
    }

</script>