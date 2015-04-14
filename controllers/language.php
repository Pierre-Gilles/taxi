<?php

$app->before(function (Request $request, Application $app) {
    $language = $request->getPreferredLanguage(array('fr', 'en'));
    $app['session']->set('language', $language);
});