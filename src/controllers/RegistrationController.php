<?php

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 14:40
 */

namespace app\controllers;

use app\models\User;
use app\repositories\userRepository\UserRepository;
use app\services\ValidationService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class RegistrationController
{
    public function index(Application $app){
        return new Response($app['twig']->render('registration.html.twig'));
    }

    public function registration(Request $request, Application $app){

        $validationService = new ValidationService();
        $userRepository = new UserRepository();
        $data = $request->request->all();

        $response = new Response();

        if (isset($_POST['submit'])){

            $user = new User();
            $username = $validationService->checkInput($data['username']);
            $password = $validationService->checkInput($data['password']);
            $validationService->validatePassword($password);

            $errors = $validationService->getErrors();

            if (empty($errors)){
                $user->setUsername($username);
                $user->setPassword($password);
                $userRepository->save($user);
                $response = $app->redirect($app['url_generator']->generate('auth'));
            }
            else{
                $response = $app['twig']->render('registration.html.twig', ['errors' => $errors]);
            }
        }
        return $response;
    }
}