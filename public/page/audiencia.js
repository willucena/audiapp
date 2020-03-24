const Audiencia = function () {

    let numero = $('#numeroProcesso');
    let acao = $('#acao');
    let requerente = $('#requerente');
    let adv_requerente = $('#adv_requerente');
    let requerido = $('#requerido');
    let adv_requerido = $('#adv_requerido');
    let juiz = $('#juiz');
    let promotor = $('#promotor');

    const handleAjax  = function () {
        $(document).on("blur",".numero", function () {

            let $numero =  $(this).val();

            let  $ajax = $.ajax({
                url: "processo/"+ $numero,
                type: "GET",
            });
            $ajax.done(function (response){
                if(response.numero){
                    numero.text(response.numero);
                    acao.text(response.acao);
                    requerente.text(response.requerente);
                    adv_requerente.text(response.adv_requerente);
                    requerido.text(response.requerido);
                    adv_requerido.text(response.adv_requerido);
                    juiz.text(response.juiz);
                    promotor.text(response.promotor);
                }else{
                    numero.text('');
                    acao.text('');
                    requerente.text('');
                    adv_requerente.text('');
                    requerido.text('');
                    adv_requerido.text('');
                    juiz.text('');
                    promotor.text('');
                }

            });
        });
    };

    return {
        init: function () {
            handleAjax();
        }
    };

}();
