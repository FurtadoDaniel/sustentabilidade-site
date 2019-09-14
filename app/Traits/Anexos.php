<?php

namespace App\Traits;

// Model
use App\Anexo;
// Request
use Illuminate\Http\Request;
// Armazenamento
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Trait que lida com Inclusao, Visualizacao e Exclusao de Anexos.
 * 
 * @author Joao Gabriel C. Melo <joao.melo@iq.ufrj.br>
 */
trait Anexos
{
    /**
     * Metodo de armazenamento de anexo.
     * 
     * O metetodo verifica se no request existe algum arquivo para de anexos.
     * Caso exista,
     * percorre cada arquivo criando um Model anexo e salvando na database,
     * vinculado ao chamado que implementa a Trait.
     * 
     * @author Joao Gabriel C. Melo <joao.melo@iq.ufrj.br>
     *
     * @param \Illuminate\Http\Request $request
     * @param string $diretorio Opcional. Campo que informa onde salvar o anexo.
     * @param string $nomeDoCampo Opcional. Nome do campo de anexo.
     *
     * @return void
     */
    public function salvarAnexosSeExistir(
        Request $request,
        $diretorio = 'Anexos/Suporte',
        $nomeDoCampo = 'anexos'
    ) {
        if ($request->hasFile($nomeDoCampo)) {
            foreach ($request->file($nomeDoCampo) as $anexo) {
                $path = $anexo->store($diretorio);
                $this->anexos()->save(new Anexo([
                    'path'  =>  $path,
                    'nome'  =>  Str::ascii($anexo->getClientOriginalName())
                ]));
            }
        }
    }

    /**
     * Metodo que retorna o anexo para ser baixado ou visualizado
     *
     * @author Joao Gabriel C. Melo <joao.melo@iq.ufrj.br>
     * 
     * @param String $path
     * @param String $nome
     *
     * @return File
     */
    public static function baixarAnexo($path, $nome = 'Anexo')
    {
        return Storage::download($path, $nome);
    }

    /**
     * Metodo que apaga um anexo.
     *
     * @author Joao Gabriel C. Melo <joao.melo@iq.ufrj.br>
     * 
     * @param integer $id
     *
     * @return void
     */
    public static function apagarAnexo($id)
    {
        Anexo::destroy($id);
    }

    /**
     * Metodo que restaura um anexo apagado com Soft Delete
     *
     * @author Joao Gabriel C. Melo <joao.melo@iq.ufrj.br>
     * 
     * @param integer $id
     *
     * @return void
     */
    public static function resraurarAnexo($id)
    {
        Anexo::withTrashed()->find($id)->restore();
    }
}
