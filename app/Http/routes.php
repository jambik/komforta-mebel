<?php

/* ------------------------------------------- Admin routes --------------------------------------------------------- */
Route::group(['prefix' => 'admin', 'middleware' => 'web'], function()
{
    ## Admin login/logout
    Route::get('login', ['as' => 'admin.login', 'uses' =>'Admin\Auth\AuthController@getLogin']);
    Route::post('login', ['as' => 'admin.login.post', 'uses' =>'Admin\Auth\AuthController@postLogin']);
    Route::get('logout', ['as' => 'admin.logout', 'uses' =>'Admin\Auth\AuthController@getLogout']);

    ## Models routes
    Route::group(['middleware' => 'admin'], function()
    {
        ## Admin index
        Route::get('/', ['as' => 'admin', 'uses' =>'Admin\IndexController@index']);

        ## Settings
        Route::get('settings', ['as' => 'admin.settings', 'uses' =>'Admin\SettingsController@index']);
        Route::post('settings', ['as' => 'admin.settings.save', 'uses' =>'Admin\SettingsController@save']);

        ## Categories
        Route::resource('categories', 'Admin\CategoriesController');
        Route::match(['get', 'post'], 'categories/move', ['as' => 'admin.categories.move', 'uses' =>'Admin\CategoriesController@move']);
        Route::delete('categories/{id}/image', ['as' => 'admin.categories.image_delete', 'uses' =>'Admin\CategoriesController@imageDelete'])->where('id', '[0-9]+');

        ## Products
        Route::resource('products', 'Admin\ProductsController');
        Route::delete('products/{id}/image', ['as' => 'admin.products.image.delete', 'uses' =>'Admin\ProductsController@imageDelete']);
        Route::post('products/{id}/photo', ['as' => 'admin.products.photo', 'uses' =>'Admin\ProductsController@photo'])->where('id', '[0-9]+');
        Route::delete('products/{id}/photo/{photoId}', ['as' => 'admin.products.photo.delete', 'uses' =>'Admin\ProductsController@photoDelete'])->where(['id' => '[0-9]+', 'photoId' => '[0-9]+']);

        ## Galleries
        Route::resource('galleries', 'Admin\GalleriesController');
        Route::post('galleries/{id}/photo', ['as' => 'admin.galleries.photo', 'uses' =>'Admin\GalleriesController@photo'])->where('id', '[0-9]+');
        Route::delete('galleries/{id}/photo/{photoId}', ['as' => 'admin.galleries.photo.delete', 'uses' =>'Admin\GalleriesController@photoDelete'])->where(['id' => '[0-9]+', 'photoId' => '[0-9]+']);

        ## Photos
        Route::resource('photos', 'Admin\PhotosController');

        ## Pages
        Route::resource('pages', 'Admin\PagesController');

        ## Blocks
        Route::resource('blocks', 'Admin\BlocksController');

        ## News
        Route::resource('news', 'Admin\NewsController');

        ## Articles
        Route::resource('articles', 'Admin\ArticlesController');

        ## Slides
        Route::resource('slides', 'Admin\SlidesController');

        ## Users
        Route::resource('users', 'Admin\UsersController');

        ## Administrators
        Route::resource('administrators', 'Admin\AdministratorsController');

        ## Cupboard Heights
        Route::resource('cupboard_heights', 'Admin\CupboardHeightsController');

        ## Sortable routes
        Route::post('sort', ['as' => 'sort', 'uses' => '\Rutorika\Sortable\SortableController@sort']);
    });
});

/* --------------------------------------------- App routes --------------------------------------------------------- */
Route::group(['middleware' => 'web'], function ()
{
    ## Authentication / Registration / Password Reset
    Route::auth();

    ## Index
    Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);

    # Feedback
    Route::get('feedback', ['as' => 'feedback', 'uses' => 'CommonController@feedback']);
    Route::post('feedback', ['as' => 'feedback.send', 'uses' => 'CommonController@feedbackSend']);

    ## Design request
    Route::post('request_design', ['as' => 'request.design', 'uses' => 'CommonController@requestDesign']);

    ## Callback
    Route::post('callback', ['as' => 'callback', 'uses' => 'CommonController@callback']);

    ## Pages
    Route::get('page/{slug}', ['as' => 'page.show', 'uses' => 'PagesController@show']);

    ## News
    Route::get('news', ['as' => 'news', 'uses' => 'NewsController@index']);
    Route::get('news/{id}', ['as' => 'news.show', 'uses' => 'NewsController@show']);

    ## Articles
    Route::get('articles', ['as' => 'articles', 'uses' => 'ArticlesController@index']);
    Route::get('articles/{slug}', ['as' => 'articles.show', 'uses' => 'ArticlesController@show']);

    ## Galleries
    Route::get('galleries', ['as' => 'galleries', 'uses' => 'GalleriesController@index']);
    Route::get('galleries/{slug}', ['as' => 'galleries.show', 'uses' => 'GalleriesController@show']);

    ## Catalog - index page
    Route::get('catalog', ['as' => 'catalog', 'uses' => 'CatalogController@index']);
    ## Catalog - category page
    Route::get('catalog/{category}', ['as' => 'catalog.category', 'uses' => 'CatalogController@category']);
    ## Catalog - product page
    Route::get('product/{product}', ['as' => 'catalog.product', 'uses' => 'CatalogController@product']);

    ## Calculation request page
    Route::get('calculation', ['as' => 'calculation', 'uses' => 'CalculationController@calculate']);
    Route::post('calculation', ['as' => 'calculation.send', 'uses' => 'CalculationController@send']);

    ## Social routes
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