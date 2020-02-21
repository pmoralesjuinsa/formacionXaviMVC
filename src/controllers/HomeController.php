<?php


namespace Juinsa\controllers;

class HomeController extends Controller
{
    public function index()
    {
        $this->viewManager->renderTemplate("index.twig.html");
    }
}