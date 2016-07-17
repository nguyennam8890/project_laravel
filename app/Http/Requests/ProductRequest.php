<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request {

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
			'slt_parent' => 'required',
			'txtName'    => 'required',
			/*'fImages'    => 'required|image'*/
			/*'fImages'    => 'required|image'*/
		];
	}
	public function messages()
	{
		return [
			'slt_parent.required' => 'Please Choose Category',
			'txtName.required'    => 'Please Enter Name Product',
			'txtName.unique'      => 'Product Name Is Exist',
			'fImages.required'    => 'Please Choose image',
			'fImages.image'       => 'This file must be image'
			/*'fImages'    => 'required|image'*/
		];
	}
}
