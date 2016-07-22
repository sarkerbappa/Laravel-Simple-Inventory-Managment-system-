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
Route::get('/', ['as' => 'admin', 'uses' => 'UsersController@adminLoginForm']);
Route::post('/login', ['as' => 'login', 'uses' => 'UsersController@adminLoginCheck']);
Route::get('/adminDashboard', ['as' => 'adminDashboard', 'uses' => 'UsersController@adminDashboard']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'UsersController@getLogOut']);
Route::get('/updateUserProfileForm', ['as' => 'updateUserProfileForm', 'uses' => 'UsersController@updateUserProfileForm']);
Route::post('/updateUserProfile', ['as' => 'updateUserProfile', 'uses' => 'UsersController@updateUserProfile']);

/*===============================Item Configuration Route=============================================*/

// Category Route

Route::get('/addCategory', ['as' => 'addCategory', 'uses' => 'ItemConfigurationController@addCategory']);
Route::post('/categorySave', ['as' => 'categorySave', 'uses' => 'ItemConfigurationController@categorySave']);
Route::any('/editCategory/{id}', ['as' => 'editCategory', 'uses' => 'ItemConfigurationController@editCategory']);
Route::post('/categoryUpdateSave', ['as' => 'categoryUpdateSave', 'uses' => 'ItemConfigurationController@categoryUpdateSave']);
Route::any('/deleteCategory/{id}', ['as' => 'deleteCategory', 'uses' => 'ItemConfigurationController@deleteCategory']);

// Brand Route

Route::get('/addBrand', ['as' => 'addBrand', 'uses' => 'ItemConfigurationController@addBrand']);
Route::post('/brandSave', ['as' => 'brandSave', 'uses' => 'ItemConfigurationController@brandSave']);
Route::any('/editBrand/{id}', ['as' => 'editBrand', 'uses' => 'ItemConfigurationController@editBrand']);
Route::post('/brandUpdateSave', ['as' => 'brandUpdateSave', 'uses' => 'ItemConfigurationController@brandUpdateSave']);
Route::any('/deleteBrand/{id}', ['as' => 'deleteBrand', 'uses' => 'ItemConfigurationController@deleteBrand']);

// Supplier

Route::get('/addSupplier', ['as' => 'addSupplier', 'uses' => 'ItemConfigurationController@addSupplier']);
Route::post('/supplierSave', ['as' => 'supplierSave', 'uses' => 'ItemConfigurationController@supplierSave']);
Route::any('/editSupplier/{id}', ['as' => 'editSupplier', 'uses' => 'ItemConfigurationController@editSupplier']);
Route::post('/supplierUpdateSave', ['as' => 'supplierUpdateSave', 'uses' => 'ItemConfigurationController@supplierUpdateSave']);
Route::any('/deleteSupplier/{id}', ['as' => 'deleteSupplier', 'uses' => 'ItemConfigurationController@deleteSupplier']);

// Products

Route::get('/addProducts', ['as' => 'addProducts', 'uses' => 'ItemConfigurationController@addProducts']);
Route::post('/ProductSave', ['as' => 'ProductSave', 'uses' => 'ItemConfigurationController@ProductSave']);
Route::any('/editProduct/{id}', ['as' => 'editProduct', 'uses' => 'ItemConfigurationController@editProduct']);
Route::post('/ProductUpdateSave', ['as' => 'ProductUpdateSave', 'uses' => 'ItemConfigurationController@ProductUpdateSave']);
Route::any('/deleteProduct/{id}', ['as' => 'deleteProduct', 'uses' => 'ItemConfigurationController@deleteProduct']);


/*=============================== Stock In Route=============================================*/

Route::get('/addProductInStock', ['as' => 'addProductInStock', 'uses' => 'StockInController@addProductInStock']);
Route::post('/ProductSaveInStock', ['as' => 'ProductSaveInStock', 'uses' => 'StockInController@ProductSaveInStock']);
Route::any('/editStockIn/{id}', ['as' => 'editStockIn', 'uses' => 'StockInController@editStockIn']);
Route::post('/ProductUpdateSaveInStock/{id}', ['as' => 'ProductUpdateSaveInStock', 'uses' => 'StockInController@ProductUpdateSaveInStock']);
Route::any('/deleteStockIn/{id}', ['as' => 'deleteStockIn', 'uses' => 'StockInController@deleteStockIn']);

/*=============================== Stock Out Route=============================================*/

Route::get('/addProductStockOut', ['as' => 'addProductStockOut', 'uses' => 'StockOutController@addProductStockOut']);
Route::post('/ProductSaveStockOut', ['as' => 'ProductSaveStockOut', 'uses' => 'StockOutController@ProductSaveStockOut']);
Route::any('/editStockOut/{id}', ['as' => 'editStockOut', 'uses' => 'StockOutController@editStockOut']);
Route::post('/ProductUpdateSaveStockOut/{id}', ['as' => 'ProductUpdateSaveStockOut', 'uses' => 'StockOutController@ProductUpdateSaveStockOut']);
Route::any('/deleteStockOut/{id}', ['as' => 'deleteStockOut', 'uses' => 'StockOutController@deleteStockOut']);
Route::any('/xlStockOut', ['as' => 'xlStockOut', 'uses' => 'StockOutController@xlStockOut']);

/*=============================  Report Route ===================================================*/

Route::get('/generalStockReport', ['as' => 'generalStockReport', 'uses' => 'ReportController@generalStockReport']);
Route::get('/productWiseStockInReport', ['as' => 'productWiseStockInReport', 'uses' => 'ReportController@productWiseStockInReport']);
Route::post('/productWiseStockInReportSearch/{id}', ['as' => 'productWiseStockInReportSearch', 'uses' => 'ReportController@productWiseStockInReportSearch']);
Route::get('/productWiseStockOutReport', ['as' => 'productWiseStockOutReport', 'uses' => 'ReportController@productWiseStockOutReport']);
