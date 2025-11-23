<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;

class Tp1ApiService
{
    private $loginUrl;
    private $ventasUrl;

    public function __construct()
    {
        $this->loginUrl = config('services.tp1.login_url');
        $this->ventasUrl = config('services.tp1.ventas_url');
    }

    public function login($user, $pass)
    {
        try {
            $response = Http::asForm()->post($this->loginUrl, [
                'username' => $user,
                'password' => $pass
            ]);

            if ($response->failed()) {
                return null;
            }

            $json = $response->json();
            return $json['token'] ?? null;

        } catch (ConnectionException $e) {
            return "connection_error";
        }
    }

    public function obtenerVentas($token)
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => "Bearer $token"
            ])->get($this->ventasUrl);

            if ($response->failed()) {
                return null;
            }

            return $response->json();

        } catch (ConnectionException $e) {
            return "connection_error";
        }
    }
}
