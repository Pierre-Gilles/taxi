<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


$app->get('/{_locale}/', function () use ($app) {
    //$chauffeurs = $app['chauffeur_repository']->getAllChauffeurs();
    //return $app->json($chauffeurs);
    return $app['twig']->render('index.html', array());
})->bind('homepage');



