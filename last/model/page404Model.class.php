<?php

class page404Model extends Model
{
    public $view = 'page404';
    public $title;

    function __construct()
    {	
		parent::__Construct();
		$this->title .= "Запрашиваемая вами страница не найдена.";

    }



    public function index($data = NULL, $deep = 0) 
	{

    }





}