<?php

class Controller
{
    public $view = 'index';
    protected $data;
    protected $template;


    function __construct()
    {
        $this->data = [
            'domain' => Config::get('domain'),
            'BreadCrumbs' => Bread::BreadCrumbs(explode("/", $_SERVER['REQUEST_URI'])),
            'isAuth' => Auth::logIn(),
            'microtime' => microtime(true)
        ];


    }

    public function controller_view($param = 0)
    {


    }


    public function __call($name, $param)
    {

    }

}