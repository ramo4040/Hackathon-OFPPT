<?php

namespace App\Controller;

use App\Services\AuthService;
use App\View\ErrorView;
use App\View\Login\MainView;
use App\View\Login\SignInView;
use App\View\Login\SignUpView;

class AuthController {
    private AuthService $service;

    public function __construct(AuthService $service) {
        $this->service = $service;
    }

    public function showSignupForm($errors = null) {
        $signUpView = SignUpView::render($errors);
        MainView::render($signUpView);
    }

    public function showLoginForm($errors = null) {
        $signUpView = SignInView::render($errors);
        MainView::render($signUpView);
    }

    public function register() {
        $validationResult = $this->service->validateRegistration($_POST);

        if (!$validationResult['success']) {
            $this->showSignupForm($validationResult['errors']);
            return;
        }

        $result = $this->service->register($_POST);

        if (!$result['success']) {
            $this->showSignupForm($result['errors']);
            return;
        }
    }

    public function login() {
        $validationResult = $this->service->validateLogin($_POST);

        if (!$validationResult['success']) {
            $this->showLoginForm($validationResult['errors']);
            return;
        }

        $result = $this->service->login($_POST);

        if (!$result['success']) {
            $this->showLoginForm($result['errors']);
            return;
        }
    }

    public function logOut() {
        session_regenerate_id(true);
        setcookie(session_name(), '', time() - 42000, '/');
        session_destroy();
        header('Location: http://localhost/hackathon/login');
        exit;
    }
}
