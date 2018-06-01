/**
 * Created by JoaoBeno on 10/02/15.
 *
 * Aqui ficam concentradas todas as funções pertinentes as páginas de
 * demonstração. Elas são modelos, por isso pra simplificar a estrutu
 * ra, coloquei todas sob uma biblioteca de exemplo. No projeto final
 * esse arquivo deve ser removido, e nenhum metodo daqui deve ser usa
 * do em produção sem ser movido para o funcoes.js, ou para outro loc
 * al especifico do projeto.
 *
 */
(function($){
    var demostração = demostração || {};

    demostração = {
        iniciar: function demo_Iniciar(tipo_inicio) {
            switch (tipo_inicio) {
                case "single" : this.single();
            }
        },

        single: function demo_Single() {
            window.isSingle = true;
        }
    };

    window.demostração = demostração;
    //$(document).ready(QL.init);
})(jQuery);