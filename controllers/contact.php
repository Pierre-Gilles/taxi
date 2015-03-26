<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


$app->get('/contact', function () use ($app) {
   // $chauffeurs = $app['chauffeur_repository']->getAllChauffeurs();
    //return $app->json($chauffeurs);
    return $app['twig']->render('contact.html', array());
})->bind('contact');



