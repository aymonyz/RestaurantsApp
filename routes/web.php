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
use App\Http\Controllers\PaymentMethodController;

use App\Http\Controllers\adress;

use App\Http\Controllers\CartController;

use Illuminate\Support\Facades\View;

use App\Models\BranchData; 
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EstablishmePController;
use App\Models\Cost;
use App\http\Controllers\LocationController;
use App\http\Controllers\restController;





use App\Http\Controllers\ImageController;
use App\Http\Controllers\ResetController;
use Illuminate\Database\Console\Migrations\ResetCommand;

// تأكد من استخدام المسار الصحيح لموديل BranchData

use App\Http\Controllers\adressController;
use App\Models\address;

Route::get('/', function () {
    return view('auth.login');
})->name('login');
Auth::routes();
Route::get('/groups', [GroupsController::class, 'index'])->name('groups.index');
Route::post('/update-image/{item}', [ImageController::class, 'updateImage'])->name('updateImage');


// استخدم هذا النمط لكل الطرق
Route::get('/groups/{id}edit', [GroupsController::class, 'edit'])->name('groups.edit');

Route::post('/cart/save', [CartController::class, 'store'])->name('cart.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', 'App\Http\Controllers\CartController@store');
Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart', 'App\Http\Controllers\CartController@index');


Route::get('/cart', [CartController::class, 'index']);


Route::put('/groups/{id}', [GroupsController::class, 'update'])->name('groups.update');
Route::delete('/groups/{id}', [GroupsController::class, 'destroy'])->name('groups.destroy');

// تحديد الطرق لمتحكم GroupsController
 Route::get('/products', [GroupsController::class, 'index'])->name('groups.index');
 Route::post('/groups/store', [GroupsController::class, 'store'])->name('groups.store');
Route::get('/groups/{id}/edit', 'GroupsController@edit')->name('groups.edit');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
//لوحة التحكم
Route::post('branches.store', [Branch_dataController::class, 'store'])->name('branches.store');
Route::get('/controlpanel', [Branch_dataController::class, 'index'])->name('controlpanel.index');
Route::get('/controlpanel/{id}/edit', [Branch_dataController::class, 'edit'])->name('controlpanel.edit');
Route::put('/controlpanel/{id}', [Branch_dataController::class, 'update'])->name('controlpanel.update');
Route::delete('/controlpanel/{id}', [Branch_dataController::class, 'destroy'])->name('controlpanel.destroy');
Route::get('controlpanel/{id}/edit', [Branch_dataController::class, 'edit'])->name('controlpanel.edit');

//المصروفاتمجموعة 

Route::post('/avatar/store', 'ExpensesController@store')->name('Expenses.store');
Route::post('/avatar/store', [ExpensesController::class, 'store'])->name('Expenses.store');
Route::get('/avatar', [ExpensesController::class, 'index'])->name('avatar.index');
Route::delete('/avatar/{id}', [ExpensesController::class, 'destroy'])->name('Expenses.destroy');
Route::get('/avatar/{id}/edit', [ExpensesController::class, 'edit'])->name('Expenses.edit');
Route::get('/avatar/{id}/edit', [ExpensesController::class, 'edit'])->name('Expenses.edit');
Route::put('/avatar/{id}', [ExpensesController::class, 'update'])->name('Expenses.update');
Route::get('/avatar', [ExpensesController::class, 'index'])->name('Expenses.index');

//مصروفات
Route::get('/Establishmentneam-edit/{id}/edit', [CostController::class, 'edit'])->name('alerts.edit');

Route::get('/alerts', [CostController::class, 'index'])->name('alerts.index');
Route::post('/alerts/store', [CostController::class, 'store'])->name('alerts.store');


Route::put('/alerts/{id}', [CostController::class, 'update'])->name('alerts.update');
Route::delete('/alerts/{id}', [CostController::class, 'destroy'])->name('alerts.destroy');




// //المناطق
// Route::post('/rest','restController@store')->name('rest.store');
// Route::put('/rest/{id}', [restController::class, 'update'])->name('rest.update');
// Route::get('/rest', [restController::class, 'index'])->name('rest.index');
// Route::post('/rest/store', [restController::class, 'store'])->name('rest.store');
// Route::get('/rest', [restController::class, 'index'])->name('rest.index');
// Route::delete('/rest/{id}', [restController::class, 'destroy'])->name('rest.destroy');
// Route::get('/rest/{id}/edit', [restController::class, 'edit'])->name('rest.edit');




//additional_services
Route::get('/additional_services', [AdditionalServiceController::class, 'index'])->name('additional_services.index');
Route::post('/additional_services/store', [AdditionalServiceController::class, 'store'])->name('additional_services.store');
Route::get('/additional_services/{id}/edit', [AdditionalServiceController::class, 'edit'])->name('additional_services.edit');
Route::put('/additional_services/{id}/update', [AdditionalServiceController::class, 'update'])->name('additional_services.update');
Route::delete('/additional_services/{id}/destroy', [AdditionalServiceController::class, 'destroy'])->name('additional_services.destroy');

Route::get('/payment_methods', [PaymentMethodController::class, 'index'])->name('payment_methods.index');
Route::post('/payment_methods/store', [PaymentMethodController::class, 'store'])->name('payment-methods.save');
Route::get('/payment_methods/{id}/edit', [PaymentMethodController::class, 'edit'])->name('payment-methods.edit');
Route::put('/payment_methods/{id}/update', [PaymentMethodController::class, 'update'])->name('payment-methods.update');
Route::delete('/payment_methods/{id}/destroy', [PaymentMethodController::class, 'destroy'])->name('payment-methods.destroy');


//إضافة عميل جديد

Route::post('customer/store', [CustomerController::class, 'store'])->name('customer.store');
Route::post('/customers', [CustomerController::class, 'store']);
Route::post('customers/store', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/showForm', [CustomerController::class, 'showForm']);
View::composer('cards', function ($view) {
    $view->with('branches', BranchData::all());
});
//المناطق
Route::get('/reset', [ResetController::class, 'index'])->name('reset.index');

// Route to handle form submission and save the area
Route::post('/reset/store', [ResetController::class, 'store'])->name('reset.store');

// Route to handle deleting an area
Route::post('/reset/delete', [ResetController::class, 'delete'])->name('reset.delete');
// web.php

// Route to handle deleting an area
Route::post('/reset/delete/{id}', [ResetController::class, 'delete'])->name('reset.delete');
// في ملف web.php، أضف Route جديد أو قم بتعديل Route موجود ليشمل إرسال بيانات الفروع إلى الصفحة.
Route::get('/ad-castoar', [adressController::class, 'showCards'])->name('ad-castoar');
Route::get('/ad-castoar', [adressController::class, 'showSelectForm']);
Route::get('/some-path', 'adressController@someMethod');
Route::get('/ad-castoar',[adressController::class,'show'])->name('adress');

Route::post('/countries/get-data', 'CountryController@getData');
// في ملف routes/web.php
Route::post('/your-endpoint', 'YourController@yourMethod');
// web.php
Route::post('/invoice', 'InvoiceController@process')->name('invoice.process');
Route::post('/inv.aspx/FillInitializeInvoice', 'YourController@yourMethod');
Route::post('/GetCustomers', 'YourController@yourMethod');





Route::get('/search', [CustomerController::class, 'search'])->name('search');

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

// Laravel's built-in authentication routes


// Define your custom routes below

// Example route to an 'index' page
Route::get('/index', function () {
    return view('index');
});
 Route::get('/{page}', [AdminController::class, 'index'])->where('page', '.*');

// Example route to the home page
Route::get('/home', [HomeController::class, 'index'])->name('home');

///////////////////////////  الاصناف  ///////////////////////////
Route::get('/Items',[ItemController::class, 'show'])->name('items.show');
Route::get('/Invoices',[InvoiceController::class, 'show'])->name('invoices.show');

Route::get('/Branches', [BranchController::class, 'index'])->name('branch.index');
Route::post('/BranchesStore', [BranchController::class, 'store'])->name('branch.store');
//Area
Route::get('/Areas', [AreaController::class, 'index'])->name('area.index');
Route::post('/AreasStore', [AreaController::class, 'store'])->name('area.store');


Route::post('/items', [ItemController::class, 'store'])->name('items.store');

Route::post('/itemsprice', [ItemPriceController::class, 'store'])->name('itemPricing.store');

