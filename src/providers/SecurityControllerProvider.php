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

class SecurityControllerProvider implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $factory = $app['controllers_factory'];
        $factory->get("/login", "app\controllers\SecurityController::index")->bind('auth');
        $factory->post("/login", "app\controllers\SecurityController::authentication");
        $factory->get("/logout", "app\controllers\SecurityController::logout")->bind('logout');
        return $factory;
    }
}