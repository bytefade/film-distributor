<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        return Distributor::all();
    }

    public function show(Distributor $distributor)
    {
        return $distributor;
    }

    public function store(Request $request)
    {
        $distributor = Distributor::create($request->all());

        return response()->json($distributor, 201);
    }

    public function update(Request $request, Distributor $distributor)
    {
        $distributor->update($request->all());

        return response()->json($distributor);
    }

    public function delete(Distributor $distributor)
    {
        $distributor->delete();

        return response()->json(null, 204);
    }
}
