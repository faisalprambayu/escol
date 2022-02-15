<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class LandingViewController extends Controller
{
    public function index()
    {
        $registration = Request::create('api/registration', 'GET');
        $responseRegistration = Route::dispatch($registration);

        $package = Request::create('api/r_package', 'GET');
        $responsePackage = Route::dispatch($package);

        $major = Request::create('api/r_major', 'GET');
        $responseMajor = Route::dispatch($major);

        $class = Request::create('api/r_class', 'GET');
        $responseClass = Route::dispatch($class);

        $event = Request::create('api/event', 'GET');
        $responseEvent = Route::dispatch($event);

        $package = Request::create('api/package', 'GET');
        $responsePackage = Route::dispatch($package);

        $team = Request::create('api/team', 'GET');
        $responseTeam = Route::dispatch($team);

        $testimonial = Request::create('api/testimonial', 'GET');
        $responseTestimonial = Route::dispatch($testimonial);

        $faq = Request::create('api/faq', 'GET');
        $responseFaq = Route::dispatch($faq);

        // $data = [
        //     'registration' => json_decode($responseRegistration->content(), true)['data'],
        // ];
        $data = [
            'registration' => json_decode($responseRegistration->content(), true)['data'],
            'package' => json_decode($responsePackage->content(), true)['data'],
            'major' => json_decode($responseMajor->content(), true)['data'],
            'class' => json_decode($responseClass->content(), true)['data'],
            'event' => json_decode($responseEvent->content(), true)['data'],
            'package' => json_decode($responsePackage->content(), true)['data'],
            'team' => json_decode($responseTeam->content(), true)['data'],
            'testimonial' => json_decode($responseTestimonial->content(), true)['data'],
            'faq' => json_decode($responseFaq->content(), true)['data'],
        ];
        // dd($data);
        return view('lan_index', compact('data'));
    }
}
