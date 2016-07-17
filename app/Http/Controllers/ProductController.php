<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
//Thêm Illuminate\Support\Facades\Input khi gặp class input not found
/*use Illuminate\Support\Facades\Input;*/
//use Illuminate\Http\Request;
use Request;
use App\Cate;
use App\Product;
use Auth;
use App\ProductImages;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductsRequest;
use Input,File;
use Carbon\Carbon;

class ProductController extends Controller {
	//Hàm khởi tạo
    public function __construct()
    {
    	$cate = new Cate;
    	$this->cate = $cate;
    	$product = new Product;
    	$this->product = $product;

    }
	public function getList()
	{
		$data = Product::select('*')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}
	public function getAdd()
	{
		$cate = Cate::select('*')->get()->toArray();
		return view('admin.product.add',compact('cate'));
	}
	public function postAdd(ProductRequest $product_request)
	{

		$file_name = $product_request->file('fImages')->getClientOriginalName();
		$product              = new Product();
		$product->name        = $product_request->txtName;

		$product->alias       = changeTitle($product_request->txtName);

		$product->price       = $product_request->txtPrice;
		$product->intro       = $product_request->txtIntro;
		$product->content     = $product_request->txtContent;

		$product->image       = $file_name;

		$product->keywords    = $product_request->txtKeywords;
		$product->description = $product_request->txtDescription;

		$product->status      = $product_request->rdoStatus;

		$product->user_id     = Auth::user()->id;
		$product->cate_id     = $product_request->slt_parent;
		//Di chuyển image vào thư mục lưu trữ
		$product_request->file('fImages')->move('resources/upload/',$file_name);
		$product->save();

		//Lấy id sản phẩm vửa insert xong
		$product_id = $product->id;
		//insert data vào table Product_image

		//Thêm ảnh chi tiết của sản phẩm vào
		if(Input::hasFile('fProductDetail'))
		{
			foreach (Input::file('fProductDetail') as $file) {
				//Goi model ProductImages
				$product_img = new  ProductImages();
				if(isset($file))
				{
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $product_id;
					//Di chuyển image vào thư mục lưu trữ
					$file->move('resources/upload/detail/',$file->getClientOriginalName());
					$product_img->save();
				}
			}
		}
		return redirect()->route('admin.product.list')->with(['level'=>'success','message'=>'Insert data complete']);
	}
	public function getDelete($id)
	{
		//Tim san pham co nhieu hinh anh theo $id truyền vào
		$product_detail = Product::find($id)->pimages->toArray();
		foreach ($product_detail as $value) {
			//Xóa tất cả image có $id truyền vào thông qua hàm File
			File::delete('resources/upload/detail/'.$value["image"]);
		}
		//Tìm sản phẩm có $id truyền vào
		$product = Product::findOrFail($id);
		//Xóa ảnh trong thư mục
		File::delete('resources/upload/'.$product->image);
		//Xóa image trong db khi thực hiện sự kiện click thì (- data trong Product và Product_Image sẽ bị xóa bẳng một câu lệnh do có sự ràng buộc quan hệ dữ liệu giữa hai bảng)
		$product->delete($id);
		return redirect()->route('admin.product.list')->with(['level'=>'success','message'=>'Delete data complete']);
	}
	public function getEdit($id)
	{
		//Thông tin sản phẩm theo id
		$product = Product::findOrfail($id)->toArray();
		//danh mục sản phẩm
		$category_product = Cate::select('id','name','parent_id')->get()->toArray();
		//Lấy ra những sản phẩm có nhiều ảnh
		$product_image = Product::findOrfail($id)->pimages->toArray();
		return view('admin.product.edit',compact('product','category_product','product_image'));
	}
	public function postEdit($id,Request $request)
	{
	//----------------------------------Sửa ảnh chi tiết của sản phẩm vào---------------------------------
		$product  = Product::findOrfail($id);
		$product->name        = Request::input('txtName');
		$product->alias       = changeTitle(Request::input('txtName'));
		$product->price       = Request::input('txtPrice');
		$product->intro       = Request::input('txtIntro');
		$product->content     = Request::input('txtContent');
		$product->keywords    = Request::input('txtKeywords');
		$product->description = Request::input('txtDescription');
		$product->status      = Request::input('rdoStatus');
		$product->user_id     = Auth::user()->id;
		$product->cate_id     = Request::input('slt_parent');

		$img_current = 'resources/upload/'.Request::input('img_current');
		if(!empty(Request::file('fImages')))
		{
			$file_name = Request::file('fImages')->getClientOriginalName();
			$product->image =  $file_name;
			//Copy file image vào thư mục detail
			Request::file('fImages')->move('resources/upload/',$file_name);
			//Nếu tồn tại file image cũ thì xóa
			if(File::exists($img_current )){
				File::delete($img_current );
			}
		}

		if(!empty(Request::file('fEditDetail')))
		{
			foreach (Request::file('fEditDetail') as $file) {
				//Goi model ProductImages
				$product_img = new  ProductImages();
				if(isset($file))
				{
					$product_img->image = $file->getClientOriginalName();
					$product_img->product_id = $id;
					//Di chuyển image vào thư mục lưu trữ
					$file->move('resources/upload/detail/',$file->getClientOriginalName());
					//Đặt trong if mới sửa đc nhiều hình
					$product_img->save();
				}
			}
		}

		$product->save();
		return redirect()->route('admin.product.list')->with(['level'=>'success','message'=>'Update product data complete']);
	}
	// Xoa image Detail
	public function getDelImg($id)
	{
		if(Request::ajax())//Nhận request gửi từ bên jquery về
		{
			$idHinh = (int)Request::get('idHinh');
			$image_detail = ProductImages::find($idHinh);//Tìm sản phẩm có nhiều hình ảnh
			if(!empty($image_detail))
			{
				$img = 'resources/upload/detail/'.$image_detail->image;
				if(File::exists($img))
				{
					File::delete($img);//Xóa file image trong thư mục detail
				}
				$image_detail->delete();//Xóa trong db
			}
			return "Oke";
		}
	}
	//----------------------------------Administrator---------------------------------------------------------------------------------
	public function postAdd1(ProductsRequest $product_request)
	{

		//Lấy ngày hiện tại
		$date = Carbon::now()->format('d_m_Y_h_i_s_');

		$product                    = new Product();
		$product->pro_name          = $product_request->pro_name;
		$product->cate_id           = $product_request->cate_id;
		$product->alias             = changeTitle($product_request->pro_name);

		$image_path = Input::file('image');
		if(!empty($image_path))
			{
				$image          = $image_path->getClientOriginalName();
				$product->image = $date.$image;
				$product_request->file('image')->move('resources/upload/',$date.$image);
			}

			$product->cate_id = $product_request->cate_id;
			$pro_not_price    = $product_request->pro_not_price;
		if($pro_not_price == "on")
			{
				$product->pro_not_price = 1;
				$product->pro_price     = "";
				$product->pro_sell_off  = "";
				$product->pro_price_sell_off = 0;
			}
		else
			{
				$product->pro_price         = $product_request->pro_price;
				$product->pro_sell_off       = $product_request->pro_sell_off;
				$price_sell_off = ($product->pro_price * $product->pro_sell_off)/100;
				$product->pro_price_sell_off = $product->pro_price - $price_sell_off;
			}
		//$product->pro_not_price   = $product_request->pro_not_price;
		$product->pro_unit        = $product_request->pro_unit;
		//Kiêm tra checkbox
		if($product_request->pro_featured == 'on')$product->pro_featured=1; else $product->pro_featured=0;
        if($product_request->pro_saller == 'on')$product->pro_saller=1; else $product->pro_saller=0;

		$product->pro_status        = $product_request->pro_status;
		if($product_request->status == 'on')$product->status = 1; else $product->status = 0;

		$product->pro_content       = $product_request->pro_content;
		$product->pro_short_content = $product_request->pro_short_content;
		$product->pro_terms_of_use  = $product_request->pro_terms_of_use;
		$product->pro_digital       = $product_request->pro_digital;
		$product->pro_pros_use      = $product_request->pro_pros_use;
		$product->meta_title        = $product_request->meta_title;
		$product->meta_description  = $product_request->meta_description;
		$product->user_id     = 1;
		$product->save();
		return redirect()->route('administrator.product.list1')->with(['level'=>'success','message'=>'Insert data complete']);
	}
	public function getAdd1()
	{

		$category_product = Cate::select('id','name','parent_id')->get()->toArray();

		return view('administrator.product.add',compact('category_product'));
	}
	public function getList1()
	{
		//$aListProducts = Product::select('*')->orderBy('id','DESC')->get()->toArray();
		$oListProducts = $this->product->getProducts_Cates();
		return view('administrator.product.list',compact('oListProducts'));
	}
	public function getEdit1()
	{
		return view('administrator.product.edit');
	}
}
