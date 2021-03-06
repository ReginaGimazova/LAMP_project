<?php

/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 03.01.19
 * Time: 1:05
 */

namespace app\providers;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;


class RegistrationControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $factory = $app["controllers_factory"];
        $factory->get("/", "app\controllers\RegistrationController::index")->bind('reg');
        $factory->post("/", "app\controllers\RegistrationController::registration");

        return $factory;
    }
}