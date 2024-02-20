<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemPriceController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Branch_dataController;
use App\Http\Controllers\AdditionalServiceController;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\ImageController;
use App\Models\BranchData; // تأكد من استخدام المسار الصحيح لموديل BranchData
Auth::routes();
// web.php
Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');
Route::post('/update-image/{item}', [ImageController::class, 'updateImage'])->name('updateImage');


// استخدم هذا النمط لكل الطرق
Route::get('/groups/{id}edit', [GroupsController::class, 'edit'])->name('groups.edit');


Route::put('/groups/{id}', [GroupsController::class, 'update'])->name('groups.update');
Route::delete('/groups/{id}', [GroupsController::class, 'destroy'])->name('groups.destroy');

// تحديد الطرق لمتحكم GroupsController
 Route::get('/products', [GroupsController::class, 'index'])->name('groups.index');
 Route::post('/groups/store', [GroupsController::class, 'store'])->name('groups.store');
Route::get('/groups/{id}/edit', 'GroupsController@edit')->name('groups.edit');
// Route::put('/groups/{id}', 'GroupsController@update')->name('groups.update');
// Route::delete('/groups/{id}', 'GroupsController@destroy')->name('groups.destroy');
// Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');
Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
//لوحة التحكم
Route::post('branches.store', [Branch_dataController::class, 'store'])->name('branches.store');
Route::get('/controlpanel', [Branch_dataController::class, 'index'])->name('controlpanel.index');
Route::get('/controlpanel/{id}/edit', [Branch_dataController::class, 'edit'])->name('controlpanel.edit');
Route::put('/controlpanel/{id}', [Branch_dataController::class, 'update'])->name('controlpanel.update');
Route::delete('/controlpanel/{id}', [Branch_dataController::class, 'destroy'])->name('controlpanel.destroy');
Route::get('controlpanel/{id}/edit', [Branch_dataController::class, 'edit'])->name('controlpanel.edit');


//additional_services
Route::get('/additional_services', [AdditionalServiceController::class, 'index'])->name('additional_services.index');
Route::post('/additional_services/store', [AdditionalServiceController::class, 'store'])->name('additional_services.store');
Route::get('/additional_services/{id}/edit', [AdditionalServiceController::class, 'edit'])->name('additional_services.edit');
Route::put('/additional_services/{id}/update', [AdditionalServiceController::class, 'update'])->name('additional_services.update');
Route::delete('/additional_services/{id}/destroy', [AdditionalServiceController::class, 'destroy'])->name('additional_services.destroy');


//إضافة عميل جديد
//Route::post('customers.store', [CustomerController::class, 'store'])->name('customer.store');
Route::post('customers/store', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/customers', [CustomerController::class, 'store']);
Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/showForm', [CustomerController::class, 'showForm']);
View::composer('cards', function ($view) {
    $view->with('branches', BranchData::all());
});




//Route::post('/add-customer', 'CustomerController@store')->name('add.customer');
Route::post('/countries/get-data', 'CountryController@getData');
// في ملف routes/web.php
Route::post('/your-endpoint', 'YourController@yourMethod');
// web.php
Route::post('/invoice', 'InvoiceController@process')->name('invoice.process');
Route::post('/inv.aspx/FillInitializeInvoice', 'YourController@yourMethod');
Route::post('/GetCustomers', 'YourController@yourMethod');
//Route::get('/customers', [CustomerController::class, 'index']);

Route::get('/search', [CustomerController::class, 'search'])->name('search');
// يمكنك تحديد طرق أخرى خارج الـ resource controller إذا كانت هناك حاجة
// ...

Route::get('/product-details',[ItemController::class, 'show'])->name('items.show');
Route::get('/cards',[InvoiceController::class, 'show'])->name('cards.show');
Route::delete('/items/destroy/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

//Update image

Route::get('/your-route', 'YourController@yourMethod')->name('yourRouteName');
//shopping cart
Route::post('/cart/add', [InvoiceController::class, 'store'])->name('cart.add');
//ملف إختيار الصورة
Route::get('/files/{item}', function($item){
    return view('files',['item'=>$item]);
})->name('files');

// Redirect the root URL to the login page
Route::get('/', function () {
    return view('auth.login');
})->name('login');

// Laravel's built-in authentication routes


// Define your custom routes below

// Example route to an 'index' page
Route::get('/index', function () {
    return view('index');
});

// Example dynamic route that accepts a 'page' parameter
Route::get('/{page}', [AdminController::class, 'index'])->where('page', '.*');

// Example route to the home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

///////////////////////////  الاصناف  ///////////////////////////
Route::get('/Items',[ItemController::class, 'show'])->name('items.show');
Route::get('/Invoices',[InvoiceController::class, 'show'])->name('invoices.show');
//Route::get('/searchCustomers', [CustomerController::class,'search'])->name('searchCustomers');
Route::get('/Branches', [BranchController::class, 'index'])->name('branch.index');
Route::post('/BranchesStore', [BranchController::class, 'store'])->name('branch.store');
//Area
Route::get('/Areas', [AreaController::class, 'index'])->name('area.index');
Route::post('/AreasStore', [AreaController::class, 'store'])->name('area.store');


Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::post('/itemsprice', [ItemPriceController::class, 'store'])->name('itemPricing.store');

//Route::resource('groups', 'GroupController');
