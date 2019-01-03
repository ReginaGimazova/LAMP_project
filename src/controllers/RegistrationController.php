<?php

namespace app\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 14:40
 */

class RegistrationController
{
    public function index(Request $request, Application $app){
        return new Response($app['twig']->render('registration.html.twig'));
    }

    public function registration(Request $request, Application $app){
        return 'registration';
    }
}