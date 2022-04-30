<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CerealRequest;
use App\Models\Cereal;

class CerealsController extends Controller {

    public function index() {
        return Cereal::all();
    }


    public function store(CerealRequest $request) {
        $data = $request->all();
        $request->validated();
        return Cereal::create($data);
    }

    public function update(CerealRequest $request, Cereal $cereal) {
        $request->validated();
        $cereal->update($request->all());
        return $cereal;
    }


    public function destroy($id) {
        $cereal = Cereal::findOrFail($id);
        $cereal->delete();
        return \response('', 200);
    }
}
