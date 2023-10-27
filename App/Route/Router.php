<?php

namespace App\Route;

class Router
{
    private array $routes;

    public function register(string $method, string $route, callable | array $action): self{
        $this->routes[$method][$route] = $action;
        return $this;
    }

    public function get(string $route, callable | array $action): self{
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable | array $action): self{
        return $this->register('post', $route, $action);
    }

    public function put(string $route, callable | array $action): self{
        return $this->register('put', $route, $action);
    }

    public function delete(string $route, callable | array $action): self{
        return $this->register('delete', $route, $action);
    }

    public function resolve(string $reqUri, string $requestMethod)
    {
        $route = explode('?', $reqUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if (!$action) {
            $action = $this->routes['get']['/error'];
        }

        if (is_callable($action)) {
            return call_user_func($action);
        }

        if (!is_array($action)) {
            $action = $this->routes['get']['/error'];
        }

        [$class, $method] = $action;

        if (!class_exists($class) || !method_exists($class, $method)) {
            $action = $this->routes['get']['/error'];
            [$class, $method] = $action;
        }
        $class = new $class;
        return call_user_func_array([$class, $method], []);
    }
}