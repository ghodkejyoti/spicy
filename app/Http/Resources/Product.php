<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
		return[
			'product_id'=> $this->product_id,
			'product_category_id'=> $this->Product_category_id,
			'name'=> $this->name,
			'sku'=> $this->sku,
			'price'=> $this->price,
			'createDateTime'=> $this->createDateTime,
			'updateDateTime'=> $this->updateDateTime
			
		];
    }
	/*public function with($request){
		return[
			'version'=> '1.0.0',
			'author_url'=> 'http://phpchallenge.test'
		];
	}*/
}
