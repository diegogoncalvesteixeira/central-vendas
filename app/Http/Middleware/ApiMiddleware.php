<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Traits\JWTTrait;
use Illuminate\Http\Request;

class ApiMiddleware
{
    use JWTTrait;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if($request->routeIs('login') || $request->routeIs('register')){
            return $next($request);
        }
        
        if(!$request->header('Authorization')){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $token = $request->header('Authorization');
        if($token==null){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $user_infos = $this->decode_token($token);
        if(isset($user_infos['error'])){
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        
        $request->merge(['user_email' => $user_infos['user_email'], 'user_id' => $user_infos['user_id']]);
    
        return $next($request);
    }
    
}
