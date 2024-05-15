<?php

namespace App\Model;

use App\Config\DataBase;
use PDOException;

class UserModel {

    public function __construct(
        private DataBase $db
    ) {
        $this->db::connect();
    }
    public function __destruct() {
        unset($this->db);
    }

    public function create($data) {
        try {
            $this->db->query(
                "
                INSERT INTO users (full_name, email, dob, gender, password_hash ,salt)
                VALUES(:full_name, :email, :dob, :gender, :password_hash , :salt)
                ",
                [
                    ':full_name' => $data['full_name'],
                    ':email' => $data['email'],
                    ':dob' => $data['dob'],
                    ':gender' => $data['gender'],
                    ':password_hash' => $data['password'],
                    ':salt' => $data['salt']
                ]
            );

            return ['success' => true];
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry error
                return [
                    'success' => false,
                    'errors' =>
                    [
                        'email' => ['Email already exists']
                    ]
                ];
            }
        }
    }


    public function validateUser($data) {
        try {
            $this->db->query(
                'SELECT * FROM users WHERE email = :email',
                [
                    ':email' => $data['email']
                ]
            );

            $user = $this->db->fetch(\PDO::FETCH_ASSOC);

            if (!empty($user)) {
                return  ['success' => true, 'user' => $user];
            }

            return  ['success' => false];
        } catch (PDOException $e) {
        }
    }
}
