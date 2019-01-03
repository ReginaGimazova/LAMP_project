<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 03.01.19
 * Time: 20:05
 */

namespace app\providers;

use Silex\Api\ControllerProviderInterface;
use Silex\Application;

class AuthenticationControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $factory = $app['controllers_factory'];
        $factory->get("/", "app\controllers\AuthenticationController::index");
        $factory->post("/", "app\controllers\AuthenticationController::authentication");
        return $factory;
    }
}