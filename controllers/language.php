<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$app->before(function (Request $request, Application $app) {
    if($request->get('_route') == "country_redirect"){
        $language = $request->getPreferredLanguage(array('fr', 'en'));
    }else{
       $language = $request->getLocale();
    }
    $app['session']->set('language', $language);
});