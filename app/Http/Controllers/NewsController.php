<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class NewsController extends Controller {

    public function getList1()
    {
        return view('administrator.news.list');
    }
    public function getAdd1()
    {
        return view('administrator.news.add');
    }
        public function getEdit1()
    {
        return view('administrator.news.edit');
    }

}
