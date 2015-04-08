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
use Silex\Provider\UrlGeneratorServiceProvider;
use Silex\Provider\SessionServiceProvider;
use Silex\Provider\FormServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Symfony\Component\Translation\Loader\YamlFileLoader;

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

/**
 * Services
 */

require $servicesDir .'/SecurityHandler.php';


/**
 * BDD Connections
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

//$app->register(new RoutingServiceProvider());
$app->register(new ValidatorServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new UrlGeneratorServiceProvider());
$app->register(new SessionServiceProvider());
$app->register(new FormServiceProvider());
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


/**
 * Registering Translation service provider
 */

$app->register(new TranslationServiceProvider(), array(
    'locale_fallbacks' => array('fr'),
));

/**
 * Adding translation files
 */
$app['translator'] = $app->share($app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/en.yml', 'en');
    $translator->addResource('yaml', __DIR__.'/locales/fr.yml', 'fr');

    return $translator;
}));

/**
 * Sharing all the mappers
 */

$app['utilisateur_mapper'] = $app->share(function() use ($app) {
    return new UtilisateurMapper();
});

/**
 * Sharing all the repository, so they are accessible anywhere
 */

$app['chauffeur_repository'] = $app->share(function() use ($app) {
    return new ChauffeurRepository($app['db']);
});

$app['course_repository'] = $app->share(function() use ($app) {
    return new CourseRepository($app['db']);
});

$app['disponibilite_repository'] = $app->share(function() use ($app) {
    return new DisponibiliteRepository($app['db']);
});

$app['lieu_repository'] = $app->share(function() use ($app) {
    return new LieuRepository($app['db']);
});

$app['reservation_repository'] = $app->share(function() use ($app) {
    return new ReservationRepository($app['db']);
});

$app['serviceCP_repository'] = $app->share(function() use ($app) {
    return new ServiceCPRepository($app['db']);
});

$app['tpsparcours_repository'] = $app->share(function() use ($app) {
    return new tpsParcoursRepository($app['db']);
});

$app['utilisateur_repository'] = $app->share(function() use ($app) {
    return new UtilisateurRepository($app['db'], $app['utilisateur_mapper']);
});

$app['voiture_repository'] = $app->share(function() use ($app) {
    return new VoitureRepository($app['db']);
});



/**
 * Sharing all the services, so they are accessible anywhere
 */

$app['securityhandler_service'] = $app->share(function() use ($app) {
    return new SecurityHandler($app['utilisateur_repository']);
});