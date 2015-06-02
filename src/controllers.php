<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
//Request::setTrustedProxies(array('127.0.0.1'));
$app->get('/', function () use ($app) {
    $res = array('message' => 'Hello '.$app->escape("SILEX"));

    return $app->json($res);
})
->bind('homepage')
;
$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $error = array('message' => 'Error');

    return $app->json($error, $code);
});