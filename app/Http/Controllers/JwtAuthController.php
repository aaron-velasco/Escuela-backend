<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\User;


class JwtAuthController extends Controller
{

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Obtener un JWT a través de las credenciales obtenidas.
    */
    public function login(Request $request){
    	$req = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        if ($req->fails()) {
            return response()->json($req->errors(), 422);
        }

        if (! $token = auth()->attempt($req->validated())) {
            return response()->json(['Auth error' => 'Unauthorized'], 401);
        }

        return $this->generateToken($token);
    }

    /**
     * Registro de usuario
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request) {
        $req = Validator::make($request->all(), [
            'name' => 'required|string|between:2,100',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|confirmed|min:6',
        ]);

        if($req->fails()){
            return response()->json($req->errors()->toJson(), 400);
        }

        $user = User::create(array_merge(
                    $req->validated(),
                    ['password' => bcrypt($request->password)]
                ));

        return response()->json([
            'message' => 'User signed up',
            'user' => $user
        ], 201);
    }


    /**
     * Cierre de sesión
    */
    public function signout() {
        auth()->logout();
        return response()->json(['message' => 'User loged out']);
    }

    /**
     * Refresco de token
    */
    public function refresh() {
        return $this->generateToken(auth()->refresh());
    }

    /**
     * Obtención de usuario
    */
    public function user() {
        return response()->json(auth()->user());
    }

    /**
     * Generación de token
    */
    protected function generateToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => env('JWT_TTL', 3600),
            'user' => auth()->user()
        ]);
    }
}