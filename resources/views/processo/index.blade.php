@extends('layout/layout')

@section('content')
    <div class="modal fade bd-example-modal-lg" id="modal-processo" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Processo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  id="form-processo">
                        @csrf
                        <input type="hidden" id="id" name="id" value="">
                        <input type="hidden" id="action" name="action" value="">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name">Número do processo:</label>
                                <input type="text" class="form-control" id="numero" name="numero">
                            </div>
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label for="recipient-name">Ação:</label>
                                    <input type="text" class="form-control" id="acao" name="acao">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Requerente:</label>
                                <input type="text" class="form-control" id="requerente" name="requerente">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Advogado requerente:</label>
                                <input type="text" class="form-control" id="adv_requerente" name="adv_requerente">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Requerido:</label>
                                <input type="text" class="form-control" id="requerido" name="requerido">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Advogado requerido:</label>
                                <input type="text" class="form-control" id="adv_requerido" name="adv_requerido">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Juizª:</label>
                                <input type="text" class="form-control" id="juiz" name="juiz">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="recipient-name" class="col-form-label">Promotorª:</label>
                                <input type="text" class="form-control" id="promotor" name="promotor">
                            </div>
                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary text-right" id="inserir" data-toggle="modal" data-target=".bd-example-modal-lg">Novo processo</button>
    <br>
    <br>
    <table class="table table-striped" id="dataTable">
        <thead>
        <tr>
            <th scope="col">Nº PJE</th>
            <th scope="col">Ação</th>
            <th scope="col">Requerente</th>
            <th scope="col">Adv. Requerente</th>
            <th scope="col">Requerido</th>
            <th scope="col">Adv. Requerido</th>
            <th scope="col">Juizª</th>
            <th scope="col">Promotorª</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($processos as $processo)
        <tr>
            <th>{{ $processo->numero }}</th>
            <td>{{ $processo->acao }}</td>
            <td>{{ $processo->requerente }}</td>
            <td>{{ $processo->adv_requerente }}</td>
            <td>{{ $processo->requerido }}</td>
            <td>{{ $processo->adv_requerido }}</td>
            <td>{{ $processo->juiz }}</td>
            <td>{{ $processo->promotor }}</td>
            <td>
                <button type="button" data-id="{{$processo->id}}" class="btn btn-success btn-sm editar">Editar</button>
                <button type="button" data-id="{{$processo->id}}" class="btn btn-danger btn-sm remover">Excluir</button>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $( document ).ready(function() {
            let $modal = $("#modal-processo");

            let $action = $("#action");
            let numero = $('#numero');
            let acao = $('#acao');
            let requerente = $('#requerente');
            let adv_requerente = $('#adv_requerente');
            let requerido = $('#requerido');
            let adv_requerido = $('#adv_requerido');
            let juiz = $('#juiz');
            let promotor = $('#promotor');

            $("#inserir").on("click", function (e) {
                e.preventDefault();
                $action.val("")
                $action.val("inserir");
                $("#form-processo").trigger("reset");
            });

            $(".editar").on("click", function () {

               let id =  $(this).data("id");

                let  $ajax = $.ajax({
                    url: "processo/editar/"+ id,
                    type: "GET",
                });
                $ajax.done(function (response){
                    $modal.modal('show');
                    $action.val("")
                    $action.val("atualizar");
                    $("#id").val(response.id);
                    numero.val(response.numero);
                    acao.val(response.acao);
                    requerente.val(response.requerente);
                    adv_requerente.val(response.adv_requerente);
                    requerido.val(response.requerido);
                    adv_requerido.val(response.adv_requerido);
                    juiz.val(response.juiz);
                    promotor.val(response.promotor);
                });
            });

            $(".remover").on("click", function () {

                let id =  $(this).data("id");

                let  $ajax = $.ajax({
                    url: "processo/remover/"+id,
                    type: "GET",
                });
                $ajax.done(function (response){
                    if(response.error === true){
                        alert(response.message);
                        return;
                    }
                    alert(response.message);
                    setTimeout(function () {
                        window.location.reload();
                    },500)
                });
            });

            $("#form-processo").submit(function(event){
                event.preventDefault();
                let $form = $(this);
                let $inputs = $form.find("input, select, button, textarea");
                let serializedData = $form.serialize();

                $inputs.prop("disabled", true);
               let  request = $.ajax({
                    url: "processo/salvar",
                    type: "POST",
                    data: serializedData
                });

                request.done(function (response){
                    if(response.error === true){
                        $inputs.prop("disabled", false);
                        alert(response.message);
                        return;
                    }

                    $modal.modal('hide');
                    $form.trigger("reset");
                    alert(response.message);
                    setTimeout(function () {
                        window.location.reload();
                    },300)

                });
                request.fail(function (response){
                    $form.trigger("reset");
                    console.error(
                        "The following error occurred"
                    );
                });
                request.always(function () {
                    // Reenable the inputs
                    $inputs.prop("disabled", false);
                });

            });
        });
    </script>
@endsection


