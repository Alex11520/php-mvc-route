<?php

// Import the necessary classes.
use App\Controller\BikeController;
use App\Controller\HomeController;
use App\Route\Router;

/**
 * Autoloader function to load classes dynamically based on their namespace.
 *
 * @param string $class The fully-qualified name of the class.
 */
function myAutoloader($class)
{
    // Replace backslashes (\) with forward slashes (/) to convert namespace to directory path.
    $classPath = str_replace('\\', '/', $class);

    // Build the full path to the class file.
    $filePath = __DIR__ . '/../' . $classPath . '.php';

    // If the file exists, require it.
    if (file_exists($filePath)) {
        require $filePath;
    }
}

// Register the autoloader function.
spl_autoload_register('myAutoloader');

?>

<?php

// Instantiate the router object.
$router = new Router();

// Define the routes and their associated controllers and methods.
$router->get('/', [HomeController::class, 'get'])
    ->get('/crud/bike/create', [BikeController::class, 'create'])
    ->get('/crud/bike/read', [BikeController::class, 'read'])
    ->get('/crud/bike/update', [BikeController::class, 'update'])
    ->get('/crud/bike/remove', [BikeController::class, 'remove'])
    ->post('/crud/bike/post', [BikeController::class, 'post'])
    ->get('/crud/bike/get', [BikeController::class, 'get'])
    ->put('/crud/bike/put', [BikeController::class, 'put'])
    ->delete('/crud/bike/delete', [BikeController::class, 'delete'])
    ->get('/crud/bike/display', [BikeController::class, 'display'])
    ->get('/View/BikePutView', function () {
        // Require the BikePutView view file directly.
        require_once(__DIR__ . '/../App/View/BikePutView.php');
    });

// Try to resolve the route based on the current URI and request method.
try {
    echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));
} catch (Exception $exception) {
    // Handle exceptions by sending an appropriate HTTP response code and displaying an error page.
    http_response_code($exception->getCode());
    header('Content-Type: text/html; charset=UTF-8');
    require_once (__DIR__ . "/../App/View/ErrorPage.php");
}

?>
