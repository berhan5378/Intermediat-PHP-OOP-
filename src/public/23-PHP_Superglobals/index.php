<?php
/*
PHP Superglobals
superglobals are predefined variables that are always accessible, regardless of scope. They provide information about the server, request, and environment. One of the most commonly used superglobals for basic routing is $_SERVER, which contains details about the server and the current request

$_SERVER is an associative array that contains information about the server and the execution environment. Some key elements for routing include:

$_SERVER['REQUEST_URI']: The URI (path) of the current request (e.g., /about).

$_SERVER['REQUEST_METHOD']: The HTTP request method (e.g., GET, POST).

$_SERVER['SCRIPT_NAME']: The path of the current script (e.g., /index.php).
*/ 

// Get the request URI
$requestUri = $_SERVER['REQUEST_URI'];

// Remove query strings from the URI
$requestUri = strtok($requestUri, '?');

// Define routes
$routes = [
    '/' => 'home.php',
    '/about' => 'about.php',
    '/contact' => 'contact.php',
];

// Check if the route exists
if (array_key_exists($requestUri, $routes)) {
    include $routes[$requestUri];
} else {
    // Handle 404 Not Found
    header("HTTP/1.0 404 Not Found");
    include '404.php';
}


//Handling GET and POST Requests

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$requestUri = strtok($requestUri, '?');

$routes = [
    'GET' => [
        '/' => 'home.php',
        '/about' => 'about.php',
    ],
    'POST' => [
        '/submit' => 'submit.php',
    ],
];

if (array_key_exists($requestMethod, $routes) && array_key_exists($requestUri, $routes[$requestMethod])) {
    include $routes[$requestMethod][$requestUri];
} else {
    header("HTTP/1.0 404 Not Found");
    include '404.php';
}

//For larger applications, you can create a more robust router class to handle routing logic.

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
        ];
    }

    public function dispatch() {
        $requestUri = strtok($_SERVER['REQUEST_URI'], '?');
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            $pattern = "@^" . preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $route['path']) . "$@D";

            if ($route['method'] === $requestMethod && preg_match($pattern, $requestUri, $matches)) {
                call_user_func($route['handler'], $matches);
                return;
            }
        }

        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}

// Usage
$router = new Router();
$router->addRoute('GET', '/', function() {
    include 'home.php';
});
$router->addRoute('GET', '/user/{id}', function($params) {
    $userId = $params['id'];
    include 'user.php';
});

$router->dispatch();
/*
Explanation:
The route /user/{id} is converted into a regex pattern to match dynamic paths like /user/123.

The preg_match() function extracts the id parameter from the URI.

The user.php/home.php file is included, and the $matches array contains the extracted parameters.
*/