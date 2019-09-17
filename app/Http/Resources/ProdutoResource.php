<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdutoResource extends JsonResource
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
            'id'        =>  $this->id,
            'nome'      =>  $this->nome,
            'preco'     =>  $this->preco,
            'descricao' =>  $this->descricao,
            'tipo'      =>  $this->tipo,
            'user'      =>  new UserResource($this->user),
            'created_at'=>  $this->created_at,
            'updated_at'=>  $this->updated_at,
           // $this->anexo->nome  =>  $this->anexo->path,
            'link'      =>  route('produtos.show', $this)
        ];
    }
}
