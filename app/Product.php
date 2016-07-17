<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model {

	//
	protected $table = 'products';
	//protected $fillable = ['name','alias','	price','intro','content','image','keywords','description','status','user_id','cate_id'];
	protected $fillable = ['user_id','cate_id','pro_name','alias','image','pro_featured','pro_saller','pro_price','pro_unit','pro_not_price','pro_sell_off','pro_status','pro_content','pro_short_content','pro_terms_of_use','pro_digital','pro_pros_use','pro_digital','pro_pros_use','meta_title','meta_description','status'];
	public $timestamps = true;
	//1 sản phẩm thuộc về một danh mục nào đó
	public function cate()
	{
		return $this->belongTo('App\Cate');
	}
	//1 sản phẩm thì do 1 người dùng đăng
	public function user()
	{
		return $this->belongTo('App\User');
	}
	//1 sản phẩm có nhiều ảnh
	public function pimages()
	{
		return $this->hasMany('App\ProductImages');
	}

	 public function getProducts_Cates()
    {
        return $data = DB::table('products')
            ->join('cates', 'products.cate_id', '=', 'cates.id')
            ->select('products.*', 'cates.name')
            ->orderBy('created_at', 'desc')
            ->get();
    }
    public function updateCateidProduct($iCateId)
    {
             $aProductids = DB::table('products')->select('id')->where('cate_id',$iCateId)->get();
             if($aProductids)
             {
                foreach ($aProductids as $key => $aProductid) {
                    $update = DB::table('products')->where('id',$aProductid->id)->update(['cate_id'=>1]);
                }
                return true;
             }
             else
            {
                return false;
            }

    }
}
// id
// user_id
// cate_id
// name
// pro_name
// alias
// image
// pro_featured
// pro_saller
// pro_price
// price
// pro_unit
// pro_not_price
// pro_sell_off
// pro_status
// pro_content
// content
// intro
// pro_short_content
// pro_terms_of_use
// pro_digital
// pro_pros_use
// meta_title
// keywords
// meta_description
// description
// status
// updated_at
// created_at