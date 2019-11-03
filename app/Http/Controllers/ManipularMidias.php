<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Plank\Mediable\MediaUploaderFacade as MediaUploader;

class ManipularMidias extends Controller
{
    /**
     * Método feito para lidar com manipulações de mídias do sistema.
     * 
     * Realiza operações de attach, detach e sync.
     * 
     * @author Joao Gabriel C. Melo <joaomelo.contato@outlook.com>
     *
     * @param \Illuminate\Http\Request  $request
     * @param string                    $model      nome do recurso no singular. ex.: colaborador
     * @param integer                   $id         id do recurso
     * @param string                    $operacao   operação a ser realizada. attach, sync ou detach
     *
     * @return \Illuminate\Http\Request
     */
    public function __invoke(
        Request $request,
        string  $model,
        int     $id,
        string  $operacao
    ) {
        // recupera o recurso informado para uma variavel com o nome do recurso
        ${$model} = ('\\App\\' . ucfirst($model))::find($id);
        // recupera a lista de midias desse recurso
        $midias = ${$model}->getMidias();
        
        /*
         * percorre a lista de midias 
         * realizando a operacao informada em cada midia encontrada no request
         */
        foreach ($midias as $midia) {
            if ($request->has($midia)) {
                ${$model}->{$operacao . 'Media'}(
                    // Teste para saber se deve ser salva nova midia
                    $operacao == 'attach' ?
                    // true
                    MediaUploader::fromSource($request->file($midia))
                        ->upload() :
                    // false
                    $request->{$midia},
                    $midia
                );
            }
        }
        
        return back();
    }
}
