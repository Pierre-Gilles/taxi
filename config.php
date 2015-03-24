<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\ValidatorServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\MonologServiceProvider;
use Silex\Provider\WebProfilerServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
/** @var Application $app */

/**
 * Services
 */

$modelsDir = __DIR__ . '/models';
$servicesDir = __DIR__ . '/services';

/**
 * Entities
 */
require $modelsDir .'/entities/Chauffeur.php';
require $modelsDir .'/entities/Course.php';
require $modelsDir .'/entities/Disponibilite.php';
require $modelsDir .'/entities/Lieu.php';
require $modelsDir .'/entities/Reservation.php';
require $modelsDir .'/entities/ServiceCP.php';
require $modelsDir .'/entities/tpsParcours.php';
require $modelsDir .'/entities/Utilisateur.php';
require $modelsDir .'/entities/Voiture.php';

/**
 * Mappers
 */
require $modelsDir .'/mappers/ChauffeurMapper.php';
require $modelsDir .'/mappers/CourseMapper.php';
require $modelsDir .'/mappers/DisponibiliteMapper.php';
require $modelsDir .'/mappers/LieuMapper.php';
require $modelsDir .'/mappers/ReservationMapper.php';
require $modelsDir .'/mappers/ServiceCPMapper.php';
require $modelsDir .'/mappers/tpsParcoursMapper.php';
require $modelsDir .'/mappers/UtilisateurMapper.php';
require $modelsDir .'/mappers/VoitureMapper.php';

/**
 * Repositories
 */
require $modelsDir .'/repositories/ChauffeurRepository.php';
require $modelsDir .'/repositories/CourseRepository.php';
require $modelsDir .'/repositories/DisponibiliteRepository.php';
require $modelsDir .'/repositories/LieuRepository.php';
require $modelsDir .'/repositories/ReservationRepository.php';
require $modelsDir .'/repositories/ServiceCPRepository.php';
require $modelsDir .'/repositories/tpsParcoursRepository.php';
require $modelsDir .'/repositories/UtilisateurRepository.php';
require $modelsDir .'/repositories/VoitureRepository.php';



/*require $modelsDir . '/AbstractRepository.php';
require $modelsDir . '/AdviceRepository.php';
require $modelsDir . '/CityRepository.php';
require $modelsDir . '/DeviceRepository.php';
require $modelsDir . '/FollowedRepository.php';
require $modelsDir . '/LocationRepository.php';
require $modelsDir . '/NotificationsRepository.php';
require $modelsDir . '/PollenRepository.php';
require $modelsDir . '/StatsRepository.php';
require $modelsDir . '/SettingRepository.php';
require $modelsDir . '/TokenRepository.php';
require $modelsDir . '/UserRepository.php';

require $servicesDir . '/senders/SenderInterface.php';
require $servicesDir . '/senders/AppleSender.php';
require $servicesDir . '/senders/GcmSender.php';
require $servicesDir . '/senders/DelegatedSender.php';
require $servicesDir . '/RequestValidator.php';
require $servicesDir . '/SecurityHandler.php';*/


/*$app->register(new Silex\Provider\ValidatorServiceProvider());
*/

$dboptions = require  __DIR__."/database.php";
$app->register(new DoctrineServiceProvider(), array(
    'db.options' => $dboptions,
));

/**
 * Monolog will log requests and errors and allow you to add logging to your application. 
 * This allows you to debug and monitor the behaviour, even in production.
 */

$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/var/logs/silex_dev.log',
));

$app->register(new RoutingServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/templates',
    'twig.options' => array('cache' => __DIR__.'/var/cache/twig')
));

$app->register(new HttpFragmentServiceProvider());
$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    $twig->addFunction(new \Twig_SimpleFunction('asset', function ($asset) use ($app) {
        return $app['request_stack']->getMasterRequest()->getBasepath().'/assets/'.$asset;
    }));

    return $twig;
});
/**
 * WebProfilerServiceProvider :
 * Provide the debug bar at the bottom of the window.
 */

$app->register(new WebProfilerServiceProvider(), array(
    'profiler.cache_dir' => __DIR__.'/var/cache/profiler',
));

/*
$app['advice_repository'] = $app->share(function() use ($app) {
    return new AdviceRepository($app['db']);
});

$app['user_repository'] = $app->share(function() use ($app) {
    return new UserRepository($app['db']);
});

$app['city_repository'] = $app->share(function() use ($app) {
    return new CityRepository($app['db']);
});

$app['pollen_repository'] = $app->share(function() use ($app) {
    return new PollenRepository($app['db']);
});

$app['token_repository'] = $app->share(function() use ($app) {
    return new TokenRepository($app['db']);
});

$app['setting_repository'] = $app->share(function() use ($app) {
    return new SettingRepository($app['db']);
});

$app['location_repository'] = $app->share(function() use ($app) {
    return new LocationRepository($app['db']);
});

$app['notification_repository'] = $app->share(function() use ($app) {
    return new NotificationsRepository($app['db']);
});

$app['followed_repository'] = $app->share(function() use ($app) {
    return new FollowedRepository($app['db']);
});

$app['device_repository'] = $app->share(function() use ($app) {
    return new DeviceRepository($app['db']);
});

$app['stats_repository'] = $app->share(function() use ($app) {
    return new StatsRepository($app['db']);
});


$app['request_validator'] = $app->share(function() use ($app) {
    return new RequestValidator($app['validator']);
});

$app['security_handler'] = $app->share(function() use ($app) {
    return new SecurityHandler($app['user_repository'], $app['token_repository']);
});

$app['gcm_sender'] = $app->share(function() use ($app) {
    return new GcmSender($app['gcm_key']);
});

$app['apple_sender'] = $app->share(function() use ($app) {
    return new AppleSender();
});

$app['notifications_sender'] = $app->share(function() use ($app) {
    return new DelegatedSender([
        $app['gcm_sender'],
        $app['apple_sender'],
    ]);
});*/