<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password){
        $user = App::resolve(Database::class)->query('select * from users where email = :email', [
            'email' => $email,
        ])->find();

        // if user found
        if($user){
            // user does have an email in the database, let's authenticate the password

            if(password_verify($password, $user['password'])){
                $this->login([
                    'email' => $email
                ]);

                return true;
            }
        }

        return false;
    }

    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        // generate the session id
        session_regenerate_id(true);
    }

    public function logout(){

        Session::destroy();

    }
}