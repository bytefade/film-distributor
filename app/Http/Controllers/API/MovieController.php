<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MovieController extends BaseController
{
    public function index()
    {
        $movies = Movie::all();

        return $this->sendResponse(MovieResource::collection($movies), 'Filmes recuperados com sucesso.');
    }

    public function show($movie)
    {
        $movie = Movie::find($movie);

        if (is_null($movie)) {
            return $this->sendError('Filme não encontrado.');
        }

        return $this->sendResponse(new MovieResource($movie), 'Filmes recuperado com sucesso.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'distributor_id' => 'required',
            'national_title' => 'required',
            'classification' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erro na validação', $validator->errors());
        }

        $movie = Movie::create($input);

        return $this->sendResponse(new MovieResource($movie), 'Filme criado com sucesso.');
    }

    public function update(Request $request, Movie $movie)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'distributor_id' => 'required',
            'national_title' => 'required',
            'classification' => 'required',
            'duration' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erros na validação', $validator->errors());
        }

        $movie->status = $input['status'];
        $movie->distributor_id = $input['distributor_id'];
        $movie->roe = $input['roe'];
        $movie->national_title = $input['national_title'];
        $movie->original_title = $input['original_title'];
        $movie->url_trailer = $input['url_trailer'];
        $movie->synopsis = $input['synopsis'];
        $movie->launch_date = $input['launch_date'];
        $movie->classification = $input['classification'];
        $movie->duration = $input['duration'];
        $movie->save();

        return $this->sendResponse(new MovieResource($movie), 'Filme atualizado com sucesso.');

    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return $this->sendResponse([], 'Filme apagado com sucesso.');
    }
}
