<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


$app->before(function (Request $request, Application $app) {

    if($request->get("_route"))
});



$app->get('/login', function (Request $request) use ($app) {
    $username = "test";
    if(!empty($request->get('username')))
        $username = $request->get('username');
    else
    //$password = $app['request']->server->get('PHP_AUTH_PW');
    return $username;

    if ('igor' === $username && 'password' === $password) {
        $app['session']->set('user', array('username' => $username));
        return $app->redirect('/account');
    }

    /*$response = new Response();
    $response->headers->set('WWW-Authenticate', sprintf('Basic realm="%s"', 'site_login'));
    $response->setStatusCode(401, 'Please sign in.');
    return $response;*/
})->bind('login');

$app->get('/', function () use ($app) {
    $chauffeurs = $app['chauffeur_repository']->getAllChauffeurs();
    //return $app->json($chauffeurs);
    return $app['twig']->render('index.html', array('chauffeurs'=>$chauffeurs));
})->bind('homepage');

/*$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html',
        'errors/'.substr($code, 0, 2).'x.html',
        'errors/'.substr($code, 0, 1).'xx.html',
        'errors/default.html',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
*/

