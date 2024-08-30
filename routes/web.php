<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\brandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ManufacturerController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\admin\ProductVariantController;
use App\Http\Controllers\Admin\slidercontroller;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\VariantTypesController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\mailtrackerController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\MyaccountController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\reviewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('run', function(){
   return Artisan::call('storage:link'); 
});

Route::group(['middleware'=>['auth:team'],'prefix'=>'admin','as'=>'admin.'], function (){
    Route::resource('users', TeamController::class);   
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);

    Route::get('/dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
    
    Route::get('/products/list', [ProductController::class,'index'])->name('products.list');

    Route::get('/products/create', [ProductController::class,'create'])->name('products.create');

    Route::post('/products/create', [ProductController::class,'store']);

    Route::get('/products/filter', [ProductController::class,'filter'])->name('products.filter');

    Route::get('/products/delete', [ProductController::class,'delete']);

    Route::get('/products/edit/{id}', [ProductController::class,'edit'])->name('products.edit');

    Route::post('/products/edit/{id}', [ProductController::class,'update']);

    Route::post('/products/update-status', [ProductController::class,'update_status'])->name('update_product_status');

    Route::get('/image_delete/{id}',[ProductController::class,'image_delete']);
    
    Route::get('variant/delete',[ProductController::class,'variant_delete'])->name('delete_variant');
    



    Route::get('/products-variant-type/list', [VariantTypesController::class,'index'])->name('variant.type.list');

    Route::get('/products-variant-type/create', [VariantTypesController::class,'create'])->name('variant.type.create');

    Route::post('/products-variant-type/create', [VariantTypesController::class,'store']);

    Route::get('/products-variant-type/delete', [VariantTypesController::class,'delete']);

    Route::get('/products-variant-type/edit/{id}', [VariantTypesController::class,'edit'])->name('variant.type.edit');

    Route::post('/products-variant-type/update', [VariantTypesController::class,'update']);

    Route::post('/products-variant-type/update-status', [VariantTypesController::class,'update_status'])->name('update_variant_status');

    Route::get('/variants-ajax', [VariantTypesController::class,'variants_ajax'])->name('variants.ajax');


    Route::get('/products-variant/list', [ProductVariantController::class,'index'])->name('variant.list');

    Route::get('/products-variant/create', [ProductVariantController::class,'create'])->name('variant.create');

    Route::post('/products-variant/create', [ProductVariantController::class,'store']);

    Route::get('/products-variant/delete', [ProductVariantController::class,'delete']);

    Route::get('/products-variant/edit/{id}', [ProductVariantController::class,'edit'])->name('variant.edit');

    Route::post('/products-variant/update', [ProductVariantController::class,'update']);

    Route::get('/productvariants-ajax', [ProductVariantController::class,'variants_ajax'])->name('variants.ajax');

   

    
    
    Route::get('/categories/list', [CategoryController::class,'index'])->name('categories.list');
    
    Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');

    Route::post('/categories/create', [CategoryController::class,'store']);

    Route::get('/categories/delete', [CategoryController::class,'delete']);

    Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');

    Route::post('/categories/update', [CategoryController::class,'update']);

    Route::post('/categories/update-status', [CategoryController::class,'update_status'])->name('update_category_status');

    Route::get('/categories-ajax', [CategoryController::class,'categories_ajax'])->name('categories.ajax');
    

    Route::get('/manufacturer/list', [ManufacturerController::class,'index'])->name('manufacturer.list');

    Route::get('/manufacturer/create', [ManufacturerController::class,'create'])->name('manufacturer.create');

    Route::post('/manufacturer/create', [ManufacturerController::class,'store']);

    Route::get('/manufacturer/delete', [ManufacturerController::class,'delete']);
    
    Route::get('/manufacturer/edit/{id}', [ManufacturerController::class,'edit'])->name('manufacturer.edit');

    Route::post('/manufacturer/edit/{id}', [ManufacturerController::class,'update']);
    
    Route::post('/manufacturer/update-status', [ManufacturerController::class,'update_status'])->name('update_manufacturer_status');

    Route::get('/manufacturer-ajax', [ManufacturerController::class,'manufacturer_ajax'])->name('manufacturer.ajax');




    Route::get('/vendor/list', [VendorController::class,'index'])->name('vendor.list');

    Route::get('/vendor/view/{id}',[VendorController::class,'view'])->name('vendor.view');

    Route::get('/vendor/create', [VendorController::class,'create'])->name('vendor.craete');

    Route::post('/vendor/create', [VendorController::class,'store']);

    Route::get('/vendor/delete/{id}', [VendorController::class,'delete']);

    Route::get('/vendor/edit/{id}', [VendorController::class,'edit'])->name('vendor.edit');

    Route::post('/vendor/edit/{id}', [VendorController::class,'update']);




    Route::get('/slider/list', [slidercontroller::class,'index'])->name('slider.list');

    Route::get('/slider/create', [slidercontroller::class,'create'])->name('slider.create');

    Route::post('/slider/create', [slidercontroller::class,'store']);

    Route::get('/slider/delete/{id}', [slidercontroller::class,'delete']);

    Route::get('/slider/edit/{id}', [slidercontroller::class,'edit'])->name('slider.edit');

    Route::post('/slider/edit/{id}', [slidercontroller::class,'update']);

    
    Route::get('/brand/list', [brandController::class,'index'])->name('brand.list');

    Route::get('/brand/create', [brandController::class,'create'])->name('brand.create');

    Route::post('/brand/create', [brandController::class,'store']);

    Route::get('/brand/delete/{id}', [brandController::class,'delete']);

    Route::get('/brand/edit/{id}', [brandController::class,'edit'])->name('brand.edit');

    Route::post('/brand/edit/{id}', [brandController::class,'update']);


    Route::get('/mailtrack', [mailtrackerController::class,'index']);

    Route::get('/update', [mailtrackerController::class,'update']);
    

    Route::get('/privacy-policy', [PrivacyController::class,'index'])->name('websetting.policy');
    Route::post('/privacy-policy', [PrivacyController::class,'update']);
    
    
    Route::get('/terms-conditions', [TermsController::class,'index'])->name('websetting.terms');
    Route::post('/terms-conditions', [TermsController::class,'update']);

    
    Route::get('/contact/list', [ContactController::class,'index'])->name('contact.list');
    Route::get('/contact/view/{id}', [ContactController::class,'view']);
    Route::get('/contact/delete/{id}', [ContactController::class,'deleteContact']);
    Route::get('/contact-ajax', [ContactController::class,'contact_ajax']);

    Route::post('/change-password', [AdminSettingController::class,'changePassword'])->name('settings.changepassword');
    Route::get('/change-password', [AdminSettingController::class,'changePassword'])->name('settings.changepassword')->middleware('password.confirm:admin.password.confirm');
    Route::post('/profile', [AdminSettingController::class,'profile'])->name('settings.profile');
    Route::get('/profile', [AdminSettingController::class,'profile'])->name('settings.profile')->middleware('password.confirm:admin.password.confirm');
});
require __DIR__.'/adminauth.php';


Route::group(['middleware'=>['auth:web','verified']], function (){
    Route::get('/myaccount', [MyaccountController::class,'index']);
    
    Route::get('/myaccount/orders', [MyaccountController::class,'orders']);

    Route::get('/myaccount/view/{id}', [MyaccountController::class,'order_view']);

    Route::get('/myaccount/profile', [MyaccountController::class,'profile']);

    Route::get('/myaccount/change-password', [MyaccountController::class,'change_password']);

    Route::post('/myaccount/change-password', [MyaccountController::class,'password_update']);
});
require __DIR__.'/auth.php';


// Route::get('/contact-us', [ContactUsController::class,'contact']);

Route::get('/shop', [HomeController::class,'shop']);

Route::get('/shop-fliter',[HomeController::class,'shopFilter']);

// Route::get('/filter-data', [HomeController::class,'filter_data']);


Route::get('/product/{slug}', [HomeController::class,'product']);

Route::get('/product-price-filter', [HomeController::class,'product_price_filter']);

// Route::get('/myaccount', [HomeController::class,'myaccount']);

Route::get('/cart', [HomeController::class,'cart']);

Route::post('/cart', [HomeController::class,'addcart']);

Route::post('/wish', [HomeController::class,'addwish']);

Route::get('/delete_cart', [HomeController::class,'delete_cart']);

Route::get('/delete_wish', [HomeController::class,'delete_wish']);

Route::post('update_cart', [HomeController::class,'update_cart']);

Route::get('/clear_cart', [HomeController::class,'clear_cart']);

Route::get('/fetch_data', [HomeController::class,'fetch_data']);

Route::get('/wish_data', [HomeController::class,'wish_data']);

Route::get('/cart_fetch_data', [HomeController::class,'cart_fetch_data']);


// Route::get('/login', [HomeController::class,'login']);

// Route::get('/signup', [HomeController::class,'signup']);

Route::post('/contact', [ContactUsController::class,'contact']);
Route::get('/contact', [ContactUsController::class,'contact']);


Route::get('/admin/contact-us', [ContactUsController::class,'index']);
Route::post('/admin/contact-us', [ContactUsController::class,'update']);

Route::get('/about', [HomeController::class,'about']);

Route::get('/checkout',[HomeController::class,'checkout']);

// Route::get('/password-forget',[HomeController::class,'password-forget']);

Route::get('/order/list', [OrderController::class,'index'])->name('order.list');

Route::get('/orders-ajax', [OrderController::class,'orders_ajax']);



Route::get('/order_view/{id}', [OrderController::class,'view']);

Route::post('/update-order', [OrderController::class,'update'])->name('update_order');

Route::post('/order',[OrderController::class,'insert']);


Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/order-mail', [HomeController::class,'ordermail']);

Route::post('/search_product', [HomeController::class,'search_product']);

Route::post('/review', [reviewsController::class,'store']);

Route::get('review/list', [reviewsController::class,'index'])->name('review.list');

Route::get('review/filter', [reviewsController::class,'filter']);

Route::get('review/view/{id}', [reviewsController::class,'view']);

Route::get('review/delete', [reviewsController::class,'delete']);

Route::post('update-review', [reviewsController::class,'update']);


// Route::get('reset-password',function(){
//     return view('web.auth.reset-password');
// });
