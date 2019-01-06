<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 05.01.19
 * Time: 22:48
 */

namespace app\providers;


use Silex\Api\ControllerProviderInterface;
use Silex\Application;
use Silex\ControllerCollection;

class PostControllerProvider implements ControllerProviderInterface
{

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $factory = $app["controllers_factory"];
        $factory->get("/", "app\controllers\PostController::index")->bind('main');
        $factory->get('/post/{id}', "app\controllers\PostController::openPost")->bind('post');
        return $factory;
    }
}