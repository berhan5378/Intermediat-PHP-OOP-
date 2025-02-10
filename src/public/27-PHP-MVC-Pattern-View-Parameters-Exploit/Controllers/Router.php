<?php
declare(strict_types=1);
require_once 'Exception/RouteNotFoundException.php';
class Router
{
    private array $routers;

    public function register(string $router, callable|array $action):self
    {
        $this->routers[$router]=$action;
        return $this;
    }
    public function resolve(string $requestUri)
    {
        $route=explode('?',$requestUri)[0];
        $action =$this->routers[$route] ?? null;
        if(!$action){
            throw new RouteNotFoundException();
        }
        if(is_callable($action)){
            return call_user_func($action);
        }
        if(is_array($action)){
            [$class,$method]=$action;
            if(class_exists($class)){
                $class = new $class();

                if(method_exists($class, $method)){
                    return call_user_func_array([$class,$method],[]);
                }
            }
        }
    }
}