
$routes = collect(Route::getRoutes())->map(function ($route) {
    return $route->getActionName();
})->toArray();

$controllers = [];
foreach (glob(app_path('Http/Controllers/*.php')) as $file) {
    $controllers[] = 'App\\Http\\Controllers\\' . basename($file, '.php');
}
foreach (glob(app_path('Http/Controllers/*/*.php')) as $file) {
    $controllers[] = 'App\\Http\\Controllers\\' . basename(dirname($file)) . '\\' . basename($file, '.php');
}

$unusedControllers = [];
foreach ($controllers as $controller) {
    if (str_contains($controller, 'Controller') === false) continue;
    
    $found = false;
    foreach ($routes as $route) {
        if (str_contains($route, $controller)) {
            $found = true;
            break;
        }
    }
    if (!$found && !str_contains($controller, 'Controller')) {
        // Skip base Controller
    } else if (!$found && str_contains($controller, 'Controller') && basename($controller) !== 'Controller') {
        $unusedControllers[] = $controller;
    }
}

echo "Unused Controllers:\n";
print_r($unusedControllers);

// Also let's check Livewire components mapping
$livewireComponents = [];
foreach (glob(app_path('Livewire/*.php')) as $file) {
    $livewireComponents[] = 'App\\Livewire\\' . basename($file, '.php');
}
foreach (glob(app_path('Livewire/*/*.php')) as $file) {
    $livewireComponents[] = 'App\\Livewire\\' . basename(dirname($file)) . '\\' . basename($file, '.php');
}
// Find if livewire components are registered in routes or used in blade
echo "Livewire components:\n";
echo "Note: Determining unused livewire components requires scanning all blade files.\n";

