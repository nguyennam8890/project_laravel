<?php namespace App\Http\Controllers;

/*use App\Http\Requests;*/
use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
use App\Http\Requests\CateRequest;
use App\Http\Requests\CatesRequest;
use App\Http\Requests\UpdateCatesRequest;
use App\Cate;
use App\Product;
use Input,File;
use Carbon\Carbon;
use Request;
//Gọi thư viện chứa custom function
use App\library\myFunctions;

class CateController extends Controller {

	protected $cates;
	//Hàm khởi tạo
    public function __construct()
    {
    	$cate = new Cate;
    	$this->cate = $cate;
    	$product = new Product;
    	$this->product = $product;
        $this->beforeFilter('csrf', array('on' => 'post'));
    }
	public function getList()
	{
		$data = Cate::select('id','name','parent_id','status')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data'));

	}
	public function getAdd()
	{
		$parent = Cate::select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.add',compact('parent'));
	}
	public function postAdd(CateRequest $request)
	{
		$cate = new Cate;
		$cate-> name        = $request->txtCateName;
		$cate-> order       = $request->txtOrder;
		$cate-> alias       = changeTitle($request->txtCateName);//Gọi đến hàm xử lý alias trong KhoaPham/functions
		$cate-> parent_id   = $request->slt_parent;
		$cate-> keyword     = $request->txtKeyword;
		$cate-> description = $request->txtDescription;
		$cate-> status      = $request->rdoStatus;
		$cate->save();
		return redirect()->route('admin.cate.list')->with(['level'=>'success','message'=>'Insert data complete']);
	}
	public function getDelete($id)
	{
		//kiểm tra xem id định xóa có cha hay không
		 $parent = Cate::where('parent_id',$id)->count();
		 if($parent ==0)
		 {
		 	 $cate = Cate::find($id);
		 	 $cate->delete($id);//Xóa danh mục sản phẩm
		 return redirect()->route('admin.cate.list')->with(['level'=>'success','message'=>'Delete data complete']);
		 }
		 else
		 {
		 	echo "<script  type='text/javascript'>
                  alert('Sory ! You can not delete');
                  window.location = '";
                  	echo route('admin.cate.list');
            echo "';
		 	</script>";
		 }
	}
	public function getEdit($id)
	{

		$data = Cate::findOrfail($id)->toArray();
		$parent = Cate::where('id','!=',$id)->select('id','name','parent_id')->get()->toArray();
		return view('admin.cate.edit',compact('parent','data'));
	}
	public function postEdit(CateRequest $request,$id)
	{

		/*$this->validate($request,
			['txtCateName' => 'required'],
			['txtCateName.required' => 'Please Enter Name Category 1']
			);*/
		$cate = new Cate;
		$cate = Cate::findOrFail($id);

		$cate-> name        = $request->txtCateName;
		$cate-> order       = $request->txtOrder;
		$cate-> alias       = changeTitle($request->txtCateName);//Gọi đến hàm xử lý alias trong KhoaPham/functions
		$cate-> parent_id   = $request->slt_parent;
		$cate-> keyword     = $request->txtKeyword;
		$cate-> description = $request->txtDescription;
		$cate-> status      = $request->rdoStatus;
		$cate->save();
		return redirect()->route('admin.cate.list')->with(['level'=>'success','message'=>'Update data complete']);
	}
//------------------------------------------------------------------Administrator-----------------------------------
	public function getDelete1()
	{

		if(Request::ajax()){
			$iCateId = Request::get('iCateId');

			//kiểm tra xem id định xóa có cha hay không
		 	$iParent = Cate::where('parent_id',$iCateId)->count();
		 	$oUncategorized = Cate::find($iCateId);
		 	if($iParent ==0 && $oUncategorized->id != 1)
			 {
			 	 $cate = Cate::find($iCateId);
			 	 //Cập nhật tất cả các sản phẩm về danh mục Uncategorized
			 	  $iProductid = $this->product->updateCateidProduct($iCateId); //kiểm tra danh mục có bao nhiêu sản phẩm, lấy id của những sản phẩm đó, tạo mảng, truyển vào câu lệnh truy vấn
				  $cate->delete($iCateId); //Xóa danh mục sản phẩm
			 	  return 'Oke';
			 }
			 else
			 {
			 	echo "<script  type='text/javascript'>
	                  alert('Bạn không thể xóa danh mục này rồi ');
	                  window.location = '";
	                  	echo route('administrator.cate.list1');
	            echo "';
			 	</script>";
			 }
		}
	}
	public function getEdit1($id)
	{
		if($id == 1)
		{
			return redirect()->route('administrator.cate.list1')->with(['level'=>'success','message'=>'Bạn không thể cập nhật danh mục này']);
		}
		else
		{
			// Lấy ra danh mục cần sửa theo id
			$categoryDetail = Cate::findOrfail($id)->toArray();
			$category_product = Cate::where('id','!=',$id)->select('id','name','parent_id')->get()->toArray();
			//Lấy ra danh mục cha của danh mục cần sửa
			$oParentCategory = $this->cate->getWhere('parent_id',$id);
			return view('administrator.cate.edit',compact('category_product','categoryDetail','oParentCategory'));
		}
	}
	public function postEdit1(UpdateCatesRequest $request,$id)
	{

			$cate                 = new Cate;
			$cate = Cate::findOrFail($id);

			$cate->parent_id      = $request->parent_id;
			$cate->name           = $request->name;
			$cate->alias          = changeTitle($request->name);//Gọi đến hàm xử lý alias trong KhoaPham/functions


			$picturePath = Input::file('picture');
			//editUploadPicture
			$this->editUploadPicture($request,$picturePath,$cate);
			$bannerPath = Input::file('banner');
			//editUploadBanner
			$this->editUploadBanner($request,$bannerPath,$cate);

			$cate->banner_url     = $request->banner_url;
			$cate->order          = $request->order;
			$cate->ordering_index = $request->ordering_index;
			if($request->status   == 'on')$cate-> status=1; else $cate->status=0;
			//Kiêm tra checkbox status
			$cate-> keyword       = $request->keyword;
			$cate-> description   = $request->description;
			$cate->save();
			return redirect()->route('administrator.cate.list1')->with(['level'=>'success','message'=>'Cập nhật danh mục thành công']);
	}
	public function editUploadPicture($request,$picturePath,$cate)
	{
		/*- Nếu chọn ảnh , không tích hay tích vào checkbox
		    --> +cập nhật ảnh
		        +xóa ảnh trong thư mục lưu trữ
		- Nếu không chọn ảnh, tích vào checkbox
		    --> +Xóa ảnh trong thư mục lưu trữ
		        +Cập nhật vào trong DB một cái ảnh rỗng*/
		//Lấy ngày hiện tại gắn vào tên ảnh
		$date = Carbon::now()->format('d_m_Y_h_i_s_');
		if(!empty($picturePath))
		{
			//Xóa ảnh hiện tại nếu có
			$pictureCurrent = 'resources/upload/'.$request->pictureCurrent;
			if(File::exists($pictureCurrent ))
			{
			File::delete($pictureCurrent );
			}
			//Cập nhật ảnh mới
			$picture              = $picturePath->getClientOriginalName();// lấy tên ảnh picture
			$cate->picture        = $date.$picture;
			$request->file('picture')->move('resources/upload/',$date.$picture);
		}
		else
		{
			if($request->checkBoxDeletePicture   == 'on')
			{
				$pictureCurrent = 'resources/upload/'.$request->pictureCurrent;
				//Xóa ảnh hiện tại nếu có
				if(File::exists($pictureCurrent ))
				{
				File::delete($pictureCurrent );
				$cate->picture = '';
				}
			}
		}
	}
	public function updateStatusCategory()
	{
		if(Request::ajax()){
			$iCateId = Request::get('iCateId');
			$cate = Cate::findOrFail($iCateId);
			if($cate->status == 1)$cate->status = 0;
			elseif($cate->status == 0)$cate->status = 1;
			$cate->save();
		}
		return 'Oke';
	}
	public function editUploadBanner($request,$bannerPath,$cate)
	{
		$date = Carbon::now()->format('d_m_Y_h_i_s_');
		if(!empty($bannerPath))
		{
			//Xóa banner hiện tại nếu có
			$bannerCurrent = 'resources/upload/'.$request->bannerCurrent;
			if(File::exists($bannerCurrent ))
			{
			File::delete($bannerCurrent );
			}

			$banner               = $bannerPath->getClientOriginalName();// lấy tên ảnh banner
			$cate->banner         = $date.$banner;
			$request->file('banner')->move('resources/upload/',$date.$banner);
		}
		else
		{
			//checkBoxDeleteBanner
			if($request->checkBoxDeleteBanner   == 'on')
				{

					$bannerCurrent = 'resources/upload/'.$request->bannerCurrent;
					//Xóa ảnh hiện tại nếu có
					if(File::exists($bannerCurrent))
					{
					File::delete($bannerCurrent );
					$cate->banner = '';
					}
				}
		}
	}
	public function postAdd1(CatesRequest $request)
	{
		//Lấy ngày hiện tại
		$date = Carbon::now()->format('d_m_Y_h_i_s_');
		$cate                 = new Cate;
		$cate->parent_id      = $request->parent_id;
		$cate->name           = $request->name;
		$cate->alias          = changeTitle($request->name);//Gọi đến hàm xử lý alias trong KhoaPham/functions

		$picture_path = Input::file('picture');
		if(!empty($picture_path))
		{
			$picture              = $picture_path->getClientOriginalName();// lấy tên ảnh picture
			$cate->picture        = $date.$picture;
			$request->file('picture')->move('resources/upload/',$picture);
		}
		$banner_path = Input::file('banner');
		if(!empty($banner_path))
		{
			$banner               = $banner_path->getClientOriginalName();// lấy tên ảnh banner
			$cate->banner         = $date.$banner;
			$request->file('banner')->move('resources/upload/',$banner);
		}

		$cate->banner_url     = $request->banner_url;
		$cate->order          = $request->order;
		$cate->ordering_index = $request->ordering_index;
		//Kiêm tra checkbox status
		// if($request->status   == 'on')$cate->status=1; else $cate->status=0;
		$cate->status = 1;
		$cate-> keyword       = $request->keyword;
		$cate-> description   = $request->description;
		$cate->save();
		return redirect()->route('administrator.cate.list1')->with(['level'=>'success','message'=>'Thêm mới danh mục sản phẩm thành công']);
	}
	public function getList1()
	{

		//Lấy danh sách danh mục sản phẩm
	    /*$oListCategorys = $this->cate->getAll();*/
		$aListCategorys = Cate::all();
		// Lấy tên danh mục sản phẩm có phân cấp hiển thị ra ngoài view
		$FmyFunctions1 = new myFunctions;
 		$aListCategorys = $FmyFunctions1->recursive(0,$aListCategorys,'','view');
 		//Đếm số lượng bản ghi theo danh mục sản phẩm
 		if($aListCategorys){
 			foreach ($aListCategorys as $key => $aListCategory) {
			$aCountRecordByCategorys[$key]['id'] = Cate::find($aListCategory['id'])->product()->count();
			}
 		}
		return view('administrator.cate.list',compact('aListCategorys','aCountRecordByCategorys'));
	}
	public function getAdd1()
	{
		$category_product = Cate::select('id','name','parent_id')->get()->toArray();
		return view('administrator.cate.add',compact('category_product'));
	}
}
