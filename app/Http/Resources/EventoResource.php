<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EventoResource extends JsonResource
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
            'titulo'    =>  $this->titulo,
            'local'     =>  $this->local,
            'descricao' =>  $this->descricao,
            $this->anexo->nome  =>  $this->anexo->path,
            'inicio'    =>  $this->inicio,
            'fim'       =>  $this->fim,
            'user'      =>  new UserResource($this->user),
            'created_at'=>  $this->created_at,
            'updated_at'=>  $this->updated_at,
            'link'      =>  route('eventos.show', $this)
        ];
    }
}
