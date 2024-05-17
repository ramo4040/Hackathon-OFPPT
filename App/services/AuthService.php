<?php

namespace App\Services;

use App\Helper\Validator;
use App\Model\UserModel;

class AuthService {
    public function __construct(
        private UserModel $model,
        private Validator $validator
    ) {
    }

    public function validateRegistration($data) {

        $this->validator->setAliases([
            'full_name' => 'full name',
            'confirm_password' => 'confirm password',
            'dob' => 'date of birth'
        ]);

        $this->validator->make(
            $data,
            [
                'full_name' => 'required|alpha',
                'email' => 'required|email',
                'dob' => 'required|Birthdate',
                'gender' => 'required|Gender',
                'password' => 'required|password',
                'confirm_password' => 'same',
            ]
        );

        if ($this->validator->fails()) {
            return ['success' => false, 'errors' => $this->validator->getErrors()];
        }

        return ['success' => true, 'data' => $data];
    }

    public function register($data) {
        $data['salt'] = bin2hex(random_bytes(16));
        $data['password'] = password_hash($data['salt'] . $data['password'], PASSWORD_ARGON2ID);
        $result = $this->model->create($data);

        if ($result['success']) {
            header('Location: ./login');
            return ['success' => true];
        }

        return $result;
    }

    public function validateLogin($data) {
        $this->validator->make(
            $data,
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if ($this->validator->fails()) {
            return ['success' => false, 'errors' => $this->validator->getErrors()];
        }

        return ['success' => true];
    }

    public function login($data) {
        if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
            $result = $this->model->validateUser($data);

            if ($result['success']) {
                if (password_verify($result['user']['salt'] . $data['password'], $result['user']['password_hash'])) {
                    $_SESSION['full_name']  = $result['user']['full_name'];
                    header('Location: ./dashboard');
                    exit;
                }
            }

            return [
                'success' => false,
                'errors' => ['null' => 'Email or Password incorrect']
            ];
        }

        return ['success' => false];
    }
}
