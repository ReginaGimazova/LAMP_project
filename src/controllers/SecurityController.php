<?php

namespace app\controllers;

use app\repositories\userRepository\UserRepository;
use app\services\SecurityService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 14:41
 */

class SecurityController
{
    public function index(Application $app){
        return new Response($app['twig']->render('auth.html.twig'));
    }

    public function authentication(Application $app, Request $request){
        $data = $request->request->all();
        $securityService = new SecurityService();
        $repository = new UserRepository();
        $response = new Response();

        if (isset($_POST['submit'])) {
            $username = $securityService->checkInput($data['username']);
            $password = $securityService->checkInput($data['password']);
            $user = $repository->findByName($username);
            $checkUser = $securityService->checkPassword($password, $user['password']) && $user;

            if ($checkUser){
                $_SESSION['id'] = $user['user_id'];
            }
            if (isset($_SESSION['id'])){
                $response = $app->redirect($app['url_generator']->generate('profile', array("id" => $user['user_id'])));
            }
            else{
               $response = $app->redirect($app['url_generator']->generate('auth'));

            }
        }
        return $response;
    }

    public function logout(Application $app){
        unset($_SESSION['id']);
        $response = $app->redirect($app['url_generator']->generate('main'));
        return $response;
    }
}