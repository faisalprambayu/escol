<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\File;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\UserCollection
     */
    public function index(Request $request)
    {
        // dd($request->session());
        if ($request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d') == null) {
            abort(403);
        }
        $users = User::orderBy('updated_at', 'DESC')->get();
        // dd($users);
        return new UserCollection($users);
    }

    /**
     * @param \App\Http\Requests\EventStoreRequest $request
     * @return \App\Http\Resources\EventResource
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required','max:255'],
            'email' => ['required', 'min:3', 'max:255', 'email:dns' , 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $user = $request->all();

            $save = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);
            $save->save();

            return redirect('user');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function show(Request $request, User $user)
    {
        return new UserResource($user);
    }

    /**
     * @param \App\Http\Requests\EventUpdateRequest $request
     * @param \App\Models\Event $event
     * @return \App\Http\Resources\EventResource
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => ['required','max:255'],
            'email' => ['required', 'min:3', 'max:255', 'email:dns' , 'unique:users'],
            'password' => ['required', 'min:5', 'max:255'],
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $user = $request->all();
            // dd($package);


            User::where('id', $request->get('id'))->update([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
            ]);
            // $save->save();
            return redirect('user');
        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed' . $e->errorInfo
            ]);
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return redirect('user');
        // return response()->noContent();
    }
}
