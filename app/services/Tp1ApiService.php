<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Tp1ApiService
{
    public function login()
    {
        $url = env('TP1_LOGIN_URL');
        $user = env('TP1_USERNAME');
        $pass = env('TP1_PASSWORD');

        // Tu TP1 recibe POST con username/password normal (not JSON)
        $response = Http::asForm()->post($url, [
            'username' => $user,
            'password' => $pass
        ]);

        if ($response->failed()) {
            return null;
        }

        return $response->json()['token'] ?? null;
    }

    public function getVentas($token)
    {
        $url = env('TP1_VENTAS_URL');

        $response = Http::withHeaders([
            'Authorization' => "Bearer $token"
        ])->get($url);

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}