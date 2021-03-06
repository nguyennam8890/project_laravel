<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;
class UserController extends Controller {

	public function getList()
	{
		$user = User::select('id','username','level')->orderBy('id','DESC')->get()->toArray();
		return view('admin.user.list',compact('user'));
	}
	public function getAdd()
	{
		return view('admin.user.add');
	}
	public function postAdd(UserRequest $request)
	{
		$user = new User();
		$user->username       = $request->txtUser;
		$user->password       = Hash::make($request->txtPass);// Mã hóa Pass bẳng Hash
		$user->level          = $request->rdoLevel; 
		$user->email          = $request->txtEmail;
		$user->remember_token = $request->_token;
		$user->save();
		return redirect()->route('admin.user.list')->with(['level'=>'success','message'=>'Add User data complete']);
	}
	public function getDelete($id)
	{
		$user_current_login = Auth::user()->id;
		$user = User::find($id);
		if(($id == 2) || ($user_current_login != 2 && $user['level'] == 1))
		{
			return redirect()->route('admin.user.list')->with(['level'=>'danger','message'=>'Sory!! You Can\'t Access Delete User']);
		}
		else
		{
			$user->delete($id);
			return redirect()->route('admin.user.list')->with(['level'=>'success','message'=>'Delete User complete']);
		}
	}
	public function getEdit($id)
	{
		$data = User::find($id);

		/*Kiểm soát quyền sửa thông tin 
		* Có hai trường hợp cấm sửa 
		* Admin thường mà sửa Superadmin
		* Admin thường mà sửa Admin mà Admin đó không phải là chính mình
		* Khi là user hiện tại thì không đc sửa level
		*/
		if(( Auth::user()->id != 2) && ($id == 2 || ($data['level'] == 1 && (Auth::user()->id != $id))))
		{
			return redirect()->route('admin.user.list')->with(['level'=>'danger','message'=>'Sory!! You Can\'t Access Update User']);
		}
		/*else if($data['level'] == 2 && (Auth::user()->id != $id))
		{
			return redirect()->route('admin.user.list')->with(['level'=>'danger','message'=>'Sory!! You Can\'t Access Update User']);
		}*/
		return view('admin.user.edit',compact('data','id'));
	}
	public function postEdit($id, Request $request)
	{
		$user  = User::find($id);
		if($request->input('txtPass'))
		{
			$this->validate($request,
				[
				'txtPass' => 'same:txtRePass'
				],
				[
				'txtRePass.same' => 'Two Password Don\'t Match'
				]);
			$pass = $request->input('txtPass');
			$user->password = Hash::make($pass);
		}
		$user->email = $request->txtEmail;
		$user->level = $request->rdoLevel;
		$user->remember_token = $request->input('_token');
		$user->save();
		return redirect()->route('admin.user.list')->with(['level'=>'success','message'=>'Update User complete']);
	}
}
