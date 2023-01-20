<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use PHPOpenSourceSaver\JWTAuth\JWTAuth;
use App\Http\Traits\JWTTrait;
use App\Models\User;
use Auth;

class Authenticate extends Middleware
{
    use JWTTrait;
    
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // if(!$request->header('Authorization')){
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        //
        // $token = $request->header('Authorization');
        // if($token==null){
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        //
        // $user_infos = $this->decode_token($token);
        // if(isset($user_infos['error'])){
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        //
        // auth()->loginUsingId($user_infos['user_id']);
        //
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
    }
}
