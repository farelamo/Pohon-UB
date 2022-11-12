<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Services\Auth\AuthService;

class AuthController extends Controller
{
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }
    
    public function login(AuthRequest $request)
    {
        return $this->service->login($request);
    }

    public function logout()
    {
        return $this->service->logout();
    }
}
