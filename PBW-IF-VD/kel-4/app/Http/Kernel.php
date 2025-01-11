protected $middlewareGroups = [
    'api' => [
        \Fruitcake\Cors\HandleCors::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
