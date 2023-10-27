<?php

// Autoloader that automatically loads PHP class files based on their namespace.
use App\Controller\BikeController;
use App\Controller\ErrorController;
use App\Controller\HomeController;
use App\Route\Router;

function myAutoloader($class)
{
    // Replace backslashes (\) in the namespace with forward slashes (/) to form the class file path.
    $classPath = str_replace('\\', '/', $class);

    // Construct the full file path by appending the namespace-based path to the base directory of the project.
    $filePath = __DIR__ . '/../' . $classPath . '.php';

    // If the file exists at the specified path, require it to load the class.
    if (file_exists($filePath)) {
        require $filePath;
    }
}

// Register the 'myAutoloader' function as an autoloader, so it will be called when a class is not found.
spl_autoload_register('myAutoloader');
?>


<?php

$router = new Router();
$router->get('/', [HomeController::class, 'get'])
    ->get('/error', [ErrorController::class, 'get'])
    ->get('/crud/bike/create', [BikeController::class, 'create'])
    ->get('/crud/bike/read', [BikeController::class, 'read'])
    ->get('/crud/bike/update', [BikeController::class, 'update'])
    ->get('/crud/bike/remove', [BikeController::class, 'remove'])
    ->post('/crud/bike/post', [BikeController::class, 'post'])
    ->get('/crud/bike/get', [BikeController::class, 'get'])
    ->put('/crud/bike/put', [BikeController::class, 'put'])
    ->delete('/crud/bike/delete', [BikeController::class, 'delete']);

echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

?>


