<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryProductRequest;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;

//-------------------------------Controlador das categorias de produto-------------------------------
class CategoryProductController extends Controller {

    public function index() {
        return CategoryProduct::all();
    }

    public function store(CategoryProductRequest $request) {
        $data = $request->all();
        $request->validated();
        return CategoryProduct::create($data);
    }


    public function update(CategoryProductRequest $request, CategoryProduct $category) {
        $request->validated();
        $category->update($request->all());
        return $category;
    }


    public function destroy($id) {
        $category = CategoryProduct::findOrFail($id);
        $category->delete();
        return \response('', 200);
    }
}
