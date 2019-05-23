<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Productcategory;
use App\Http\Resources\ProductCategory as ProductcategoryResource;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Productcategory::paginate(10);
		return ProductcategoryResource::Collection($data);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $productcategory = $request->isMethod('put')?Productcategory::findOrFail
		($request->product_category_id) : new Productcategory;
		
		$productcategory->product_category_id = $request->input('product_category_id');
		$productcategory->productCategory = $request->input('productCategory');
		
		if($productcategory->save()){
			return new ProductcategoryResource($productcategory);
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
        $productcategory = Productcategory::findOrFail($id);
		
		//return single product as a resource
		return new ProductcategoryResource($productcategory);
    }

	
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productcategory = Productcategory::findOrFail($id);
		
		if($productcategory->delete()){
			return new ProductcategoryResource($productcategory);
		}
    }
}
