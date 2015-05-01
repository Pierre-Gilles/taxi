<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

$app->before(function (Request $request, Application $app) {
    // language available
    $authorizedLanguage = array('fr', 'en');

    // if we are on the base url '/' of the website, choose the prefer language of the user
    if($request->get('_route') == "country_redirect"){
        $language = $request->getPreferredLanguage($authorizedLanguage);
    }else{
       $language = $request->getLocale();
        if(!in_array($language, $authorizedLanguage)){
            $language = 'fr';
            $request->setLocale($language);
            return $app->redirect('/');
        }
    }
    $app['session']->set('language', $language);
});