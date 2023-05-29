<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Seller\SellerController;
use App\Http\Controllers\Seller\SProductController;
use App\Http\Controllers\Front\FIndexController;
use App\Http\Controllers\Front\FProductController;
use App\Http\Controllers\Front\FBidController;
use App\Http\Controllers\Front\FReviewController;
use App\Http\Controllers\Front\FWishlistController;
use App\Http\Controllers\Front\FCartController;
use App\Http\Controllers\Front\FPageController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();
Route::get('/', [FIndexController::class, 'index'])->name('index');
Route::prefix('/')->as('front.')->group(function (){
    Route::get('/{slug}',  [FPageController::class, 'index'])->name('page.index');
    Route::prefix('/')->as('product.')->group(function () {
        Route::get('/butun-urunler/', [FProductController::class, 'index'])->name('index');
        Route::get('/detay/{slug}', [FProductController::class, 'detail'])->name('detail');
        Route::post('/bidding', [FBidController::class, 'store'])->name('bidding.store');
        Route::post('/review/{product}', [FReviewController::class, 'store'])->name('review.store');

        Route::prefix('begenilenler')->as('wishlist.')->middleware('auth')->group(function (){
            Route::get('/', [FWishlistController::class, 'index'])->name('index');
            Route::post('/store', [FWishlistController::class, 'store'])->name('store');
            Route::post('/destroy/', [FWishlistController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('sepetim')->as('cart')->middleware('auth')->group(function (){
            Route::get('/', [FCartController::class, 'index'])->name('index');
            Route::post('/store', [FCartController::class, 'store'])->name('store');
            Route::post('/destroy/', [FCartController::class, 'destroy'])->name('destroy');
        });
    });
});


Route::prefix('admin')->as('admin.')->middleware(['auth', 'role:Admin'])->group(function (){
    Route::get('index', [AdminController::class, 'index'])->name('index');

    Route::prefix('product')->as('product.')->group(function (){
        Route::get('index', [ProductController::class, 'index'])->name('index');
        Route::get('show/{product}', [ProductController::class, 'show'])->name('show');
        Route::post('reject/{product}', [ProductController::class, 'reject'])->name('reject');
        Route::post('approve/{product}', [ProductController::class, 'approve'])->name('approve');
    });

    Route::prefix('roles')->as('roles.')->group(function (){
        Route::get('index', [RoleController::class, 'index'])->name('index');
        Route::post('store', [RoleController::class, 'store'])->name('store');
        Route::post('destroy', [RoleController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('categories')->as('categories.')->group(function (){
        Route::get('index', [CategoryController::class, 'index'])->name('index');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::get('edit/{category}', [CategoryController::class, 'edit'])->name('edit');
        Route::post('update/{category}', [CategoryController::class, 'update'])->name('update');
        Route::get('destroy/{category}', [CategoryController::class, 'destroy'])->name('destroy');

        Route::prefix('sub')->as('sub.')->group(function (){
            Route::get('index', [SubCategoryController::class, 'index'])->name('index');
            Route::get('create', [SubCategoryController::class, 'create'])->name('create');
            Route::post('store', [SubCategoryController::class, 'store'])->name('store');
             Route::get('edit/{subCategory}', [SubCategoryController::class, 'edit'])->name('edit');
             Route::post('update/{subCategory}', [SubCategoryController::class, 'update'])->name('update');
              Route::get('destroy/{subCategory}', [SubCategoryController::class, 'destroy'])->name('destroy');
        });
    });

    Route::prefix('brands')->as('brands.')->group(function (){
        Route::get('index', [BrandController::class, 'index'])->name('index');
        Route::get('create', [BrandController::class, 'create'])->name('create');
        Route::post('store', [BrandController::class, 'store'])->name('store');
        Route::get('edit/{brand}', [BrandController::class, 'edit'])->name('edit');
        Route::post('update/{brand}', [BrandController::class, 'update'])->name('update');
        Route::get('destroy/{brand}', [BrandController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('pages')->as('page.')->group(function (){
        Route::get('/', [PageController::class, 'index'])->name('index');
        Route::get('/create', [PageController::class, 'create'])->name('create');
        Route::post('/store', [PageController::class, 'store'])->name('store');
        Route::get('/edit/{page}', [PageController::class, 'edit'])->name('edit');
        Route::post('/update/{page}', [PageController::class, 'update'])->name('update');
        Route::post('/destroy', [PageController::class, 'destroy'])->name('destroy');
    });
});

Route::prefix('seller')->as('seller.')->middleware(['auth', 'role:Seller'])->group(function (){
   Route::get('/', [SellerController::class, 'index'])->name('index');

   Route::prefix('product')->as('product.')->group(function (){
      Route::get('', [SProductController::class, 'index'])->name('index');
      Route::get('create', [SProductController::class, 'create'])->name('create');
      Route::post('store/', [SProductController::class, 'store'])->name('store');
      Route::get('edit/{product}/{status?}', [SProductController::class, 'edit'])->name('edit');
      Route::post('update/{product}/{status?}', [SProductController::class, 'update'])->name('update');
      Route::post('get-sub-categories/', [SProductController::class, 'getSubCategories'])->name('getSubCat');
      Route::post('store-media/', [SProductController::class, 'storeMedia'])->name('storeMedia');
      Route::get('rejected-product', [SProductController::class, 'rejectedProduct'])->name('rejected');

   });
});
