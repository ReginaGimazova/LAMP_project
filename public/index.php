<?php
/**
 * Created by PhpStorm.
 * User: regagim
 * Date: 02.01.19
 * Time: 13:34
 */

require_once __DIR__.'/../vendor/autoload.php';

use app\providers\PostControllerProvider;
use app\providers\UserControllerProvider;
use Silex\Application;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\TwigServiceProvider;
use app\providers\RegistrationControllerProvider;
use app\providers\SecurityControllerProvider;
use Silex\Application\UrlGeneratorTrait;

$app = new Application();
session_start();
$app['debug'] = true;
// initialize providers, services, controllers
$app->register(new TwigServiceProvider(), array('twig.path' => __DIR__.'/../templates'));
$app->register(new ServiceControllerServiceProvider());

$app->register(new Silex\Provider\AssetServiceProvider(), array(
    'assets.version' => 'v1',
    'assets.version_format' => '%s?version=%s',
    'assets.named_packages' => array(
        'css' => array('version' => 'css2', 'base_path' => '/whatever-makes-sense'),
        'images' => array('base_urls' => array('https://img.example.com')),
    ),
));

$app->mount("/registration", new RegistrationControllerProvider());
$app->mount("/", new SecurityControllerProvider());
$app->mount("/", new UserControllerProvider());
$app->mount("/", new PostControllerProvider());

$app->run();