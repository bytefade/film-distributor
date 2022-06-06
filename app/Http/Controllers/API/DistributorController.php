<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\DistributorResource;
use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DistributorController extends BaseController
{
    public function index()
    {
        $distributors = Distributor::all();

        return $this->sendResponse(DistributorResource::collection($distributors), 'Distribuidores recuperados com sucesso.');
    }

    public function show($distributor)
    {
        $distributor = Distributor::find($distributor);

        if (is_null($distributor)) {
            return $this->sendError('Distribuidor não encontrado.');
        }

        return $this->sendResponse(new DistributorResource($distributor), 'Distribuidor recuperado com sucesso.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'cnpj' => 'required',
            'social_name' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erro de validação', $validator->errors());
        }

        $distributor = Distributor::create($input);

        return $this->sendResponse(new DistributorResource($distributor), 'Distribuidor criado com sucesso.');

    }

    public function update(Request $request, Distributor $distributor)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'cnpj' => 'required',
            'social_name' => 'required',
            'name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erros na validação', $validator->errors());
        }

        $distributor->cnpj = $input['cnpj'];
        $distributor->social_name = $input['social_name'];
        $distributor->name = $input['name'];
        $distributor->save();

        return $this->sendResponse(new DistributorResource($distributor), 'Distribuidor atualizado com sucesso.');

    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();

        return $this->sendResponse([], 'Distribuidor apagado com sucesso.');
    }
}
