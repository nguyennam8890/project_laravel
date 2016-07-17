<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Cate extends Model {

	//
	protected $table = 'cates';
	protected $fillable = ['id','parent_id','name','alias','picture','banner','banner_url','order','ordering_index','keyword','description','status'];

	public $timestamps = true;
	//1 danh mục có nhiều sản phẩm
	public function product()
	{
		return $this->hasMany('App\Product');
	}
    public function getAll()
    {
        return  $data = DB::table('cates')->select('*')->get();
    }
    public function getWhere($select,$where)
    {
        $oParent_id = DB::table($this->table)->select($select)->where('id','=',$where)->first();
        return $oData = DB::table($this->table)->where('id',$oParent_id->parent_id)->first();
    }
}