<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artigo;

class ArtigoController extends Controller
{
    private $artigo;

    //Se digitar o id ele mostra um único jornalista, se não digitar ele mostra todos
    public function __construct(Artigo $artigo)
    {
        $this->artigo = $artigo;
    }

    public function index ()
    {
        //$data = ['data' => $this->artigo->all()];
	    return response()->json($this->artigo->paginate(5));
    }

    public function consultar(Artigo $id)
    {
        $data = ['data' => $id];
        return response()->json($data);
    }

    public function listPorStatus(Request $request, $status)
    {
        $DataArtigo = $request->all();
        $FindArtigo = $this->artigo->where('statusPubli', $status)->get();

        return response()->json($FindArtigo);
    }
    

    public function store(Request $request)
    {
        try{
            $DataArtigo = ($request->all());
            $this->artigo->create($DataArtigo);

            $return = ['data' => ['msg' => 'Artigo adicionado com sucesso!']];
            return response()->json($return, 201);

        } catch(\Exception $e){

            if(config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
            }
            return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de salvar', 1010),  500);
        }
    }

    public function update(Request $request, $id)
	{
		try {

			$DataArtigo = $request->all();
            $FindArtigo = $this->artigo->find($id);
			$FindArtigo->update($DataArtigo);

			$return = ['data' => ['msg' => 'Artigo atualizado com sucesso!']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011), 500);
		}
    }
    
    public function delete(Request $request, $id)
	{
		try {

			$DataArtigo = $request->all();
            $FindArtigo = $this->artigo->find($id);
			$FindArtigo->delete($DataArtigo);

			$return = ['data' => ['msg' => 'Artigo deletado com sucesso!']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011), 500);
		}
	}
}
