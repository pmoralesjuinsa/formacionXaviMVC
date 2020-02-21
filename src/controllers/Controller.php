<?php


namespace Juinsa\controllers;


use Juinsa\ViewManager;

abstract class Controller
{
    protected $viewManager;

    public function __construct(ViewManager $viewManager)
    {
        $this->viewManager = $viewManager;
    }

    public abstract function index();
}