<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            Log::notice($request->ip() . ' ' . "tried to log in");
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        $user = Auth::user()->name;
        Log::info($user . ' ' . "logged out");

        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

    public function signup (Request $request) {

       User::create($request->all());
       return ['message' => 'You can login now'];
    }

    public function profile () {
        return view('profile');
    }

    public function profileUpdate (Request $request) {
        $user = Auth::user()->name;
        $user->update($request->all());
        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function adminIndex (Request $request) {
        $roles = Role::all();
        $users = User::paginate(5);
        $users->appends(['token' => $request->token]);
        return view('adminPages.manageUsers', ['users' => $users, 'roles' => $roles]);
    }
    //Ne moze da prihvati request(role_id) iz Materialize select-a
//    public function adminUpdate (Request $request, User $user) {
//        Log::info($user->name . " " . "User updated");
//
//        $user->update($request->all());
//        return redirect()->back();
//    }

    public function adminDelete (User $user) {
        Log::info($user->name . " " . "User deleted");

        $user->delete();
        return redirect()->back();
    }

}
