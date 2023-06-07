<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Service\AuthService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    protected $service;

    /**
     * $service AuthService::class
     */
    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Auth/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LoginRequest $request)
    {
        $response = $this->service->login($request);

        if($response) {
            return to_route('web.admins.dashboard');
        }

        return back()->withErrors([
            'Account' => 'The provided credentials do not match our records.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
