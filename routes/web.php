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

use App\Http\Controllers\SmsController;

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\View;
use App\Models\BranchData; 
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\CostController;
use App\Http\Controllers\EstablishmePController;
use App\Models\Cost;
use App\http\Controllers\LocationController;
use App\http\Controllers\restController;
use App\http\Controllers\OtherInvoiceDataController;

use App\http\Controllers\InvoicePageSettingController;





use App\Http\Controllers\ImageController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\DeliverySettingController;
use Illuminate\Database\Console\Migrations\ResetCommand;

// use App\Http\Controllers\adressController;
// use App\Models\address;
use Illuminate\Contracts\Cache\Store;
use App\Http\Controllers\PrintOptionController;
use App\Http\Controllers\UserController;
use  App\Models\User;
use  Spatie\Permission\Models\Role;
use  Spatie\Permission\PermissionRegistrar;
use  Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;


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
//other invoice data route
Route::post('/save-invoice-details', [OtherInvoiceDataController::class, 'save']);
Route::get('/cart', [CartController::class, 'index']);


//other invoice data route
Route::post('/save-invoice-details', [OtherInvoiceDataController::class, 'save']);
Route::get('/get-invoice-details', [OtherInvoiceDataController::class, 'get']);

//clock-delivery modal
Route::post('/save-delivery-clock-data', [OtherInvoiceDataController::class, 'store']);
//Send SMS messages
Route::post('/send-sms', [SmsController::class, 'send'])->name('send-sms');
//inoice page settings

Route::get('/signin', [InvoicePageSettingController::class, 'index'])->name('invoice-settings.index');
Route::post('/invoice-page-settings', [InvoicePageSettingController::class, 'store'])->name('invoice-page-settings.store');
//deliver settings
Route::post('/delivery-settings', [DeliverySettingController::class, 'store'])->name('delivery-settings.store');

Route::post('/cart', 'App\Http\Controllers\CartController@store');
Route::post('/cart', [CartController::class, 'store']);
Route::get('/cart', 'App\Http\Controllers\CartController@index');





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

//المنتجات
Route::post('/product-details', [ItemController::class, 'someMethod']);

// إعداتات

Route::post('/print_options', 'PrintOptionController@store')->name('print_options.store');
Route::post('/print_options', [PrintOptionController::class, 'store'])->name('print_options.store');



Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
//تغير للغة 
Route::get('lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }
    Session::put('locale', $locale);
    return redirect()->back();
})->name('locale.setting');

Route::post('/add-user', [UserController::class, 'store'])->name('users.store');

// لعرض نموذج إنشاء المستخدم
Route::get('/forgot', [UserController::class, 'create'])->name('users.create');

// لمعالجة بيانات نموذج إنشاء المستخدم
Route::post('/forgot', [UserController::class, 'store'])->name('users.store');


// تأكد من استخدام الاسم الصحيح للطريقة إذا كان مختلفًا
Route::get('/admin/{id}', [AdminController::class, 'index']);


// إضافة، عرض، وتعديل الأدوار
Route::get('/roles', 'App\Http\Controllers\RoleController@index')->name('roles.index');
Route::post('/roles', 'App\Http\Controllers\RoleController@store')->name('roles.store');
Route::get('/roles/{role}/edit', 'App\Http\Controllers\RoleController@edit')->name('roles.edit');
Route::put('/roles/{role}', 'App\Http\Controllers\RoleController@update')->name('roles.update');
Route::delete('/roles/{role}', 'App\Http\Controllers\RoleController@destroy')->name('roles.destroy');

// //المناطق
// Route::post('/rest','restController@store')->name('rest.store');
// Route::put('/rest/{id}', [restController::class, 'update'])->name('rest.update');
// Route::get('/rest', [restController::class, 'index'])->name('rest.index');
// Route::post('/rest/store', [restController::class, 'store'])->name('rest.store');
// Route::get('/rest', [restController::class, 'index'])->name('rest.index');
// Route::delete('/rest/{id}', [restController::class, 'destroy'])->name('rest.destroy');
// Route::get('/rest/{id}/edit', [restController::class, 'edit'])->name('rest.edit');

//التقارير

Route::get('/mail-read', [InvoiceController::class, 'index']);
Route::get('/mail-read/search', [InvoiceController::class, 'search'])->name('mail-read.search');
Route::get('/search', [InvoiceController::class, 'search'])->name('mail-read.search');
///mail-settings
Route::get('/mail-settings', [InvoiceController::class, 'showPaidInvoicesReport'])->name('mail-settings');




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
// // في ملف web.php، أضف Route جديد أو قم بتعديل Route موجود ليشمل إرسال بيانات الفروع إلى الصفحة.
// Route::get('/ad-castoar', [adressController::class, 'showCards'])->name('ad-castoar');
// Route::get('/ad-castoar', [adressController::class, 'showSelectForm']);
// Route::get('/some-path', 'adressController@someMethod');
// Route::get('/ad-castoar',[adressController::class,'show'])->name('adress');

Route::post('/countries/get-data', 'CountryController@getData');
// في ملف routes/web.php
Route::post('/your-endpoint', 'YourController@yourMethod');
// web.php
Route::post('/invoice', 'InvoiceController@process')->name('invoice.process');
Route::post('/inv.aspx/FillInitializeInvoice', 'YourController@yourMethod');
Route::post('/GetCustomers', 'YourController@yourMethod');

//تحديث الصورة

Route::put('/items/{item}', 'App\Http\Controllers\ItemController@update')->name('items.update');

//تحديث الصورة

// Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
// Route::put('/items/{item}', [ItemController::class, 'update']);

// Route::delete('/items/{id}', 'ItemController@destroy')->name('items.destroy');
// Route::put('/items/{item}', 'ItemController@update')->name('items.update');
// Route::get('/items', [ItemController::class, 'index']);


Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
Route::get('/items', [ItemController::class, 'index']);






Route::get('/search', [CustomerController::class, 'search'])->name('search');

// ...

Route::get('/product-details',[ItemController::class, 'show'])->name('items.show');
Route::get('/cards',[InvoiceController::class, 'show'])->name('cards.show');
//update cart status from under execution to ready for delivery
Route::post('/update-cart-status', [CartController::class, 'updateStatus'])->name('cart.update-status');

Route::delete('/items/destroy/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

//المنتجات تعديل حذف اضافة 
Route::put('/update-product/{item}', 'ItemController@update')->name('update-product');
// أو إذا كنت تستخدم PATCH
Route::patch('/update-product/{item}', 'ItemController@update')->name('update-product');
// استخدام Route::put أو Route::patch بناءً على ما تفضل
Route::put('/update-product/{item}', 'App\Http\Controllers\ItemController@update')->name('update-product');
Route::put('/product/{id}', 'App\Http\Controllers\ItemController@update')->name('update-product');


Route::post('/product-details/store', [ItemController::class, 'store'])->name('product-details.store');
Route::delete('/product-details/destroy/{item}', [ItemController::class, 'destroy'])->name('product-details.destroy');
Route::get('/product-details/edit/{item}', [ItemController::class, 'edit'])->name('product-details.edit');
Route::put('/product-details/update/{item}', [ItemController::class, 'update'])->name('product-details.update');
Route::get('/product-details', [ItemController::class, 'show'])->name('product-details');

//Update image

Route::get('/your-route', 'YourController@yourMethod')->name('yourRouteName');
//shopping cart
Route::post('/cart/add', [InvoiceController::class, 'store'])->name('cart.add');
//ملف إختيار الصورة
Route::get('/files/{item}', function($item){
    return view('files',['item'=>$item]);
})->name('files');
Route::post('/product-details', [ItemController::class, 'destroy']);

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
Route::delete('/itemsprice/{id}', [ItemPriceController::class, 'destroy'])->name('itemPricing.destroy');

Route::post('/invoice-page-settings', [InvoicePageSettingController::class, 'store'])->name('invoice-page-settings.store');

