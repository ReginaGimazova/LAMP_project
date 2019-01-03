<?php

namespace app\controllers;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 14:41
 */

class AuthenticationController
{
    public function index(Application $app){
        return new Response($app['twig']->render('auth.html.twig'));
    }

    public function authentication(Application $app){
        return 'authentication';
    }
}