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
    $openPages = array("login", "homepage", "signup","contact", "adminlogin");
    $requireAdmin = array("admin", "adminassign", "adminsignup");

    // if the
    if(!in_array($request->get("_route"),$openPages)) {
        if(!$app['session']->get('connected')){
            return $app->redirect($app['url_generator']->generate('login'));
        }
    }

    if(in_array($request->get("_route"),$requireAdmin)){
        if(!$app['session']->get('admin')){
            return $app->redirect('/');
        }
    }
});