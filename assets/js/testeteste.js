function listaPlanos() {

 var modelo = $(".modelo").remove();

 var chave = 0;
 if (!hasSingle) {
 planos.forEach(function (plano) {
 var n_modelo = modelo.clone();
 $(n_modelo).find("h3").html(plano.descricao);

 var valor = plano.valorMensal;
 if (valor == null) {
 valor = 0;
 }
 valor = valor.toString();
 if (valor.indexOf(".") > 0) {
 valor = valor.split(".");
 if (valor[1].length == 1) {
 valor[1] = valor[1] + "0";
 }
 $(n_modelo).find(".valor span:nth-child(2)").html(valor[0]);
 $(n_modelo).find(".valor span:nth-child(3)").html("," + valor[1]);
 } else {
 $(n_modelo).find(".valor span:nth-child(2)").html(valor);
 }

 var modalidades = plano.modalidades;
 modalidades.forEach(function (modalidade) {
 var linha = ("<tr><td><i class=\"fa fa-check-circle-o\"></i>  " + modalidade.nome + "</td></tr>");
 $(n_modelo).find("table.beneficios tbody").append(linha);
 });

 var months = { 1 : "Janeiro", 2 : "Fevereiro", 3 : "Março", 4 : "Abril", 5 : "Maio", 6 : "Junho", 7 : "Julho", 8 : "Agosto", 9 : "Setembro", 10 : "Outubro", 11 : "Novembro", 12 : "Dezembro"};

 var monthNumber = plano.mesAnuidade // Whichever month you want (counting up from 0).
 console.log (n_modelo);
 $(n_modelo).find("table.condicoes").remove();
 console.log (n_modelo);
 $(n_modelo).find("small.detalhes").html("R$ " + plano.valorMensal +"<span style='font-size: 22px;'>,00</span>" );
 console.log (n_modelo);
 $(n_modelo).find("small.adesao").html("<div class='texto_12px' style='float: left; padding: 0px 10px'>Adesão:</div><div class='texto_18px' style='float: right; padding: 0px 10px'> R$ " + plano.taxaAdesao + "<span style='font-size: 10px;'>,00</span></div>");
 console.log (n_modelo);
 $(n_modelo).find("small.anuidade").html("<div class='texto_12px' style='float: left; padding: 0px 10px'><p style='height: auto; margin: 0px; padding: 0px;'>Manutenção anual:</p><p style='height: auto; margin: 0px; padding: 0px;font-size: 8px; color: rgba(86, 86, 86, 0.78);' id='demo'>vencimento em " + (months[monthNumber]) + "</p></div><div class='texto_18px' style='float: right; padding: 0px 10px'> R$ " + plano.valorAnuidade + "<span style='font-size: 10px;'>,00</span></div>");
 console.log (n_modelo);
 $(n_modelo).find("small.duracao").html("<div class='texto_12px' style='float: left; padding: 0px 10px'>Duracao</div><div class='texto_18px' style='float: right; padding: 0px 10px'>" + plano.duracao + " meses</div>");
 console.log (n_modelo);
 $(n_modelo).find("a.btn-contratar").attr("onclick", "contratar(" + chave + ");return false;");
 chave++;
 console.log (n_modelo);
 $(".contem-planos .container").append(n_modelo);

 });
 } else {
 var plano = planos[0];

 var n_modelo = modelo.clone();
 $(n_modelo).find("h3").html(plano.descricao);

 var valor = plano.valorMensal;
 valor = valor.toString();
 if (valor.indexOf(".") > 0) {
 valor = valor.split(".");
 if (valor[1].length == 1) {
 valor[1] = valor[1] + "0";
 }
 $(n_modelo).find(".valor span:nth-child(2)").html(valor[0]);
 $(n_modelo).find(".valor span:nth-child(3)").html("," + valor[1]);
 } else {
 $(n_modelo).find(".valor span:nth-child(2)").html(valor);
 }

 var modalidades = plano.modalidades;
 modalidades.forEach(function (modalidade) {
 var linha = ("<tr><td>" + modalidade.nome + "</td></tr>");
 $(n_modelo).find("table.beneficios tbody").append(linha);
 });

 $(n_modelo).find("table.condicoes").remove();

 $(n_modelo).find("small.detalhes").html("R$ " + plano.valorTotal);

 $(n_modelo).find("a.btn-contratar").attr("onclick", "contratar(" + chave + ");return false;");
 chave++;

 $(".contem-planos .container").append(n_modelo);
 console.log("segue seco essa coisa ai" + chave)
 }

 $(".contem-planos").removeClass("escondido");
 $(".carregando").addClass("escondido");
 }