<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationStoreRequest;
use App\Http\Requests\RegistrationUpdateRequest;
use App\Http\Resources\RegistrationCollection;
use App\Http\Resources\RegistrationResource;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\RegistrationCollection
     */
    public function index(Request $request)
    {
        $registrations = Registration::all();

        return new RegistrationCollection($registrations);
    }

    /**
     * @param \App\Http\Requests\RegistrationStoreRequest $request
     * @return \App\Http\Resources\RegistrationResource
     */
    public function store(RegistrationStoreRequest $request)
    {
        $registration = Registration::create($request->validated());

        return redirect('registration');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Registration $registration
     * @return \App\Http\Resources\RegistrationResource
     */
    public function show(Request $request, Registration $registration)
    {
        return new RegistrationResource($registration);
    }

    /**
     * @param \App\Http\Requests\RegistrationUpdateRequest $request
     * @param \App\Models\Registration $registration
     * @return \App\Http\Resources\RegistrationResource
     */
    public function update(RegistrationUpdateRequest $request, Registration $registration)
    {
        $registration->update($request->validated());

        return new RegistrationResource($registration);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Registration $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Registration $registration)
    {
        $registration->delete();

        return response()->noContent();
    }
}
