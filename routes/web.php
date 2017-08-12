<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=>'admin'], function(){

	Route::get('/admin', function(){

		return view('admin.index');


	});

	Route::resource('admin/users', 'AdminUsersController', ['names'=>[

			'index'=>'admin.users.index',
			'create'=>'admin.users.create',
			'store'=>'admin.users.store',
			'edit'=>'admin.users.edit'

	]]);


	Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@post']);

	Route::resource('admin/posts', 'AdminPostsController', ['names'=>[

			'index'=>'admin.posts.index',
			'create'=>'admin.posts.create',
			'store'=>'admin.posts.store',
			'edit'=>'admin.posts.edit'

	]]);

	Route::resource('admin/categories', 'AdminCategoriesController', ['names'=>[

			'index'=>'admin.categories.index',
			'store'=>'admin.categories.store',
			'edit'=>'admin.categories.edit'

	]]);


	Route::resource('admin/media', 'AdminMediasController', ['names'=>[

			'index'=>'admin.media.index',
			'create'=>'admin.media.create',
			'store'=>'admin.media.store',
			'edit'=>'admin.media.edit'
	]]);

	Route::delete('admin/delete/media', 'AdminMediasController@deleteMedia');

	// Route::get('admin/media/upload', ['as'=>'admin.media.upload']);

	Route::resource('admin/comments', 'PostCommentsController', ['names'=>[

			'index'=>'admin.comments.index',
			'create'=>'admin.comments.create',
			'store'=>'admin.comments.store',
			'edit'=>'admin.comments.edit',
			'show'=>'admin.comments.show'
	]]);

	Route::resource('admin/comments/replies', 'CommentRepliesController', ['names'=>[

			'index'=>'admin.comments.replies.index',
			'create'=>'admin.comments.replies.create',
			'store'=>'admin.comments.replies.store',
			'edit'=>'admin.comments.replies.edit',
			'show'=>'admin.comments.replies.show'

		]]);
});
