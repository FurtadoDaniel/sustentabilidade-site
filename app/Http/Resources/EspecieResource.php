<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class EspecieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'    =>  $this->id,
            'tipo'  =>  $this->tipo,
            'nome'  =>  $this->nome,
            'nome_cientifico' =>  $this->nome_cientifico,
            'descricao' =>  $this->descricao,
            'extincao'  =>  $this->extincao,
            $this->anexo->nome =>   $this->anexo->path,
            'created_at'    =>  $this->created_at,
            'updated_at'    =>  $this->updated_at,
            'link'  =>  route('especies.show', $this)
        ];
    }
}
