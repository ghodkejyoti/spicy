<?php

/**
 * Created by Reliese Model.
 * Date: Thu, 23 May 2019 00:44:45 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $product_id
 * @property int $Product_category_id
 * @property string $name
 * @property string $sku
 * @property float $price
 * @property \Carbon\Carbon $createDateTime
 * @property \Carbon\Carbon $updateDateTime
 * 
 * @property \App\Models\Productcategory $productcategory
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $primaryKey = 'product_id';
	public $timestamps = false;

	protected $casts = [
		'Product_category_id' => 'int',
		'price' => 'float'
	];

	protected $dates = [
		'createDateTime',
		'updateDateTime'
	];

	protected $fillable = [
		'Product_category_id',
		'name',
		'sku',
		'price',
		'createDateTime',
		'updateDateTime'
	];

	public function productcategory()
	{
		return $this->belongsTo(\App\Models\Productcategory::class, 'Product_category_id');
	}
}
