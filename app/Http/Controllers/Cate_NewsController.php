<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Cate_NewsController extends Controller {

	public function getList1()
    {
        return view('administrator.cate_news.list');
    }
    public function getAdd1()
    {
        return view('administrator.cate_news.add');
    }
        public function getEdit1()
    {
        return view('administrator.cate_news.edit');
    }
}
