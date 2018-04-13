<?php
/**
 * Created by PhpStorm.
 * User: Etienne
 * Date: 13/04/2018
 * Time: 14:49
 */

namespace App\Router;


class Router
{

    // -------------------------------------------------------------------- VARIABLES

    private $url;
    private $routes = [];
    private $namedRoutes = [];




    // -------------------------------------------------------------------- CONSTRUCT

    public function __construct($url) {
        $this->url = $url;
    }




    // -------------------------------------------------------------------- ACCESS METHODS

    public function get($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'POST');
    }

    public function put($path, $callable, $name = null) {
        return $this->add($path, $callable, $name, 'PUT');
    }




    // -------------------------------------------------------------------- HELPING METHODS

    public function add($path, $callable, $name, $method) {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;

        if(is_string($callable) && $name === null) {
            $name = $callable;
        }

        if($name) {
            $this->namedRoutes[$name] = $route;
        }

        return $route;
    }

    public function run() {
        if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            echo new RouterException('Unknown Request Method');
        }

        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->match($this->url)) {
                $route->call();
            }
        }

        return new RouterException('No Matching Route');
    }

    public function url($name, $params = []) {
        if(!isset($this->namedRoutes[$name])) {
            return new RouterException('No Routes Matching This Name');
        }

        return $this->namedRoutes[$name]->getUrl($params);
    }

}