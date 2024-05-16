<?php

namespace App\Config;

use App\Config\DataBase;
use App\Controller\AuthController;
use App\Controller\DashboardController;
use App\Core\App;
use App\Helper\Validator;
use App\Model\UserModel;
use App\Services\AuthService;
use App\Services\Container;
use App\View\Dashboard\DashboardView;

$container = new Container();




$container->set(Validator::class, function () {
    return new Validator();
});

$container->set(DataBase::class, function () {
    return new DataBase();
});


$container->set(UserModel::class, function ($container) {
    $db = $container->get(DataBase::class);
    return new UserModel($db);
});

$container->set(AuthService::class, function ($container) {
    $validator = $container->get(Validator::class);
    $model = $container->get(UserModel::class);
    return new AuthService($model, $validator);
});

$container->set(AuthController::class, function ($container) {
    $service = $container->get(AuthService::class);
    return new AuthController($service);
});

$container->set(DashboardController::class, function () {
    return new DashboardController();
});

$container->set(DashboardView::class, function () {
    return new DashboardView();
});





App::setContainer($container);
