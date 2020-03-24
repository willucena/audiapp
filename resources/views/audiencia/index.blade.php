@extends('layout/layout')
<?php date_default_timezone_set('America/Sao_Paulo');?>
@section('content')
    <div class="row">
        <div class="col-sm-2 jumbotron-fluid">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <h5 class="panel-title">Ata de audiência</h5>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control form-control-sm numero" placeholder="Nº PJE" name="numero" type="text" autofocus="">
                            </div>
                            <div class="form-group">
                                <select class="form-control form-control-sm" id="resultado">
                                    <option>Selecione um resultado</option>
                                    <option value="001">001 - Redesigna nova audiência</option>
                                    <option value="002">002 - Transigiram: Alimentos Rendimento Bruto</option>
                                    <option value="003">003 - Transigiram: Alimentos Salário Mínimo</option>
                                </select>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-10">
            <span class="border-0">
                   <div class="panel-heading">
                <h5 class="panel-title text-sm-center">TERMO DE AUDIÊNCIA</h5>
                <table class="table table-sm  table-bordered ">
                    <tr>
                        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >Nº PJE:</th>
                        <td id="numeroProcesso"></td>
                    </tr>
                    <tr>
                        <th>Ação:</th>
                        <td id="acao"></td>
                    </tr>
                </table>
                <table class="table table-sm  table-bordered ">
                    <tr>
                        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >Requerente:</th>
                        <td id="requerente"></td>
                    </tr>
                    <tr>
                        <th>Adv. Requerente:</th>
                        <td id="adv_requerente"></td>
                    </tr>
                </table>
                <table class="table table-sm  table-bordered ">
                    <tr>
                        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >Requerido:</th>
                        <td id="requerido"></td>
                    </tr>
                    <tr>
                        <th>Adv. Requerido:</th>
                        <td id="adv_requerido"></td>
                    </tr>
                </table>
                <table class="table table-sm  table-bordered ">
                    <tr>
                        <th class="col-xs-2 col-sm-2 col-md-2 col-lg-2" >Juizª de direito:</th>
                        <td id="juiz"></td>
                    </tr>
                    <tr>
                        <th>Promotorª de direito:</th>
                        <td id="promotor"></td>
                    </tr>
                </table>
            </div>
            <div id="texto-padrao">
             Aos, <?php echo date('H:i:s') ?>, nesta cidade do Riacho Fundo, na sala de audiências deste Juízo, foiaberta a audiência de Conciliação nos autos da ação supramencionada. Feito o pregão
dentro das formalidades legais, a
            </div>
            </span>

        </div>
    </div>
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    <script src="{{asset('page/audiencia.js')}}" ></script>
    <script>
        $(document).ready(function () {
            Audiencia.init();
        })
    </script>

@endsection
