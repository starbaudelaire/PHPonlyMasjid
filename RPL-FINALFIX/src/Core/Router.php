<?php

namespace Core;

class Router {
    protected $routes = [];

    // Method add sekarang menerima jenis request (GET/POST)
    public function add($method, $uri, $controller) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => strtoupper($method),
        ];
    }

    // Shortcut buat nambahin rute GET
    public function get($uri, $controller) {
        $this->add('GET', $uri, $controller);
    }

    // Shortcut buat nambahin rute POST
    public function post($uri, $controller) {
        $this->add('POST', $uri, $controller);
    }

    public function dispatch($uri, $method) {
        foreach ($this->routes as $route) {
            // Kita cocokin URI dan Method-nya
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                $controllerName = 'Controllers\\' . $route['controller']['controller'];
                $action = $route['controller']['action'];

                if (class_exists($controllerName)) {
                    $controller = new $controllerName();
                    if (method_exists($controller, $action)) {
                        $controller->$action();
                        return; // Hentikan jika sudah ketemu
                    }
                }
            }
        }

        // Handle 404 Not Found
        http_response_code(404);
        echo "<h1>404 Not Found</h1>";
        echo "Halaman untuk URL '{$uri}' dengan method '{$method}' tidak ditemukan.";
    }
}