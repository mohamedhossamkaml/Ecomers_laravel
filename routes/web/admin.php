 <?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route; 


Route::group(['prefix' => 'admin' , 'namespace'=> 'Admin'], function () {
    
    Config::set('auth.default', 'admin');
    
    
    Route::get( 'login', 'AdminAuth@login');
    Route::post('login', 'AdminAuth@loginpost');
    
    
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_post');
    
    Route::get('reset/password/{token}', 'AdminAuth@reset_password');
    Route::post('reset/password/{token}', 'AdminAuth@reset_password_post');
    
    
    Route::group(['middleware' => 'AuthAdmin:admin'], function () {

        Route::resource('admin', 'AdminController');
        Route::delete('admin/destroy/all', 'AdminController@multi_delete');
        
        Route::resource('cities', 'CitiesController');
        Route::delete('cities/destroy/all', 'CitiesController@multi_delete');

        Route::resource('countries', 'countriesController');
        Route::delete('countries/destroy/all', 'countriesController@multi_delete');
        
        Route::resource('state', 'StatesController');
        Route::delete('state/destroy/all', 'StatesController@multi_delete');
        
        Route::resource('departments', 'DepartmentController');
        Route::delete('departments/destroy/all', 'DepartmentController@multi_delete');
        
        Route::resource('users', 'UsersController');
        Route::delete('users/destroy/all', 'UsersController@multi_delete');
        
        Route::resource('trademarks', 'TradeMarkController'); 
        Route::delete('trademarks/destroy/all', 'TradeMarkController@multi_delete');
        
        Route::resource('maunfacturers', 'MaunfactController'); 
        Route::delete('maunfacturers/destroy/all', 'MaunfactController@multi_delete');

        Route::resource('shippings', 'ShippingsController'); 
        Route::delete('shippings/destroy/all', 'ShippingsController@multi_delete');

        Route::resource('molls', 'MollsController'); 
        Route::delete('molls/destroy/all', 'MollsController@multi_delete');

        Route::resource('colors', 'ColorsController'); 
        Route::delete('colors/destroy/all', 'ColorsController@multi_delete');
        
        Route::resource('size', 'SizeController'); 
        Route::delete('size/destroy/all', 'SizeController@multi_delete');
        
        Route::resource('weight', 'WeightController'); 
        Route::delete('weight/destroy/all', 'WeightController@multi_delete');

        /////////////////////// Strart Product Routes ////////////////////////////////////////
        
        Route::resource('prodacts', 'ProdactsController'); 
        Route::delete('prodacts/destroy/all', 'ProdactsController@multi_delete');
        Route::delete('prodacts/destroy/all/soft', 'ProdactsController@multi_soft_delete');
        
        Route::post('upload/image/{pid}','ProdactsController@upload_files');
        Route::post('delete/image','ProdactsController@delete_file');

        Route::post('products/search','ProdactsController@product_search');
        Route::post('prodacts/{pid}/brands','ProdactsController@product_search_vue');
        
        Route::post('update/image/{pid}','ProdactsController@update_product_image');
        Route::post('delete/product/image/{pid}','ProdactsController@delete_min_image');
        
        Route::post('load/weight/size','ProdactsController@prepare_weight_size');
        Route::post('prodacts/copy/{pid}','ProdactsController@copy_product');


        Route::get('prodacts/soft/deleted','ProdactsController@restor');
        Route::post('prodacts/restor/deleted/{pid}','ProdactsController@restoreProduct');
        Route::delete('prodacts/soft/destroy/{pid}','ProdactsController@softProduct');
        Route::delete('prodacts/soft/roshte/destroy/{pid}','ProdactsController@delete_trash_Product');

        /////////////////////// _End_  Product Routes ////////////////////////////////////////
        Route::resource('/', 'WelcomeController');

        
        // Route::get('/', function () {
        //     return view('admin.home');
        // });

        Route::get('settings', 'settings@setting');
        Route::post('settings','settings@setting_save');
        

        Route::any('logout', 'AdminAuth@logout');
    });


    
    // Lang Routes 

    Route::get('lang/{lang}',function($lang)
    {
        // if short hand
        session()->has('lang')? session()->forget('lang'):'';
        
        // if short hand
        $lang == 'ar'? session()->put('lang','ar') : session()->put('lang','en');

        return back();
    });


}); 