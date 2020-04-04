<?php

Route::resource('categories', 'CategoryController'); //->middleware('auth');

Route::resource('products', 'ProductController');

//Route::get('/admin/dashboard', function(){ return 'Welcome Admin!'; })->name('admin.dashboard');
//Route::get('/admin/home', function(){     return 'Welcome Admin Home!'; })->name('admin.home');