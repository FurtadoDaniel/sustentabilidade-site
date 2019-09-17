<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'tipo'      =>  $this->tipo,
            'titulo'    =>  $this->titulo,
            'conteudo'  =>  $this->conteudo,
            'user'      =>  new UserResource($this->user),
            $this->anexo->nome => $this->anexo->path,
            'created_at'=>  $this->created_at,
            'updated_at'=>  $this->updated,
            'link'      =>  route('posts.show', $this)
        ];
    }
}
