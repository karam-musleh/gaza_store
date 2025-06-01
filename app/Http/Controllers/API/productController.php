<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProudectResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products=Product::all();
        // return json_encode($products);

        // $products= [];
        // foreach(Product::all() as $product){
        //     $products[] = [
        //         "name"=>$product->trans_name ,
        //         "price"=> $product->price ,
        //         'description'=> $product->trans_description
        //     ];
        // }
        // return Product::all();
        // return $products ;
        return [
            'status' => true,
            'message' => 'All Product',
            'products' => ProudectResource::collection(Product::all())
        ];
    }




    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
            'image' => 'required',
            'gallery' => 'required',
            'price' => 'required',
            'description_en' => 'required',
            'description_ar' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
        ]);
        // $data = $request->except('_token', 'image','gallery');

        $product = Product::create([
            'name' => '',
            'description' => '',
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
        ]);
        $img_name = rand() . time() . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images'), $img_name);
        $product->image()->create([
            'path' => $img_name,
        ]);

        foreach ($request->gallery as $img) {
            $img_name = rand() . time() . $img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);
            $product->image()->create([
                'path' => $img_name,
                'type' => 'gallery'
            ]);
        }
        return response()->json([
            'status' => "true",
            'message' => 'new Product Added',
            'Product' => new ProudectResource($product)
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => "true",
                'message' => 'product Found',
                'Product' => new ProudectResource($product)
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not Found'

            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
