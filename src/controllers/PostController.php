<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 05.01.19
 * Time: 23:33
 */

namespace app\controllers;


use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

class PostController
{

    public function index(Application $app){
        return new Response($app['twig']->render('main.html.twig'));
    }

    public function openPost(Application $app){
        return new Response($app['twig']->render('post.html.twig'));
    }
}