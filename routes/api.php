<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\FriendController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\RClassController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\RIconController;
use App\Http\Controllers\RMajorController;
use App\Http\Controllers\RPackageController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TextController;
use App\Http\Controllers\UserController;
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
// Route::group(['middleware' => ['auth']  ], function () {
//     Route::apiResource('event', EventController::class);
// });

Route::apiResource('event', EventController::class);
// Route::get('event', [EventController::class,'index'])->middleware('guest');

Route::apiResource('package', PackageController::class);
// Route::get('package', [PackageController::class,'index'])->middleware('guest');

Route::apiResource('registration', RegistrationController::class);
// Route::get('registration', [RegistrationController::class,'index'])->middleware('guest');

Route::apiResource('service', ServiceController::class);
// Route::get('service', [ServiceController::class,'index'])->middleware('guest');

Route::apiResource('team', TeamController::class);
// Route::get('team', [TeamController::class,'index'])->middleware('guest');

Route::apiResource('r_package', RPackageController::class);
// Route::get('r_package', [RPackageController::class,'index'])->middleware('guest');

Route::apiResource('r_major', RMajorController::class);
// Route::get('r_major', [RMajorController::class,'index'])->middleware('guest');

Route::apiResource('r_class', RClassController::class);
// Route::get('r_class', [RClassController::class,'index'])->middleware('guest');

Route::apiResource('video', VideoController::class);
// Route::get('video', [VideoController::class,'index'])->middleware('guest');

Route::apiResource('faq', FaqController::class);
// Route::get('faq', [FaqController::class,'index'])->middleware('guest');

Route::apiResource('footer', FooterController::class);
// Route::get('footer', [FooterController::class,'index'])->middleware('guest');

Route::apiResource('testimonial', TestimonialController::class);
// Route::get('testimonial', [TestimonialController::class,'index'])->middleware('guest');

Route::apiResource('program', ProgramController::class);
// Route::get('program', [ProgramController::class,'index'])->middleware('guest');

Route::apiResource('career', CareerController::class);
// Route::get('career', [CareerController::class,'index'])->middleware('guest');

Route::apiResource('friend', FriendController::class);
// Route::get('friend', [FriendController::class,'index'])->middleware('guest');

Route::apiResource('article', ArticleController::class);
// Route::get('article', [ArticleController::class,'index'])->middleware('guest');

Route::apiResource('banner', BannerController::class);
// Route::get('banner', [BannerController::class,'index'])->middleware('guest');

Route::apiResource('r_icon', RIconController::class);
// Route::get('r_icon', [RIconController::class,'index'])->middleware('guest');

Route::apiResource('why', WhyController::class);
// Route::get('why', [WhyController::class,'index'])->middleware('guest');

Route::apiResource('text', TextController::class);
// Route::get('text', [TextController::class,'index'])->middleware('guest');

Route::apiResource('scholarship', ScholarshipController::class);
// Route::get('scholarship', [ScholarshipController::class,'index'])->middleware('guest');

Route::apiResource('user', UserController::class);

Route::apiResource('modal', ModalController::class);

