<?php


Route::get('/', 'HomeController@index');

Route::get('/category/{id}', 'HomeController@showCat');
Route::get('/product/{id}', 'HomeController@showProduct');
Route::get('/offer', 'HomeController@offer');
Route::get('/page/{slug}', 'HomeController@page');
Route::get('/contact', 'HomeController@contact');
Route::group(array('before' => 'csrf'), function(){
	Route::post('/contact', array('uses'=> 'HomeController@postContact', 'as'=> 'postContact'));
	Route::post('/', array('uses'	=> 'HomeController@postSearch', 'as'=> 'postSearch'));
 	});

// Route::get('/register', 'AdminController@register');

// Route::get('/admin', 'AdminController@admin');

 Route::get('/page/{title}', 'PageController@showPage');


 Route::group(array('before' => 'guest'), function(){

 	Route::get('/login', 'UserController@login');
	Route::get('/register', 'UserController@register');
 	
	Route::group(array('before' => 'csrf'), function(){
 		Route::post('/register', array('uses' => 'UserController@postRegister', 'as' => 'postRegister'));
 		Route::post('/login', array('uses'	=> 'UserController@postLogin', 'as'	=> 'postLogin'));
 		// Route::post('/contact', array('uses'=> 'HomeController@postContact', 'as'=> 'postContact'));
 		// Route::post('/', array('uses'	=> 'HomeController@postSearch', 'as'=> 'postSearch'));
 	});
 });

 Route::group(array('before'=> 'auth'), function(){
 	Route::get('/logout', 'UserController@logout');
	Route::group(array('before' => 'admin'), function()
 	{
		
		Route::get('/admin', 'AdminController@dashboard');
		// Route::get('/admin/logout', 'AdminController@logout');
		
		Route::get('/admin/contact', 'AdminController@contact');
		Route::get('/admin/editContact/{id}', 'AdminController@editContact');

		Route::get('/admin/slides', 'AdminController@slides');
		Route::get('/admin/editSlide/{id}', 'AdminController@editSlide');
		Route::get('/admin/createSlide', 'AdminController@createSlide');
		Route::get('/admin/deleteSlide/{id}', 'AdminController@deleteSlide');

		Route::get('/admin/boxes', 'AdminController@boxes');
		Route::get('/admin/editBox/{id}', 'AdminController@editBox');


// 		Route::get('/admin/listUsers', 'UserController@listUsers');
// 		Route::get('/admin/userProfile/{id}', 'UserController@userProfile');
// 		Route::get('/admin/editUser/{id}', 'UserController@editUser');
// 		Route::get('/admin/deleteUser/{id}', 'UserController@deleteUser');

		Route::get('/admin/createPage', 'PageController@CreatePage');
		Route::get('/admin/listPages', 'PageController@listPages');
		Route::get('/admin/pages/{id}', 'PageController@adminShowPage');
		Route::get('/admin/editPage/{id}', 'PageController@editPage');
		Route::get('/admin/deletePage/{id}', 'PageController@deletePage');

		Route::get('/admin/createCategory', 'CatController@CreateCategory');
		Route::get('/admin/listCategory', 'CatController@listCategory');
		Route::get('/admin/category/{id}', 'CatController@adminShowCategory');
		Route::get('/admin/editCategory/{id}', 'CatController@editCategory');
		Route::get('/admin/deleteCategory/{id}', 'CatController@deleteCategory');

		Route::get('/admin/createProduct', 'ProductController@CreateProduct');
		Route::get('/admin/listProducts', 'ProductController@listProducts');
		Route::get('/admin/products/{id}', 'ProductController@adminShowProduct');
		Route::get('/admin/editProduct/{id}', 'ProductController@editProduct');
		Route::get('/admin/deleteProduct/{id}', 'ProductController@deleteProduct');



		Route::group(array('before' => 'csrf'), function(){
			 Route::post('/admin/editContact', array('uses' => 'AdminController@postEditContact', 'as' => 'postEditContact'));

			 Route::post('/admin/editBox', array('uses' => 'AdminController@postEditBox', 'as' => 'postEditBox'));


			 Route::post('/admin/createSlide', array('uses' => 'AdminController@postCreateSlide', 'as' => 'postCreateSlide'));
			  Route::post('/admin/editSlide', array('uses' => 'AdminController@postEditSlide', 'as' => 'postEditSlide'));



			Route::post('/admin/CreatePage', array('uses' => 'PageController@postCreatePage', 'as' => 'postCreatePage'));
			Route::post('/admin/editPage', array('uses' => 'PageController@postEditPage', 'as' => 'postEditPage'));

			Route::post('/admin/CreateCategory', array('uses' => 'CatController@postCreateCategory', 'as' => 'postCreateCategory'));
			Route::post('/admin/editCategory', array('uses' => 'CatController@postEditCategory', 'as' => 'postEditCategory'));


			Route::post('/admin/CreateProduct', array('uses' => 'ProductController@postCreateProduct', 'as' => 'postCreateProduct'));
			Route::post('/admin/editProduct', array('uses' => 'ProductController@postEditProduct', 'as' => 'postEditProduct'));
		});
 	});
});




