protected $middlewareAliases = [
    'auth' => \App\Http\Middleware\Authenticate::class,
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
    'role' => \App\Http\Middleware\RoleMiddleware::class,
    'redirect.role' => \App\Http\Middleware\RedirectByRole::class,
    'redirect.role' => \App\Http\Middleware\RedirectRole::class,

];
