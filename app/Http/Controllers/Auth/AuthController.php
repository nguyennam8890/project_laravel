<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Http\Requests\LoginRequest;
/*use Illuminate\Auth\Guard;
use Auth;*/
class AuthController extends Controller {
	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}
	public function getLogin()
	{
		return view('admin.login');
	}
	public function postLogin(LoginRequest $request)
	{
		$login = array(
			'username' =>$request->username,
			'password'=>$request->password,
			'level'=>1
			);
		if($this->auth->attempt($login))
		{
			return redirect()->route('admin.cate.list');
		}
		else
		{
			return redirect()->back();
		}
	}
}
