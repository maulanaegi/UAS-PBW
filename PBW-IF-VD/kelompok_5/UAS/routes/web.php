<?php

use App\Models\category;
use App\Models\page;
use App\Models\product;
use App\Models\slider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;

Route::get('/', function () {
    $appname = Config::get('app.name');
    $sliders = slider::all();
    $menu = page::where(['is_group'=>0,'is_active'=>1])->get();
    $submenu = page::where(['is_group'=>1,'is_active'=>1])->get();
    $categories = category::all();
    $products = product::all();
    return view('home',compact('appname','sliders','menu','submenu','categories','products'));
});

Route::get('/page/{page:id}', function (page $page) {
    $appname = Config::get('app.name');
    $menu = page::where(['is_group'=>0,'is_active'=>1])->get();
    $submenu = page::where(['is_group'=>1,'is_active'=>1])->get();
    $categories = category::all();
    return view('page',compact('appname','menu','submenu','categories','page'));
});

Route::get('/product/{product:id}', function (product $product) {
    $appname = Config::get('app.name');
    $menu = page::where(['is_group'=>0,'is_active'=>1])->get();
    $submenu = page::where(['is_group'=>1,'is_active'=>1])->get();
    $categories = category::all();
    return view('detail_product',compact('appname','menu','submenu','categories','product'));
});