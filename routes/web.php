<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('admin/home', 'Admin\HomeController@index')->name('admin.home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/category','CategoryController');
});

Route::post('/admin/getSubCategories','Admin\CategoryController@getSubCategories')->name('admin.category.getSubCategories');
Route::get('/admin/getAddRemoveParametr/{id}','Admin\CategoryController@getAddRemoveParametr')->name('admin.category.getAddRemoveParametr');
Route::post('/admin/addRemoveParametr/{id}','Admin\CategoryController@addRemoveParametr')->name('admin.category.addRemoveParametr');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/parameter','ParameterController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/store','StoreController');
});


Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/parameter-value','ParameterValueController');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/product','ProductController');
});

Route::post('admin/addAnnounce','Admin\ProductController@addAnnounce')->name('admin.addAnnounce');

Route::get('admin/removeAnnounceImage','Admin\ProductController@removeImage')->name('admin.removeAnnounceImage');
Route::get('admin/rotateAnnounceImage','Admin\ProductController@rotateImage')->name('admin.rotateAnnounceImage');



//test routes

Route::get('/test',function (){ //client terefde numune(silmeyecem)
    $categories = Category::whereParentId(0)->get();
    return view('layouts.client.master',compact('categories'));
});



Route::get('/kateqoriyalar/siyahi/{seo_url}',function ($seo_url){

     $categories=Category::where('seo_url',$seo_url)->where('status',1)->first();

     foreach ($categories->childs as $child){
         echo $child->name;
         echo '<br>';
     }

})->name('client.categories');

Route::get('/{parent}/{child}',function ($parent,$child){

    if (Category::where('status',1)->where('seo_url',$child)->first()->parameter_exists==0){

        $data=Category::where('seo_url',$child)->first()->childs;

        foreach ($data as $d){
            echo $d->name;
            echo '<br>';
        }

    }else{

        if ($parent===Category::where('id',Category::where('seo_url',$child)->first()->parent->parent_id)->first()->seo_url){

            $data=Category::where('seo_url',$child)->first();

           foreach ($data->products as $product){
               echo $product->name;
               echo '<br>';
           }

        }

    }

})->name('parentChild');


