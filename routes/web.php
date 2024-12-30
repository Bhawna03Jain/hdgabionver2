<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BOQConfigController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


// ===============Admin======================
Route::prefix('/admin')->group(function () {

    Route::get('', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login']);
    // Admin Logout
    Route::get('logout', [AdminController::class, 'logout'])->name('adminLogout');



    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        // Admin Profile
        Route::get('account', [AdminController::class, 'account'])->name('adminAccount');
        //Admin Update Pic
        Route::match(['GET', 'POST'], 'update-pic', [AdminController::class, 'updatePic'])->name('adminUpdatePic');
        //Admin update Details
        Route::match(['get', 'post'], 'update-details', [AdminController::class, 'updateDetails']);

        //Admin update password

        Route::match(['GET', 'POST'], 'update-password', [AdminController::class, 'updatePassword'])->name('adminUpdatePassword');
        // Route::match(['GET', 'POST'], 'update-password', [AdminController::class, 'updatePassword']);

        //Admin check current password
        Route::post('check-current-pwd', [AdminController::class, 'checkCurrentPwd']);

        // *************************Category Controller*****************

        // Route::post('update-category-status', 'CategoryController@updatestatus');
        Route::resource('categories', CategoryController::class);
        Route::post('save-category', [CategoryController::class, 'saveCategory'])->name('saveCategory');
        Route::post('update-category', [CategoryController::class, 'updateCategory'])->name('updateCategory');
        Route::post('check-category-exists', [CategoryController::class, 'checkCategoryExists'])->name('checkCategoryExists');
        // LocaleController
        Route::get('locales', [LocaleController::class, 'index'])->name('adminLocales');
        Route::post('locales/store', [LocaleController::class, 'store'])->name('adminLocales.store');
        Route::get('locales/edit/{id}', [LocaleController::class, 'edit'])->name('adminLocales.edit');
        Route::post('locales/update', [LocaleController::class, 'update'])->name('adminLocales.update');
        // Routes for CurrencyController
        Route::get('currencies', [CurrencyController::class, 'index'])->name('currencies.index');
        // Route::get('currencies/create', [CurrencyController::class, 'create'])->name('currencies.create');
        Route::post('currencies/store', [CurrencyController::class, 'store'])->name('currencies.store');
        Route::get('currencies/edit/{id}', [CurrencyController::class, 'edit'])->name('currencies.edit');
        Route::post('currencies/update', [CurrencyController::class, 'update'])->name('currencies.update');
        // Route::delete('currencies/delete/{id}', [CurrencyController::class, 'destroy'])->name('currencies.destroy');

        // Routes for CountriesController
        Route::get('countries', [CountryController::class, 'index'])->name('countries.index');
        // Route::get('countries/create', [CountryController::class, 'create'])->name('countries.create');
        Route::post('countries/store', [CountryController::class, 'store'])->name('countries.store');
        Route::get('countries/edit/{id}', [CountryController::class, 'edit'])->name('countries.edit');
        Route::post('countries/update', [CountryController::class, 'update'])->name('countries.update');
        Route::delete('countries/delete/{id}', [CountryController::class, 'destroy'])->name('countries.destroy');

        // Inventory Fence Configuration

        Route::get('mastersheet/inventory/fence', [InventoryController::class, 'inventoryFencesConfig']);
        Route::post('mastersheet/inventory/fence/update', [InventoryController::class, 'storeOrUpdateFenceConfig'])->name('admin_mastersheet_fence_config.update');
        Route::post('mastersheet/inventory/fence/delete/{id}', [InventoryController::class, 'deleteFenceConfig'])->name('admin_mastersheet_fence_config.delete');
        Route::get('mastersheet/inventory/fence/get-last-id', [InventoryController::class, 'getLastId']);


        // BOQ Fence Configuration

        // Route::get('boq_fences_config', [BOQConfigController::class, 'BOQFencesConfig'])->name('admin_boq_fences_config.index');
        // Route::get('mastersheet/boq/fence/{type?}', [BOQConfigController::class, 'BOQFencesConfig']);
        // Route::post('mastersheet/boq/fence/update/{type?}', [BOQConfigController::class, 'storeOrUpdateFenceConfig'])->name('admin_mastersheet_fence_config.update');
        // Route::post('mastersheet/boq/fence/delete/{type?}/{id}', [BOQConfigController::class, 'deleteFenceConfig'])->name('admin_mastersheet_fence_config.delete');
        // Route::get('mastersheet/boq/fence/get-last-id/{type?}', [BOQConfigController::class, 'getLastId']);
        // Route::post('mastersheet/boq/fence/check-code/{type?}', [BOQConfigController::class, 'checkCodeExists']);

        // BOQ Basket Configuration

        // Route::get('boq_fences_config', [BOQConfigController::class, 'BOQFencesConfig'])->name('admin_boq_fences_config.index');
        // Route::get('mastersheet/boq/basket/{type?}', [BOQConfigController::class, 'BOQbasketsConfig']);
        // Route::post('mastersheet/boq/basket/update/{type?}', [BOQConfigController::class, 'storeOrUpdatebasketConfig'])->name('admin_mastersheet_basket_config.update');
        // Route::post('mastersheet/boq/basket/delete/{type?}/{id}', [BOQConfigController::class, 'deletebasketConfig'])->name('admin_mastersheet_basket_config.delete');
        // Route::get('mastersheet/boq/basket/get-last-id/{type?}', [BOQConfigController::class, 'getLastId']);
        // Route::post('mastersheet/boq/basket/check-code/{type?}', [BOQConfigController::class, 'checkCodeExists']);
        // Route::get('mastersheet/boq/{boqtype}/standard', [BOQConfigController::class, 'BOQConfig']);
        Route::get('mastersheet/boq/{boqtype}/{type?}', [BOQConfigController::class, 'BOQConfig']);
        Route::post('mastersheet/boq/{boqtype}/update/{type?}', [BOQConfigController::class, 'storeOrUpdateConfig'])->name('admin_mastersheet_config.update');
        Route::post('mastersheet/boq/{boqtype}/delete/{type?}/{id}', [BOQConfigController::class, 'deleteConfig'])->name('admin_mastersheet_config.delete');
        Route::get('mastersheet/boq/{boqtype}/get-last-id/{type?}', [BOQConfigController::class, 'getLastId']);
        Route::post('mastersheet/boq/{boqtype}/check-code/{type?}', [BOQConfigController::class, 'checkCodeExists']);


        //===============Products for Category==============
        Route::get('products/{catid}', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create/{catid}', [ProductController::class, 'create'])->name('products.create');

        Route::get('products/{productId}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('products/store', [ProductController::class, 'store'])->name('products.store');
        Route::post('products/{productId}/update', [ProductController::class, 'update'])->name('products.update');


        Route::post('/isProductByNameExist', [ProductController::class, 'isProductByNameExist'])->name('check.product.name');
        Route::post('/isProductByArticleExist', [ProductController::class, 'isProductByArticleExist'])->name('check.product.article');
        Route::post('/isProductByHsCodeExist', [ProductController::class, 'isProductByHsCodeExist'])->name('check.product.hscode');
        Route::post('products/getlastno/{column}', [ProductController::class, 'getLastNo'])->name('product.getlastno');

    });
});

// ===============End Admin======================
// =================Front==================


Route::get('/', function () {
    return view('front.comingsoon');
})->name('');
Route::get('/welcome', function () {
    return view('welcome');
})->name('');



// Route::get('/products', function () {
//     return view('front.products.product');

// })->name('');
Route::get('products/{type}', [ProductController::class, 'products'])->name('products.products');
Route::get('products/product-detail/{type}/{id}', [ProductController::class, 'productDetail'])->name('products.products');

Route::get('/home', function () {
    return view('front.index');
})->name('home');
Route::get('/gallery', function () {
    return view('front.gallery');
})->name('front.gallery');
Route::get('/about-us', function () {
    return view('front.about');
})->name('front.about');
Route::get('fence-detail', function () {
    return view('front.fences.detail');
})->name('fence-detail');
Route::get('/basket-detail', function () {
    return view('front.baskets.detail');
})->name('basket-detail');
Route::get('/baskets', function () {
    return view('front.baskets.basket');
})->name('baskets');
Route::get('/baskets2', function () {
    return view('front.baskets.basket2');
})->name('baskets');
// *************************Cart**********************
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// ***********************Extra********************
Route::get('/shop', function () {
    return view('front.shop');
})->name('shop');
Route::get('/checkout', function () {
    return view('front.checkout');
})->name('checkout');
Route::get('/product_tailwind', function () {
    return view('product_tailwind');
})->name('');
Route::get('/checkout-tailwind', function () {
    return view('checkout');
})->name('');
Route::get('/cart_tailwind', function () {
    return view('cart');
})->name('');
Route::get('/detail_tailwind', function () {
    return view('detail_tailwind');
})->name('');

// **************************cart**************************


// ************Doc***************
Route::get('terms-conditions', function () {
    return view('doc.terms-conditions');
})->name('terms-conditions');
Route::get('privacy-policy', function () {
    return view('doc.privacy-policy');
})->name('privacy-policy');
Route::post('product-filter-data/{type}', [ProductController::class, 'filterData'])->name('filter.products');
// ==========================End Guest======================


// ================Customer===============


Route::prefix('/customer')->group(function () {

    // Route::match(['get', 'post'], '/login', [CustomerController::class, 'login'])->name('customerLogin');
    Route::get('/login', [CustomerController::class, 'showLoginForm'])->name('customerLogin');
    Route::post('/login', [CustomerController::class, 'login']);


    Route::match(['get', 'post'], '/register', [CustomerController::class, 'register'])->name('customerRegister');
    // Confirm Account
    Route::match(['GET', 'POST'], '/confirm/{code}', [CustomerController::class, 'confirmAccount']);
    Route::match(['GET', 'POST'], '/forgot-password', [CustomerController::class, 'forgotPassword'])->name('customerForgotPassword');
    Route::match(['GET', 'POST'], '/reset-password/{code?}', [CustomerController::class, 'resetPassword'])->name('customerResetPassword');
    Route::match(['GET', 'POST'], '/update-password', [CustomerController::class, 'updatePassword'])->name('customerUpdatePassword');
    //USER-Auth
    Route::group(['middleware' => ['auth']], function () {

        Route::get('logout', [CustomerController::class, 'logout'])->name('customerLogout');
        Route::get('account', [CustomerController::class, 'account'])->name('customerAccount');
        Route::get('profile', [CustomerController::class, 'profile'])->name('customerProfile');
        Route::get('user-info', [CustomerController::class, 'getUserInfo'])->name('getUserInfo');
        // Route::get('orders', [CustomerController::class, 'orders'])->name('customerOrders');
        // Route::get('orders', [CustomerController::class, 'orders'])->name('customerOrders');
        //Customer Update Details
        Route::match(['GET', 'POST'], 'update-details', [CustomerController::class, 'updateDetails'])->name('customerUpdateDetails');
        //Customer Update Pic
        Route::match(['GET', 'POST'], 'update-pic', [CustomerController::class, 'updatePic'])->name('customerUpdatePic');
        // Routes for BOQController

        // Route::get('boq_baskets', [BOQController::class, 'BOQBaskets'])->name('boq_baskets.index');
        // Route::get('getBOQFence', [BOQController::class, 'getBOQFence'])->name('boq_fences.getBOQFence');
        // Route::post('getFenceBOQPriceByDrawing', [BOQConfigController::class, 'getFenceBOQPriceByDrawing'])->name('boq_fences.getFencesBOQByDrawing');
        // Route::post('getFencesBOQPrice', [BOQConfigController::class, 'getFencesBOQPrice'])->name('boq_fences.getFencesBOQPrice');
        // Route::post('getTry', [BOQConfigController::class, 'getTry'])->name('boq_fences.getFencesBOQ');

        // Route::post('request-quote', [QuoteController::class, 'reqQuote'])->name('customer.reqQuote');
        // Route::get('thank-you', [QuoteController::class, 'thankyou'])->name('customer.thankyou');
        Route::get('orders', [CustomerController::class, 'showQuotesWithOrders'])->name('customer.orders');
    });
    Route::middleware(['redirect.intended'])->group(function () {
        // Route::get('/customer/boq_fences', [YourController::class, 'index'])->name('customer_boq_fences.index');
        // Route::get('boq_fences', [BOQConfigController::class, 'CustomerBOQFences'])->name('customer_boq_fences.index');
        // Route::get('/drawing-fence', [DrawingController::class, 'drawFence'])->name('drawing-fence');
        // Other routes that need this middleware
    });
});

// ==================End Customer==================

