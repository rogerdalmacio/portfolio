<?php

namespace App\Http\Middleware;

use App\Models\TechStack;
use App\Service\TechStackService;
use App\Service\VisitorCounterService;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    protected $visitorCounterService;
    protected $techStackService;

    public function __construct(VisitorCounterService $visitorCounterService, TechStackService $techStackService)
    {
        $this->visitorCounterService = $visitorCounterService;
        $this->techStackService = $techStackService;
    }

    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'path' => config('app.url') . '/storage/',
            'socialAccounts' => [
                'github' => 'https://github.com/rogerdalmacio',
                'gitlab' => 'https://gitlab.com/rjdalmacio02',
                'linkedIn' => 'https://www.linkedin.com/in/rogerdalmacio/',
            ],
            'visitorCounter' => $this->visitorCounterService->visitorCount(),
        ]);
    }
}
