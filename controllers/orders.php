<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints as Assert;

$app->match('/orders', function (Request $request) use ($app) {
    $orders = $app['reservation_repository']->getAllReservation($app['session']->get('user'));

    return $app['twig']->render('orders.html', array('orders' => $orders));


})->bind('orders');