<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateCatesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'name'    => 'required',
			'picture' => 'image|max:5000|mimes:jpeg,jpg,png,gif',
			'banner'  => 'image|max:5000|mimes:jpeg,jpg,png,gif',
			'banner_url'=> 'url'
			];
	}
	public function messages()
	{
		return [
		'name.required' =>'Tên danh mục sản phẩm không được để trống',
		'picture.mimes' =>'Ảnh nhập vào phải là file ảnh (jpeg, png, gif)',
		'picture.size' =>'Ảnh nhập vào phải < 5MB',
		'banner.mimes'  =>'Banner nhập vào phải là file ảnh (jpeg, png, gif)',
		'banner.size' =>'Ảnh nhập vào phải < 5MB',
		'banner_url.url'   =>'Liên kết banner phải là một đường link'
		];
	}

}
