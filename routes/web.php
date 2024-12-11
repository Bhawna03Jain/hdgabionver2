<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BOQConfigController;
use App\Http\Controllers\CategoryController;
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

        // BOQ Fence Configuration

        // Route::get('boq_fences_config', [BOQConfigController::class, 'BOQFencesConfig'])->name('admin_boq_fences_config.index');
        Route::get('mastersheet/fence/{type?}', [BOQConfigController::class, 'BOQFencesConfig']);
        Route::post('mastersheet/fence/{type?}/update', [BOQConfigController::class, 'storeOrUpdateFenceConfig'])->name('admin_boq_fences_config.update');
        Route::post('mastersheet/fence/{type?}/delete/{id}', [BOQConfigController::class, 'deleteFenceConfig'])->name('admin_boq_fences_config.delete');
        Route::get('mastersheet/fence/{type?}/get-last-id', [BOQConfigController::class, 'getLastId']);

    });
});

// ===============End Admin======================
// =================Front==================


Route::get('/', function () {
    return view('front.comingsoon');
})->name('');

Route::get('/home', function () {
    return view('front.index');
})->name('home');
