<?php


namespace app\core;


class View
{
    public function generate($contentView, $templateView, $data = null)
    {
        require __DIR__ . '/../views/' . $templateView . '.php';
    }
}
