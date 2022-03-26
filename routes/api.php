<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RClassController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RIconController;
use App\Http\Controllers\RMajorController;
use App\Http\Controllers\RPackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\WhyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::resource('/registration', RegistrationController::class)->except(['create', 'edit']);

Route::apiResource('event', EventController::class);

Route::apiResource('package', PackageController::class);

Route::apiResource('registration', RegistrationController::class);

Route::apiResource('service', ServiceController::class);

Route::apiResource('team', TeamController::class);

Route::apiResource('r_package', RPackageController::class);

Route::apiResource('r_major', RMajorController::class);

Route::apiResource('r_class', RClassController::class);

Route::apiResource('video', VideoController::class);

Route::apiResource('faq', FaqController::class);

Route::apiResource('footer', FooterController::class);

Route::apiResource('testimonial', TestimonialController::class);

Route::apiResource('program', ProgramController::class);

Route::apiResource('career', CareerController::class);

Route::apiResource('friend', FriendController::class);

Route::apiResource('article', ArticleController::class);

Route::apiResource('banner', BannerController::class);

Route::apiResource('r_icon', RIconController::class);

Route::apiResource('why', WhyController::class);

Route::apiResource('text', TextController::class);

