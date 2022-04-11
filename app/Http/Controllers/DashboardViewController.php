<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Program;
use App\Models\Registration;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class DashboardViewController extends Controller
{
    public function index()
    {
        $registrations = Registration::orderBy('updated_at', 'DESC')->count();
        $programs = Program::orderBy('updated_at', 'DESC')->count();
        $registrations_list = Registration::orderBy('updated_at', 'DESC')->get();
        $packages_list = Package::orderBy('updated_at', 'DESC')->get();
        // dd($packages_list);
        $packages_count = [];
        foreach ($packages_list as  $value) {
            // $result = [];
            $result = array(
                // "value" => "value",
                // "name" => "name",
            );
            $count_value =0;
            // $result->push($value['Name']);
            // dd($packages_list);
            foreach ($registrations_list as $regis_value) {
                if ($regis_value['Package'] == $value['id']) {
                    $count_value += 1;
                }
            }
            // $count_value = ["value"=>$count_value];
            $result['value'] = $count_value;
            $result['name'] = $value['Name'];
            // $result->push($count_value);
            // array_push($result, $count_value);
            // array_push($result, $value['Name']);

            $result = (object) $result;
            array_push($packages_count,$result);
        }
        // dd($object);
        // dd($registrations);
        // $request = Request::create('api/text', 'GET');
        // $response = Route::dispatch($request);
        // $data = json_decode($response->content(), true)['data'];
        // // dd($data);
        $data = [
            'registrations_count' => $registrations,
            'programs_count' => $programs,
            'registrations_list' => $registrations_list,
            'packages_list' => $packages_list,
            'packages_count' => $packages_count,
        ];
        // dd($data);
        return view('ad_dashboard', compact('data'));
    }
}
