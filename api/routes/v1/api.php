<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\GetSanctumTokenController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ReviewCommentsController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\AttributeValueController;
use App\Http\Controllers\AttributeNameController;
use App\Http\Controllers\UploadProfileImage;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\NewEmailController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/




//PUBLIC  //middleware GROUP - WEB for COOKIE AUTH
Route::prefix('/')
    ->middleware('web')
    ->group(function (){
        // 1) GET /sanctum/csrf-cookie
        Route::post('/login',[AuthController::class,'login'])->name('login')->middleware('guest');
        Route::delete('/logout',[AuthController::class,'logout'])->middleware('auth','verified')->name('logout');
        //before GET /sanctum/csrf-cookie
        Route::post('/register',[AuthController::class,'register'])->middleware('guest');
        Route::post('/get-sanctum-token',[GetSanctumTokenController::class,'getToken'])->middleware('auth','verified');
        // email verification
        Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['auth','signed', 'throttle:6,1'])
            ->name('verification.verify');
        Route::post('/email/verification-notification',[EmailVerificationNotificationController::class,'sendAccountVerificationLink'])
            ->middleware(['auth', 'throttle:6,1']);
        //forgot password
        Route::post('/forgot-password',[PasswordResetLinkController::class,'sendEmailPasswdResetLink'])
            ->middleware('guest');
        Route::post('/reset-password',[NewPasswordController::class,'resetPassword'])
            ->middleware('guest')
            ->name('password.reset');
        //public
        Route::get('/search',[SearchController::class,'search']);
        Route::apiResource('/',HomeController::class)->only('index');
        Route::apiResource('/category',CategoryController::class)->only('index','show');
        Route::apiResource('/product-category',ProductCategoryController::class)->only('index','show');
        Route::apiResource('/product',ProductController::class)->only('index','show');
        Route::apiResource('/review',ReviewController::class)->middleware('auth:sanctum'); // ??? /admin?
        Route::apiResource('/comment',ReviewCommentsController::class)->middleware('auth:sanctum');
    });

Route::prefix('/profile')
    ->middleware([
        'auth:sanctum',
        'ability:role:user',
        'verified'
    ])
    ->group(function () {
        Route::post('/',[ProfileController::class,'getUserInfo']);
        Route::post('/new-email',[NewEmailController::class,'sendNewEmail']);
        //Route::post('reset-email');
        Route::post('upload-image',[UploadProfileImage::class,'upload']);
        //Route::get('my-notifications');
        //Route::get('/my-orders',\App\Http\Controllers\ProductController::class);
    });

Route::prefix('/admin')
    ->middleware([
        'auth:sanctum',
        'ability:*, role:redactor',
        'verified'
    ])
    ->group(function () {
        Route::apiResource('/users',UserController::class);
        Route::apiResource('/category',CategoryController::class);
        Route::apiResource('/product-category',ProductCategoryController::class);
        Route::apiResource('/product',ProductController::class);
        Route::apiResource('/review',ReviewController::class);
        Route::apiResource('/comment',ReviewCommentsController::class);
        Route::apiResource('/description',DescriptionController::class);
        Route::apiResource('/attribute-value',AttributeValueController::class);
        Route::apiResource('/attribute-name',AttributeNameController::class);

        //Route::apiResource('/orders',function (){});
    });

