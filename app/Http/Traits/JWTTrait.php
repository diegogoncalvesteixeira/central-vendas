<?php

namespace App\Http\Traits;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

trait JWTTrait
{
    public function generate_token($user_email,$user_id): string
    {
        $key = config('app.key');
        $payload = array(
            "expires_in" => time() + 3600,
            "iat" => time(),
            "user_email" => $user_email,
            "user_id" => $user_id,
        );
        return JWT::encode($payload, $key,'HS256');
    }
    
    public function decode_token($token): array
    {
        $key = config('app.key');
        $token = str_replace('Bearer ','',$token);
        try {
            return (array) JWT::decode($token, new Key($key, 'HS256'));
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}