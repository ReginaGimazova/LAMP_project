<?php

namespace app\controllers;
use app\repositories\userRepository\UserRepository;
use Silex\Application;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 14:40
 */

class UserController
{
    public function index(Application $app, $id){
        $repository = new UserRepository();
        if (isset($_SESSION['id'])){
            $user = $repository->find($id);
            $response = new Response($app['twig']->render('profile.html.twig', array('username' => $user['username'])));
        }
        else{
            $response = $app->redirect($app['url_generator']->generate('auth'));
        }
        return $response;
    }
}