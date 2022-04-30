<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CropFieldRequest;
use App\Http\Requests\UserRequest;
use App\Models\CropField;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;

//---------------------------Controlador de uma lavoura------------------
class CropFieldsController extends Controller {

    public function index() {
        return QueryBuilder::for(CropField::class)
            ->select(
                'crop_fields.name',
                'crop_fields.description',
                'crop_fields.qnt_hec',
                'crop_fields.location',
                'u.name as user_name',
                'crop_fields.created_at',
                'crop_fields.updated_at',
            )
            ->leftJoin('users as u', 'crop_fields.user_id', '=', 'u.id')
            ->paginate(request()->get('per_page'))
            ->appends(request()->query());
    }

    public function store(CropFieldRequest $request) {
        $data = $request->all();
        $request->validated();

        return CropField::create($data);
    }

    public function update(CropFieldRequest $request, CropField $field) {
        $request->validated();
        $field->update($request->all());
        return $field;
    }

    public function destroy($id) {
        $field = CropField::findOrFail($id);
        $field->delete();
        return \response('', 200);
    }
}
