<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CateRequest extends Request {

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
			'txtCateName' => 'required',
			'slt_parent'=> 'required',
			'txtOrder' => 'required',
			'txtKeyword'=> 'required',
			'txtDescription'=> 'required',
			'rdoStatus'=> 'required',
			];
	}
	public function messages()
	{
		return [
		'txtCateName.required'=>'Please Enter Name Category',
		/*'txtCateName.unique'=>'This Name Category Is Exist',*/
		'slt_parent.required'=>'Please Enter Category Parent',
		'txtOrder.required'=>'Please Enter Category Order',
		'txtKeyword.required'=>'Please Enter Category Keywords',
		'txtDescription.required'=>'Please Enter Category Description',
		'rdoStatus.required'=>'Please Enter Category Status',
		];
	}
}
