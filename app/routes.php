<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// User managment route
Route::get('/', array('as' => 'admin', 'uses' => 'UsersController@adminLoginForm'));  
Route::post('/login', array('as' => 'login', 'uses' => 'UsersController@adminLoginCheck'));
Route::get('/adminDashboard', array('as' => 'adminDashboard', 'uses' => 'UsersController@adminDashboard')); 
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@getLogOut')); 
Route::get('/updateUserProfileForm', array('as' => 'updateUserProfileForm', 'uses' => 'UsersController@updateUserProfileForm'));
Route::post('/updateUserProfile', array('as' => 'updateUserProfile', 'uses' => 'UsersController@updateUserProfile')); 

/*===============================Item Configuration Route=============================================*/

// Category Route

Route::get('/addCategory', array('as' => 'addCategory', 'uses' => 'ItemConfigurationController@addCategory')); 
Route::post('/categorySave', array('as' => 'categorySave', 'uses' => 'ItemConfigurationController@categorySave')); 
Route::any('/editCategory/{id}', array('as' => 'editCategory', 'uses' => 'ItemConfigurationController@editCategory')); 
Route::post('/categoryUpdateSave', array('as' => 'categoryUpdateSave', 'uses' => 'ItemConfigurationController@categoryUpdateSave')); 
Route::any('/deleteCategory/{id}', array('as' => 'deleteCategory', 'uses' => 'ItemConfigurationController@deleteCategory')); 

// Brand Route

Route::get('/addBrand', array('as' => 'addBrand', 'uses' => 'ItemConfigurationController@addBrand')); 
Route::post('/brandSave', array('as' => 'brandSave', 'uses' => 'ItemConfigurationController@brandSave')); 
Route::any('/editBrand/{id}', array('as' => 'editBrand', 'uses' => 'ItemConfigurationController@editBrand')); 
Route::post('/brandUpdateSave', array('as' => 'brandUpdateSave', 'uses' => 'ItemConfigurationController@brandUpdateSave')); 
Route::any('/deleteBrand/{id}', array('as' => 'deleteBrand', 'uses' => 'ItemConfigurationController@deleteBrand')); 

// Supplier

Route::get('/addSupplier', array('as' => 'addSupplier', 'uses' => 'ItemConfigurationController@addSupplier')); 
Route::post('/supplierSave', array('as' => 'supplierSave', 'uses' => 'ItemConfigurationController@supplierSave')); 
Route::any('/editSupplier/{id}', array('as' => 'editSupplier', 'uses' => 'ItemConfigurationController@editSupplier')); 
Route::post('/supplierUpdateSave', array('as' => 'supplierUpdateSave', 'uses' => 'ItemConfigurationController@supplierUpdateSave')); 
Route::any('/deleteSupplier/{id}', array('as' => 'deleteSupplier', 'uses' => 'ItemConfigurationController@deleteSupplier')); 

// Products

Route::get('/addProducts', array('as' => 'addProducts', 'uses' => 'ItemConfigurationController@addProducts')); 
Route::post('/ProductSave', array('as' => 'ProductSave', 'uses' => 'ItemConfigurationController@ProductSave')); 
Route::any('/editProduct/{id}', array('as' => 'editProduct', 'uses' => 'ItemConfigurationController@editProduct')); 
Route::post('/ProductUpdateSave', array('as' => 'ProductUpdateSave', 'uses' => 'ItemConfigurationController@ProductUpdateSave')); 
Route::any('/deleteProduct/{id}', array('as' => 'deleteProduct', 'uses' => 'ItemConfigurationController@deleteProduct')); 


/*=============================== Stock In Route=============================================*/

Route::get('/addProductInStock', array('as' => 'addProductInStock', 'uses' => 'StockInController@addProductInStock')); 
Route::post('/ProductSaveInStock', array('as' => 'ProductSaveInStock', 'uses' => 'StockInController@ProductSaveInStock')); 
Route::any('/editStockIn/{id}', array('as' => 'editStockIn', 'uses' => 'StockInController@editStockIn')); 
Route::post('/ProductUpdateSaveInStock/{id}', array('as' => 'ProductUpdateSaveInStock', 'uses' => 'StockInController@ProductUpdateSaveInStock')); 
Route::any('/deleteStockIn/{id}', array('as' => 'deleteStockIn', 'uses' => 'StockInController@deleteStockIn')); 

/*=============================== Stock Out Route=============================================*/

Route::get('/addProductStockOut', array('as' => 'addProductStockOut', 'uses' => 'StockOutController@addProductStockOut')); 
Route::post('/ProductSaveStockOut', array('as' => 'ProductSaveStockOut', 'uses' => 'StockOutController@ProductSaveStockOut')); 
Route::any('/editStockOut/{id}', array('as' => 'editStockOut', 'uses' => 'StockOutController@editStockOut')); 
Route::post('/ProductUpdateSaveStockOut/{id}', array('as' => 'ProductUpdateSaveStockOut', 'uses' => 'StockOutController@ProductUpdateSaveStockOut')); 
Route::any('/deleteStockOut/{id}', array('as' => 'deleteStockOut', 'uses' => 'StockOutController@deleteStockOut')); 
Route::any('/xlStockOut', array('as' => 'xlStockOut', 'uses' => 'StockOutController@xlStockOut')); 

/*=============================  Report Route ===================================================*/

Route::get('/generalStockReport', array('as' => 'generalStockReport', 'uses' => 'ReportController@generalStockReport')); 
Route::get('/productWiseStockInReport', array('as' => 'productWiseStockInReport', 'uses' => 'ReportController@productWiseStockInReport')); 
Route::post('/productWiseStockInReportSearch/{id}', array('as' => 'productWiseStockInReportSearch', 'uses' => 'ReportController@productWiseStockInReportSearch'));
Route::get('/productWiseStockOutReport', array('as' => 'productWiseStockOutReport', 'uses' => 'ReportController@productWiseStockOutReport')); 
