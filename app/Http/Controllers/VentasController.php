<?php

namespace App\Http\Controllers;

use App\Services\Tp1ApiService;
use Illuminate\Http\Request; 

class VentasController extends Controller
{
    protected $api;

    public function __construct(Tp1ApiService $api)
    {
        $this->api = $api;
    }


public function index(Tp1ApiService $api)
{
   $username = config('services.tp1.username');
    $password = config('services.tp1.password');

    $token = $api->login($username, $password);

    if (!$token) {
        return back()->with("error", "Error al obtener token");
    }

    $ventas = $api->obtenerVentas($token);

    if (!$ventas) {
        return back()->with("error", "Error al obtener ventas");
    }

    return view("clients.ventas", compact("ventas"));
}

}