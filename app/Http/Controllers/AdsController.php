<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdsController extends Controller {
    public function getList1()
    {
        return view('administrator.ads.list');
    }
    public function getAdd1()
    {
        return view('administrator.ads.add');
    }
        public function getEdit1()
    {
        return view('administrator.ads.edit');
    }


}
