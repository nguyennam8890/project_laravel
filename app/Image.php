<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {

	protected $table = 'images';
	protected $fillable = ['name','product_id'];

	public $timestamps = true;
	//1 danh mục có nhiều sản phẩm
	public function product()
	{
		return $this->hasMany('App\Product');
	}
}
