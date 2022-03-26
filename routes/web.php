<?php

// namespace App\Routes;

use App\Http\Controllers\ArticleViewController;
use App\Http\Controllers\BannerViewController;
use App\Http\Controllers\CareerViewController;
use App\Http\Controllers\PackageViewController;
use App\Http\Controllers\EventViewController;
use App\Http\Controllers\ServiceViewController;
use App\Http\Controllers\TeamViewController;
use App\Http\Controllers\VideoViewController;
use App\Http\Controllers\RegistrationViewController;
use App\Http\Controllers\RClassViewController;
use App\Http\Controllers\RMajorViewController;
use App\Http\Controllers\RPackageViewController;
use App\Http\Controllers\FaqViewController;
use App\Http\Controllers\FooterViewController;
use App\Http\Controllers\FriendViewController;
use App\Http\Controllers\LandingArticleViewController;
use App\Http\Controllers\LandingCareerViewController;
use App\Http\Controllers\LandingEssclusiveViewController;
use App\Http\Controllers\LandingEsspecialViewController;
use App\Http\Controllers\LandingEsstreamViewController;
use App\Http\Controllers\LandingFaqViewController;
use App\Http\Controllers\LandingFriendViewController;
use App\Http\Controllers\LandingProgramViewController;
use App\Http\Controllers\LandingViewController;
use App\Http\Controllers\ProgramViewController;
use App\Http\Controllers\RIconViewController;
use App\Http\Controllers\TestimonialViewController;
use App\Http\Controllers\TextViewController;
use App\Http\Controllers\WhyViewController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('lan_index');
// });

// Route::get('/welcome', function () {
//     return view('welcome');
// });

// Route::get('/index', function () {
//     return view('lan_home');
// });

// Route::get('/program', function () {
//     return view('lan_program');
// });

Route::get('/fitur', function () {
    return view('lan_fitur');
});

// Route::get('/artikel', function () {
//     return view('lan_artikel');
// });

// Route::get('/karir', function () {
//     return view('lan_karir');
// });

// Route::get('/sahabat', function () {
//     return view('lan_sahabat');
// });

Route::get('/admin', function () {
    return view('ad_dashboard');
});

// Route::get('/essclusive/admin', function () {
//     return view('ad_dashboard');
// });
// Route::get('/esspecial/admin', function () {
//     return view('ad_dashboard');
// });
// Route::get('/esstream/admin', function () {
//     return view('ad_dashboard');
// });
// Route::get('/faq', function () {
//     return view('ad_faq');
// });

// Route::get('/footer', function () {
//     return view('ad_footer');
// });

// Route::get('/ref_package', function () {
//     return view('ad_ref_package');
// });

// Route::get('/ref_major', function () {
//     return view('ad_ref_major');
// });


Route::get('/footer', [FooterViewController::class, 'index']);
Route::get('/faq', [FaqViewController::class, 'index']);
Route::get('/ref_package', [RPackageViewController::class, 'index']);
Route::get('/ref_class', [RClassViewController::class, 'index']);
Route::get('/ref_major', [RMajorViewController::class, 'index']);
Route::get('/event', [EventViewController::class, 'index']);
Route::get('/package', [PackageViewController::class, 'index']);
Route::get('/service', [ServiceViewController::class, 'index']);
Route::get('/team', [TeamViewController::class, 'index']);
Route::get('/video', [VideoViewController::class, 'index']);
Route::get('/registration', [RegistrationViewController::class, 'index']);
Route::get('/testimonial', [TestimonialViewController::class, 'index']);
Route::get('/programs', [ProgramViewController::class, 'index']);
Route::get('/career', [CareerViewController::class, 'index']);
Route::get('/friend', [FriendViewController::class, 'index']);
Route::get('/article', [ArticleViewController::class, 'index']);
Route::get('/banner', [BannerViewController::class, 'index']);
Route::get('/ref_icon', [RIconViewController::class, 'index']);
Route::get('/why', [WhyViewController::class, 'index']);
Route::get('/text', [TextViewController::class, 'index']);
Route::get('/privacy', [TextViewController::class, 'index']);

Route::get('/essclusive/banner', [BannerViewController::class, 'index']);
Route::get('/esspecial/banner', [BannerViewController::class, 'index']);
Route::get('/esstream/banner', [BannerViewController::class, 'index']);
Route::get('/essclusive/why', [WhyViewController::class, 'index']);
Route::get('/esspecial/why', [WhyViewController::class, 'index']);
Route::get('/esstream/why', [WhyViewController::class, 'index']);
Route::get('/essclusive/package', [PackageViewController::class, 'index']);
Route::get('/esspecial/package', [PackageViewController::class, 'index']);
Route::get('/esstream/package', [PackageViewController::class, 'index']);
Route::get('/essclusive/service', [ServiceViewController::class, 'index']);
Route::get('/esspecial/service', [ServiceViewController::class, 'index']);
Route::get('/esstream/service', [ServiceViewController::class, 'index']);

Route::get('/', [LandingViewController::class, 'index']);
Route::get('/program', [LandingProgramViewController::class, 'index']);
Route::get('/artikel', [LandingArticleViewController::class, 'index']);
Route::get('/artikel/{id}', [LandingArticleViewController::class, 'detail']);
Route::get('/karir', [LandingCareerViewController::class, 'index']);
Route::get('/karir/{id}', [LandingCareerViewController::class, 'detail']);
Route::get('/sahabat', [LandingFriendViewController::class, 'index']);
Route::get('/sahabat/{id}', [LandingFriendViewController::class, 'detail']);
Route::get('/essclusive', [LandingEssclusiveViewController::class, 'index']);
Route::get('/esspecial', [LandingEsspecialViewController::class, 'index']);
Route::get('/esstream', [LandingEsstreamViewController::class, 'index']);
Route::get('/faqs', [LandingFaqViewController::class, 'index']);
Route::get('/syarat', [TextViewController::class, 'landing']);
Route::get('/privasi', [TextViewController::class, 'privasi']);

// Route::get('/registration', function () {
//     return view('ad_registration');
// });

// Route::get('/ref_class', function () {
//     return view('ad_ref_class');
// });

// Route::get('/event', function () {
//     return view('ad_event');
// });

// Route::get('/service', function () {
//     return view('ad_service');
// });

// Route::get('/team', function () {
//     return view('ad_team');
// });

// Route::get('/video', function () {
//     return view('ad_video');
// });
