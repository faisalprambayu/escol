<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Event;
use App\Models\Faq;
use App\Models\Modal;
use App\Models\Package;
use App\Models\RClass;
use App\Models\Registration;
use App\Models\RIcon;
use App\Models\RMajor;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\Video;
use App\Models\Why;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingViewController extends Controller
{
    public function index(Request $request)
    {
        // $event = Request::create('api/event', 'GET');

        $responseRegistration = Registration::orderBy('updated_at', 'DESC')->get();

        $responsePackage = app('App\Http\Controllers\PackageController')->index($request);

        $responseMajor = RMajor::orderBy('updated_at', 'DESC')->get();

        $responseClass = RClass::orderBy('updated_at', 'DESC')->get();

        $responseEvent = Event::orderBy('updated_at', 'DESC')->get();

        $responseTeam = Team::orderBy('updated_at', 'DESC')->get();

        $responseTestimonial = Testimonial::orderBy('updated_at', 'DESC')->get();

        $responseFaq = Faq::orderBy('updated_at', 'DESC')->get();

        $response_banner = app('App\Http\Controllers\BannerController')->index($request);

        $response_why = app('App\Http\Controllers\WhyController')->index($request);

        $response_icon = RIcon::orderBy('updated_at', 'DESC')->get();

        $response_video = Video::orderBy('updated_at', 'DESC')->get();

        $response_modal = Modal::orderBy('updated_at', 'DESC')->get();

        $data = [
            'registration' => $responseRegistration,
            'package' => $responsePackage,
            'major' => $responseMajor,
            'class' => $responseClass,
            'event' => $responseEvent,
            'package' => $responsePackage,
            'team' => $responseTeam,
            'testimonial' => $responseTestimonial,
            'faq' => $responseFaq,
            'banner' => $response_banner,
            'why' => $response_why,
            'icon' => $response_icon,
            'video' => $response_video,
            'modal' => $response_modal,
        ];
        // dd($data);
        return view('lan_index', compact('data'));
    }
}
