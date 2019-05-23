<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 00:44:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Productcategory
 * 
 * @property int $product_category_id
 * @property string $productCategory
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Productcategory extends Eloquent
{
	protected $table = 'productcategory';
	protected $primaryKey = 'product_category_id';
	public $timestamps = false;

	protected $fillable = [
		'productCategory'
	];

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'Product_category_id');
	}
}
