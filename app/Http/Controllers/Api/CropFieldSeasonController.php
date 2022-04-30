<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CropFieldSeasonRequest;
use App\Models\CropField;
use App\Models\CropFieldSeason;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

class CropFieldSeasonController extends Controller {


    public function index($crop_field_id) {

        return QueryBuilder::for(CropFieldSeason::class)
            ->select(
                'cereal.name as cereal_name',
                'crop_fields_season.start_date',
                'crop_fields_season.end_date',
                'crop_fields_season.variety_cereal',
                'crop_fields_season.created_at',
                'crop_fields_season.updated_at',
            )
            ->leftJoin('cereals as cereal', 'crop_fields_season.cereal_id', '=', 'cereal.id')
            ->where('crop_fields_season.crop_field_id', '=', $crop_field_id)
            ->paginate(request()->get('per_page'))
            ->appends(request()->query());
    }


    public function store(CropFieldSeasonRequest $request, $crop_field_id) {
        $data = $request->all();


        if (!CropField::find($crop_field_id)) {

            // todo aqui tem que retornar um json como se fosse de um erro, caso não encontre o id da lavoura
            return json([
                400, 'Non-existing Crop Field'
            ]);
            // fixme exemplo de retorno
            /*
            {
                 "message": "The given data was invalid.",
                 "errors": {
                     "cereal_id": [
                         "Cereal is required"
                     ]
                 }
            }
             */
        }

        $data['crop_field_id'] = $crop_field_id;
        return CropFieldSeason::create($data);
    }


    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
