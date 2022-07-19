<?php

namespace Controller;

use Core\AbstractController;
use Core\Interfaces\ControllerInterface;

class Home extends AbstractController implements ControllerInterface
{
    public function index(): void
    {
        $this->render('parts/home');
    }
}