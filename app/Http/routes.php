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


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

    /* Social routes ---------------------------------------------------------------------------------------------------- */
    Route::get('auth/github', 'Auth\Social\GitHubAuthController@redirectToProvider');
    Route::get('auth/github/callback', 'Auth\Social\GitHubAuthController@handleProviderCallback');

    Route::get('auth/twitter', 'Auth\Social\TwitterAuthController@redirectToProvider');
    Route::get('auth/twitter/callback', 'Auth\Social\TwitterAuthController@handleProviderCallback');

    Route::get('auth/facebook', 'Auth\Social\FacebookAuthController@redirectToProvider');
    Route::get('auth/facebook/callback', 'Auth\Social\FacebookAuthController@handleProviderCallback');

    Route::get('auth/vkontakte', 'Auth\Social\VkontakteAuthController@redirectToProvider');
    Route::get('auth/vkontakte/callback', 'Auth\Social\VkontakteAuthController@handleProviderCallback');

    Route::get('auth/yandex', 'Auth\Social\YandexAuthController@redirectToProvider');
    Route::get('auth/yandex/callback', 'Auth\Social\YandexAuthController@handleProviderCallback');

    Route::get('auth/odnoklassniki', 'Auth\Social\OdnoklassnikiAuthController@redirectToProvider');
    Route::get('auth/odnoklassniki/callback', 'Auth\Social\OdnoklassnikiAuthController@handleProviderCallback');

    Route::get('auth/mailru', 'Auth\Social\MailRuAuthController@redirectToProvider');
    Route::get('auth/mailru/callback', 'Auth\Social\MailRuAuthController@handleProviderCallback');

    Route::get('auth/google', 'Auth\Social\GoogleAuthController@redirectToProvider');
    Route::get('auth/google/callback', 'Auth\Social\GoogleAuthController@handleProviderCallback');
});




/* Admin routes ----------------------------------------------------------------------------------------------------- */
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function()
{
    ## Auth routes
    Route::get('login', ['as' => 'admin.login', 'uses' =>'Admin\Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'admin.login.post', 'uses' =>'Admin\Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' =>'Admin\Auth\AuthController@getLogout']);

    ## Models routes
    Route::group(['middleware' => 'admin'], function()
    {
        Route::get('/', ['as' => 'admin', 'uses' =>'Admin\IndexController@index']);

        Route::get('settings', ['as' => 'admin.settings', 'uses' =>'Admin\SettingsController@index']);
        Route::post('settings', ['as' => 'admin.settings.save', 'uses' =>'Admin\SettingsController@save']);

        Route::resource('categories', 'Admin\CategoriesController');
        Route::match(['get', 'post'], 'categories/move', ['as' => 'admin.categories.move', 'uses' =>'Admin\CategoriesController@move']);
        Route::delete('categories/{id}/image', ['as' => 'admin.categories.image_delete', 'uses' =>'Admin\CategoriesController@imageDelete'])->where('id', '[0-9]+');
        Route::resource('products', 'Admin\ProductsController');
        Route::post('products/{id}/photo', ['as' => 'admin.products.photo', 'uses' =>'Admin\ProductsController@photo'])->where('id', '[0-9]+');
        Route::delete('products/{id}/photo/{photoId}', ['as' => 'admin.products.photo.delete', 'uses' =>'Admin\ProductsController@photoDelete'])->where(['id' => '[0-9]+', 'photoId' => '[0-9]+']);
        Route::resource('photos', 'Admin\PhotosController');
        Route::resource('pages', 'Admin\PagesController');
        Route::resource('blocks', 'Admin\BlocksController');
        Route::resource('news', 'Admin\NewsController');
        Route::resource('users', 'Admin\UsersController');
        Route::resource('administrators', 'Admin\AdministratorsController');
    });
});