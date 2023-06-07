<?php

namespace App\Http\Middleware;

use App\Service\VisitorCounterService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VisitorCounter
{
    protected $service;

    public function __construct(VisitorCounterService $service)
    {
        $this->service = $service;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->service->incrementCounter($request->ip());
        return $next($request);
    }
}
