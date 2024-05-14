<?php

use App\Controller\AuthController;
use App\Controller\DashboardController;
use App\Routes\Router;



Router::get('/register', [AuthController::class, 'showSignupForm']); // signUp view
Router::get('/login', [AuthController::class, 'showLoginForm']); // login view


Router::post('/register', [AuthController::class, 'register']); // POST for signUp
Router::post('/login', [AuthController::class, 'login']); // PUT for login

Router::get('/dashboard', [DashboardController::class, 'index']); // dashboard


Router::get('/logout', [AuthController::class, 'logOut']); // dashboard