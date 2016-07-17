<?php
Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['prefix'=>'admin','middleware'=>'auth'],function()
	{
		Route::group(['prefix'=>'cate'],function()
			{
				Route::get('list',['as'=>'admin.cate.list','uses'=>'CateController@getList']);

				Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CateController@getAdd']);

				Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CateController@postAdd']);

				Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CateController@getDelete']);

				Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CateController@getEdit']);

				Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CateController@postEdit']);
			});

		Route::group(['prefix'=>'product'],function(){

			Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);

			Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);

			Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);

			Route::get('delete/{id}',['as'=>'admin.product.getDelete','uses'=>'ProductController@getDelete']);

			Route::get('edit/{id}',['as'=>'admin.product.getEdit','uses'=>'ProductController@getEdit']);

			Route::post('edit/{id}',['as'=>'admin.product.postEdit','uses'=>'ProductController@postEdit']);

			Route::get('delimg/{id}',['as'=>'admin.product.getDelImg','uses'=>'ProductController@getDelImg']);
		});

			Route::group(['prefix'=>'user'],function(){

			Route::get('list',['as'=>'admin.user.list','uses'=>'UserController@getList']);

			Route::get('add',['as'=>'admin.user.getAdd','uses'=>'UserController@getAdd']);

			Route::post('add',['as'=>'admin.user.postAdd','uses'=>'UserController@postAdd']);

			Route::get('delete/{id}',['as'=>'admin.user.getDelete','uses'=>'UserController@getDelete']);

			Route::get('edit/{id}',['as'=>'admin.user.getEdit','uses'=>'UserController@getEdit']);

			Route::post('edit/{id}',['as'=>'admin.user.postEdit','uses'=>'UserController@postEdit']);
		});
	});

Route::get('loai-san-pham/{id}',['as'=>'loaisanpham','uses'=>'WelcomeController@loaisanpham']);
Route::get('chi-tiet-san-pham/{id}/{tenloai}',['as'=>'chitietsanpham','uses'=>'WelcomeController@chitietsanpham']);
Route::get('lien-he',['as'=>'getLienhe','uses'=>'WelcomeController@get_lienhe']);
Route::post('lien-he',['as'=>'postLienhe','uses'=>'WelcomeController@post_lienhe']);
Route::get('test',['as'=>'test','uses'=>'WelcomeController@getpath']);

Route::get('mua-hang/{id}/{tensanpham}',['as'=>'muahang','uses'=>'WelcomeController@muahang']);
Route::get('gio-hang',['as'=>'giohang','uses'=>'WelcomeController@giohang']);
Route::get('xoa-san-pham/{id}',['as'=>'xoasanpham','uses'=>'WelcomeController@xoasanpham']);
Route::get('cap-nhat/{id}/{qty}',['as'=>'capnhat','uses'=>'WelcomeController@capnhat']);
/*,'middleware'=>'auth'*/
Route::group(['prefix'=>'administrator'],function()
	{
		Route::group(['prefix'=>'cate'],function(){

			Route::get('list',['as'=>'administrator.cate.list1','uses'=>'CateController@getList1']);

			Route::get('add',['as'=>'administrator.cate.getAdd1','uses'=>'CateController@getAdd1']);

			Route::post('add',['as'=>'administrator.cate.postAdd1','uses'=>'CateController@postAdd1']);

			Route::get('delete/{id}',['as'=>'administrator.cate.getDelete1','uses'=>'CateController@getDelete1']);

			Route::get('edit/{id}',['as'=>'administrator.cate.getEdit1','uses'=>'CateController@getEdit1']);

			Route::post('edit/{id}',['as'=>'administrator.cate.postEdit1','uses'=>'CateController@postEdit1']);

			Route::get('updateStatusCategory/{id}',['as'=>'administrator.cate.updateStatusCategory','uses'=>'CateController@updateStatusCategory']);
		});
		Route::group(['prefix'=>'product'],function(){

			Route::get('list',['as'=>'administrator.product.list1','uses'=>'ProductController@getList1']);

			Route::get('add',['as'=>'administrator.product.getAdd1','uses'=>'ProductController@getAdd1']);

			Route::post('add',['as'=>'administrator.product.postAdd1','uses'=>'ProductController@postAdd1']);

			Route::get('delete/{id}',['as'=>'administrator.product.getDelete1','uses'=>'ProductController@getDelete']);

			Route::get('edit',['as'=>'administrator.product.getEdit1','uses'=>'ProductController@getEdit1']);

			Route::post('edit/{id}',['as'=>'administrator.product.postEdit1','uses'=>'ProductController@postEdit']);

			Route::get('delimg/{id}',['as'=>'administrator.product.getDelImg1','uses'=>'ProductController@getDelImg']);

		});
		Route::get('slideshow',['as'=>'administrator.slideshow','uses'=>'CateController@slideShow']);
		Route::group(['prefix'=>'cate_news'],function()
			{
				Route::get('list',['as'=>'admin.cate_news.list','uses'=>'Cate_NewsController@getList1']);

				Route::get('add',['as'=>'admin.cate_news.getAdd','uses'=>'Cate_NewsController@getAdd1']);

				Route::post('add',['as'=>'admin.cate_news.postAdd','uses'=>'Cate_NewsController@postAdd1']);

				Route::get('delete/{id}',['as'=>'admin.cate_news.getDelete','uses'=>'Cate_NewsController@getDelete1']);

				Route::get('edit/{id}',['as'=>'admin.cate_news.getEdit','uses'=>'Cate_NewsController@getEdit1']);

				Route::post('edit/{id}',['as'=>'admin.cate_news.postEdit','uses'=>'Cate_NewsController@postEdit1']);
			});
		Route::group(['prefix'=>'news'],function()
			{
				Route::get('list',['as'=>'admin.news.list','uses'=>'NewsController@getList1']);

				Route::get('add',['as'=>'admin.news.getAdd','uses'=>'NewsController@getAdd1']);

				Route::post('add',['as'=>'admin.news.postAdd','uses'=>'NewsController@postAdd1']);

				Route::get('delete/{id}',['as'=>'admin.news.getDelete','uses'=>'NewsController@getDelete1']);

				Route::get('edit',['as'=>'admin.news.getEdit','uses'=>'NewsController@getEdit1']);

				Route::post('edit/{id}',['as'=>'admin.news.postEdit','uses'=>'NewsController@postEdit1']);
			});
		Route::group(['prefix'=>'ads'],function()
			{
				Route::get('list',['as'=>'admin.ads.list','uses'=>'AdsController@getList1']);

				Route::get('add',['as'=>'admin.ads.getAdd','uses'=>'AdsController@getAdd1']);

				Route::post('add',['as'=>'admin.ads.postAdd','uses'=>'AdsController@postAdd1']);

				Route::get('delete/{id}',['as'=>'admin.ads.getDelete','uses'=>'AdsController@getDelete1']);

				Route::get('edit',['as'=>'admin.ads.getEdit','uses'=>'AdsController@getEdit1']);

				Route::post('edit/{id}',['as'=>'admin.ads.postEdit','uses'=>'AdsController@postEdit1']);
			});
		Route::group(['prefix'=>'config'],function()
			{
				Route::get('update',['as'=>'admin.config.update','uses'=>'ConfigController@update']);
			});
	});
