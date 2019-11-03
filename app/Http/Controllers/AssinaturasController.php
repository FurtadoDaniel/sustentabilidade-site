<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assinaturas;

class AssinaturasController extends Controller
{
    public function create(Request $request)
    {
        $collection = Assinaturas::all();
        $filtered = $collection->filter(function($model) use ($request){
            return $model->user_id == $request->user_id and $model->abaixo_id == $request->abaixo_id;
        });

        if(!count($filtered->toArray()) > 0){
            $assinatura = new Assinaturas;
            $assinatura->user_id = $request->user_id;
            $assinatura->abaixo_id = $request->abaixo_id;
            $assinatura->save();
        }
        return redirect('/abaixo-assinados');
    }
}
