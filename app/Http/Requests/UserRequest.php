<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
			'txtUser'   => 'required|unique:users,username',
			'txtPass'   => 'required',
			'txtRePass' => 'required|same:txtPass',
			'txtEmail'  => 'required|email|unique:users,email'
		];
	}
	public function messages()
	{
		return [
			'txtUser.required'  => 'Please enter UserName',
			'txtUser.unique'    => 'Please Is Exists',
			'txtPass.required'    => 'Please enter PassWord',
			'txtPass.same'      => 'Two PassWord Do not Match',
			'txtEmail.required' => 'Please enter Email',
			'txtRePass.required'  => 'Please enter RePass',
			'txtEmail.email'    => 'Email Error Syntax'
		];
	}
}
