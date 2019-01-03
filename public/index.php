<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 13:34
 */

require_once __DIR__.'/../vendor/autoload.php';

use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use app\providers\RegistrationControllerProvider;
use app\providers\AuthenticationControllerProvider;
use Silex\Application\UrlGeneratorTrait;

$app = new Application();
$app['debug'] = true;
// initialize providers, services, controllers
$app->register(new TwigServiceProvider(), array('twig.path' => __DIR__.'/../templates'));
$app->register(new ServiceControllerServiceProvider());

$app->mount("/registration", new RegistrationControllerProvider());
$app->mount("/", new AuthenticationControllerProvider());

$app->run();