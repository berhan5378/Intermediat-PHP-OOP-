<?php
declare(strict_types=1);
require_once 'Controllers/Exception/ViewNotFoundException.php';

class View {
    public function __construct(protected string $view,protected array $params=[])
    {
        
    }
    public static function make(string $view,array $params =[]):static{
        return new static($view,$params);
    }
    public function render():string{
        $viewpath=VIEW_PATH.'/'.$this->view.'.php';
        if(! file_exists($viewpath)){
          throw new ViewNotFoundException();
        }

      //  foreach($this->params as $i=>$val){//this to create variable $foo
        //    $$i=$val;
        //}
        //or
        extract($this->params);//to create variable $foo  but this two methods is dangers!!
        ob_start();
        include $viewpath;
        return (string)ob_get_clean();
    }
    public function __toString() //this call by echo $router->resolve($_SERVER['REQUEST_URI']); 
    {
        return $this->render();
    }
    public function __get($name)
    {
        return $this->params[$name] ?? null;
    }
}