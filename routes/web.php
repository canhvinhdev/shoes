<?php


// Route(url) phần Admin
Route::group(['prefix' => 'admin','middleware'=>'Checklogin', 'as' => 'admin.'], function() {

    //------Category----------
    Route::group(['prefix' => 'category', 'as' => 'category.'], function() {

        Route::get('list', 'Admin\CategoryController@index')
                ->name('list');

        Route::post('store', 'Admin\CategoryController@store')
                ->name('store');

        Route::get('add', 'Admin\CategoryController@add')
                ->name('add');

        Route::get('edit/{id?}', 'Admin\CategoryController@edit')
                ->name('edit');

        Route::get('delete/{id?}', 'Admin\CategoryController@delete')
                ->name('delete');
    });

    //------Promotion----------
    Route::group(['prefix' => 'promotion', 'as' => 'promotion.'], function() {

        Route::get('list', 'Admin\PromotionController@index')
            ->name('list');

        Route::post('store', 'Admin\PromotionController@store')
            ->name('store');

        Route::get('add', 'Admin\PromotionController@add')
            ->name('add');

        Route::get('edit/{id?}', 'Admin\PromotionController@edit')
            ->name('edit');
            Route::get('config/{id?}', 'Admin\PromotionController@config')
            ->name('config');

            Route::post('select', 'Admin\PromotionController@select')
            ->name('select');
            Route::post('save', 'Admin\PromotionController@save')
            ->name('save');

            Route::post('delete_pro', 'Admin\PromotionController@delete_pro')
            ->name('delete_pro');

        Route::get('delete/{id?}', 'Admin\PromotionController@delete')
            ->name('delete');
    });

    // ----- Route(url) product -----

    Route::get('/', 'Admin\ProductController@home')
        ->name('/');

    Route::group(['prefix' => 'product', 'as' => 'product.'], function() {

        Route::get('list', 'Admin\ProductController@index')
                ->name('list');
        // route(url) đến trang thêm mới (add) tỉnh
        Route::get('add', 'Admin\ProductController@add')
                ->name('add');
        // route(url) đến phần sử lý lưu trữ (store) tỉnh -- sử dụng phương thức Post
        Route::post('store', 'Admin\ProductController@store')
                ->name('store');
        // route(url) đến trang sửa (edit) một tỉnh
        Route::get('edit/{id?}', 'Admin\ProductController@edit')
                ->name('edit');
        // route(url) đến phần sử lý xóa (delete) một tỉnh
        Route::get('delete/{id?}', 'Admin\ProductController@delete')
                ->name('delete');
    });
    // -----------------------------------------------
    //Route(url) slide
    Route::group(['prefix' => 'slide', 'as' => 'slide.'], function() {
        Route::get('list', 'Admin\SlideController@index')
            ->name('list');
        Route::get('add', 'Admin\SlideController@add')
                ->name('add');
        Route::post('store', 'Admin\SlideController@store')
                ->name('store');
        Route::get('edit/{id?}', 'Admin\SlideController@edit')
                ->name('edit');
        Route::get('delete/{id?}', 'Admin\SlideController@delete')
                ->name('delete');
    });



    Route::group(['prefix' => 'new', 'as' => 'new.'], function() {
        Route::get('list', 'Admin\NewController@index')
            ->name('list');
        Route::get('add', 'Admin\NewController@add')
                ->name('add');
        Route::post('store', 'Admin\NewController@store')
                ->name('store');
        Route::get('edit/{id?}', 'Admin\NewController@edit')
                ->name('edit');
        Route::get('delete/{id?}', 'Admin\NewController@delete')
                ->name('delete');
    });
    
    Route::group(['prefix' => 'order', 'as' => 'order.'], function() {
        Route::get('list', 'Admin\OrderController@index')
            ->name('list');
        Route::get('customer/{id}', 'Admin\OrderController@customer')
                ->name('customer');
        Route::post('store', 'Admin\OrderController@store')
                ->name('store');
        Route::get('edit/{id?}', 'Admin\OrderController@edit')
                ->name('edit');

                 Route::get('bill/{id?}', 'Admin\OrderController@bill')
                ->name('bill');


        Route::get('delete/{id?}', 'Admin\OrderController@delete')
                ->name('delete');
    });
    
    Route::group(['prefix' => 'user', 'as' => 'user.'], function() {
        Route::get('list', 'Admin\UserController@index')
            ->name('list');
        Route::get('add', 'Admin\UserController@add')
                ->name('add');
        Route::post('store', 'Admin\UserController@store')
                ->name('store');
        Route::get('edit/{id?}', 'Admin\UserController@edit')
                ->name('edit');
        Route::get('delete//{id?}', 'Admin\UserController@delete')
                ->name('delete');
    });
    Route::group(['prefix' => 'contact', 'as' => 'contact.'], function() {
        Route::get('list', 'Admin\ContactController@index')
            ->name('list');
        Route::post('store', 'Admin\ContactController@store')
                ->name('store');
        Route::get('edit/{id?}', 'Admin\ContactController@edit')
                ->name('edit');
        Route::get('delete/{id?}', 'Admin\ContactController@delete')
                ->name('delete');
    });
});

//login
Route::get('/login', function () {
    return view('admin.login');
});



 Route::get('dang-nhap', ['as' => 'login-app', 'uses' => 'App\UserController@login']);
 Route::post('post-login', ['as' => 'postLogin', 'uses' => 'App\UserController@postLogin']);
 Route::get('dang-ky', ['as' => 'register', 'uses' => 'App\UserController@register']);
 Route::post('post-register', ['as' => 'postRegister', 'uses' => 'App\UserController@postRegister']);
 Route::get('thoat', ['as' => 'logout', 'uses' => 'App\UserController@logout']);

 Route::post('/login', ['as' => 'login', 'uses' => 'Auth\AuthController@postLogin']);
 Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);

// Page Home
Route::get('/check-out',['as'=>'checkOut','uses'=>'App\OrdersController@checkOut']);
Route::post('/check-out',['as'=>'postCheckOut','uses'=>'App\OrdersController@postCheckOut']);
Route::get('/khach-hang',['as'=>'customer','uses'=>'App\OrdersController@customer']);
Route::get('/cap-nhat-thong-tin-khach-hang',['as'=>'editCustomer','uses'=>'App\OrdersController@editCustomer']);
Route::post('/cap-nhat-thong-tin-khach-hang',['as'=>'storeCustomer','uses'=>'App\OrdersController@storeCustomer']);


Route::get('/','App\ProductController@index')->name('index');
Route::get('/product/{id}-{slug}',['as'=>'product.detail','uses'=>'App\ProductController@detail']);
Route::get('/danh-sach-san-pham/{id}-{slug}',['as'=>'list','uses'=>'App\ProductController@list']);
Route::post('/mua-hang',['as'=>'cart','uses'=>'App\ProductController@cart']);
Route::get('/mua-hang/{id}-{slug}',['as'=>'getcart','uses'=>'App\ProductController@getcart']);
Route::get('/gio-hang',['as'=>'catProduct','uses'=>'App\ProductController@catProduct']);
Route::get('/xoa-san-pham/{id}',['as'=>'delete','uses'=>'App\ProductController@delete']);
Route::post('/cap-nhat-gio-hang',['as'=>'update','uses'=>'App\ProductController@updatecart']);
Route::get('/lien-he',['as'=>'lienhe','uses'=>'App\ProductController@contact']);
Route::post('/luu-lien-he',['as'=>'savecontact','uses'=>'App\ProductController@savecontact']);
Route::get('/gioi-thieu',['as'=>'about','uses'=>'App\ProductController@about']);
Route::post('/search', ['as' => 'search', 'uses' => 'App\ProductController@search']);
Route::get('/search', ['as' => 'search', 'uses' => 'App\ProductController@search']);



 Route::post('comment',['as'=>'comment','uses'=>'App\CommentController@comment']);

// Route::get('search_ajax', function(){
//     $county = Input::get('city_id');
//     $county_id = Order::where('id','=',  $county)->get();
//     return Response::json($county_id);
// });



