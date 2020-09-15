<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jornalista;

class JornalistaController extends Controller
{
    private $jornalista;

    //Se digitar o id ele mostra um único jornalista, se não digitar ele mostra todos
    public function __construct(Jornalista $jornalista)
    {
        $this->jornalista = $jornalista;
    }

    public function index ()
    {
        //$data = ['data' => $this->jornalista->all()];
	    return response()->json($this->jornalista->paginate(5));
    }

    public function consultar(Jornalista $id)
    {
        $data = ['data' => $id];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try{
            $DataJornalista = ($request->all());
            $this->jornalista->create($DataJornalista);

            $return = ['data' => ['msg' => 'Jornalista adicionado com sucesso!']];
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

			$DataJornalista = $request->all();
            $Findjornalista = $this->jornalista->find($id);
			$Findjornalista->update($DataJornalista);

			$return = ['data' => ['msg' => 'Jornalista atualizado com sucesso!']];
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

			$DataJornalista = $request->all();
            $Findjornalista = $this->jornalista->find($id);
			$Findjornalista->delete($DataJornalista);

			$return = ['data' => ['msg' => 'Jornalista deletado com sucesso!']];
			return response()->json($return, 201);

		} catch (\Exception $e) {
			if(config('app.debug')) {
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011),  500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao realizar operação de atualizar', 1011), 500);
		}
	}
}
