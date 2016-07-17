<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsRequest extends Request {

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
			'cate_id' => 'required',
			'pro_name'    => 'required',
			'image' => 'image|max:5000|mimes:jpeg,jpg,png,gif',
		];
	}
	public function messages()
	{
		return [
			'cate_id.required' => 'Please Choose Category',
			'pro_name.required'    => 'Please Enter Name Product',
			'image.mimes' =>'Ảnh nhập vào phải là file ảnh (jpeg, png, gif)',
			'image.size' =>'Ảnh nhập vào phải < 5MB',
		];
	}
}
