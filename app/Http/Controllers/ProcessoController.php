<?php

namespace App\Http\Controllers;

use App\Processo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProcessoController extends Controller
{

    const ACTION_ATUALIZAR = 'atualizar';
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $processos = Processo::all();
        return view('processo.index',['processos'=> $processos]);

    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function salvar(Request $request)
    {
        try{
            if($request->isMethod('POST') && $request->ajax())
            {
                $message = 'Processo cadastro com sucesso';
                $processo = new Processo();

                if($request->id && $request->action === self::ACTION_ATUALIZAR){
                    $processo = Processo::findOrFail($request->id);
                    $message = 'Processo atualizado com sucesso';
                }

                $processo->numero = $request->numero;
                $processo->acao = $request->acao;
                $processo->requerente = $request->requerente;
                $processo->adv_requerente = $request->adv_requerente;
                $processo->requerido = $request->requerido;
                $processo->adv_requerido = $request->adv_requerido;
                $processo->juiz = $request->juiz;
                $processo->promotor = $request->promotor;

                $processo->save();

                $response = [
                    'error' => false,
                    'message' => $message
                ];
            }
        }catch (QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                $response = [
                    'error' => true,
                    'message' => 'Processo número '.$request->numero.' ja esta cadatrado no sistema'
                ];
            }
        }catch (\Exception $exception){
            $response = [
                'error' => true,
                'message' => 'Algo deu errado. Contate o administrador do sistema (61) 98550-7287'
            ];
        }

        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editar($id)
    {
        $processo = Processo::findOrFail($id);
        return response()->json($processo->toArray());
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function remover($id)
    {
        try{
            $processo = Processo::findOrFail($id);
            $processo->delete();
            $response = [
                'error' => false,
                'message' => 'Processo exluido com sucesso'
            ];
        }catch (\Exception $exception){
            $response = [
                'error' => true,
                'message' => 'Algo deu errado. Contate o administrador do sistema (61) 98550-7287'
            ];
        }

        return response()->json($response);
    }

    /**
     * @param $numero
     * @return \Illuminate\Http\JsonResponse
     */
    public function buscar($numero)
    {
        $processo = Processo::where('numero', '=', $numero)->first();

        if(!$processo){
            return null;
        }

        $data = $processo->toArray();
        return response()->json($data);
    }

}
