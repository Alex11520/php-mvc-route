<?php

// Define the namespace for the Router class
namespace App\Route;

// Declare the Router class
use Exception;

class Router
{
    // Private property to hold the registered routes
    private array $routes;

    // Method to register a new route with a specific HTTP method, route, and action
    public function register(string $method, string $route, callable | array $action): self{
        $this->routes[$method][$route] = $action;
        return $this;
    }

    // Shortcut method to register a GET route
    public function get(string $route, callable | array $action): self{
        return $this->register('get', $route, $action);
    }

    // Shortcut method to register a POST route
    public function post(string $route, callable | array $action): self{
        return $this->register('post', $route, $action);
    }

    // Shortcut method to register a PUT route
    public function put(string $route, callable | array $action): self{
        return $this->register('put', $route, $action);
    }

    // Shortcut method to register a DELETE route
    public function delete(string $route, callable | array $action): self{
        return $this->register('delete', $route, $action);
    }

    // Method to resolve the incoming request and execute the appropriate action

    /**
     * @throws Exception
     */
    public function resolve(string $reqUri, string $requestMethod)
    {
        // Extract the base route from the request URI (ignoring query string)
        $route = explode('?', $reqUri)[0];

        // Look for an action corresponding to the route and request method
        $action = $this->routes[$requestMethod][$route] ?? null;

        $exception = new Exception("Internal server error", 500);
        // If no action is found, throw an "Internal server error"
        if (!$action) {
            throw $exception;
        }

        // If the action is callable, execute it
        if (is_callable($action)) {
            return call_user_func($action);
        }

        // If action is not an array, default to the 'error' action
        if (!is_array($action)) {
            throw $exception;
        }

        // Extract the class and method from the action array
        [$class, $method] = $action;

        // Validate that the class and method exist before invoking them
        if (!class_exists($class) || !method_exists($class, $method)) {
            throw $exception;
        }

        // Create an instance of the class and invoke the method
        $class = new $class;
        return call_user_func_array([$class, $method], []);
    }
}
