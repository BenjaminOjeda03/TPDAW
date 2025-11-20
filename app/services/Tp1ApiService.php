<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Tp1ApiService
{
    private $baseUrl = "http://localhost/miapp_jwt/";

    public function login($user, $pass)
    {
        $response = Http::asForm()->post($this->baseUrl . "api_login.php", [
            'username' => $user,
            'password' => $pass
        ]);

        if ($response->failed()) {
            return null;
        }

        $json = $response->json();

        return $json['token'] ?? null;
    }

    public function obtenerVentas($token)
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer $token"
        ])->get($this->baseUrl . "api_ventas.php");

        if ($response->failed()) {
            return null;
        }

        return $response->json();
    }
}