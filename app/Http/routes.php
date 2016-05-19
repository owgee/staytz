<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


# End of frontend views

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::post('/app/listings/item/{id}', 'Application@getListingItem');
Route::post('/app/listings/{type}/{page}', 'Application@getListings');
Route::post('/app/listings/place/{type}/{page}', 'Application@getPlaceListings');
Route::post('/app/listings/search/{type}/{page}', 'Application@searchListings');
Route::post('/app/places/regions', 'Application@getRegions');
Route::get('/app/places/regions', 'Application@getRegions');
Route::post('/app/booking', 'Application@book');

/*
*get routes for testing on a browser
*/
Route::get('/app/listings/item/{id}', 'Application@getListingItem');
Route::get('/app/listings/{type}/{page}', 'Application@getListings');
Route::get('/app/listings/place/{type}/{page}', 'Application@getPlaceListings');
Route::get('/app/listings/search/{type}/{page}', 'Application@searchListings');
Route::get('/app/booking', 'Application@book');

Route::group(['middleware' => ['web']], function () {

	Route::model('file', 'App\File');
	Route::model('users', 'App\User');

	Route::group(array('prefix' => 'admin'), function () {
		
		
		Route::group(array('prefix' => 'listings', 'middleware' => 'SentinelAdmin'), function () {
	        Route::get('/', array('as' => 'listings', 'uses' => 'ListingsController@index'));
	        Route::get('/all/{id}', array('as' => 'listings', 'uses' => 'ListingsController@index'));
			Route::get('/all/district/{id}', array('as' => 'listings', 'uses' => 'ListingsController@index'));
	        Route::get('create', array('as' => 'create/listings', 'uses' => 'ListingsController@create'));
	        Route::post('create', 'ListingsController@store');
	        Route::get('{id}/edit', array('as' => 'update/listingItem', 'uses' => 'ListingsController@edit'));
	        Route::get('{id}/delete', array('as' => 'update/listingItem', 'uses' => 'ListingsController@delete'));
	        Route::post('edit', array('as' => 'update/listingItem', 'uses' => 'ListingsController@update'));
	        Route::get('{id}/view', array('as' => 'update/listingItem', 'uses' => 'ListingsController@getItem'));
	        Route::get('{id}/images', array('as' => 'images/listingItem', 'uses' => 'ListingsController@getImages'));
	        Route::post('{id}/images/create', 'ListingsController@postImagesCreate');
	        Route::delete('image/delete', 'ListingsController@imageDelete');
	        Route::get('{facility_id}/image/{image_id}/delete', array('as' => 'images/listingItem', 'uses' => 'ListingsController@imageDeleteById'));
	        Route::get('/{facilityType}/{page?}', array('as' => 'listings', 'uses' => 'ListingsController@getListings'));
		});


		Route::group(array('prefix' => 'places', 'middleware' => 'SentinelAdmin'), function () {
	        Route::get('/', array('as' => 'places', 'uses' => 'PlaceController@index'));
	        Route::get('/regions', array('as' => 'regions', 'uses' => 'PlaceController@index'));
	        Route::post('/regions/create', array('as' => 'create/region', 'uses' => 'PlaceController@storeRegion'));
	        Route::get('/{id}/delete', array('as' => 'region/delete', 'uses' => 'PlaceController@deleteRegion'));
			Route::get('/{id}/edit', array('as' => 'region/edit', 'uses' => 'PlaceController@editRegion'));
			Route::post('/{id}/edit', array('as' => 'region/edit', 'uses' => 'PlaceController@updateRegion'));
	        Route::get('/{id}/districts', array('as' => 'districts', 'uses' => 'PlaceController@getDistricts'));
	        Route::get('/{r_id}/district/{d_id}/delete', array('as' => 'districts', 'uses' => 'PlaceController@deleteDistrict'));
	        Route::post('/districts/create', 'PlaceController@storeDistrict');
		});

		Route::group(array('prefix' => 'notifications', 'middleware' => 'SentinelAdmin'), function () {
	        Route::get('/', array('as' => 'notifications', 'uses' => 'NotificationController@index'));
	        Route::get('/create', array('as' => 'notifications/create', 'uses' => 'NotificationController@create'));
	        Route::post('/create', array('as' => 'store/notifications', 'uses' => 'NotificationController@store'));
	        Route::get('/{id}/delete', array('as' => 'region/delete', 'uses' => 'NotificationController@delete'));
		});

		Route::group(array('prefix' => 'bookings', 'middleware' => 'SentinelAdmin'), function () {
	        Route::get('/', array('as' => 'bookings', 'uses' => 'BookingController@index'));
			//Route::get('/{id}/delete', array('as' => 'bookings/delete', 'uses' => 'BookingController@delete'));
		});

		# Error pages should be shown without requiring login
		Route::get('404', function () {
			return View('admin/404');
		});
		Route::get('500', function () {
			return View::make('admin/500');
		});

		# Lock screen
		Route::get('lockscreen', function () {
			return View::make('admin/lockscreen');
		});

		# All basic routes defined here
		Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
		Route::post('signin', 'AuthController@postSignin');
		Route::post('signup', array('as' => 'signup', 'uses' => 'AuthController@postSignup'));
		Route::post('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@postForgotPassword'));
		Route::get('login2', function () {
			return View::make('admin/login2');
		});

		# Register2
		Route::get('register2', function () {
			return View::make('admin/register2');
		});
		Route::post('register2', array('as' => 'register2', 'uses' => 'AuthController@postRegister2'));

		# Forgot Password Confirmation
		Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
		Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

		# Logout
		Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

		# Account Activation
		Route::get('activate/{userId}/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));
	});



	Route::group(array('prefix' => 'admin', 'middleware' => 'SentinelAdmin'), function () {
	    # Dashboard / Index
		Route::get('/', array('as' => 'dashboard','uses' => 'JoshController@showHome'));


	    # User Management
	    Route::group(array('prefix' => 'users'), function () {
	        Route::get('/', array('as' => 'users', 'uses' => 'UsersController@index'));
	        Route::get('create', 'UsersController@create');
	        Route::post('create', 'UsersController@store');
	        Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'UsersController@destroy'));
	        Route::get('{userId}/confirm-delete', array('as' => 'confirm-delete/user', 'uses' => 'UsersController@getModalDelete'));
	        Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'UsersController@getRestore'));
	        Route::get('{userId}', array('as' => 'users.show', 'uses' => 'UsersController@show'));
	        Route::post('passwordreset', 'UsersController@passwordreset');
	    });
	    Route::resource('users', 'UsersController');

		Route::get('deleted_users',array('as' => 'deleted_users','before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'));


		# Remaining pages will be called from below controller method
		# in real world scenario, you may be required to define all routes manually

		Route::get('{name?}', 'JoshController@showView');

	});


	# Forgot Password Confirmation
	Route::get('forgot-password/{userId}/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'FrontEndController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
	# My account display and update details
	Route::group(array('middleware' => 'SentinelUser'), function () {
		Route::get('my-account', array('as' => 'my-account', 'uses' => 'FrontEndController@myAccount'));
	    Route::put('my-account', 'FrontEndController@update');
	});
	Route::get('logout', array('as' => 'logout','uses' => 'FrontEndController@getLogout'));
	# contact form
	Route::post('contact',array('as' => 'contact','uses' => 'FrontEndController@postContact'));

	#frontend views
	Route::get('/', array('as' => 'home', function () {
	    return View::make('index');
	}));

	Route::get('{name?}', 'JoshController@showFrontEndView');

});