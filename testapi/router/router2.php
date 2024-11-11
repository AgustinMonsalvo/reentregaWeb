<?php

require_once  'libreria/libreria.php';
require_once 'controlador/controlador.php';

class Route {
    private $url;
    private $verb;
    private $controller;
    private $method;
    private $params;

    public function __construct($url, $verb, $controller, $method) {
        $this->url = $url;
        $this->verb = $verb;
        $this->controller = $controller;
        $this->method = $method;
        $this->params = [];
    }

    public function match($url, $verb) {
        if ($this->verb != $verb) {
            return false;
        }
        $partsURL = explode("/", trim($url, '/'));
        $partsRoute = explode("/", trim($this->url, '/'));
        if (count($partsRoute) != count($partsURL)) {
            return false;
        }
        foreach ($partsRoute as $key => $part) {
            if ($part[0] != ":") {
                if ($part != $partsURL[$key]) {
                    return false;
                }
            } else {
                $this->params[substr($part, 1)] = $partsURL[$key];
            }
        }
        return true;
    }

    public function run($request) {
        $controller = $this->controller;  
        $method = $this->method;

       
        parse_str(parse_url($request->url, PHP_URL_QUERY), $queryParams);
        $this->params = array_merge($this->params, $queryParams); 
        $request->params = (object) $this->params;

        (new $controller())->$method($request);
    }
}

class Router {
    private $routeTable = [];
    private $request;

    public function __construct() {
        $this->request = new Request();
    }

    public function route($url, $verb) {
        foreach ($this->routeTable as $route) {
            if ($route->match($url, $verb)) {
                $route->run($this->request);
                return;
            }
        }
        http_response_code(404);
        
    }

    public function addRoute($url, $verb, $controller, $method) {
        $this->routeTable[] = new Route($url, $verb, $controller, $method);
    }
}
