<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SetProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $product = new Product([
            'name' => $request->input('name'),
            'type' => $request->input('productType'),
            'price' => $request->input('price')
        ]);
        $product->save();

        if ($request->input('productList')) {
            $products = [];
            foreach ($request->input('productList') as $id) {
                $products[] = [
                    'product_id' => $id,
                    'set_id'    => $product->id
                ];
            }
            SetProduct::insert($products);
        }

        return Product::find($product->id);
    }

    public function destroy($id)
    {
        $isPartOfSet = SetProduct::where('product_id', $id)->first();
        if ($isPartOfSet) {
            abort(400, 'Этот товар нельзя удалить, так как он является частью набора');
        }
        
        SetProduct::where('set_id', $id)->delete();
        
        $product = Product::findOrFail($id);
        $product->delete();
        
        return Product::all();
    }
}
