<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


$app->before(function (Request $request, Application $app) {
    //echo json_encode($app['session']->get('user'));
    //$app['session']->set('user', array('username' => "COUCOU"));
    $openPages = array("login", "homepage");
    $requireAdmin = array("admin");
    if(!in_array($request->get("_route"),$openPages)) {

    }
});