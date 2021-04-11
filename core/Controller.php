<?php


namespace app\core;


abstract class Controller
{
    public $view;
    public $item;

    public function __construct($item)
    {
        $this->view = new View();
        $this->item = $item;
    }
}
