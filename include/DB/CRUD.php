<?php

namespace App\DB;

use App\Auth\Auth;

class CRUD extends Connection{

    private $connection;

    public function __construct()
    {
        $this->connection = self::connect();
    }

    public function login($username,$password){

        $stmt = $this->connection->prepare("select * from users where email = ?;");
        $stmt->bindParam(1,$username);
        if ($stmt->execute()) {
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
            return isset($data['id']) ?
                (Auth::verifyPassword($password,$data['password']) ? $data['id'] : false) : false;
        } return false;
    }


    public function createUser( $fields ){

        $db_pass = Auth::makePassword($fields['password']);

        $stmt = $this->connection->prepare('insert into users (first_name,last_name,phone,email,password,created_at) VALUES (?,?,?,?,?,?)');
        $stmt->bindParam(1,$fields['first_name']);
        $stmt->bindParam(2,$fields['last_name']);
        $stmt->bindParam(3,$fields['phone']);
        $stmt->bindParam(4,$fields['email']);
        $stmt->bindParam(5, $db_pass);
        $stmt->bindParam(6,date('Y-m-d H:i:s'));

        try {
            if ($stmt->execute()) {
                return 'created';
            }
        }catch (\Exception $exception){
            if ($exception->getCode() == 23000) {
                return 'email-used';
            }
        } return 'error';
    }

    public function getUser($id){
        $stmt = $this->connection->prepare("select first_name,last_name,concat(first_name,last_name) as full_name, email, phone from users where id = ?;");
        $stmt->bindParam(1,$id);
        if ($stmt->execute()) {
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        } return false;
    }
}