<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Product;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(10);
		return ProductResource::Collection($data);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = $request->isMethod('put')?Product::findOrFail
		($request->product_id) : new Product;
		
		$product->product_id = $request->input('product_id');
		$product->product_category_id = $request->input('product_category_id');
		$product->name = $request->input('name');
		$product->sku = $request->input('sku');
		$product->price = $request->input('price');
		$product->createDateTime = $request->input('createDateTime');
		$product->updateDateTime = $request->input('updateDateTime');
		
		if($product->save()){
			return new ProductResource($product);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
		
		//return single product as a resource
		return new ProductResource($product);
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
		
		if($product->delete()){
			return new ProductResource($product);
		}
    }
}
