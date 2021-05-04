<?php

use App\Http\Controllers\AllCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ComingSoonController;
use App\Http\Controllers\NewLetterController;
use App\Http\Controllers\SiteInfoController;
use App\Http\Controllers\FrontEndController;

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


Route::get('/home', [FrontEndController::class, 'home'])->name('front-home');
Route::get('/', function(){
  return redirect('/home');
});
Route::get('/logout', [FrontEndController::class, function(){
    Auth::logout();
    return redirect('/login');
}])->name('logout');
// Route::get('/', [ComingSoonController::class, 'index'])->name('coming-soon');
Route::get('/all-products', [AllCategoryController::class, 'index'])->name('all_products');
Route::get('category-all', [FrontEndController::class, 'CateAll'])->name('all_categories');
Route::get('/search-item', [FrontEndController::class, 'search'])->name('search_item');
Route::get('/product-view-{product:slug}', [FrontEndController::class, 'proView'])->name('view');
Route::get('/category-wise-product/{category_id}', [FrontEndController::class, 'catePro'])->name('cate_product');
Route::post('/category-wise-product/sorted/', [FrontEndController::class, 'rangeSelect'])->name('rangeSelect');
Route::get('/content-wise-000987{content_id}66-product', [FrontEndController::class, 'contentPro'])->name('content_product');
Route::get('/banner-0001098{banner_id}67-product', [FrontEndController::class, 'bannerPro'])->name('banner_pro');
Route::get('/contact-us', [FrontEndController::class, 'contact'])->name('contact_us');
Route::get('/about-us', [FrontEndController::class, 'about'])->name('about_us');
Route::post('site-info-store', [SiteInfoController::class, 'cus_sms_store'])->name('customer_message');

/*========================  front side end ========================*/
Route::group(['middleware' => 'auth'], function () {

    Route::get('/dashboard', function () {
      if (Auth::user()->role == "admin") {
        return view('BackEnd.Home.admin_home');
      }else {
        return redirect('/home');
      }
    })->name('admin_dashboard');

    Route::prefix('section')->group(function () {
        Route::resource('section', SectionController::class);
//        Route::get('/list',[SectionController::class, 'index'])->name('section.index');
        Route::get('/active/{id}', [SectionController::class, 'active'] )->name('section_active');
        Route::get('/inactive/{id}', [SectionController::class, 'inactive'])->name('section_inactive');
    });

    Route::prefix('category')->group(function () {
        Route::get('/list',[CategoryController::class, 'index'])->name("category.index");
        Route::get('/create',[CategoryController::class, 'create'])->name("category.create");
        Route::post('/store',[CategoryController::class, 'store'])->name("category.store");
        Route::post('/append-categories-level', [CategoryController::class, 'categoryLevel']);
        Route::get('/edit-{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update-{id}', [CategoryController::class, 'update'])->name('category-update');
        Route::get('/active-{id}', [CategoryController::class, 'active'])->name('category.active');
        Route::get('/inactive-{id}', [CategoryController::class, 'inactive'])->name('category.inactive');
        Route::post('/delete-{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });

    Route::prefix('country')->group(function () {
        Route::resource('country', CountryController::class);
        Route::get('/active/{id}', [CountryController::class, 'active'] )->name('country_active');
        Route::get('/inactive/{id}', [CountryController::class, 'inactive'])->name('country_inactive');
    });

    Route::prefix('product')->group(function() {
        Route::resource('product',ProductController::class);
        Route::get('/active/{id}', [ProductController::class, 'active'] )->name('product_active');
        Route::get('/inactive/{id}', [ProductController::class, 'inactive'])->name('product_inactive');
    });

    Route::prefix('slider')->group(function (){
        Route::resource('/slider',SliderController::class);
        Route::get('/hide/{id}', [SliderController::class, 'hide'])->name('slider_hide');
        Route::get('/public/{id}', [SliderController::class, 'public'])->name('slider_public');
    });

    Route::prefix('partner')->group(function(){
        Route::resource('/partner',PartnerController::class);
        Route::get('/hide/{id}', [PartnerController::class, 'hide'])->name('partner_hide');
        Route::get('/public/{id}', [PartnerController::class, 'public'])->name('partner_public');
    });
     Route::prefix('content')->group(function(){
        Route::resource('/content',ContentController::class);
        Route::get('/hide/{id}', [ContentController::class, 'hide'])->name('content_hide');
        Route::get('/public/{id}', [ContentController::class, 'public'])->name('content_public');
    });
    Route::prefix('banner')->group(function(){
        Route::resource('/banner',BannerController::class);
        Route::get('/hide/{id}', [BannerController::class, 'hide'])->name('banner_hide');
        Route::get('/public/{id}', [BannerController::class, 'public'])->name('banner_public');
    });
    Route::prefix('news')->group(function(){
        Route::get('/news/all', [NewLetterController::class, 'index'])->name('news.index');
        Route::post('/news-letter-store', [NewLetterController::class, 'store'])->name('news_store');
        Route::post('/news-letter-destroy-{id}', [NewLetterController::class, 'destroy'])->name('news.destroy');
    });

    Route::prefix('siteInfo')->group(function(){
        Route::resource('/siteInfo',SiteInfoController::class);
        Route::get('show-customer-message', [SiteInfoController::class, 'cus_sms'])->name('cus_sms_show');
        Route::post('customer-sms-delete-{id}', [SiteInfoController::class, 'cus_sms_del'])->name('cus_del_sms');
    });

    Route::prefix('site')->group(function() {
        Route::get('top-ads-list', [SiteInfoController::class, 'ads_show'])->name('top_ads_show');
        Route::get('top-ads-create', [SiteInfoController::class, 'ads_create'])->name('top_ads_create');
       Route::post('ads-store', [SiteInfoController::class, 'adsStore'])->name('ads_store');
        Route::post('top-ads-update-{id}', [SiteInfoController::class, 'adsUpdate'])->name('top_ads_update');
        Route::post('top-ads-del-{id}', [SiteInfoController::class, 'ads_del'])->name('top_ads_del');
    });

    Route::prefix('user')->group(function (){
        Route::get('all',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'index'])->name('users_list');
        Route::post('update-{user}',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'up'])->name('user_update');
        Route::post('destroy-{id}',[\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'del'])->name('user_destroy');
    });

});


require __DIR__.'/auth.php';
