<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\UserRequest;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;

//---------------------------Controlador de um produto------------------
class ProductsController extends Controller {

    public function index() {
        return QueryBuilder::for(Product::class)
            ->select(
                'products.name',
                        'products.description',
                        'cat.name as category_name',
                        'products.created_at',
                        'products.updated_at',
                        )
            ->leftJoin('categories_product as cat', 'products.category_id', '=', 'cat.id')
            ->paginate(request()->get('per_page'))
            ->appends(request()->query());
    }

    public function store(ProductRequest $request) {
        $data = $request->all();
        $request->validated();
        return Product::create($data);
    }


    public function update(ProductRequest $request, Product $product) {
        $request->validated();
        $product->update($request->all());
        return $product;
    }

    public function destroy($id) {
        $product = Product::findOrFail($id);
        $product->delete();
        return \response('', 200);
    }
}
